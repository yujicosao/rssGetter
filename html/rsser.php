<?php
    // 対応済みブログサービス一覧   
    $service_names = ['アメブロ','livedoorブログ','gooブログ','fc2ブログ','Qiita(ユーザーごと)'];

    class Rsser{
        private $url;
        private $rss_url;
        private $is_service;
        public function __construct($url){
            $this->url = $url;
            $this->rss_url = null;
            $this->is_service = true;
        }
        // 入力されたurlからブログサービスを自動で判別するメソッド ==================================
        public function select_blog(){
            if(strpos($this->url,'https://ameblo.jp') !== false){
                return $this->getAmeblo();
            }
            elseif(strpos($this->url,'.fc2.') !== false){
                return $this->getFc2();
            }
            elseif(strpos($this->url,'https://blog.goo.ne.jp') !== false){
                return $this->getGoo();
            }
            elseif(strpos($this->url,'http://blog.livedoor.jp') !== false){
                return $this->getLivedoor();
            }
            elseif(strpos($this->url,'https://qiita.com/') !== false){
                return $this->getQiita();
            }
            else{
                $this->is_service = false;
                return '申し訳ありません。お探しのブログRSSは当サービスの対象外です。';
            }           
        }

        // 各ブログサービスRSSフィード作成メソッド ==================================
        public function getFc2(){
            $rss_url = $this->url . '?xml';
            return $rss_url;
        }
        public function getAmeblo(){
            if(strpos($this->url,'https://') !== false){
                $rss_url = str_replace("https://ameblo.jp/","",$this->url);
            }elseif(strpos($this->url,'http://') !== false){
                $rss_url = str_replace("http://ameblo.jp/","",$this->url);
            }
            $rss_url = str_replace("/","",$rss_url);
            $rss_url = "http://rssblog.ameba.jp/" . $rss_url . "/rss20.xml";
            return $rss_url;
        }
        public function getGoo(){
            $rss_url = $this->url . '/index.rdf';
            return $rss_url;      
        }
        public function getLivedoor(){
            $rss_url = $this->url . '/index.rdf';
            return $rss_url;
        }
        public function getQiita(){
            $rss_url = $this->url.'/feed.atom';
            return $rss_url;
        }

        // getter ==================================
        public function getIs_service(){
            return $this->is_service;
        }
    }
    $rsser = new Rsser($_POST["rss"]);
    $rss_url = $rsser->select_blog();
?> 