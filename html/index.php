<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSS変換アプリ</title>
</head>
<body>
    <form action="/" method="post">
        <p>RSSに変換したいブログページを入力してください</p>
        <input type="text" name="rss">
        <input type="submit" value="変換する">
    </form>
        <?php 
            echo $_POST["rss"];
        ?>
</body>
</html>