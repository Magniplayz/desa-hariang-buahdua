<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == 0 || $this->session->userdata('id_akun') == null) {
            redirect('Home');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->where('status_permohonan', 'Menunggu persetujuan');
        $data['jml_permohonan'] = $this->db->count_all_results('tb_permohonan');
        $this->db->where('status_pengaduan', 'Sedang ditinjau');
        $data['jml_pengaduan'] = $this->db->count_all_results('tb_pengaduan');
        $data['jml_artikel'] = $this->db->count_all_results('tb_artikel');
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Dashboard/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }
}
