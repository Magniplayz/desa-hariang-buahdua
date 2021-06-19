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

    public function index_sekretaris()
    {
        $data['title'] = "Permohonan - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_permohonan.id_pemohon = tb_akun.id_akun', 'left');
        $data['permohonan'] = $this->db->get_where('tb_permohonan', ['status_permohonan' => 'Menunggu persetujuan'])->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Permohonan/IndexSekretaris');
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
                'file_pendukung' => $this->_uploadImage("Permohonan " . $_POST['jenis'] . date("dmY-His"))
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

    public function konfirmasi($id_permohonan)
    {
        $this->form_validation->set_rules('surat', 'Surat', 'required');
        if ($this->form_validation->run() == true) {
            $_POST = $this->input->post();
            $data = [
                'status_permohonan' => $_POST['status'],
                'surat' => $_POST['surat'],
                'id_sekretaris' => $this->session->userdata('id_akun')
            ];
            $this->db->set($data);
            $this->db->where('id_permohonan', $id_permohonan);
            $add = $this->db->update('tb_permohonan');
            if ($add) {
                redirect('Permohonan/index_sekretaris');
            } else {
                echo "Gagal Konfirmasi Permohonan";
            }
        } else {
            $data['title'] = "Konfirmasi Permohonan - Hariang Buahdua";
            $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
            $this->db->join('tb_akun', 'tb_permohonan.id_pemohon = tb_akun.id_akun', 'left');
            $data['permohonan'] = $this->db->get_where('tb_permohonan', ['id_permohonan' => $id_permohonan])->row_array();
            $this->load->view('Templates/01_Header', $data);
            $this->load->view('Templates/03_Sidebar');
            $this->load->view('Permohonan/Konfirmasi');
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
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
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

    public function surat($id_permohonan)
    {
        $data['title'] = "Surat Permohonan";

        $data['permohonan'] = $this->db->get_where('tb_permohonan', ['id_permohonan' => $id_permohonan])->row_array();

        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Permohonan/Surat');
        $this->load->view('Templates/09_JS');
    }
}
