<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_akun') == null) {
            redirect('Home');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Pengaduan - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_pengaduan.id_sekretaris = tb_akun.id_akun', 'left');
        $data['pengaduan'] = $this->db->get_where('tb_pengaduan', ['id_pengadu' => $this->session->userdata('id_akun')])->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Pengaduan/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_pengadu' => $this->session->userdata('id_akun'),
                'keterangan_pengaduan' => $_POST['keterangan'],
                'status_pengaduan' => 'Sedang ditinjau'
            ];
            $add = $this->db->insert('tb_pengaduan', $data);
            if ($add) {
                redirect('Pengaduan');
            } else {
                echo "Gagal Input Pengaduan";
            }
        } else {
            $data['title'] = "Tambah Pengaduan - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/02_Navbar');
            $this->load->view('Pengaduan/Input');
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
            $data['title'] = "Ubah Akun - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $data['data_akun'] = $this->db->get_where('tb_akun', ['id_akun' => $id_akun])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/02_Navbar');
            $this->load->view('Akun/Edit');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function delete($id_pengaduan)
    {
        $delete = $this->db->delete('tb_pengaduan', ['id_pengaduan' => $id_pengaduan]);
        if ($delete) {
            redirect('Pengaduan');
        } else {
            echo 'Gagal Hapus Pengaduan';
        }
    }
}
