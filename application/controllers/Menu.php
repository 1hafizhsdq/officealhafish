<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']  = 'Manajemen Menu';
        $data['user']   = $this->db->get_where('users', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['bc']     = 'Menu';
        $data['menu']   = $this->M_menu->getmenu()->result_array();
        $data['bagian']   = $this->M_menu->getbagian()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function menuadd()
    {
        $data = array(
            'title'         => $this->input->post('nmmenu'),
            'user_menu_id'  => $this->input->post('bagian'),
            'url'           => $this->input->post('url'),
            'icon'          => $this->input->post('icon'),
            'is_activated'  => '1'
        );
        $insert =  $this->M_menu->inputmenu($data);
        echo json_encode(array("status" => true));
        $this->session->set_flashdata('flash', 'Data telah ditambahkan');
        redirect('Menu');
    }

    public function getdataedit($id)
    {
        $data = $this->M_menu->getmenubyid($id);
        echo json_encode($data);
    }

    public function menuedit()
    {
        $data = array(
            'title'         => $this->input->post('nmmenu'),
            'user_menu_id'  => $this->input->post('bagian'),
            'url'           => $this->input->post('url'),
            'icon'          => $this->input->post('icon'),
            'is_activated'  => '1'
        );
        $update = $this->M_menu->editmenu($data);
        echo json_encode(array("status" => true));
        $this->session->set_flashdata('flash', ' telah diubah');
        redirect('Menu');
    }

    public function menudelete($id)
    {
        $this->M_menu->deletemenu($id);
        $this->session->set_flashdata('flash', ' telah dihapus');
        redirect('Menu');
    }
    // ===============================================SubMenu==========================================================
    public function indexsub()
    {
        $data['title']  = 'Manajemen Menu';
        $data['user']   = $this->db->get_where('users', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['bc']     = 'Sub Menu';
        $data['submenu']   = $this->M_menu->getsubmenu()->result_array();
        $data['submenuchs']   = $this->M_menu->getsubmenuchs()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function submenuadd(){
        $data = array(
            'id_user_submenu'   => $this->input->post('menu'),
            'title2'            => $this->input->post('title2'),
            'url'               => $this->input->post('url'),
            // 'icon'              => $this->input->post('icon'),
            'is_activated'      => '1'
        );
        $insert =  $this->M_menu->inputsubmenu($data);
        echo json_encode(array ("status" => true));
        $this->session->set_flashdata('flash', 'Data telah ditambahkan');
        redirect('Menu/indexsub');
    }

    public function submenuedit()
    {
        $data = array(
            'title2'         => $this->input->post('title2'),
            'id_user_submenu'  => $this->input->post('menu'),
            'url'           => $this->input->post('url'),
            'is_activated'  => '1'
        );
        $update = $this->M_menu->editmenu($data);
        echo json_encode(array("status" => true));
        $this->session->set_flashdata('flash', ' telah diubah');
        redirect('Menu/indexsub');
    }
}
