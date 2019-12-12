<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        $data['title']  = 'Dashboard';
        $data['bc']     = 'Dashboard';
        $data['user']   = $this->db->get_where('users',['user_email' => $this->session->userdata('user_email')])->row_array();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function profile(){
        $data['title']  = 'Rehabilitasi Mental Al-Hafish';
        $data['user']   = $this->db->get_where('users',['user_email' => $this->session->userdata('user_email')])->row_array();
        
        $this->load->view('admin/adminheader',$data);
        $this->load->view('admin/adminsidebar',$data);
        $this->load->view('admin/adminprofile');
        $this->load->view('admin/adminfooter');
    }

}