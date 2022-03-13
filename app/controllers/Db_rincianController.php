<?php 
/**
 * Db_rincian Page Controller
 * @category  Controller
 */
class Db_rincianController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "db_rincian";
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
		$fields = array("id_rincian", 
			"id_siswa", 
			"no_hp", 
			"email", 
			"tinggi_badan", 
			"berat_badan");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				db_rincian.id_rincian LIKE ? OR 
				db_rincian.id_siswa LIKE ? OR 
				db_rincian.no_telp LIKE ? OR 
				db_rincian.no_hp LIKE ? OR 
				db_rincian.email LIKE ? OR 
				db_rincian.tinggi_badan LIKE ? OR 
				db_rincian.berat_badan LIKE ? OR 
				db_rincian.jarak LIKE ? OR 
				db_rincian.waktu LIKE ? OR 
				db_rincian.jml_saudara LIKE ? OR 
				db_rincian.asal_sekolah LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "db_rincian/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("db_rincian.id_rincian", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Db Rincian";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("db_rincian/list.php", $data); //render the full page
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
		$fields = array("db_rincian.id_rincian", 
			"db_rincian.id_siswa", 
			"data_siswa.nama_siswa AS data_siswa_nama_siswa", 
			"db_rincian.no_telp", 
			"db_rincian.no_hp", 
			"db_rincian.email", 
			"db_rincian.tinggi_badan", 
			"db_rincian.berat_badan", 
			"db_rincian.jarak", 
			"db_rincian.waktu", 
			"db_rincian.jml_saudara", 
			"db_rincian.asal_sekolah");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("db_rincian.id_rincian", $rec_id);; //select record based on primary key
		}
		$db->join("data_siswa", "db_rincian.id_siswa = data_siswa.id", "INNER");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Db Rincian";
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
		return $this->render_view("db_rincian/view.php", $record);
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
			$fields = $this->fields = array("id_siswa","no_telp","no_hp","email","tinggi_badan","berat_badan","jarak","waktu","jml_saudara","asal_sekolah");
			$postdata = $this->format_request_data($formdata);
			$this->validate_captcha = true; //will check for captcha validation
			$this->rules_array = array(
				'id_siswa' => 'required',
				'no_telp' => 'numeric',
				'no_hp' => 'required|numeric',
				'email' => 'required|valid_email',
				'tinggi_badan' => 'required|numeric',
				'berat_badan' => 'required|numeric',
				'jarak' => 'required|numeric',
				'waktu' => 'required',
				'jml_saudara' => 'required|numeric',
				'asal_sekolah' => 'required',
			);
			$this->sanitize_array = array(
				'id_siswa' => 'sanitize_string',
				'no_telp' => 'sanitize_string',
				'no_hp' => 'sanitize_string',
				'email' => 'sanitize_string',
				'tinggi_badan' => 'sanitize_string',
				'berat_badan' => 'sanitize_string',
				'jarak' => 'sanitize_string',
				'waktu' => 'sanitize_string',
				'jml_saudara' => 'sanitize_string',
				'asal_sekolah' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Terima Kasih data sudah terkirim", "success");
					return	$this->redirect("db_rincian");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Data rincian siswa";
		$this->render_view("db_rincian/add.php");
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
		$fields = $this->fields = array("id_rincian","id_siswa","no_telp","no_hp","email","tinggi_badan","berat_badan","jarak","waktu","jml_saudara","asal_sekolah");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id_siswa' => 'required',
				'no_telp' => 'numeric',
				'no_hp' => 'required|numeric',
				'email' => 'required|valid_email',
				'tinggi_badan' => 'required|numeric',
				'berat_badan' => 'required|numeric',
				'jarak' => 'required|numeric',
				'waktu' => 'required',
				'jml_saudara' => 'required|numeric',
				'asal_sekolah' => 'required',
			);
			$this->sanitize_array = array(
				'id_siswa' => 'sanitize_string',
				'no_telp' => 'sanitize_string',
				'no_hp' => 'sanitize_string',
				'email' => 'sanitize_string',
				'tinggi_badan' => 'sanitize_string',
				'berat_badan' => 'sanitize_string',
				'jarak' => 'sanitize_string',
				'waktu' => 'sanitize_string',
				'jml_saudara' => 'sanitize_string',
				'asal_sekolah' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("db_rincian.id_rincian", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("db_rincian");
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
						return	$this->redirect("db_rincian");
					}
				}
			}
		}
		$db->where("db_rincian.id_rincian", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Db Rincian";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("db_rincian/edit.php", $data);
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
		$fields = $this->fields = array("id_rincian","id_siswa","no_telp","no_hp","email","tinggi_badan","berat_badan","jarak","waktu","jml_saudara","asal_sekolah");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'id_siswa' => 'required',
				'no_telp' => 'numeric',
				'no_hp' => 'required|numeric',
				'email' => 'required|valid_email',
				'tinggi_badan' => 'required|numeric',
				'berat_badan' => 'required|numeric',
				'jarak' => 'required|numeric',
				'waktu' => 'required',
				'jml_saudara' => 'required|numeric',
				'asal_sekolah' => 'required',
			);
			$this->sanitize_array = array(
				'id_siswa' => 'sanitize_string',
				'no_telp' => 'sanitize_string',
				'no_hp' => 'sanitize_string',
				'email' => 'sanitize_string',
				'tinggi_badan' => 'sanitize_string',
				'berat_badan' => 'sanitize_string',
				'jarak' => 'sanitize_string',
				'waktu' => 'sanitize_string',
				'jml_saudara' => 'sanitize_string',
				'asal_sekolah' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("db_rincian.id_rincian", $rec_id);;
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
		$db->where("db_rincian.id_rincian", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("db_rincian");
	}
}
