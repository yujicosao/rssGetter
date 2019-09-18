<?php
$ameblo = new BlogService('アメブロ','https://ameblo.jp');
$giita = new BlogService('Qiita(ユーザーごと)','https://qiita.com/');
$livedoor = new BlogService('livedoorブログ','http://blog.livedoor.jp');
$goo = new BlogService('gooブログ','https://blog.goo.ne.jp');
$fc2 = new BlogService('fc2ブログ','.fc2.');
$hatena = new BlogService('はてなブログ','.hatenablog.');
$rakuten = new BlogService('楽天ブログ','.rakuten.');
$note = new BlogService('note','note.');

$services = [$ameblo,$giita,$fc2,$goo,$livedoor,$hatena,$rakuten,$note];
?>