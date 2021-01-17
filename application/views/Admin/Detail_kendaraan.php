<div class="container-fluid">

    <div class="card">
    <div class="card-header">Detail Kendaraan</div>
    </div>
    <div class="card-body">

        <?php foreach($kendaraan as $kn): ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url().'/uploads/'.$kn->foto ?>" class="card-img-top">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td>Kode Kendaraan</td>
                        <td><strong><?php echo $kn->kode_kendaraan ?></strong></td>
                    </tr>

                    <tr>
                        <td>Merk Kendaraan</td>
                        <td><strong><?php echo $kn->merk_kendaraan ?></strong></td>
                    </tr>

                    <tr>
                        <td>Kategori</td>
                        <td><strong><?php echo $kn->kategori_kendaraan ?></strong></td>
                    </tr>

                    <tr>
                        <td>Nomor Plat Kendaraan</td>
                        <td><strong><?php echo $kn->nopol ?></strong></td>
                    </tr>

                    <tr>
                        <td>Penanggung Jawab Kendaraan</td>
                        <td><strong><?php echo $kn->pj_kendaraan ?></strong></td>
                    </tr>

                    <tr>
                        <td>No HP/Whatsapp</td>
                        <td><strong><?php echo $kn->no_tlp ?></strong></td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td><strong><?php echo $kn->alamat ?></strong></td>
                    </tr>
                    
                    <tr>
                        <td>Keterangan</td>
                        <td><strong><?php echo $kn->keterangan ?></strong></td>
                    </tr>
                </table>
                
                <a href="<?= base_url(); ?>Admin/Data_Kendaraan" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>