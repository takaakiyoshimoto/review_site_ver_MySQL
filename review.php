<?php
  //urlから値を取得
  if(isset($_GET['id'])) { $id = $_GET['id']; }

  //レビュー済みならreviewed.phpに戻す
  //1.  DB接続します
  try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=shopping_site;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //２．データ登録SQL作成
  $stmt = $pdo->prepare("select * From reviewed");
  $status = $stmt->execute();

//３．レビュー済みか確認
  if($status==false) {
      //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

  }else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    //PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
      if($id==$result['id']){
        //存在した場合reviewed.phpに移動
        header('Location: reviewed.php');
      }
    }
  }

?>

<html>
    <body>
        <?php
            //!で区切り
            $id = explode("!",$id);
            echo "<h3>この商品をレビュー</h3>";
            echo "<p>".$id[0]."</p>";
        ?>
        <h3>総合評価</h3>
        <!-- レビューマーク -->
        <form type="get" action="review_process.php">
            <div class="evaluation">
                <input id="star1" type="radio" name="star" value="5" checked="checked"/>
                <label for="star1"><span class="text">最高</span>★</label>
                <input id="star2" type="radio" name="star" value="4" />
                <label for="star2"><span class="text">良い</span>★</label>
                <input id="star3" type="radio" name="star" value="3" />
                <label for="star3"><span class="text">普通</span>★</label>
                <input id="star4" type="radio" name="star" value="2" />
                <label for="star4"><span class="text">悪い</span>★</label>
                <input id="star5" type="radio" name="star" value="1" />
                <label for="star5"><span class="text">最悪</span>★</label>
            </div>
            <textarea name="comment" rows="4" cols="40">ここに感想を記入してください。</textarea>
            <!-- idも送信 -->
            <?php
              echo "<input type=hidden"." name="."id"." value=".$id[0].">";
            ?>
            <input type="submit" value="送信">
        </form>
    </body>
</html>
<style>
.evaluation{
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
}
.evaluation input[type='radio']{
  display: none;
}
.evaluation label{
  position: relative;
  padding: 10px 10px 0;
  color: gray;
  cursor: pointer;
  font-size: 50px;
}
.evaluation label .text{
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  text-align: center;
  font-size: 12px;
  color: gray;
}
.evaluation label:hover,
.evaluation label:hover ~ label,
.evaluation input[type='radio']:checked ~ label{
  color: #ffcc00;
}
</style>