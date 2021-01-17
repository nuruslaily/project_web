
<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/KENDARAAN.png') ?>" class="d-block w-100" alt="...">
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
    

    <div class="row text-center mt-3">
    <?php foreach ($kendaraan as $kn) : ?>

        <div class="card ml-3 mb-3" style="width: 16rem;">
        <img src="<?php echo base_url().'/uploads/'.$kn->foto ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title mb-1"><?php echo $kn->merk_kendaraan ?></h5>
            <h5 class="card-title mb-1"><?php echo $kn->tipe_kendaraan ?></h5>
            <h5 class="card-title mb-1"><?php echo $kn->nopol ?></h5>
        <?php echo anchor('Kendaraan/detail_kendaraan/' .$kn->id_kendaraan, '<div class="btn btn-sm btn-success">Detail</div>') ?>
        </div>
    </div>

  <?php endforeach; ?>

</div>
</div>


