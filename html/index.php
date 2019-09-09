<?php require_once( 'rsser.php') ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSS変換アプリ</title>
    <script src="./scripts.js"></script>
</head>
<body>
    <form action="./index.php" method="post">
        <p>RSSに変換したいブログページを入力してください</p>
        <input type="text" name="rss">
        <input type="submit" value="変換する">
    </form>




<?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <input id="copyTarget" type="text" value="<?php echo $rss_url ?>" readonly>
    <button onclick="copyToClipboard()">コピー</button>    
<?php endif ?>
</body>
</html>