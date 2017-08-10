<?php
namespace csl\framework;

class Model
{
	protected $host;            //主机地址
	protected $user;			//用户名
	protected $password;			//密码
	protected $dbName;			//数据库名
	protected $charset;	        //字符集
	protected $prefix;			//表前缀
	protected $link;			//数据库连接
	protected $sql;				//sql语句
	protected $cacheDir;			//数据库缓存目录
	protected $cacheField;		//缓存字段
	protected $table;

	//参数数组
	public $options = [
		'field'    =>'*',
		'table'    => '',
		'where'    =>'',
		'group'    =>'',
		'having'    =>'',
		'order'    =>'',
		'limit'    =>'',
		'values'   =>''
	];

	/**
	 * 初始化方法
	 * @param array $config [参数数组]
	 */
	public function __construct(array $config=null)
	{
		$config = include('config/database.php');

		$this->host = $config['DB_HOST'];
		$this->user = $config['DB_USER'];
		$this->password = $config['DB_PASSWORD'];
		$this->charset = $config['DB_CHARSET'];
		$this->dbName = $config['DB_NAME'];
		$this->prefix = $config['DB_PREFIX'];

		$this->link = $this->connect();//连接数据库
		$this->table = $this->getTable();//获取表名

		//从配置文件获取缓存路径
		$cache = $config['DB_CACHE'];
		if ($this->checkDir($cache)) {
			$this->cacheDir = $cache;
		} else {
			exit('缓存目录不存在');
		}
		//初始化缓存目录
		$this->cacheField = $this->initCache();

		//初始化参数数组
		$this->options = $this->initOptions();
		
	}

	//初始化缓存字段
	protected function initCache()
	{
		//获取缓存文件
		$path = rtrim($this->cacheDir ,'/').'/'. $this->table . '.php';
		//如果缓存文件存在
		if (file_exists($path)) {
			return include $path;
		}

		//不存在,获取表结构
		$sql = 'desc ' . $this->table ;
		//echo $sql;
		// $data = $this->query($sql,MYSQLI_ASSOC);
		$result = mysqli_query($this->link,$sql);
		$fields = [];
		//将字段添加到数组
		while ($row = mysqli_fetch_assoc($result))
		{
			//把主键也添加到数组
			if ($row['Key'] == 'PRI') {
				$fields['PRI'] = $row['Field'];
			}
			$fields[] = $row['Field'];
		}
		
		//生成字段数组语法形式
		$str = "<?php \n return ". var_export($fields,true) .";?>";
		//写缓存文件
		file_put_contents($path, $str);

		return $fields;
	}

	//检测目录
	protected function checkDir($dir)
	{
		if (!is_dir($dir)) {
			return mkdir($dir,0777,true);
		}
		if (!is_readable($dir) || !is_writable($dir)) {
			return chmod($dir, 0777);
		}
		return true;
	}

	/**
	 * 获取表名
	 * @return [type] [返回表名]
	 */
	protected function getTable()
	{
		//查看是否有默认值
		if (!empty($this->table)) {
			return $this->prefix . $this->table;
		}
		
		//从类名获得表名
		//获取当前对象的类名，并且转换为小写
		$className = strtolower(get_class($this));
		//使用反斜线分割类名  'app\index\model\usermodel'
		$className = explode('\\',$className);
		//获取类名
		$className = array_pop($className);
		//获取类名model前的部分，例如usermodel,得到user
		if (stripos($className, 'model') === false) {
			//类名中不包含model
			return $this->prefix .$className;
		}
		$className = substr($className, 0,-5);
		
		return $this->prefix .$className;
	}

	/**
	 * 初始化参数数组
	 * @return [type] [参数数组]
	 */
	protected function initOptions()
	{
		//把$this->cacheFields变成字符串
		unset($this->cacheField['PRI']);
		$tmp = join(',',$this->cacheField);
		return [
			'field'    =>$tmp,
			'table'    => $this->table,
			'where'    =>'',
			'group'    =>'',
			'having'    =>'',
			'order'    =>'',
			'limit'    =>'',
			'values'   => ''
		];
	}

	//数据库连接
	protected function connect()
	{
		$link = mysqli_connect($this->host,$this->user,$this->password);
		if (!$link) {
			exit('数据库连接失败');
		}
		if (!mysqli_select_db($link,$this->dbName)) {
			mysqli_close($link);
			exit('选择数据库失败');
		}
		if (!mysqli_set_charset($link,$this->charset)) {
			mysqli_close($link);
			exit('字符集设置失败');
		}
		return $link;
	}

	/**
	 * 获取查询条件
	 * @param  [type] $where [查询条件]
	 * @return [type]        [返回查询条件]
	 */
	public function where($where)
	{
		//'uid = 100 and password="123"'
		//['uid =100','password="123"']
		if (is_string($where)) {
			$this->options['where'] = " where " . $where;
		} else if (is_array($where)) {
			$this->options['where'] = " where " .join(" and ",$where);
		}
		
		return $this;
	}
	/**
	 * 两表联查
	 * @param  string $table [description]
	 * @return [type]        [description]
	 */
	public function table(string $table)
	{
		$tables = explode(',', $table);
		foreach ($tables as $key => $value) {
			$tbName = ltrim($value,$this->prefix);
			$tbName = $this->prefix . $tbName;
			$tables[$key] = $tbName;
		}
		$this->options['table'] = join(',', $tables);
		return $this;
	}
	/**
	 * 获取分组条件
	 * @param  [type] $group [分组条件]
	 * @return [type]        [返回分组条件]
	 */
	public function group($group)
	{
		//['uid','name','password']
		if (is_string($group)) {
			$this->options['group'] = " group by " . $group;
		} else if (is_array($group)) {
			$this->options['group'] = " group by  " .join(" , ",$group);
		}
		return $this;
	}

	/**
	 * 获取分组过滤条件
	 * @param  [type] $having [分组过滤条件]
	 * @return [type]         [返回分组过滤条件]
	 */
	public function having($having)
	{
		if (is_string($having)) {
			$this->options['having'] = " having " . $having;
		} else if (is_array($having)) {
			$this->options['having'] = " having " .join(" and ",$having);
		}
		return $this;
	}
	/**
	 * 获取排序条件
	 * @param  [type] $order [排序条件]
	 * @return [type]        [返回排序条件]
	 */
	public function order($order)
	{
		//'uid desc,name asc'
		//['uid desc','name asc']
		if (is_string($order)) {
			$this->options['order'] = " order by " . $order;
		} else if (is_array($order)) {
			$this->options['order'] = " order by  " .join(" , ",$order);
		}
		return $this;
	}
	/**
	 * 获取limit条件
	 * @param  [type] $limit [limit条件]
	 * @return [type]        [返回limit条件]
	 */
	public function limit($limit)
	{
		if (is_string($limit)) {
			$this->options['limit'] = " limit " . $limit;
		} else if (is_array($limit)) {
			$this->options['limit'] = " limit " .join(" , ",$limit);
		}
		return $this;
	}

	/**
	 * 获取字段列表
	 * @param  [type] $field [字段列表]
	 * @return [type]        [返回字段列表]
	 */
	public function field($field)
	{
		$this->options['field'] = $field;
		return $this;
	}

	/**
	 * 返回查询结果
	 * @param  [type] $resultType [结果类型]
	 * @return [type]             [结果数组]
	 */
	public function select($resultType= MYSQLI_BOTH)
	{
		//select uid,username from bbs_user where uid<100 group by uid having uid>0 order by uid limit 5";

		$sql = "SELECT %FIELD% FROM %TABLE% %WHERE% %GROUP%  %HAVING% %ORDER% %LIMIT%";
		$sql  = str_replace([
								'%FIELD%',
								'%TABLE%',
								'%WHERE%',
								'%GROUP%',
								'%HAVING%',
								'%ORDER%',
								'%LIMIT%'
							], 
							[
							  'field'   => $this->options['field'],
							  'table'   => $this->options['table'],
							  'where'   => $this->options['where'],
							  'group'   => $this->options['group'],
							  'having'	=> $this->options['having'],
							  'order'	=> $this->options['order'],
							  'limit'	=> $this->options['limit']
							], $sql);
		//var_dump($sql);
		return $this->query($sql,$resultType);
	}
	/**
	 * 删除数据
	 * @return [type] [description]
	 */
	function delete()
	{
		$sql = 'delete from %table% %where%';
		$sql = str_replace([
								'%table%',
								'%where%'
							],
							[
								'table'   =>   $this->options['table'],
								'where'   =>   $this->options['where']
							], $sql);
		//echo $sql;
		return $this->exec($sql);
	}

	/**
	 * 查询数据
	 * @param  [type] $sql        [sql语句]
	 * @param  [type] $resultType [结果类型]
	 * @return [type]             [成功范湖结果数组，失败返回false]
	 */
	public function query($sql,$resultType)
	{
		//给sql赋值
		$this->sql = $sql;
		//清空参数数组
		$this->options = $this->initOptions();
		$result = mysqli_query($this->link,$sql);
		if ($result && mysqli_affected_rows($this->link)>0) {
			return mysqli_fetch_all($result,$resultType);//返回所有查询结果
		}
		return false;
	}

	/**
	 * 更新语句
	 * @param  array  $data [更新的关联数组]
	 * @return [type]       [成功返回true，失败返回false]
	 */
	//['uid'=>1,'name'=>'jerry']
	public function update(array $data)
	{
		//给字符数据添加单引号
		$data = $this->addQuote($data);

		//过滤无效字段
		$data = $this->validField($data);
		
		//把关联数组变成字符串
		$str = $this->array2String($data);
		$this->options['set'] = $str;

		$sql = "UPDATE  %TABLE% SET %SET% %WHERE% %ORDER% %LIMIT%";
		$sql = str_replace(
			[
				'%TABLE%',
				'%SET%',
				'%WHERE%',
				'%ORDER%',
				'%LIMIT%'
			], 
			[
				'table'   => $this->options['table'],
				'set'     => $this->options['set'],
				'where'   => $this->options['where'],
				'order'   => $this->options['order'],
				'limit'   => $this->options['limit']
			], $sql);
		//var_dump($sql);
		return $this->exec($sql,false);
	}

	/**
	 * 关联数组转换为字符串
	 * @param  [type] $data [关联数组]
	 * @return [type]       [字符串]
	 */
	protected function array2String($data)
	{
		$str = '';
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				//uid=1,
				$str .= $key . ' = '.$value . ',';
			}
		}
		return rtrim($str,',');
	}


	/**
	 * [insert 插入数据]
	 * @param  array  $data [必须是关联数组，键是字段名]
	 * @return [type]       [成功是true，失败是false]
	 */
	public function insert(array $data)
	{
		//给字符数据添加单引号
		$data = $this->addQuote($data);
		
		//过滤无效字段
		$data = $this->validField($data);
		
		//取出键拼接为字符串
		$this->options['field'] = join(',',array_keys($data));
		//取出值拼接为字符串
		$this->options['values'] = join(',',array_values($data));
		
		$sql = "insert into %TABLE%(%FIELD%) VALUES(%VALUES%)";
		$sql  = str_replace([
								'%TABLE%',
								'%FIELD%',
								'%VALUES%'
							], 
							[
							  'table'   => $this->options['table'],
							  'field'   => $this->options['field'],
							  'values'	=> $this->options['values']
							], $sql);
		//var_dump($sql);
		return $this->exec($sql,$isInsertId = false);
	}

	/**
	 * 执行增删改语句
	 * @param  [type]  $sql        [sql语句]
	 * @param  boolean $isInsertId [是否返回自增主键的值]
	 * @return [type]              [如果执行成功，isInsertId为真，返回主键值，否则返回true，失败返回false]
	 */
	public function exec($sql,$isInsertId = false)
	{
		$this->sql = $sql;
		$this->options = $this->initOptions();

		$result = mysqli_query($this->link,$sql);
		if ($result && $isInsertId) {
			return mysqli_insert_id($this->link);//返回自增主键的值
		}
		return $result;

	}

	/**
	 * 给字符串元素两边添加单引号
	 * @param [type] $data [添加单引号后的数组]
	 */
	protected function addQuote($data)
	{
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				if (is_string($value)) {
					$data[$key] = "'$value'";
				}
			}
		}
		return $data;
	}

	/**
	 * 过滤无效字段
	 * @param  [type] $data [字段数组]
	 * @return [type]       [返回过滤后的数组]
	 */
	protected function validField($data)
	{
		//['uid'=>2,'name'=>'tom']
		//[0=>'uid',1=>'name']
		//交换缓存的键值
		$cacheField = array_flip($this->cacheField);
		$data = array_intersect_key($data,$cacheField);
		return $data;
	}

	/**
	 * 魔术方法call
	 * @param  [type] $name  [方法名]
	 * @param  [type] $paras [方法参数]
	 * @return [type]        [结果数组]
	 */
	public function __call($name,$paras)
	{
		if (substr($name,0,5) == 'getBy') {
			$fieldName = substr($name, 5);
			return $this->getBy($fieldName,$paras);
		}
	}

	/**
	 * [根据字段获取记录]
	 * @param  [type] $name  [字段名]
	 * @param  [type] $value [字段值]
	 * @return [type]        [记录的关联数组]
	 */
    public function getBy($name,$value)
    {
    	$name = strtolower($name);
    	if (count($value)>0) {
    		if (is_string($value[0])) {
    			$this->options['where'] = ' where '.$name . " = '".$value[0] ."'";
    		} else {
    			$this->options['where'] = ' where '.$name . ' = '.$value[0];
    		}
    	}
    	return $this->select(MYSQLI_ASSOC);
    }

    /**
     * 获取最后执行的sql
     * @param  [type] $name [属性名]
     * @return [type]       [返回sql]
     */
    public function __get($name)
    {
    	if ('sql' ==$name) {
    		return $this->sql;
    	}
    }
}

