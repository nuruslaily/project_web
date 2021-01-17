<div class="container">
<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/BARANG.png') ?>" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
<br>
<!-- sweet alert -->
    <?php
        
      if (!empty($this->session->flashdata('msg'))) {
      ?>
      <script>
      swal("Success!", "<?=$this->session->flashdata('msg')?>", "success");
      </script>
    <?php
    }
    ?>
  <!--  -->

  <button class="btn btn-sm btn-primary mb-3 mt-3" data-toggle="modal" data-target="#Tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>
  <a href="<?= base_url('Admin/Data_barang/export') ?>" class="btn btn-sm btn-secondary mb-3 mt-3" target="_blank"><i class="fas fa-print fa-sm"></i>Export</a>
  <div class="float-sm-right">
          <form action ="" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          </div>
  <table class="table table-bordered">
    <tr>
      <td>No</td>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Merk/Type</th>
      <th>Tahun Peroleh</th>
      <th>Jumlah Barang</th>
      <th>Satuan</th>
      <th>Penguasaan</th>
      <th>Ruang</th>
      <th colspan="3">Aksi</th>
    </tr>

    <?php
    $no = 1;
    foreach ($barang as $brg) : ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $brg->kode_barang ?></td>
        <td><?php echo $brg->nama_barang ?></td>
        <td><?php echo $brg->merk ?></td>
        <td><?php echo $brg->tahun_peroleh ?></td>
        <td><?php echo $brg->jumlah ?></td>
        <td><?php echo $brg->satuan ?></td>
        <td><?php echo $brg->penguasaan ?></td>
        <td><?php echo $brg->uraian_ruang ?></td>

        <td><?php echo anchor('Admin/Data_barang/detail_barang/' .$brg->id_barang,'<div class="btn btn-primary btn-sm"></i><i class="fas fa-search-plus"></i></div>')?></td>
        
        <td><?php echo anchor('Admin/Data_barang/edit/' . $brg->id_barang, '<div class="btn btn-success btn-sm"></i><i class="fa fa-edit"></i></div>') ?></td> 
        <td>
        <a data-id="<?= $brg->id_barang ?>" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm deleteData">
                  <i class="fa fa-trash"></i>
                </a>
        </td>
      </tr>

    <?php endforeach; ?>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="Tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'Admin/Data_barang/tambah_aksi' ?>" method="post" enctype="multipart/form-data">

         <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control">
          </div>

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
          </div>

          <div class="form-group">
            <label>Merk / Type</label>
            <input type="text" name="merk" class="form-control">
          </div>

          <div class="form-group">
            <label>Tahun Perihal</label>
            <input type="text" name="tahun_peroleh" class="form-control">
          </div>

          <div class="form-group">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control">
          </div>

          <div class="form-group">
            <label>Satuan</label>
            <select class="form-control" name="satuan">
              <option>Buah</option>
              <option>Unit</option>
            </select>
          </div>

          <div class="form-group">
            <label>Penguasaan</label>
            <select class="form-control" name="penguasaan">
            <option>-</option>
              <option>Milik Sendiri</option>
            </select>
          </div>

          <div class="form-group">
            <label>Ruang</label>
            <select class="form-control" name="id_ruang">
              <?php foreach ($ruang as $r) : ?>
                <option value="<?= $r['id_ruang'] ?>"><?= $r['uraian_ruang'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Keadaan</label>
            <select class="form-control" name="keadaan">
              <option>Baik</option>
              <option>Rusak Ringan</option>
              <option>Rusak Berat</option>
            </select>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
      </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin menghapus data ini?
        </div>
        <div class="modal-footer">
          <form action="<?php echo base_url() . 'Admin/Data_barang/hapus/' ?>" method="post">
            <input type="hidden" name="id_barang" id="id_barang">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-danger" id="hapusAja">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- konfirmasi hapus -->
  <script>
  $(document).ready(function() {

    $('.deleteData').click(function() {
      var ID = $(this).data('id');
      console.log(ID);
      $('#hapusAja').data('id', ID);
      $('#id_barang').val(ID);
    });
  });
</script> 
</div>