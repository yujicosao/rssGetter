<?php require_once( 'rsser.php') ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSS変換アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./scripts.js"></script>
</head>
<body>
    <div class="container">
        <form action="./index.php" method="post">
            <h1>RSSに変換したいブログページを入力してください</h1>
            <div class="form-group form-inline">
                <input type="text" name="rss" class="form-control">
                <input type="submit" value="変換する"  class="btn btn-primary">
            </div>
        </form>
        <div class="form-group form-inline">
            <input id="copyTarget" type="text" value="<?php echo $rss_url ?>" readonly  class="form-control">
            <button onclick="copyToClipboard()" class="btn btn-primary">コピー</button>
        </div>
    </div>

    <?php
// if($_SERVER["REQUEST_METHOD"] != "POST"){
//     // ブラウザからHTMLページを要求された場合
//     echo 'get!';
// }else{
//     // フォームからPOSTによって要求された場合
//     echo 'post!';
// }
    ?>
</body>
</html>