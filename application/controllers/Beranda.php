<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('curl');
        $this->load->helper('url');
    }

    public function index() {
        $proyek_url = 'http://localhost:8080/proyek';
        $lokasi_url = 'http://localhost:8080/lokasi';

        $data['proyek'] = json_decode($this->curl->simple_get($proyek_url), true);
        $data['lokasi'] = json_decode($this->curl->simple_get($lokasi_url), true);

        $this->load->helper('url');
        $this->load->view('beranda_view', $data);
    }

    
    public function show_add_lokasi_form() {
        $this->load->helper('url');
        $this->load->view('tambah_lokasi_view');
    }

    public function show_add_proyek_form() {
        $lokasi_url = 'http://localhost:8080/lokasi';

        $data['lokasi'] = json_decode($this->curl->simple_get($lokasi_url), true);

        $this->load->helper('url');
        $this->load->view('tambah_proyek_view', $data);
    }

    public function add_lokasi() {
        $url = 'http://localhost:8080/lokasi'; 
    
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
    
        $json_data = json_encode($data);
    
        $response = $this->curl->simple_post($url, $json_data, array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
    
        if ($response) {
            redirect('beranda');
        } else {
            echo "Gagal menambahkan lokasi.";
            echo "Response dari API: $response";
        }
    }

    public function add_proyek() {
        $url = 'http://localhost:8080/proyek';
    
        $data = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasiId' => $this->input->post('lokasiId')
        );
    
        $json_data = json_encode($data);
    
        $response = $this->curl->simple_post($url, $json_data, array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
    
        echo "<pre>";
        echo "Data yang dikirim ke API:\n";
        print_r($json_data);
        echo "\nResponse dari API:\n";
        print_r($response);
        echo "</pre>";
    
        $http_code = $this->curl->info['http_code'];
        echo "HTTP Status Code: $http_code\n";
    
        if ($http_code == 200 || $http_code == 201) { 
            redirect('beranda');
        } else {
            echo "Gagal menambahkan proyek. Response dari API: $response";
        }
    }
    
    public function edit_lokasi($id) {
        $url = 'http://localhost:8080/lokasi/' . $id;
    
        $data['lokasi'] = json_decode($this->curl->simple_get($url), true);
    
        if ($data['lokasi'] === null) {
            show_error('Data lokasi tidak ditemukan.');
            return;
        }
    
        $this->load->helper('url');
        $this->load->view('edit_lokasi_form', $data);
    }

    public function edit_proyek($id) {
        $url = 'http://localhost:8080/proyek/' . $id;
    
        $data['proyek'] = json_decode($this->curl->simple_get($url), true);
    
        if ($data['proyek'] === null) {
            show_error('Data proyek tidak ditemukan.');
            return;
        }
    
        $this->load->helper('url');
        $this->load->view('edit_proyek_form', $data);
    }

    public function update_lokasi() {
        $id = $this->input->post('id');
        $url = 'http://localhost:8080/lokasi/' . $id;
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
        $json_data = json_encode($data);
        $response = $this->curl->simple_put($url, $json_data, array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));

        if ($response) {
            redirect('beranda');
        } else {
            echo "Gagal memperbarui lokasi.";
            echo "Response dari API: $response";
        }
    }

    public function update_proyek() {
        $url = 'http://localhost:8080/proyek/' . $this->input->post('id');

        $data = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        );

        $json_data = json_encode($data);

        $response = $this->curl->simple_put($url, $json_data, array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));

        if ($response) {
            redirect('beranda');
        } else {
            echo "Gagal memperbarui proyek.";
        }
    }

    public function delete_lokasi($id) {
        $url = 'http://localhost:8080/lokasi/' . $id;
        $response = $this->curl->simple_delete($url, array(CURLOPT_RETURNTRANSFER => true));
        
        // if ($this->curl->info['http_code'] == 500) {
        //     echo '<script>alert("Lokasi masih terhubung dengan proyek tertentu");</script>';
        // }
        
        redirect('beranda');
    }
    

    public function delete_proyek($id) {
        $url = 'http://localhost:8080/proyek/' . $id;

        $response = $this->curl->simple_delete($url);

        redirect('beranda'); 
    }
}
