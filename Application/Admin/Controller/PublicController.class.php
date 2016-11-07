<?php
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {
    public function index(){
    	$this->display();
    }
		
		public function pagerForm()
		{
			$this->display();
		}
		
		/**
		 * 验证码
		 */
		public function verify() {
			$Verify = new \Think\Verify();
			$Verify->imageW = 100;
			$Verify->imageH = 20;
			$Verify->fontSize = 10;
			$Verify->length = 5;
			$Verify->useNoise = false;
			$Verify->entry();
		}
}