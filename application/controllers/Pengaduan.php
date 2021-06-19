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

    public function index_sekretaris()
    {
        $data['title'] = "Pengaduan - Hariang Buahdua";
        $data['akun'] = $this->db->get_where('tb_akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $this->db->join('tb_akun', 'tb_pengaduan.id_pengadu = tb_akun.id_akun', 'left');
        $data['pengaduan'] = $this->db->get_where('tb_pengaduan', ['status_pengaduan' => 'Sedang ditinjau'])->result_array();
        $this->load->view('Templates/01_Header', $data);
        $this->load->view('Templates/03_Sidebar');
        $this->load->view('Pengaduan/IndexSekretaris');
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
                'status_pengaduan' => 'Sedang ditinjau',
                'bukti_pengaduan' => $this->_uploadImage("Pengaduan_" . date("dmY-His"))
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

    public function selesai($id_pengaduan)
    {
        $data = [
            'status_pengaduan' => 'Sudah ditindak lanjuti',
            'id_sekretaris' => $this->session->userdata('id_akun')
        ];
        $this->db->set($data);
        $this->db->where('id_pengaduan', $id_pengaduan);
        $add = $this->db->update('tb_pengaduan');
        if ($add) {
            redirect('Pengaduan/index_sekretaris');
        } else {
            echo "Gagal konfirmasi";
        }
    }

    private function _uploadImage($file_name)
    {
        $config['upload_path']          = './upload/pengaduan/';
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
