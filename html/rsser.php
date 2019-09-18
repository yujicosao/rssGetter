<?php
    require_once('blogService.php');
    class Rsser{
        private $url;
        private $rss_url;
        private $is_service;
        private $ameblo;
        private $giita;
        private $livedoor;
        private $goo;
        private $fc2;
        private $hatena;
        private $rakuten;
        private $note;

        public function __construct($url,$ameblo,$qiita,$livedoor,$goo,$fc2,$hatena,$rakuten,$note){
            $this->url = $url;
            $this->rss_url = null;
            $this->is_service = true;
            $this->ameblo = $ameblo;
            $this->qiita = $qiita;
            $this->livedoor = $livedoor;
            $this->goo = $goo;
            $this->fc2 = $fc2;
            $this->hatena = $hatena;
            $this->rakuten = $rakuten;
            $this->note = $note;
        }
        
        // 入力されたurlからブログサービスを自動で判別するメソッド ==================================
        public function select_blog(){
            if(strpos($this->url,$this->ameblo->getUrl()) !== false){
                return $this->getAmeblo();
            }
            elseif(strpos($this->url,$this->fc2->getUrl()) !== false){
                return $this->getFc2();
            }
            elseif(strpos($this->url,$this->goo->getUrl()) !== false){
                return $this->getGoo();
            }
            elseif(strpos($this->url,$this->livedoor->getUrl()) !== false){
                return $this->getLivedoor();
            }
            elseif(strpos($this->url,$this->qiita->getUrl()) !== false){
                return $this->getQiita();
            }
            elseif(strpos($this->url,$this->hatena->getUrl()) !== false){
                return $this->getHatena();
            }
            elseif(strpos($this->url,$this->rakuten->getUrl()) !== false){
                return $this->getRakuten();
            }     
            elseif(strpos($this->url,$this->note->getUrl()) !== false){
                return $this->getote();
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
        public function getHatena(){
            $rss_url = $this->url.'/rss';
            return $rss_url;
        }
        public function getRakuten(){
            $rss_url = str_replace('plaza','api.plaza',$this->url);
            $rss_url = str_replace('co.jp','ne.jp',$rss_url);
            $rss_url = $rss_url.'rss/';
            return $rss_url;
        }
        public function getNote(){
            $rss_url = $this->url.'/rss';
            return $rss_url;
        }
        // getter ==================================
        public function getIs_service(){
            return $this->is_service;
        }
    }
    if(isset($_POST["rss"])){
        $rsser = new Rsser($_POST["rss"],$ameblo,$giita,$livedoor,$goo,$fc2,$hatena,$rakuten,$note);
        $rss_url = $rsser->select_blog();
    }
    
    
?> 