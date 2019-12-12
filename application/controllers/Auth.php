<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email salah!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim',[
            'required' => 'Password tidak boleh kosong!'
        ]);

        if($this->form_validation->run() == false){
            $data['title'] = 'Office Al-Hafish';
            $this->load->view('auth/authheader',$data);
            $this->load->view('auth/login');
            $this->load->view('auth/authfooter');
        }else{
            $this->_login();
        }
    }

    private function _login(){
        $email  = $this->input->post('email');
        $pass   = $this->input->post('password');

        $user   = $this->db->get_where('users', ['user_email' => $email])->row_array();

        if($user){
            if($user['user_activated'] == 1){
                if(password_verify($pass, $user['user_password'])){
                    $data = [
                        'user_email' => $user['user_email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('Admin');
                    }elseif($user['role_id'] == 2){
                        redirect('Tm');
                    }elseif($user['role_id'] == 3){
                        redirect('Nurse');
                    }
                }else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Sign in gagal, Email atau Password salah!</div>');
                    redirect('auth');
                }
            }elseif($user['user_activated'] == 0){
                $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
                Silahkan aktifasi akun pada email anda</div>');
                redirect('auth');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Akun sudah tidak aktif, Silahkan hubungi Admin</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Sign in gagal, Email atau Password salah!</div>');
            redirect('auth');
        }
    }

    public function registration(){
        $this->form_validation->set_rules('nama','Nama','required|trim',['required' => 'Nama tidak boleh kosong!']);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.user_email]',
        ['required' => 'Email tidak boleh kosong!',
         'is_unique' => 'Email telah terdaftar!'    
        ]);
        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]|matches[repassword]',[
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password Minimal 6 Karakter'
        ]);
        $this->form_validation->set_rules('repassword','Password','required|trim|matches[password]');

        if($this->form_validation->run() == false){
            $data['title'] = 'Office Al-Hafish';
            $this->load->view('auth/authheader',$data);
            $this->load->view('auth/register');
            $this->load->view('auth/authfooter');
        }else{
            $data = [
                'user_name' => $this->input->post('nama'),
                'user_email' => $this->input->post('email'),
                'user_password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id' => 2,
                'user_activated' => 1,
                'date_created' => time()
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Registrasi Sukses! . Silahkan Sign In</div>');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Anda berhasil Logout!</div>');
        redirect('auth');
    }
}