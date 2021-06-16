<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
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
        $data['title'] = "Permohonan - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_permohonan.id_sekretaris = tb_akun.id_akun', 'left');
        $data['permohonan'] = $this->db->get_where('tb_permohonan', ['id_pemohon' => $this->session->userdata('id_akun')])->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/02_Navbar');
        $this->load->view('Permohonan/Index');
        $this->load->view('Templates/07_Footer');
        $this->load->view('Templates/09_JS');
    }

    public function add()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'id_pemohon' => $this->session->userdata('id_akun'),
                'jenis_permohonan' => $_POST['jenis'],
                'keterangan_permohonan' => $_POST['keterangan'],
                'status_permohonan' => 'Menunggu persetujuan',
                'file_pendukung' => $this->_uploadImage($_POST['jenis'] . date("dmY-His"))
            ];
            $add = $this->db->insert('tb_permohonan', $data);
            if ($add) {
                redirect('Permohonan');
            } else {
                echo "Gagal Input Permohonan";
            }
        } else {
            $data['title'] = "Tambah Permohonan - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/02_Navbar');
            $this->load->view('Permohonan/Input');
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
            $this->load->view('Templates/02_Navbar');
            $this->load->view('Artikel/Edit');
            $this->load->view('Templates/07_Footer');
            $this->load->view('Templates/09_JS');
        }
    }

    public function delete($id_permohonan)
    {
        $delete = $this->db->delete('tb_permohonan', ['id_permohonan' => $id_permohonan]);
        if ($delete) {
            redirect('Permohonan');
        } else {
            echo 'Gagal Hapus Permohonan';
        }
    }

    private function _uploadImage($file_name)
    {
        $config['upload_path']          = './upload/permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
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
