<?php require_once( 'rsser.php') ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSS変換アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
    <script src="./scripts.js"></script>
</head>
<body>
    <?php require_once('header.php') ?>
    <div class="container mt-200">

        <section id="formArea">
            <form action="./index.php" method="post">
                <h1 class="mb-5">RSSに変換したいブログトップページのURLを<br>入力してください</h1>
                <div class="form-group form-inline">
                    <input type="text" name="rss" class="form-control">
                    <input type="submit" value="変換する"  class="btn btn-primary">
                </div>
            </form>
        </section>

        <section id="resultArea">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <div class="form-group form-inline">
                    <input id="copyTarget" type="text" value="<?php echo $rss_url ?>" readonly  class="form-control">
                    <button onclick="copyToClipboard()" class="btn btn-primary">コピー</button>
                </div>
            <?php endif ?>
        </section>

        <section id="service_names_area">
            <h2>当サービスで対応しているブログサービス</h2>
            <?php foreach($service_names as $service_name): ?>
                <span class="badge badge-secondary"><?php echo $service_name ?></span>
            <?php endforeach ?>
        </section>

        <section id="tweetbutton_area">
        <a href="https://twitter.com/intent/tweet?text=<?php echo $_POST["rss"] ?>のRSSフィードは<?php echo $rss_url ?>です(RSSフィード取得アプリ http://cosatest.hippy.jp/rsser/)" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow" class="twitter-link">
tweet
</a>
        </section>

    </div>
</body>
</html>