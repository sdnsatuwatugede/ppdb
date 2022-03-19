<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		if(strtolower(USER_ROLE) == 'guru'){
			$this->render_view("home/guru.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'siswa'){
			$this->render_view("home/siswa.php" , null , "main_layout.php");
		}
		else{
			$this->render_view("home/index.php" , null , "main_layout.php");
		}
	}
}
