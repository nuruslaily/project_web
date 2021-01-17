<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kendaraan extends CI_Controller {
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
        $data['kendaraan'] = $this->Model_kendaraan->tampil_data()->result();
        if ($this->input->post('keyword')){
            $data['kendaraan']=$this->Model_kendaraan->search();
        }
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Data_kendaraan', $data);
        $this->load->view('templates_admin/footer');
    }
    

    public function tambah_aksi(){
        
        $kode_kendaraan=$this->input->post('kode_kendaraan');
        $merk_kendaraan=$this->input->post('merk_kendaraan');
        $tipe_kendaraan=$this->input->post('tipe_kendaraan');
        $kategori_kendaraan=$this->input->post('kategori_kendaraan');
        $nopol=$this->input->post('nopol');
        $pj_kendaraan=$this->input->post('pj_kendaraan');
        $no_tlp=$this->input->post('no_tlp');
        $alamat=$this->input->post('alamat');
        $foto=$_FILES['foto']['name'];
        if ($foto=''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types']='jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Gambar Gagal Diupload! (Format Gambar:jpg/jpeg/png/gif)";
            }else{
                $foto=$this->upload->data('file_name');
            }
        }
        $keterangan=$this->input->post('keterangan');
        

        $data = array(
            'kode_kendaraan'=>$kode_kendaraan,
            'merk_kendaraan'=>$merk_kendaraan,
            'tipe_kendaraan'=>$tipe_kendaraan,
            'kategori_kendaraan'=>$kategori_kendaraan,
            'nopol'=>$nopol,
            'pj_kendaraan'=>$pj_kendaraan,
            'no_tlp'=>$no_tlp,
            'alamat'=>$alamat,
            'foto'=>$foto,
            'keterangan'=>$keterangan

        );

        $this->Model_kendaraan->tambah_kendaraan($data, 'tb_kendaraan');
        $this->session->set_flashdata('msg', 'Data Berhasil Di Tambahkan');
        redirect('Admin/Data_kendaraan/index');
        

    }

    public function edit($id){
        $where = array('id_kendaraan' =>$id);
        $data['kendaraan'] = $this->Model_kendaraan->tampil_data_kendaraan_by_id($id);
        $data['kendaraan'] = $this->Model_kendaraan->edit_kendaraan($where, 'tb_kendaraan')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/edit_kendaraan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id_kendaraan');
        $kode_kendaraan = $this->input->post('kode_kendaraan');
        $merk_kendaraan = $this->input->post('merk_kendaraan');
        $tipe_kendaraan = $this->input->post('tipe_kendaraan');
        $kategori_kendaraan = $this->input->post('kategori_kendaraan');
        $nopol = $this->input->post('nopol');
        $pj_kendaraan = $this->input->post('pj_kendaraan');
        $no_tlp=$this->input->post('no_tlp');
        $alamat=$this->input->post('alamat');
        $foto=$_FILES['foto']['name'];
        if ($foto=''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types']='jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Gambar Gagal Diupload! (Format Gambar:jpg/jpeg/png/gif)";
            }else{
                $foto=$this->upload->data('file_name');
            }
        }
        
        $keterangan = $this->input->post('keterangan');

        
        $data = array(
            'kode_kendaraan' => $kode_kendaraan,
            'merk_kendaraan' => $merk_kendaraan,
            'tipe_kendaraan' => $tipe_kendaraan,
            'kategori_kendaraan' => $kategori_kendaraan,
            'nopol' => $nopol,
            'pj_kendaraan' => $pj_kendaraan,
            'no_tlp'=>$no_tlp,
            'alamat'=>$alamat,
            'foto'=>$foto,
            'keterangan' => $keterangan
        );
        $where = array(
            'id_kendaraan' => $id
        );
        $this->Model_kendaraan->update_data($where,$data, 'tb_kendaraan');
        
        $this->session->set_flashdata('msg', 'Data Berhasil Di Update');
        redirect('Admin/Data_kendaraan/index');
        

    }

    public function detail_kendaraan($id_kendaraan)
    {
        $data['kendaraan'] = $this->Model_kendaraan->detail_kendaraan($id_kendaraan);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/detail_kendaraan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function hapus(){
        $id = $this->input->post('id_kendaraan');
        echo $id;
        $where = array('id_kendaraan' => $id);
        $this->Model_kendaraan->hapus_data($where, 'tb_kendaraan');

        $this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
        redirect('Admin/Data_kendaraan/index');
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

/* End of file Data_kendaraan.php */

?>