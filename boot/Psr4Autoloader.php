<?php
class Psr4Autoloader
{
	//命名空间和目录的映射关系表
	protected $maps = [];

	public function __construct(array $config=null)
	{
		if (!empty($config)) {
			$this->maps = $config;
		}
		//向系统注册自己自动加载方法
		spl_autoload_register([$this,'loadClass']);
	}

	/**
	 * 自动加载方法
	 * @param  [type] $className [类名（带命名空间）]
	 * @return [type]            [无]
	 */
	protected function loadClass($className)
	{
		//取出类名
		$arr = explode('\\',$className);
		$realClass = array_pop($arr);
		//取得命名空间
		$namespace = join('\\',$arr);
		//加载映射关系
		$this->loadMap($namespace,$realClass);
	}

	/**
	 * 把命名空间变成目录，加载类文件
	 * @param  [type] $namespace [命名空间]
	 * @param  [type] $realClass [类名]
	 * @return [type]            [无]
	 */
	protected function loadMap($namespace,$realClass)
	{
		//如果命名空间存在在映射表中，直接取得目录
		if (array_key_exists($namespace, $this->maps)) {
			$path = $this->maps[$namespace];
		} else {//如果不存在，直接把命名空当做目录名
			$path = str_replace('\\', '/', $namespace);
		}

		//在目录后添加斜线
		$path = rtrim($path,'/') . '/';
		$path .= $realClass . '.php';
		if (file_exists($path)) {
			include $path;
		} else {
			exit($path . "文件不存在！");
		}
	}


	/**
	 * 向映射表里添加命名空间和目录对照关系
	 * @param [type] $namespace [description]
	 * @param [type] $realPath  [description]
	 */
	public function addNamespace($namespace,$realPath)
	{
		// index\\controller\ \index\\controller\  
		$namespace = trim(str_replace('/', '\\', $namespace),'\\');
		$realPath = trim(str_replace('\\', '/',$realPath),'/');
		if (array_key_exists($namespace, $this->maps)) {
			exit("命名空间已经存在映射表中");
		}
		$this->maps[$namespace] = $realPath;
	}
}