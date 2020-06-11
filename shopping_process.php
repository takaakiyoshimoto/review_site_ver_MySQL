<?php
//フォームからデータを受け取る
$apple = $_POST["apple"];
$orange = $_POST["orange"];
$grape = $_POST["grape"];

//cookieからユーザ名を取得
$user_name=$_COOKIE["user_name"];


//ファイルに書き込む
// $file = fopen("data/shopping_data.txt","a");
//     if ($apple!="" and $apple!=0){
//         fwrite($file,$user_name." "."リンゴ"." ".$apple." ".$time." ".uniqid("リンゴ!")."\n");
//     }
//     if ($orange!="" and $orange!=0){
//         fwrite($file,$user_name." "."ミカン"." ".$orange." ".$time." ".uniqid("ミカン!")."\n");
//     }
//     if ($grape!="" and $grape!=0){
//         fwrite($file,$user_name." "."ブドウ"." ".$grape." ".$time." ".uniqid("ブドウ!")."\n");
//     }
// fclose($file);

//DBに書き込みを行う。
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=shopping_site;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
  
//３．データ登録SQL作成
//prepareで文字列として準備
if ($apple!="" and $apple!=0){
    $stmt = $pdo->prepare("INSERT INTO shopping_data(id,name,goods,quanity,time)VALUES(NULL,:a1,:a2,:a3,sysdate())");
    //bind変数に入れることで無効かしている(script等を埋め込まれないため)
    //↓文字列型としてエスケープするという意味
    $stmt->bindValue(':a1',$user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',"apple", PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a3', $apple, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
}
if ($orange!="" and $orange!=0){
    $stmt = $pdo->prepare("INSERT INTO shopping_data(id,name,goods,quanity,time)VALUES(NULL,:a1,:a2,:a3,sysdate())");
    //bind変数に入れることで無効かしている(script等を埋め込まれないため)
    //↓文字列型としてエスケープするという意味
    $stmt->bindValue(':a1',$user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',"orange", PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a3', $orange, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
}
if ($grape!="" and $grape!=0){
    $stmt = $pdo->prepare("INSERT INTO shopping_data(id,name,goods,quanity,time)VALUES(NULL,:a1,:a2,:a3,sysdate())");
    //bind変数に入れることで無効かしている(script等を埋め込まれないため)
    //↓文字列型としてエスケープするという意味
    $stmt->bindValue(':a1',$user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',"grape", PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a3', $grape, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
}

?>
<html>
    <body>
        <h1>購入しました。</h1>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>