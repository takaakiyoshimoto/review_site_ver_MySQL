<?php

//cookieからユーザ名を取得
$user_name=$_COOKIE["user_name"];

//データの数だけ描画する処理
//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=shopping_site;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("select * From shopping_data");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  //PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        //.=で変数をつなぐことができる
        if($result['name']==$user_name){
            $view .= "<p>";
            $view .= $result['goods'].':'.$result['quantity'].' '.$result['time'].' ';
            $view .= "<a href="."review.php"."?id=".$result['id'].">レビュー</a>";
            $view .= "</p>";
        }
    }
}
?>

<style>div{padding: 10px;font-size:16px;}</style>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->
<ul>
    <li><a href="index.php">戻る</a></li>
</ul>
</body>
</html>