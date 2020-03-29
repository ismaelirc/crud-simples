<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Index para página geral da aplicação
 *
 * @category        Controller
 * @version         0.1
 * @author          Ismael
 */

class Index extends CI_Controller {

	protected $navBar = '';

	function __construct(){

		parent::__construct();

		$this->navBar = $this->load->view('comum/navbar',null,TRUE);

	}
	
	public function index(){
	
		$this->load->model('Noticia_model','',TRUE);

		$data['noticias'] = $this->Noticia_model->listar();

		$data['navBar'] = $this->navBar;

		$this->load->view('index',$data);
		
	}
}
