<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Home - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Home/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function informasi()
    {
        $data['title'] = "Home - Hariang Buahdua";
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Informasi/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function artikel()
    {
        $data['title'] = "Home - Hariang Buahdua";
        // $data['pembeli'] = $this->db->get_where('pembeli', ['id_pembeli' => $this->session->userdata('id_pembeli')])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Artikel/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }
}
