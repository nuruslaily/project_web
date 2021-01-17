<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/KENDARAAN.png') ?>" class="d-block w-100" alt="...">
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

    <button class="btn btn-sm btn-primary mb-3 mt-3" data-toggle="modal" data-target="#Tambah_kendaraan" ><i class="fas fa-plus fa-sm"></i>Tambah Data Kendaraaan</button>
    <a href="<?= base_url('Admin/Data_kendaraan/export') ?>" class="btn btn-sm btn-secondary mb-3 mt-3" target="_blank"><i class="fas fa-print fa-sm"></i>Export</a>
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
    <th>Kode Kendaraan</th>
    <th>Merk Kendaraan</th>
    <th>Tipe Kendaraan</th>
    <th>Nomor Plat Kendaraan</th>
    <th>Penanggung Jawab Kendaraan</th>
    <th colspan="3">Aksi</th>
    </tr>

    <?php
    $no=1;
    foreach($kendaraan as $kn) : ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $kn->kode_kendaraan ?></td>
        <td><?php echo $kn->merk_kendaraan ?></td>
        <td><?php echo $kn->tipe_kendaraan ?></td>
        <td><?php echo $kn->nopol ?></td>
        <td><?php echo $kn->pj_kendaraan ?></td>

        <td><?php echo anchor('Admin/Data_kendaraan/detail_kendaraan/' .$kn->id_kendaraan,'<div class="btn btn-primary btn-sm"></i><i class="fas fa-search-plus"></i></div>')?></td>
        
        <td><?php echo anchor('Admin/Data_kendaraan/edit/' .$kn->id_kendaraan,'<div class="btn btn-success btn-sm"></i><i class="fa fa-edit"></i></div>')?></td>
        <td>
        <a data-id="<?= $kn->id_kendaraan ?>" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm deleteData">
                  <i class="fa fa-trash"></i>
                </a>
        </td>
        </tr>

    <?php endforeach;?>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="Tambah_kendaraan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'Admin/Data_kendaraan/tambah_aksi'?>" method="post" enctype="multipart/form-data">

            
            <div class="form-group">
            <label>Kode Kendaraan</label>
            <input type="text" name="kode_kendaraan" class="form-control">
            </div>

            <div class="form-group">
            <label>Merk Kendaraan</label>
            <input type="text" name="merk_kendaraan" class="form-control">
            </div>

            <div class="form-group">
            <label>Tipe Kendaraan</label>
            <input type="text" name="tipe_kendaraan" class="form-control">
            </div>

            <div class="form-group">
            <label>Kategori Kendaraan</label>
            <select class="form-control" name="kategori_kendaraan">
              <option>Mobil</option>
              <option>Bus</option>
              <option>Motor</option>
              <option>Lain-Lain</option>
            </select>
            </div>

            
            <div class="form-group">
            <label>Nomor Plat Kendaraan</label>
            <input type="text" name="nopol" class="form-control">
            </div>

            <div class="form-group">
            <label>Penanggung Jawab Kendaraan</label>
            <input type="text" name="pj_kendaraan" class="form-control">
            </div>

            <div class="form-group">
            <label>No HP/Whatsapp</label>
            <input type="text" name="no_tlp" class="form-control">
            </div>

            <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            </div>

            <div class="form-group">
            <label>Foto</label><br>
            <input type="file" name="foto" class="form-control">
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


<!-- konfirmasi hapus -->

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
          <form action="<?php echo base_url() . 'Admin/Data_kendaraan/hapus/' ?>" method="post">
            <input type="hidden" name="id_kendaraan" id="id_kendaraan">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-danger" id="hapusAja">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function() {

    $('.deleteData').click(function() {
      var ID = $(this).data('id');
      console.log(ID);
      $('#hapusAja').data('id', ID);
      $('#id_kendaraan').val(ID);
    });
  });
</script> 