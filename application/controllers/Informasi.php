<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
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
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'nama_desa' => $_POST['nama'],
                'visi' => $_POST['visi'],
                'misi' => $_POST['misi'],
                'alamat_desa' => $_POST['alamat'],
                'sejarah_desa' => $_POST['sejarah']
            ];
            $add = $this->db->update('tb_profil', $data);
            if ($add) {
                redirect('Dashboard');
            } else {
                echo "Gagal Update Profil Desa";
            }
        } else {
            $data['title'] = "Informasi / Profil Desa - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $this->db->limit(1);
            $data['profil'] = $this->db->get('tb_profil')->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Informasi/Input');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }
}
