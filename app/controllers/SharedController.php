<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_nama_user_value_exist Model Action
     * @return array
     */
	function user_nama_user_value_exist($val){
		$db = $this->GetModel();
		$db->where("nama_user", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * getcount_datasiswa Model Action
     * @return Value
     */
	function getcount_datasiswa(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM data_siswa";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
