<?php

class GameRole
{
	CONST APPKEY = '22f9aa6cea0aa112b24676f391f4d783';//360开发平台分配的APPKEY
	CONST APPID  = '203835401';//360开发平台分配的APPID
	CONST PNAME  = 'com.liujin.platform.qihoo360';//360开发平台填写的包名


	////////////////////////////////////////////////////////////////////
	//                     请配置以上部分配置项                       //
	////////////////////////////////////////////////////////////////////
	CONST ROLEINTERFACE = 'https://role.gamebox.360.cn/7/role/rolesave';
	private $_plat  = 'android';
	private $_error = NULL;
	private $_musts = array('type','qid','zoneid','zonename','roleid','rolename','gender','vip','power','rolelevel', 'professionid', 'profession', 'partyid', 'partyname');
	private $_datas = array();
	private $_attrs = array(
			'type'	    =>'',//enterServer（登录），levelUp（升级），createRole（创建角色），exitServer（退出）
			'qid'	    =>0,//奇虎用户账号ID
			'zoneid'	=>0,//区服I D
			'zonename'  =>'',//区服名称
			'roleid'    =>'',//角色I D
			'rolename'  =>'',//角色名称
			'partyid'   =>0,//公会或帮派I D
			'partyname' =>'',//公会或帮派名称
			'professionid' =>0,//职业I D
			'profession'   =>'',//职业名称
			'partyroleid'  =>0,//公会或帮派称号I D
			'partyrolename'=>'',//公会或帮派称号名称
			'professionroleid'=>'',//职业称号I D
			'professionrolename'=>'',//职业称号名称
			'gender'   =>'',//性别
			'rolelevel'=>0,//等级
			'power'    =>0,//战斗力
			'vip'      =>0,//VIP等级
			'ranking'  =>array(),//排行榜组合
			'balance'  =>array(),//余额组合
			'friendlist'=>array(),//好友列表
	);


	public function __construct($plat = 'android')
	{/*{{{*/
		$this->_plat = ($plat == 'android') ? 'android' : 'ios';
	}/*}}}*/

	public function __set($key, $value)
	{/*{{{*/
		$key = strtolower($key);
		if(isset($this->_attrs[$key]) === false){
			return false;
		}
		$this->_datas[$key] = $value;
	}/*}}}*/

	public function __get($key)
	{/*{{{*/
		$key = strtolower($key);
		return isset($this->_datas[$key]) ? $this->_datas[$key] : NULL;
	}/*}}}*/

	public function Send()
	{/*{{{*/
		//APPKEY
		if(self::APPKEY == ''){
			throw new Exception("Please Configure Your APPKEY");
			return false;
		}
		//APPID
		if(self::APPID == ''){
			throw new Exception("Please Configure Your APPID");
			return false;
		}
		//PNAME
		if(self::PNAME == ''){
			throw new Exception("Please Configure Your PNAME");
			return false;
		}
		//MUSTS
		foreach($this->_musts as $must){
			if(!isset($this->_datas[$must]) || ($this->_datas[$must] === '')){
				throw new Exception("'{$must}' Can Not Be Empty");
				return false;
			}
		}

		$role = base64_encode(gzcompress(json_encode($this->_datas)));
return json_encode($this->_datas);
//return $this->_datas;
//		$this->_datas = array();
//		$ltime  = time();
//		$appkey = self::APPKEY;
//		$appid  = self::APPID;
//		$pname  = self::PNAME;
//		$params = array(
//				'appkey'=> $appkey,
//				'appid' => $appid,
//				'pname' => $pname,
//				'plat'  => $this->_plat,
//				'lt'    => $ltime,
//				'role'  => $role,
//				'sign'  => md5("appkey={$appkey}&appid={$appid}&pname={$pname}&plat={$this->_plat}&lt={$ltime}"),
//		);
//		$return = @json_decode(self::HttpPost(self::ROLEINTERFACE, $params),true);
//		if(!$return || ($return['errno']>0)){
//			$reason = isset($return['errmsg']) ? $return['errmsg'] : 'Unknown Reason Send Failed';
//			throw new Exception($reason);
//			return false;
//		}
//		return true;
	}/*}}}*/

	public static function HttpPost($url, $param='', $agent='Mozilla/4.0(CPsdk Clent1.0)')
	{/*{{{*/
		$curl=curl_init();
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0); //
		curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0); //
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLINFO_HEADER_OUT, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 3);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_USERAGENT, $agent);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_COOKIESESSION,true);
		curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, false);
		if(is_array($param))
		{
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($param));
		}
		else
		{
			curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
		}

		$content = curl_exec($curl);
		curl_close($curl);
		return $content;
	}/*}}}*/

}

?>
