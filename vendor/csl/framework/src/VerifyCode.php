<?php
namespace csl\framework;

class VerifyCode
{
	protected $width = 100;
	protected $height = 30;
	protected $code;  //验证码字符串
	protected $imageType = 'png';
	protected $canvas; //画布
	protected $len = 4; //验证码字符串长度

	public function __construct($width=100,$height=30,$len=4,$imageType='png')
	{
		$this->width = $width <= 0?$this->width:$width;
		$this->height = $height <= 0?$this->height : $height;
		$this->imageType = $this->getImageType($imageType);
		$this->len = ($len < 3 || $len >6)?$this->len : $len;

	}
	
	/**
	 * 获取验证码字符串
	 *
	 * @return     <type>  The code.
	 */
	public function getCode()
	{
		return $this->code;
	}
	/**
	 * 产生验证码
	 */
	public function outputImage()
	{
		//- 1)、创建画布
		$this->createImage();

		// - 2)、生成验证码字符串
		$this->generateCodeString();

		// - 3)、将验证码字符串画到画布上
		$this->drawCode();
		// - 4)、画干扰元素
		$this->drawDisturb();
		// - 5)、发送验证码
		$this->sendCode();

		// - 6)、释放资源
		$this->destory();
	}

	/**
	 * 销毁画布
	 */
	protected function destory()
	{
		imagedestroy($this->canvas);
	}
	/**
	 * 画干扰元素
	 */
	protected function drawDisturb()
	{
		for ($i=0; $i < 200; $i++) { 
			$x = rand(1,$this->width-1);
			$y = rand(1,$this->height - 1);
			imagesetpixel($this->canvas, $x, $y, $this->randColor(0,100));
		}
	}

	/**
	 * 画字符
	 */
	protected function drawCode()
	{
		for ($i=0; $i <$this->len ; $i++) { 
			$x = 5 + $i * (int)(($this->width-5)/$this->len);
			$y = rand(5,$this->height - 15);
			imagechar($this->canvas, 5, $x, $y, $this->code[$i], $this->randColor(0,127));
		}
	}
	/**
	 * { function_description }生成验证码字符串
	 */
	protected function generateCodeString()
	{
		$str = '';
		for ($i=0; $i < $this->len; $i++) { 
			$str .= rand(0,9);
		}

		$this->code = $str; 
	}

	/**
	 * 输出验证码
	 */
	protected function sendCode()
	{
		header("content-type:image/" . $this->imageType);
		//imagepng  imagejpeg  imagewbmp
		$funcName = 'image' . $this->imageType;
		if (function_exists($funcName)) {
			$funcName($this->canvas);
		} else {
			exit('不支持的图片类型!');
		}

	}

	/**
	 * 产生画布
	 */
	protected function createImage()
	{
		$this->canvas = imagecreatetruecolor($this->width, $this->height);
		$color = $this->randColor(127,254);
		imagefill($this->canvas, 0, 0, $color);
	}

	/**
	 * 产生随机颜色
	 *
	 * @param      <type>  $low    颜色下界
	 * @param      <type>  $hight  颜色上界
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	protected function randColor($low,$hight)
	{
		return imagecolorallocate($this->canvas, rand($low,$hight), rand($low,$hight), rand($low,$hight));
	}

	/**
	 * 转换图片格式
	 *
	 * @param      <type>  $imageType  用户给的图片格式
	 */
	protected function getImageType($imageType)
	{
		$types = [
			'jpg' => 'jpeg',
			'pjpeg' => 'jpeg',
			'bmp' => 'wbmp'
		];
		if (array_key_exists($imageType, $types)) {
			$imageType = $types[$imageType];
		}
		return $imageType;
	}
}