<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ruang extends CI_Controller {
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
    public function index(){
        $data['ruang'] = $this->Model_ruang->tampil_data()->result();
        if ($this->input->post('keyword')){
            $data['ruang']=$this->Model_ruang->search();
        }
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Data_ruang', $data);
        $this->load->view('templates_admin/footer');
    }
    

    public function edit($id){
        $where = array('id_ruang' =>$id);
        $data['ruang'] = $this->Model_ruang->tampil_data_ruang_by_id($id);
        $data['ruang'] = $this->Model_ruang->edit_ruang($where, 'tb_ruang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/edit_ruang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id_ruang');
        $kode_ruang = $this->input->post('kode_ruang');
        $uraian_ruang = $this->input->post('uraian_ruang');
        $lantai = $this->input->post('lantai');
        $pj_ruang = $this->input->post('pj_ruang');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');
        
        $data = array(
            'kode_ruang' => $kode_ruang,
            'uraian_ruang' => $uraian_ruang,
            'lantai' => $lantai,
            'pj_ruang' => $pj_ruang,
            'no_tlp' => $no_tlp,
            'alamat' => $alamat
        );
        $where = array(
            'id_ruang' => $id
        );
        $this->Model_ruang->update_data($where,$data, 'tb_ruang');
        
        $this->session->set_flashdata('msg', 'Data Berhasil Di Update');
        redirect('Admin/Data_ruang/index');
        

    }

    public function hapus($id){
        $where = array('id_ruang' => $id);
        $this->Model_ruang->hapus_data($where, 'tb_ruang');

        redirect('Admin/Data_ruang/index');
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
        $pdf->SetX(4);            
        $pdf->MultiCell(70,0,'BADAN PUSAT STATISTIK',0,'L');
        $pdf->SetX(4);   
        $pdf->MultiCell(70,0,'BADAN PUSAT STATISTIK',0,'L');
        $pdf->SetX(4);   
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
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10, 10, "No", 1, 0, 'C');
        $pdf->Cell(30, 10, "Kode Ruang", 1, 0, 'C');
        $pdf->Cell(49, 10, "Uraian Ruang", 1, 0, 'C');
        $pdf->Cell(30, 10, "Lantai Ruang", 1, 0, 'C');
        $pdf->Cell(45, 10, "Penanggung Jawab", 1, 0, 'C');
        $pdf->Cell(40, 10, "No Telepon", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
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
}

/* End of file Data_ruang.php */

?>