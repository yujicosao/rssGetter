<?php ini_set('display_errors', "On"); ?>
<?php require_once('rsser.php') ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSS変換アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
    <script src="https://kit.fontawesome.com/2bdc0ce76c.js"></script>
    <script src="./scripts.js"></script>
</head>
<body>
    <?php require_once('header.php') ?>
    <div class="container mt-100">

        <section id="formArea" class="container row">
            <form action="./index.php" method="post">
                <h1 class="mb-5">RSSに変換したいブログトップページのURLを<br>入力してください</h1>
                <div class="row col-8 mx-auto mb-5">
                    <input type="text" name="rss" class="form-control col-12 mb-3" value="">
                    <input type="submit" value="変換する"  class="btn btn-primary col-5 mx-auto">
                </div>
            </form>
        </section>

        <section id="resultArea">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <?php if($rsser->getIs_service()) :?>
                        <div class="form-group form-inline">
                            <input id="copyTarget" type="text" value="<?php echo $rss_url ?>" readonly  class="form-control">
                            <button onclick="copyToClipboard()" class="btn btn-primary">コピー</button>
                        </div>
                        <section id="actions_area">
                            <a href="https://twitter.com/intent/tweet?text=<?php echo $_POST["rss"] ?>のRSSフィードは<?php echo $rss_url ?>です(RSSフィード取得アプリ http://cosatest.hippy.jp/rsser/)" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow" class="twitter-link">取得したRSSフィードをtweetする</a>
                            <br>
                            <a href="https://feedly.com/i/discover/sources/search/feed/<?php echo urlencode($rss_url) ?>" target="_blank" >feedlyで登録する</a>
                        </section>
                <?php else: ?>
                    <p class="alert alert-danger"><i class="fas fa-exclamation-circle"></i><?php echo $rss_url ?></p>
                <?php endif ?>
            <?php endif ?>
        </section>

        <section id="service_names_area">
            <h2>当サービスで対応しているブログサービス</h2>
            <?php foreach($services as $service_name): ?>
                <span class="badge badge-secondary"><?php echo $service_name->getName() ?></span>
            <?php endforeach ?>
        </section>
    </div>
</body>
</html>