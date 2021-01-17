<div class="container-fluid">
    <h3>Edit Data Kendaraan</h3>

    <?php foreach($kendaraan as $kn) : ?>
        <form method="post" action="<?= base_url()?>Admin/Data_kendaraan/update" enctype="multipart/form-data">

        <div class="form-group">
        <input type="hidden" name="id_kendaraan" class="form-control" value="<?php echo $kn->id_kendaraan ?>">
            <label>Kode Kendaraan</label>
            <input type="text" name="kode_kendaraan" class="form-control" value="<?php echo $kn->kode_kendaraan?>">
        </div>


        <div class="form-group">
            <label>Merk Kendaraan</label>
            <input type="text" name="merk_kendaraan" class="form-control" value="<?php echo $kn->merk_kendaraan?>">
        </div>

        <div class="form-group">
            <label>Tipe Kendaraan</label>
            <input type="text" name="tipe_kendaraan" class="form-control" value="<?php echo $kn->tipe_kendaraan?>">
        </div>
        

        <div class="form-group">
            <label>Kategori Kendaraan</label>
            <input type="text" name="kategori_kendaraan" class="form-control" value="<?php echo $kn->kategori_kendaraan?>">
        </div>

        <div class="form-group">
            <label>Nomor Plat Kendaraan</label>
            <input type="text" name="nopol" class="form-control" value="<?php echo $kn->nopol?>">
        </div>

        <div class="form-group">
            <label>Penanggung Jawab Kendaraan</label>
            <input type="text" name="pj_kendaraan" class="form-control" value="<?php echo $kn->pj_kendaraan?>">
        </div>

        <div class="form-group">
            <label>No HP/Whatsapp</label>
            <input type="text" name="no_tlp" class="form-control" value="<?php echo $kn->no_tlp?>">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $kn->alamat?>">
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" value="<?php echo $kn->foto?>">
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo $kn->keterangan?>">
        </div>
        
        <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?> 
</div>