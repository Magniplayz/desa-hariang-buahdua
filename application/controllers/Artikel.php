<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
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
        $data['title'] = "Artikel - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_artikel.id_admin = tb_akun.id_akun');
        $data['artikel'] = $this->db->get('tb_artikel')->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Artikel/List');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'judul_artikel' => $_POST['judul'],
                'sampul_artikel' => $this->_uploadImage($_POST['judul'] . date("dmY-His")),
                'isi_artikel' => $_POST['isi'],
                'kategori' => $_POST['kategori'],
                'id_admin' => $this->session->userdata('id_akun')
            ];
            $add = $this->db->insert('tb_artikel', $data);
            if ($add) {
                redirect('Artikel');
            } else {
                echo "Gagal Input Artikel";
            }
        } else {
            $data['title'] = "Tambah Artikel - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Artikel/Input');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function edit($id_artikel)
    {
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $img = "";
            if (!empty($_FILES["image"]["name"])) {
                $img = $this->_uploadImage($_POST['judul'] . date("dmY-His"));
            } else {
                $img = $_POST["old_image"];
            }
            $data = [
                'judul_artikel' => $_POST['judul'],
                'sampul_artikel' => $img,
                'isi_artikel' => $_POST['isi'],
                'kategori' => $_POST['kategori'],
                'id_admin' => $this->session->userdata('id_akun')
            ];
            $this->db->set($data);
            $this->db->where('id_artikel', $id_artikel);
            $add = $this->db->update('tb_artikel');
            if ($add) {
                redirect('Artikel');
            } else {
                echo "Gagal Update Artikel";
            }
        } else {
            $data['title'] = "Ubah Artikel - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $data['artikel'] = $this->db->get_where('tb_artikel', ['id_artikel' => $id_artikel])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Artikel/Edit');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function delete($id_artikel)
    {
        $delete = $this->db->delete('tb_artikel', ['id_artikel' => $id_artikel]);
        if ($delete) {
            redirect('Artikel');
        } else {
            echo 'Gagal Hapus Artikel';
        }
    }

    private function _uploadImage($file_name)
    {
        $config['upload_path']          = './upload/artikel/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }
}
