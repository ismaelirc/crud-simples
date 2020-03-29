<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Noticias Model
 *
 * @author: Ismael
 * */
Class Noticia_model extends CI_Model{

    protected $table = 'noticia';
    
    public function listar(){

        $data = [];

        $this->db->select()
                ->from($this->table)
                ->order_by('dataCriacao','DESC');

        $result = $this->db->get();

		if($result->num_rows() > 0){

            $data = $result->result_array();
            
		}

         return $data;
    }
    
    public function noticia($idNoticias = false){

        if(!$idNoticias) return false;

        $this->db->select()
                ->from($this->table)
                ->where('id',$idNoticias);

        $result = $this->db->get();

        return $result->result_array()[0];

    }

    public function salvar($formData){
        
        $this->load->library('form_validation');
        $this->form_validation->set_data($formData);

        if($this->form_validation->run('noticia') === false){

            $result['error'] = true;
            $result['message'] = validation_errors();

            return $result;
        }

        $idNoticia = $formData['idNoticia'];

        if($idNoticia){

            $dataUpdate = ['titulo' => $formData['titulo'],'descricao' => $formData['descricao']]; 

            $this->db->where('id',$idNoticia);
            $this->db->update($this->table,$dataUpdate);
            $result['status'] = 201;

        }else{

            $data = ['titulo' => $formData['titulo'],
                        'descricao' => $formData['descricao'],
                        'dataCriacao' => date('Y-m-d H:i:s')];

            $this->db->insert($this->table,$data);
            $idNoticia =  $this->db->insert_id();
            $result['status'] = 200;
            
        }

        $result['error'] = $this->db->error();
        $result['idNoticia'] = $idNoticia;

        return $result;
    }


    public function deletar($formData){
        
        $this->load->library('form_validation');
        $this->form_validation->set_data($formData);

        $idNoticia = $formData['idNoticia'];

        if($idNoticia){ 

            $this->db->where('id',$idNoticia);
            $this->db->delete($this->table);

            $result['url_location'] = base_url();
            $result['status'] = 200;
        }else{

            $result['status'] = 400;
            
        }

        $result['error'] = $this->db->error();

        return $result;
    }

}

