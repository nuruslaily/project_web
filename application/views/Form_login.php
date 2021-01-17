
<body class="bg-gradient-primary" style="background-image: url('<?= base_url() ?>assets/img/bg1.jpeg');">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center"><b>
                    <h1 class="h4 text-gray-900 mb-2">SIBARIS</h1>
                    <h1 class="h4 text-gray-900 mb-2">BADAN PUSAT STATISTIK</h1>
                    <h1 class="h4 text-gray-900 mb-4">KOTA MALANG</h1></b>
                  </div>
                  <div align="center" class="image-holder" >
                      <img width="150px" src="<?= base_url() ?>assets/img/bps.png" alt="">
                     
                  </div>  <br> 
                  <?php echo $this->session->flashdata('pesan') ?>
                  <form method="POST" action="<?php echo base_url('Auth/login')?>" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                      <?php echo form_error('username', '<div class="text-danger small ml-2">','</div>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                      <?php echo form_error('password', '<div class="text-danger small ml-2">','</div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary form_control btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('Dashboard_akhir')?>">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>