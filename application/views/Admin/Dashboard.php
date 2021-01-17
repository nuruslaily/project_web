<div class="container">
<div class="container-fluid">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/BERANDAA.png') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/bpsmlg.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/fotobersama.jpg') ?>" class="d-block w-100" alt="...">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
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

<div class="card">
    <div class="card-header">Info Admin</div>
    </div>
    <div class="card-body">

        <?php foreach($admin as $ad): ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url().'/uploads/'.$ad->foto_admin ?>" class="card-img-top">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td><strong><?php echo $ad->nama ?></strong></td>
                    </tr>

                    <tr>
                        <td>NIP</td>
                        <td><strong><?php echo $ad->nip ?></strong></td>
                    </tr>

                    <tr>
                        <td>Username</td>
                        <td><strong><?php echo $ad->username ?></strong></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><strong><?php echo $ad->password ?></strong></td>
                    </tr>
                </table>
                <tr>
                <!-- <button class="btn btn-sm btn-primary mb-3 mt-3" data-toggle="modal" data-target="#Tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>
  <a href="<?= base_url('Admin/Data_barang/export') ?>" class="btn btn-sm btn-secondary mb-3 mt-3" target="_blank"><i class="fas fa-print fa-sm"></i>Export</a> -->
        <td><?php echo anchor('Admin/Dashboard_admin/edit_profil/' .$ad->id,'<div class="btn btn-success"></i><i class="fa fa-edit"></i>Edit Profile</div>')?>
        <a href="<?= base_url() ?>pengelola/changePassword" class="btn btn-warning">Change Password</a></td></tr>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>


</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Ubah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin akan mengubah data ini?
        </div>
        <div class="modal-footer">
          <form action="<?php echo base_url() . 'Admin/Dashboard_admin/update/' ?>" method="post">
            <input type="hidden" name="id" id="id">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-danger" id="updateAja">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>