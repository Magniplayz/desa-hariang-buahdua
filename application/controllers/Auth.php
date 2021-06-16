<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        //Class untuk memanggil library
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        //Validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $this->db->where('username', $username);
            $this->db->where('pass_akun', $pass);
            $login = $this->db->get('tb_akun')->row_array();
            if ($login) {
                // Data yang akan masuk session
                $data = [
                    'id_akun' => $login['id_akun'],
                    'level' => $login['level']
                ];
                $this->session->set_userdata($data);
                if ($login['level'] == 0) {
                    redirect('Home');
                } else {
                    redirect('Dashboard');
                }
            } else {
                echo "Gagal Login";
            }
        } else {
            $data['title'] = "Login - Hariang Buahdua";
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Auth/Login');
            $this->load->view('Templates/09_JS');
        }
    }

    public function register()
    {
        //Validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_akun.username]');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            //Proses Simpan Pembeli
            $_POST = $this->input->post();
            $data = [
                'nama_akun' => $_POST['nama'],
                'username' => $_POST['username'],
                'pass_akun' => $_POST['pass']
            ];
            $register = $this->db->insert('tb_akun', $data);
            if ($register) {
                redirect('Auth');
            } else {
                echo 'Gagal';
            }
        } else {
            //Jika Validasi Error, maka kembali ke tampilan
            $data['title'] = "Register - Hariang Buahdua";
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Auth/Register');
            $this->load->view('Templates/09_JS');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
