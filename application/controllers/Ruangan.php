<?php

class Ruangan extends CI_Controller {

    public function Lobby()
    {
        $data['barang'] = $this->Model_barang->tampil_data_barang();
        $data['barang'] = $this->Model_ruangan->data_lobby();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lobby', $data);
        $this->load->view('templates/footer');
    }

    public function export() {
        $ruang = $this->Model_ruang->tampil_data();

 
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
        $pdf->MultiCell(70,0,'BADAN PUSAT STATISTIK',0,'L');
        $pdf->MultiCell(70,0,'BADAN PUSAT STATISTIK',0,'L');
        $pdf->MultiCell(70,0,'BPS PROVINSI JAWA TIMUR',0,'L');
        $pdf->ln(10);
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(210, 10, "REKAP DAFTAR RUANGAN", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);
        $pdf->ln(10);
        $pdf->SetFont('Times','B',11);
        $pdf->SetX(4);            
        $pdf->MultiCell(70,0,'NAMA UPB : BPS KOTA MALANG',0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(70,0,'KODE UPB : ',0,'L'); 
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10, 10, "No", 1, 0, 'C');
        $pdf->Cell(30, 10, "Kode Ruang", 1, 0, 'C');
        $pdf->Cell(49, 10, "Uraian Ruang", 1, 0, 'C');
        $pdf->Cell(30, 10, "Lantai Ruang", 1, 0, 'C');
        $pdf->Cell(45, 10, "Penanggung Jawab", 1, 0, 'C');
        $pdf->Cell(40, 10, "No Telepon", 1, 1, 'C');
        $pdf->SetFont('Times', '', 12);
        foreach($ruang->result_array() as $r => $rg) {
            $this->addRow($pdf, $r, $rg);
        }
        $pdf->Output('Data Ruang.pdf'); 
    }

    private function addRow($pdf, $no, $r) {
        $pdf->Cell(10, 10, $no+1, 1, 0, '');
        $pdf->Cell(30, 10, $r['kode_ruang'], 1, 0, 'L');
        $pdf->Cell(49, 10, $r['uraian_ruang'], 1, 0, 'L');
        $pdf->Cell(30, 10, $r['lantai'], 1, 0, 'L');
        $pdf->Cell(45, 10, $r['pj_ruang'], 1, 0, 'L');
        $pdf->Cell(40, 10, $r['no_tlp'], 1, 1, 'L');
    }

    public function Perpustakaan()
    {
        $data['barang'] = $this->Model_ruangan->data_perpustakaan();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perpustakaan', $data);
        $this->load->view('templates/footer');
    }

    public function Tehnis()
    {
        $data['barang'] = $this->Model_ruangan->data_tehnis();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tehnis', $data);
        $this->load->view('templates/footer');
    }

    public function Ipds()
    {
        $data['barang'] = $this->Model_ruangan->data_ipds();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('ipds', $data);
        $this->load->view('templates/footer');
    }

    public function Tu()
    {
        $data['barang'] = $this->Model_ruangan->data_tu();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tu', $data);
        $this->load->view('templates/footer');
    }

    public function Kepala()
    {
        $data['barang'] = $this->Model_ruangan->data_kepala();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kepala', $data);
        $this->load->view('templates/footer');
    }

    public function Rapat()
    {
        $data['barang'] = $this->Model_ruangan->data_rapat();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('rapat', $data);
        $this->load->view('templates/footer');
    }

    public function Ksk()
    {
        $data['barang'] = $this->Model_ruangan->data_ksk();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('ksk', $data);
        $this->load->view('templates/footer');
    }

    public function Gudang()
    {
        $data['barang'] = $this->Model_ruangan->data_gudang();
        if ($this->input->post('keyword')){
            $data['barang']=$this->Model_barang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('gudang', $data);
        $this->load->view('templates/footer');
    }

    public function Info()
    {
        $data['ruang'] = $this->Model_ruang->tampil_data()->result();
        if ($this->input->post('keyword')){
            $data['ruang']=$this->Model_ruang->search();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('info', $data);
        $this->load->view('templates/footer');
    }

}

?>