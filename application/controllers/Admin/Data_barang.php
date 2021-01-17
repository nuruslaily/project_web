<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') != 'admin') {
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        
        redirect('Auth/login');
        }
    }
    public function index()
    {
        $data['barang'] = $this->Model_barang->tampil_data();
        $data['barang'] = $this->Model_barang->tampil_data_barang();
        $data['ruang'] = $this->Model_ruang->tampil_data_ruangan();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Data_barang', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_aksi()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $merk = $this->input->post('merk');
        $tahun_peroleh = $this->input->post('tahun_peroleh');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $penguasaan = $this->input->post('penguasaan');
        $id_ruang = $this->input->post('id_ruang');
        $keadaan = $this->input->post('keadaan');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'merk' => $merk,
            'tahun_peroleh' => $tahun_peroleh,
            'jumlah' => $jumlah,
            'satuan' => $satuan,
            'penguasaan' => $penguasaan,
            'id_ruang' => $id_ruang,
            'keadaan' => $keadaan,
            'keterangan' => $keterangan

        );

        $this->Model_barang->tambah_barang($data, 'tb_barang');
        $this->session->set_flashdata('msg', 'Data Berhasil Di Tambah');
        redirect('Admin/Data_barang/index');
    }

    public function edit($id)
    {
        $data['barang'] = $this->Model_barang->tampil_data_barang_by_id($id);
        $data['ruang'] = $this->Model_ruang->tampil_data_ruangan();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_barang($id_barang)
    {
        $data['barang'] = $this->Model_barang->detail_barang($id_barang);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/detail_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_barang');
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $merk = $this->input->post('merk');
        $tahun_peroleh = $this->input->post('tahun_peroleh');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $penguasaan = $this->input->post('penguasaan');
        $id_ruang = $this->input->post('id_ruang');
        $keadaan = $this->input->post('keadaan');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'merk' => $merk,
            'tahun_peroleh' => $tahun_peroleh,
            'jumlah' => $jumlah,
            'satuan' => $satuan,
            'penguasaan' => $penguasaan,
            'id_ruang' => $id_ruang,
            'keadaan' => $keadaan,
            'keterangan' => $keterangan
        );
        $where = array(
            'id_barang' => $id
        );
        $this->Model_barang->update_data($where, $data, 'tb_barang');

        $this->session->set_flashdata('msg', 'Data Berhasil Di Update');
        redirect('Admin/Data_barang/index');
    }

    public function hapus()
    {
        $id = $this->input->post('id_barang');
        echo $id;
        $where = array('id_barang' => $id);
        $this->Model_barang->hapus_data($where, 'tb_barang');

        $this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
        redirect('Admin/Data_barang/index');
    }

    public function export() {
        $barang = $this->Model_barang->tampil_data();
        $ruang = $this->Model_ruang->tampil_data_ruangan();

 
        $pdf = new \TCPDF('P', 'mm','A4', true, 'UTF-8', false);
        $pdf->SetHeaderMargin(5);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(25);
        $pdf->SetDisplayMode('real', 'default');     
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->SetMargins(3,20,3);
        $pdf->AddPage();
        $pdf->Image('assets/img/logo.jpeg',3,3,40);
        $pdf->SetFont('Times','B',11);
        $pdf->SetX(4);            
        $pdf->MultiCell(70,0,'BADAN PUSAT STATISTIK',0,'L');
        $pdf->SetX(4);   
        $pdf->MultiCell(70,0,'BADAN PUSAT STATISTIK',0,'L');
        $pdf->SetX(4);   
        $pdf->MultiCell(70,0,'BPS PROVINSI JAWA TIMUR',0,'L');
        $pdf->ln(10);
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(210, 10, "REKAP DAFTAR BARANG RUANGAN", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);
        $pdf->ln(10);
        $pdf->SetFont('Times','B',11);
        $pdf->SetX(4);            
        $pdf->MultiCell(70,0,'NAMA UPB : BPS KOTA MALANG',0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(70,0,'KODE UPB : ',0,'L');    
        $pdf->SetX(4);
        $pdf->MultiCell(70,0,'NAMA RUANGAN : ',0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(70,0,'KODE RUANGAN : ',0,'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10, 10, "No", 1, 0, 'C');
        $pdf->Cell(30, 10, "Kode Barang", 1, 0, 'C');
        $pdf->Cell(45, 10, "Nama Barang", 1, 0, 'C');
        $pdf->Cell(30, 10, "Jumlah Barang", 1, 0, 'C');
        $pdf->Cell(30, 10, "Satuan", 1, 0, 'C');
        $pdf->Cell(60, 10, "Keterangan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach($barang->result_array() as $b => $brg) {
            $this->addRow($pdf, $b, $brg);
        }
        $pdf->Output('Data Barang.pdf'); 
    }

    private function addRow($pdf, $no, $b) {
        $pdf->Cell(10, 10, $no+1, 1, 0, '');
        $pdf->Cell(30, 10, $b['kode_barang'], 1, 0, 'L');
        $pdf->Cell(45, 10, $b['nama_barang'], 1, 0, 'L');
        $pdf->Cell(30, 10, $b['jumlah'], 1, 0, 'L');
        $pdf->Cell(30, 10, $b['satuan'], 1, 0, 'L');
        $pdf->Cell(60, 10, $b['keterangan'], 1, 1, 'L');
    }
}

/* End of file Data_barang.php */
