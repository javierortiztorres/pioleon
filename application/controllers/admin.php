<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
	public function _admin_output($output = null)
	{
		$this->load->view('admin.php',$output);
	}

	public function index()
	{
		$this->_admin_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	public function users_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('users');

		$crud->fields('name');

		$output = $crud->render();

		$this->_admin_output($output);
	}
	
	public function posts_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('posts');
		$crud->set_subject('Post');
		$crud->unset_add();

		$crud->fields('title', 'description');

		$output = $crud->render();

		$this->_admin_output($output);
	}
}