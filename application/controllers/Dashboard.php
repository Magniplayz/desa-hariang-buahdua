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
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Dashboard/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }
}
