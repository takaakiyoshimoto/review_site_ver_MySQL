<!--htmlデータ書き込み -->
<html>
    <head>
        <meta charset="utf-8">
        <title>買い物</title>
    </head>
    <body>
        <form action="shopping_process.php" method="post">
            <label>リンゴ:<input type="number" name="apple" min=0></label>
            <label>みかん:<input type="number" name="orange" min=0></label>
            <label>ブドウ:<input type="number" name="grape" min=0></label>
            <input type="submit" value="購入">
        </form>
    </body>
</html>