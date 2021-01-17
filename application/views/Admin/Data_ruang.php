<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/RUANG.png') ?>" class="d-block w-100" alt="...">
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

<a href="<?= base_url('Admin/Data_ruang/export') ?>" class="btn btn-sm btn-secondary mb-3 mt-3" target="_blank"><i class="fas fa-print fa-sm"></i>Export</a>
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
    <th>Kode Ruang</th>
    <th>Uraian Ruang</th>
    <th>Lantai Ruang</th>
    <th>Penanggung Jawab Ruang</th>
    <th>No Telepon/Whatsapp</th>
    <th>Alamat</th>
    <th>Aksi</th>
    </tr>

    <?php
    $no=1;
    foreach($ruang as $rg) : ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $rg->kode_ruang ?></td>
        <td><?php echo $rg->uraian_ruang ?></td>
        <td><?php echo $rg->lantai ?></td>
        <td><?php echo $rg->pj_ruang ?></td>
        <td><?php echo $rg->no_tlp ?></td>
        <td><?php echo $rg->alamat ?></td>

        <td><?php echo anchor('Admin/Data_ruang/edit/' .$rg->id_ruang,'<div class="btn btn-success btn-sm"></i><i class="fa fa-edit"></i></div>')?></td>
        </tr>

    <?php endforeach;?>
    </table>
</div>



<!-- Modal -->
<!-- <div class="modal fade" id="Tambah_ruang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'Admin/Data_ruang/tambah_aksi'?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
            <label>Kode ruang</label>
            <input type="text" name="kode_ruang" class="form-control">
            </div>

            <div class="form-group">
            <label>Uraian Ruang</label>
            <input type="text" name="uraian_ruang" class="form-control">
            </div>

            <div class="form-group">
            <label>Lantai Ruang</label>
            <input type="text" name="lantai" class="form-control">
            </div>

            <div class="form-group">
            <label>pj_ruang</label>
            <input type="text" name="pj_ruang" class="form-control">
            </div>

            <div class="form-group">
            <label>No Telepon/Whatsapp</label>
            <input type="text" name="no_tlp" class="form-control">
            </div>

            <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            </div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
      </div>
      </form>

    </div>
  </div>
</div> -->