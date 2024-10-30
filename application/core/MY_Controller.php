<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $db;
	public $session;
	public $catalog_model;
	public $cart;
	public $size_model;
	public $slider_model;
	public $sizedetail_model;
	public $product_model;
	public $comment_model;
    public $user_model;
	public $order_model;
	public $form_validation;
	public $upload;
	public $upload_library;
	public $pagination;
	public $admin_model;
	public $transaction_model;
	public $shipping_model ;
	public $province_model;
	public $district_model;
	public $ward_model;
	// public $benchmark;
	// public $hooks;
	// public $config;
	// public $log;
	// public $utf8;
	// public $uri;
	// public $router;
	// public $output;
	// public $security;
	// public $input;
	// public $lang;
	// public $load;
	// public $failover;
	// public $data;
	var $data = array();
	function __construct()
	{
		parent::__construct();
		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
				$this->load->helper('admin');
				$this->_checklogin();
				$login = $this->session->userdata("login");
				$this->data['login']=$login;
				break;
			
			default:
				$this->load->model('catalog_model');
				$input = array();
				$input['where'] = array('parent_id' => '1');
				$input['order'] = array('sort_order', 'ASC');
				$catalog = $this->catalog_model->get_list($input);
				foreach ($catalog as $value) {
					$input= array();
					$input['where'] = array('parent_id' => $value->id);
					$input['order'] = array('sort_order', 'ASC');
					$sub = $this->catalog_model->get_list($input);
					$value->sub=$sub;
				}
				$this->data['catalog']=$catalog;
				
				$user = $this->session->userdata('user');
				$this->data['user']=$user;

        		$this->load->library('cart');
        		$carts = $this->cart->contents();
				$this->data['carts'] = $carts;
				$total_items = $this->cart->total_items();
				$this->data['total_items'] = $total_items;
				break;
		}
	}
	protected function _checklogin()
	{
		$controller = $this->uri->segment(2);
		$login = $this->session->userdata("login");
		if(!isset($login) && $controller != 'login') {
			redirect(admin_url('login'));
		}
		if(isset($login) && $controller == 'login') {
			redirect(admin_url('home'));
		}
		
	} 
}
