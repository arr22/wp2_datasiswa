<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class Dlemas extends CI_Controller 
{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('form_siswa');
    }

    public function print()
    {

        $this->form_validation->set_rules('NIS', 'Nomor Induk Siswa',
        'required|min_length[3]', [
            'required' => 'Nomor Induk Siswa Harus diisi',
            'min_length' => 'Nomor Induk Siswa terlalu pendek'
        ]);

        $this->form_validation->set_rules('KELAS', 'Kelas',
        'required|min_length[1]', [
            'required' => 'Kelas Harus diisi',
            'min_length' => 'Kelas terlalu pendek'
        ]);

        $this->form_validation->set_rules('Tempat', 'Tempat Lahir',
        'required|min_length[4]', [
            'required' => 'Tempat Lahir Harus diisi',
            'min_length' => 'Tempat Lahir terlalu pendek'
        ]);

        $this->form_validation->set_rules('Alamat', 'Alamat',
        'required|min_length[4]', [
            'required' => 'Alamat Harus diisi',
            'min_length' => 'Tempat Lahir terlalu pendek'
        ]);

        if ($this->form_validation->run() != true) 
        {
            $this->load->view('form_siswa');
        }
        else
        {
            $data = [
                        'Nama' => $this->input->post('Nama'),
                        'NIS' => $this->input->post('NIS'),
                        'KELAS' => $this->input->post('KELAS'),
                        'Lahir' => $this->input->post('Lahir'),
                        'Tempat' => $this->input->post('Tempat'),
                        'Alamat' => $this->input->post('Alamat'),
                        'Jen_kel' => $this->input->post('Jen_kel'),
                        'Agama' => $this->input->post('Agama')
                    ];
            $this->load->view('data_siswa', $data);
        }
    }
}
