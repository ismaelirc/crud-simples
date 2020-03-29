<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Noticia 
 *  
 * @category        Controller
 * @version         0.1
 * @author          Ismael
 */

class Noticia extends CI_Controller {
    
    protected $navBar = '';

	function __construct(){

        parent::__construct();
        
        $this->navBar = $this->load->view('comum/navbar',null,TRUE);

	}
	
	public function index(){

        $this->load->model('Noticia_model','',TRUE);
        
        $data['navBar'] = $this->navBar;
        
        if($data['idNoticia'] = $this->uri->segment(2, 0)){

            $data['noticia'] = $this->Noticia_model->noticia($data['idNoticia']);

        }

		$this->load->view('noticia',$data);
		
    }
    
    public function salvar(){
        
        $this->load->model('Noticia_model','',TRUE);

        $formData = $this->input->post() ? $this->input->post() : [];

        $return = $this->Noticia_model->salvar($formData);
        
        
        if($return['error']['code']){

            return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header($return['status'])
                            ->set_output(json_encode($return['error']['message']));
        }

        $return['idNoticia'] = $return['idNoticia'];

        return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header($return['status'])
                            ->set_output(json_encode($return));

    }

    public function deletar(){
        
        $this->load->model('Noticia_model','',TRUE);

        $formData = $this->input->post() ? $this->input->post() : [];

        $return = $this->Noticia_model->deletar($formData);
        
        if($return['error']['code']){

            return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header((int)$return['status'])
                            ->set_output(json_encode($return['error']['message']));
        }

        return $this->output
                            ->set_content_type('application/json')
                            ->set_status_header((int)$return['status'])
                            ->set_output(json_encode($return));

    }
}
