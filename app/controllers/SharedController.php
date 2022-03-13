<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * data_siswa_no_pendaftaran_value_exist Model Action
     * @return array
     */
	function data_siswa_no_pendaftaran_value_exist($val){
		$db = $this->GetModel();
		$db->where("no_pendaftaran", $val);
		$exist = $db->has("data_siswa");
		return $exist;
	}

	/**
     * data_siswa_keb_khusus_s_option_list Model Action
     * @return array
     */
	function data_siswa_keb_khusus_s_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,kebutuhan_khusus AS label FROM data_kebutuhan_khs ORDER BY kebutuhan_khusus ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_tmp_tg_option_list Model Action
     * @return array
     */
	function data_siswa_tmp_tg_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_tempat_tgl AS value,tempat_tgl AS label FROM data_tempat ORDER BY tempat_tgl ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_moda_trans_option_list Model Action
     * @return array
     */
	function data_siswa_moda_trans_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_transportasi AS value,transportasi AS label FROM data_tranportasi ORDER BY transportasi ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_pendidikan_ayah_option_list Model Action
     * @return array
     */
	function data_siswa_pendidikan_ayah_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_pendidikan AS value,pendidikan AS label FROM pendidikan ORDER BY pendidikan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_pekerjaan_ayah_option_list Model Action
     * @return array
     */
	function data_siswa_pekerjaan_ayah_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_pekerjaan AS value,pekerjaan AS label FROM db_pekerjaan ORDER BY pekerjaan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_penghasilan_ay_option_list Model Action
     * @return array
     */
	function data_siswa_penghasilan_ay_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_penghasilan AS value,penghasilan AS label FROM db_penghasilan ORDER BY penghasilan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_pendidikan_ibu_option_list Model Action
     * @return array
     */
	function data_siswa_pendidikan_ibu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_pendidikan AS value,pendidikan AS label FROM pendidikan ORDER BY pendidikan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_penghasilan_ibu_option_list Model Action
     * @return array
     */
	function data_siswa_penghasilan_ibu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_penghasilan AS value,penghasilan AS label FROM db_penghasilan ORDER BY penghasilan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * data_siswa_pekerjaan_ibu_option_list Model Action
     * @return array
     */
	function data_siswa_pekerjaan_ibu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_pekerjaan AS value,pekerjaan AS label FROM db_pekerjaan ORDER BY pekerjaan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_nama_value_exist Model Action
     * @return array
     */
	function user_nama_value_exist($val){
		$db = $this->GetModel();
		$db->where("nama", $val);
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
     * db_rincian_id_siswa_option_list Model Action
     * @return array
     */
	function db_rincian_id_siswa_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,nama_siswa AS label FROM data_siswa ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
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
