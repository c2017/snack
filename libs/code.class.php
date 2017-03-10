<?php
    class code{
        private $letter="abcdefghigkmnpqrstuvwxyzABCDEFGHGKLMNPQRSTUVWXYZ";  //字符池
        private $letterNum=4;   //生成文字的数量
        public $letterUrl="../static/font/FZBSFW.TTF";
        public $width="150";    //生成图片的宽度
        public $height="40";    //生成图片的高度
        public $imgType="png";  //生成图片的格式
        public $lineNum=5;      //干扰线数量
        public $fontSize=Array("min"=>18,"max"=>20);    //文字大小
        public $fontAngle=15;   //文字旋转角度
        public $resultLetter="";
        public $img;

        /*
         * 创建图片并输出资源
         * */
        public function output(){
            header("content-type:image/".$this->imgType);
            $out="image".$this->imgType;

            $this->create();
            $this->createText();
            $this->createLine();

            $out($this->img);
        }

        /*
         * 创建画布，填充颜色
         * */
        private function create(){
            $this->img=imagecreatetruecolor($this->width,$this->height);
            $bgcolor=$this->randColor(128,256);
            imagefill($this->img,0,0,$bgcolor);
        }

        public function getText(){
            $nub=$this->letterNum;
            while($nub--){
                $this->resultLetter.=$this->letter[mt_rand(0,strlen($this->letter)-1)];
            }
        }

        /*
         * 在图片资源上生成文字，随机颜色
         * */
        private function createText(){

            $this->getText();
            $marginX=$this->width/$this->letterNum;

            for($i=0;$i<$this->letterNum;$i++){
                $fontColor=$this->randColor(0,128);
                $fontSize=mt_rand($this->fontSize["min"],$this->fontSize["max"]);
                $angle=$reg=mt_rand(-$this->fontAngle,$this->fontAngle);
                $str=$this->resultLetter[$i];
                $rect=imagettfbbox($fontSize,$angle,$this->letterUrl,$str);
                $lx=10+$marginX*$i;
                $ly=mt_rand(($rect[1]-$rect[5]),($this->height-5));
                imagettftext($this->img,$fontSize,$angle,$lx,$ly,$fontColor,$this->letterUrl,$str);
            }

            $this->resultLetter=strtolower($this->resultLetter);

        }

        /*
         * 生成随机颜色的干扰线，直线
         * @param  $nub{number} 指定生成的线条数
         * */
        private function createLine(){
            $nub=$this->lineNum;
            while($nub--){
                $lx=mt_rand(0,$this->width);
                $ly=mt_rand(0,$this->height);
                $rx=mt_rand(0,$this->width);
                $ry=mt_rand(0,$this->height);
                $linecolor=$this->randColor();
                imageline($this->img,$lx,$ly,$rx,$ry,$linecolor);
            }
            $this->createPx();
        }

        private function createPx(){
            $nub=mt_rand(30,50);
            while($nub--){
                $lx=mt_rand(0,$this->width);
                $ly=mt_rand(0,$this->height);
                $color=$this->randColor(0,255);
                imagesetpixel($this->img,$lx,$ly,$color);
            }
        }

//
        /* 生成随机颜色，并返回
         * @param  $resource 指定图片资源
         * @param  $bottom   指定随机生成的rgb颜色中的最低数 0~256，默认50
         * @param  $top   指定随机生成的rgb颜色中的最大数 0~256，默认200
         * @return 返回imagecolorallocate生成的颜色
         * */
        function randColor($bottom=50,$top=200){
            $arr[0]=mt_rand($bottom,$top);
            $arr[1]=mt_rand($bottom,$top);
            $arr[2]=mt_rand($bottom,$top);
            $color=imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);

            return $color;
        }


    }

/*    $image=new code();
    $image->fontSize['min']=16;
    $image->fontSize['max']=20;
    $image->output();*/




    /*
     * 私有 字母 $letter="abcdefg......"，也就是验证码的因子，放中文会有问题   2和z 很像。1和l i 0和o 等等
     * private $letterNun=4  出现几个字母
     * private $bgcolor  换背景色  取随机数  rand
     *
     *
     *
     *
     * */



