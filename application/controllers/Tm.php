<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tm extends CI_Controller {

    public function index(){
        $data['title']  = 'Dashboard';
        $data['user']   = $this->db->get_where('users',['user_email' => $this->session->userdata('user_email')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('tm/index');
        $this->load->view('templates/footer');
    }

}