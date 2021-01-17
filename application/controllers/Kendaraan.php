<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function index(){
        $data['kendaraan'] = $this->Model_kendaraan->tampil_data()->result();
        if ($this->input->post('keyword')){
            $data['kendaraan']=$this->Model_kendaraan->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Kendaraan', $data);
        $this->load->view('templates/footer');
    }

    public function detail_kendaraan($id_kendaraan)
    {
        $data['kendaraan'] = $this->Model_kendaraan->detail_kendaraan($id_kendaraan);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Detail_kendaraan', $data);
        $this->load->view('templates/footer');
    }

    public function export() {
        $kendaraan = $this->Model_kendaraan->tampil_data();

 
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
        $pdf->Cell(210, 10, "REKAP DAFTAR KENDARAAN", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);
        $pdf->ln(10);
        $pdf->SetFont('Times','B',11);
        $pdf->SetX(4);            
        $pdf->MultiCell(70,0,'NAMA UPB : BPS KOTA MALANG',0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(70,0,'KODE UPB : ',0,'L');    
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10, 10, "No", 1, 0, 'C');
        $pdf->Cell(35, 10, "Kode Kendaraan", 1, 0, 'C');
        $pdf->Cell(35, 10, "Merk Kendaraan", 1, 0, 'C');
        $pdf->Cell(35, 10, "Tipe Kendaraan", 1, 0, 'C');
        $pdf->Cell(25, 10, "Kategori", 1, 0, 'C');
        $pdf->Cell(25, 10, "Nopol", 1, 0, 'C');
        $pdf->Cell(40, 10, "PJ Kendaraan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach($kendaraan->result_array() as $k => $kn) {
            $this->addRow($pdf, $k, $kn);
        }
        $pdf->Output('Data Kendaraan.pdf'); 
    }

    private function addRow($pdf, $no, $k) {
        $pdf->Cell(10, 10, $no+1, 1, 0, '');
        $pdf->Cell(35, 10, $k['kode_kendaraan'], 1, 0, 'L');
        $pdf->Cell(35, 10, $k['merk_kendaraan'], 1, 0, 'L');
        $pdf->Cell(35, 10, $k['tipe_kendaraan'], 1, 0, 'L');
        $pdf->Cell(25, 10, $k['kategori_kendaraan'], 1, 0, 'L');
        $pdf->Cell(25, 10, $k['nopol'], 1, 0, 'L');
        $pdf->Cell(40, 10, $k['pj_kendaraan'], 1, 1, 'L');
    }


}

/* End of file Kendaraan.php */

?>