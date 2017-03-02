<?php
    class code{
        private $letter="abcdefghigklmnpqrstuvwxyz";
        private $letterNum=4;
        public $width="200";
        public $height="40";
        public $imgType="png";
        public $img;
        public $arr;

        function randColor(){
            $arr[0]=mt_rand(50,200);
            $arr[1]=mt_rand(50,200);
            $arr[2]=mt_rand(50,200);
            return $arr;
        }

        public function output(){
            header("content-type:image/".$this->imgType);
            $out="image".$this->imgType;
            // 创建画布 填充颜色
            $this->create();
            // 创建文字 随机 颜色
            $this->createText();

            // 干扰线  随机 颜色
            $this->createLine();
            $this->createLine();


            $out($this->img);
        }

        private function create(){
            $this->img=imagecreatetruecolor($this->width,$this->height);
            $arr=$this->randColor();

            $bgcolor=imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
            imagefill($this->img,0,0,$bgcolor);
        }
        private function createText(){
            $str="";
            for($i=0;$i<$this->letterNum;$i++){
                $str.=$this->letter[$i];
            }
            $arr=$this->randColor();
            $fontColor=imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);

            $lx=mt_rand(30,150);
            $ly=mt_rand(20,30);
            $reg=mt_rand(-20,20);

            imagettftext($this->img,18,$reg,$lx,$ly,$fontColor,"../FZBSFW.TTF",$str);
        }

        private function createLine(){
            $arr=$this->randColor();
            $lx=mt_rand(0,50);
            $ly=mt_rand(0,$this->height);
            $rx=mt_rand(150,$this->width);
            $ry=mt_rand(0,$this->height);
            $linecolor=imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
            imageline($this->img,$lx,$ly,$rx,$ry,$linecolor);
        }


    }

    $image=new code();
    $image->output();


