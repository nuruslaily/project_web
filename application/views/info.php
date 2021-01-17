
<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/RUANGAN.png') ?>" class="d-block w-100" alt="...">
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
<a href="<?= base_url('Ruangan/export') ?>" class="btn btn-sm btn-secondary mb-3 mt-3" target="_blank"><i class="fas fa-print fa-sm"></i>Export</a>
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

        </tr>

    <?php endforeach;?>
    </table>
</div>