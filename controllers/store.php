<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		Jaap Jolman And Kevin Meier - pyrocms-store Team
 * @website		http://jolman.eu
 * @package 	PyroCMS
 * @subpackage 	Store Module
 */
class Store extends Public_Controller
{

	public function __construct(){

		parent::__construct();

		// Load the required classes
		$this->load->library('cart');
		$this->load->model('store_m');
		$this->lang->load('store');
		
		$this->template->append_metadata(css('store.css', 'store'))
						->append_metadata(js('store.js', 'store'));
	}

	public function index(){

		if(!$this->cart->contents())
		{
			$data = array(
						array(
							'id'      => 'sku_123ABC',
							'qty'     => 1,
							'price'   => 39.95,
							'name'    => 'T-Shirt',
							'options' => array('Size' => 'L', 'Color' => 'Red')
						),
						array(
							'id'      => 'sku_123ABD',
							'qty'     => 1,
							'price'   => 39.95,
							'name'    => 'Jeans',
							'options' => array('Size' => 'L', 'Color' => 'Blue')
						)
					);
					
			$this->cart->insert($data); 
		}

		$this->data = array(
			''	=>	''
		);

		$this->template->build('index', $this->data);
	}
	
	public function categories(){

		$this->data = array(
			''	=>	''
		);
		
		$this->template->build('category', $this->data);
	}
	
	public function product(){

		$this->data = array(
			''	=>	''
		);
		
		$this->template->build('details', $this->data);
	}
	
	public function show_cart(){

		$this->data = array(
			''	=>	''
		);
		
		$this->template->build('cart', $this->data);
	}
	
	public function update_cart(){

		$this->data = $this->input->post();
		$this->cart->update($this->data);
		redirect('store');
	}
	
	public function checkout(){
		
		$this->data = array(
			''	=>	''
		);
		
		$this->template->build('checkout', $this->data);
	}
}