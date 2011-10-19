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

	public function __construct()
	{
		parent::__construct();

		// Load the required classes
		$this->load->model('store_m');
		$this->lang->load('store');
		
		$this->template->append_metadata(css('store.css', 'store'))
						->append_metadata(js('store.js', 'store'));
	}

	public function index($offset = 0)
	{
		$data['store_config'] = $this->store_m->get_store_all();  
		//print_r($data['store_config']); // Print out the array to see if it works (Remove this line when done testing)
	}
}