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
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Informasi/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function artikel($kategori = null)
    {
        $data['title'] = "Home - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_artikel.id_admin = tb_akun.id_akun');
        if ($kategori != null) {
            $str_kategori = str_replace("_", " ", $kategori);
            $this->db->where('kategori', $str_kategori);
        }
        $this->db->order_by('tb_artikel.tgl_insert', 'DESC');
        $data['artikel'] = $this->db->get('tb_artikel')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Artikel/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function detail_artikel($id_artikel)
    {
        $data['title'] = "Home - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_artikel.id_admin = tb_akun.id_akun');
        $data['artikel'] = $this->db->get_where('tb_artikel', ['id_artikel' => $id_artikel])->row_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Artikel/Detail');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }
}
