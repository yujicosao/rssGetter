<?php
    class Rsser{
        function __construct($url){
            $this->url = $url;
            $this->rss_url = null;
        }
        // 入力されたurlからブログサービスを自動で判別するメソッド
        function select_blog(){
            if(strpos($this->url,'https://ameblo.jp/') !== false){
                return $this->getAmeblo();
            }elseif(strpos($this->url,'.fc2.') !== false){
                return $this->getFc2();
            }
            
        }

        function getFc2(){
            $rss_url = $this->url . '?xml';
            return $rss_url;
        }
        function getAmeblo(){
            if(strpos($this->url,'https://') !== false){
                $rss_url = str_replace("https://ameblo.jp/","",$this->url);
            }elseif(strpos($this->url,'http://') !== false){
                $rss_url = str_replace("http://ameblo.jp/","",$this->url);
            }
            $rss_url = str_replace("/","",$rss_url);
            $rss_url = "http://rssblog.ameba.jp/" . $rss_url . "/rss20.xml";
            return $rss_url;
        }
    }
    $rsser = new Rsser($_POST["rss"]);
    $rss_url = $rsser->select_blog();
?> 