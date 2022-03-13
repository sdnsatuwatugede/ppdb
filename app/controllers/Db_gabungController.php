<?php 
/**
 * Db_gabung Page Controller
 * @category  Controller
 */
class Db_gabungController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "db_gabung";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id_gb", 
			"id_siswa", 
			"id_rinci", 
			"nama_siswa", 
			"nama_ortu");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				db_gabung.id_gb LIKE ? OR 
				db_gabung.id_siswa LIKE ? OR 
				db_gabung.id_rinci LIKE ? OR 
				db_gabung.nama_siswa LIKE ? OR 
				db_gabung.nama_ortu LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "db_gabung/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("db_gabung.id_gb", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Db Gabung";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("db_gabung/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("db_gabung.id_gb", 
			"db_gabung.id_siswa", 
			"db_gabung.id_rinci", 
			"db_gabung.nama_siswa", 
			"db_gabung.nama_ortu", 
			"data_siswa.id AS data_siswa_id", 
			"data_siswa.no_pendaftaran AS data_siswa_no_pendaftaran", 
			"data_siswa.nama_siswa AS data_siswa_nama_siswa", 
			"data_siswa.jenis_kelamin AS data_siswa_jenis_kelamin", 
			"data_siswa.nik_siswa AS data_siswa_nik_siswa", 
			"data_siswa.tempat_lhr AS data_siswa_tempat_lhr", 
			"data_siswa.tanggal_lhr AS data_siswa_tanggal_lhr", 
			"data_siswa.no_reg_akte AS data_siswa_no_reg_akte", 
			"data_siswa.agama AS data_siswa_agama", 
			"data_siswa.kewarga AS data_siswa_kewarga", 
			"data_siswa.keb_khusus_s AS data_siswa_keb_khusus_s", 
			"data_siswa.alamat AS data_siswa_alamat", 
			"data_siswa.rt AS data_siswa_rt", 
			"data_siswa.rw AS data_siswa_rw", 
			"data_siswa.dusun AS data_siswa_dusun", 
			"data_siswa.kelurahan AS data_siswa_kelurahan", 
			"data_siswa.kec AS data_siswa_kec", 
			"data_siswa.kd_pos AS data_siswa_kd_pos", 
			"data_siswa.tmp_tg AS data_siswa_tmp_tg", 
			"data_siswa.moda_trans AS data_siswa_moda_trans", 
			"data_siswa.anak_ke AS data_siswa_anak_ke", 
			"data_siswa.tanggal_daftar AS data_siswa_tanggal_daftar", 
			"data_siswa.nama_ayah AS data_siswa_nama_ayah", 
			"data_siswa.nik_ayah AS data_siswa_nik_ayah", 
			"data_siswa.pendidikan_ayah AS data_siswa_pendidikan_ayah", 
			"data_siswa.pekerjaan_ayah AS data_siswa_pekerjaan_ayah", 
			"data_siswa.penghasilan_ay AS data_siswa_penghasilan_ay", 
			"data_siswa.nama_ibu AS data_siswa_nama_ibu", 
			"data_siswa.nik_ibu AS data_siswa_nik_ibu", 
			"data_siswa.th_lhr_ibu AS data_siswa_th_lhr_ibu", 
			"data_siswa.pendidikan_ibu AS data_siswa_pendidikan_ibu", 
			"data_siswa.penghasilan_ibu AS data_siswa_penghasilan_ibu", 
			"data_siswa.th_lhr_ayah AS data_siswa_th_lhr_ayah", 
			"data_siswa.pekerjaan_ibu AS data_siswa_pekerjaan_ibu");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("db_gabung.id_gb", $rec_id);; //select record based on primary key
		}
		$db->join("data_siswa", "db_gabung.id_rinci = data_siswa.nama_siswa", "INNER ");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Db Gabung";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("db_gabung/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("id_siswa","id_rinci","nama_siswa","nama_ortu");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_siswa' => 'required',
				'id_rinci' => 'required',
				'nama_siswa' => 'required',
				'nama_ortu' => 'required',
			);
			$this->sanitize_array = array(
				'id_siswa' => 'sanitize_string',
				'id_rinci' => 'sanitize_string',
				'nama_siswa' => 'sanitize_string',
				'nama_ortu' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("db_gabung");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Db Gabung";
		$this->render_view("db_gabung/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id_gb","id_siswa","id_rinci","nama_siswa","nama_ortu");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_siswa' => 'required',
				'id_rinci' => 'required',
				'nama_siswa' => 'required',
				'nama_ortu' => 'required',
			);
			$this->sanitize_array = array(
				'id_siswa' => 'sanitize_string',
				'id_rinci' => 'sanitize_string',
				'nama_siswa' => 'sanitize_string',
				'nama_ortu' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("db_gabung.id_gb", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("db_gabung");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("db_gabung");
					}
				}
			}
		}
		$db->where("db_gabung.id_gb", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Db Gabung";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("db_gabung/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id_gb","id_siswa","id_rinci","nama_siswa","nama_ortu");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'id_siswa' => 'required',
				'id_rinci' => 'required',
				'nama_siswa' => 'required',
				'nama_ortu' => 'required',
			);
			$this->sanitize_array = array(
				'id_siswa' => 'sanitize_string',
				'id_rinci' => 'sanitize_string',
				'nama_siswa' => 'sanitize_string',
				'nama_ortu' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("db_gabung.id_gb", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("db_gabung.id_gb", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("db_gabung");
	}
}
