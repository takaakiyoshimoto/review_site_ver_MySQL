<?php
    $select=$_GET['star'];
    $comment=$_GET['comment'];
    $id=$_GET['id'];

    //selectの値でレビューの評価を受け取る
    switch ($select) {
		case "5":
            $review=5;
            break;
		case "4":
            $review=4;
            break;
		case "3":
            $review=3;
            break;
        case "2":
            $review=2;
            break;
        case "1":
            $review=1;
            break;
    }
    
//DBに書き込む
//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=shopping_site;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //２．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO reviewed(id,star,comment)VALUES(:a1,:a2,:a3)");
  
  //bind変数に入れることで無効かしている(script等を埋め込まれないため)
    //↓文字列型としてエスケープするという意味
    echo "<p>"."id".$id."star".$select."comment".$comment."</p>";
    $stmt->bindValue(':a1',$id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',$review, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>レビューしました</title>
    </head>
    <body>
        <p>レビューしました</p>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>