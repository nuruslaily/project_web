<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_akhir extends CI_Controller {

    public function index()
    {
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->Model_barang->detail_barang($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function export($id) {
        // $barang = $this->Model_barang->tampil_data_barang_by_id($id);
        $barang = $this->Model_barang->get_data($id);
        $ruang = $this->Model_barang->getData_Ruang($id);
        $nama; $kode;

        foreach($ruang->result_array() as $row ) {
            $nama = $row['uraian_ruang'];
            $kode = $row['kode_ruang'];
        }
 
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
        $pdf->MultiCell(100,0,'NAMA RUANGAN : '.$nama,0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(70,0,'KODE RUANGAN : '.$kode,0,'L');
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

/* End of file Dashboard_akhir.php */

?>