<?php
/** private
 功能:数据库的基础操作类
**/
class DbSqlPdo{
	private $CONN="";//定义数据库连接变量
	/**
	 *功能:构造函数，连接数据库
	 */
	public function __construct(){
	 $this->usedb(DB_HOST,DB_USER,DB_PASSWD,DB_NAME,DB_PORT);
	}
	/**
	 * 功能:选择数据库
	 * 参数:$dbhost,$dbuser,$dbpasswd,$dbname(数据库ip:端口,数据库用户,数据库密码,数据库名称)
	 */
	public function usedb($dbhost,$dbuser,$dbpasswd,$dbname,$dbport){
		$connect=new PDO('mysql:host='.$dbhost.';port='.$dbport.'dbname='.$dbname,$dbuser,$dbpasswd);
		//$connect=mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname,$dbport) or die("无法连接数据库1");
		$connect->query("set names 'utf8'");
		//mysqli_select_db($connect,$dbname) or die ("无法选择数据库");
		$this->CONN=$connect;
	}
	/**
	 *功能:数据库查询函数
	 *参数:$sqlSQL语句
	 *返回:二维数组或FALSE
	 */
	public function select($sql){
		if(empty($sql)) return false;//{$returnarr=array(1);return $returnarr;}////如果SQL语句为空，则返回FALSE
		if(empty($this->CONN)) return false;//{$returnarr=array(2);return $returnarr;}////如果连接为空，则放回FALSE
		$results=$this->CONN->query($sql);
		if((!$results)or(empty($results))){//如果查询结果空则释放结果并返回FALSE
		//if((!$this->CONN->query($sql))or(empty($this->CONN->query($sql)))){//如果查询结果空则释放结果并返回FALSE
			//@mysqli_free_result($results);
			return false;//$returnarr=array(3);
			//return $returnarr;
		}
		$count=0;
		$data=array();
		//while($row=@mysqli_fetch_assoc($results)){//把查询结果重组成一个而为数组
		foreach ($results as $row){//把查询结果重组成一个而为数组
			$data[$count]=$row;
			$count++;
		}
		//@mysqli_free_result($results);
		unset($results);
		//var_dump($data);
		return $data;
	}
//	/**
//	 *功能:数据插入函数
//	 *参数:$sqlSQL语句
//	 *返回:0或新插入数据的ID
//	 */
//	public function insert($sql=""){
//		if(empty($sql)) return 0;//如果SQL语句为空则返回FALSE
//		if(empty($this->CONN)) return 0;//如果连接为空，则返回FALSE
//		try{//捕获数据库选择错误并显示错误文件
//			$results=mysqli_query($this->CONN,$sql);
//		}catch(Exception$e){
//			$msg=$e;
//			include(ErrFile);
//		}
//		if(!$results) return 0;//如果插入失败返回0,否则返回当前插入数据ID
//		else return @mysqli_insert_id($this->CONN);
//	}
//	/**
//	 *功能:数据更新函数
//	 *参数:$sqlSQL语句
//	 *返回:TRUEORFALSE
//	 */
//	public function update($sql=""){
//		if(empty($sql)) return false;//如果SQL语句为空则返回FALSE
//		if(empty($this->CONN)) return false;//如果连接为空则返回FALSE
//		try{//捕获数据库选择错误并显示错误文件
//			$result=mysqli_query($this->CONN,$sql);
//		}catch(Except$e){
//			$msg=$e;
//			include(ERRFILE);
//		}
//		return $result;
//	}
//	/**
//	 *功能:数据删除函数
//	 *参数:$sqlSQL语句
//	 *返回:TRUEORFALSE
//	 */
//	public function delete($sql=""){
//		if(empty($sql)) return false;//如果SQL语句为空则返回FALSE
//		if(empty($this->CONN)) return false;//如果连接为空则返回FALSE
//		try{//捕获数据库选择错误并显示错误文件
//			$result=mysqli_query($this->CONN,$sql);
//		}catch(Except$e){
//			$msg=$e;
//			include(ERRFILE);
//		}
//		return $result;
//	}
	
}