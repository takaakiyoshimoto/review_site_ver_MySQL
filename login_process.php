<?php
//フォームからデータを受け取る
$user_name = $_POST["user_name"];
$pass = $_POST["pass"];

//DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=shopping_site;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

$stmt = $pdo->prepare("select * From user_management");
$status = $stmt->execute();
$flag="False";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    //PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($result['name']==$user_name)
        //一致した場合passを確かめる
            if($result['pass']==$pass){
                $flag="True";
                //cookieにユーザ名を保存,30日間有効
                setcookie("user_name", $user_name, time() + 60 * 60 * 24 * 30);
                break;
            }else{
                $flag = "Failed";
                break;
            }
        }
}

// //ファイルを読み込み。ログインを行う
// $file = fopen("data/user_cert.txt","r");
//     $flag = "False";  //同一ユーザがいる場合trueになるフラグ
//     //feofは()ないが最後にいっているかを判定する。!では最後になるまでやる
//     while (!feof($file)) {
//         //fgetでデータを取得
//         $txt = fgets($file);
//         $txt = explode(" ",$txt);

//         //半角スペースによって後の文字列一致判定が失敗したためtrimを行う
//         $txt[2] = trim($txt[2]);

//     //チェックを行う
//         //一致するユーザ名存在するか
//         if ($txt[0]==$user_name){
//             //一致した場合パスワードを確かめる
//             //あっていればflagにtrue,あっていなければFailedを代入。
//             if($txt[2]==$pass){
//                 $flag = "True";
//                 //cookieにユーザ名を保存,30日間有効
//                 setcookie("user_name", $user_name, time() + 60 * 60 * 24 * 30);
//             }else{
//                 $flag = "Failed";
//             }
//             //一致するユーザ名があればループを抜ける
//             break;
//         }
//     }
// fclose($file);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>File書き込み</title>
    </head>
    <body>
        <?php
            //flagがTrueなら
            if($flag=="True"){
                echo "<h1>ようこそ";
                echo $user_name;
                echo "さん</h1>";
            }elseif($flag=="Failed"){
                echo "<h1>パスワードが異なります。</h1>";
            }else{
                echo "<h1>ユーザーが存在しません。</h1>";
            }
        ?>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>

