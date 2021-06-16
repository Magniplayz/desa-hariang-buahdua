<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == 0 || $this->session->userdata('id_akun') == null) {
            redirect('Home');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Master Akun - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $data['data_akun'] = $this->db->get('tb_akun')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Akun/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_akun.username]');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'nama_akun' => $_POST['nama'],
                'username' => $_POST['username'],
                'email_akun' => $_POST['email'],
                'pass_akun' => $_POST['pass'],
                'level' => $_POST['level']
            ];
            $add = $this->db->insert('tb_akun', $data);
            if ($add) {
                redirect('Akun');
            } else {
                echo "Gagal Input Akun";
            }
        } else {
            $data['title'] = "Tambah Akun - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Akun/Input');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function edit($id_akun)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'nama_akun' => $_POST['nama'],
                'username' => $_POST['username'],
                'email_akun' => $_POST['email'],
                'pass_akun' => $_POST['pass'],
                'level' => $_POST['level']
            ];
            $this->db->set($data);
            $this->db->where('id_akun', $id_akun);
            $add = $this->db->update('tb_akun');
            if ($add) {
                redirect('Akun');
            } else {
                echo "Gagal Update akun";
            }
        } else {
            $data['title'] = "Ubah Akun - TRAVERN";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $data['data_akun'] = $this->db->get_where('tb_akun', ['id_akun' => $id_akun])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Akun/Edit');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function delete($id_akun)
    {
        $delete = $this->db->delete('akun', ['id_akun' => $id_akun]);
        if ($delete) {
            redirect('Akun');
        } else {
            echo 'Gagal Hapus Akun';
        }
    }
}
