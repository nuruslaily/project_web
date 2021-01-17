<div class="container-fluid">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/IPDS.png') ?>" class="d-block w-100" alt="...">
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
<br>
<a href="<?php echo base_url();?>Dashboard_akhir/export/<?php echo '3';?>" class="btn btn-sm btn-secondary mb-3 mt-3" target="_blank"><i class="fas fa-print fa-sm"></i>Export</a>
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
      <th>Merk / Type</th>
      <th>Tahun Peroleh</th>
      <th>Jumlah</th>
      <th>Satuan</th>
      <th>Penguasaan</th>
      <th>Ruang</th>
      <th>Keadaan</th>
      <th>Keterangan</th>
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
        <td><?php echo $brg->keadaan ?></td>
        <td><?php echo $brg->keterangan ?></td>
      </tr>

    <?php endforeach; ?>
  </table>
</div>


