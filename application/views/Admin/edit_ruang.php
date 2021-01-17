<div class="container-fluid">
    <h3>Edit Data Ruang</h3>

    <?php foreach($ruang as $rg) : ?>
        <form method="post" action="<?= base_url()?>Admin/Data_ruang/update">

        <div class="form-group">
        <input type="hidden" name="id_ruang" class="form-control" value="<?php echo $rg->id_ruang ?>">
            <label>Kode Ruang</label>
            <input type="text" name="kode_ruang" class="form-control" value="<?php echo $rg->kode_ruang?>">
            <small class="form-text text-muted">Silahkan mengisi kode ruang </small>
        </div>

        <div class="form-group">
            <label>Uraian Ruang</label>
            <input type="text" name="uraian_ruang" class="form-control" value="<?php echo $rg->uraian_ruang?>">
            <small class="form-text text-muted">Silahkan mengisi nama ruang</small>
        </div>

        <div class="form-group">
            <label>Lantai Ruang</label>
            <input type="text" name="lantai" class="form-control" value="<?php echo $rg->lantai?>">
            <small class="form-text text-muted">Lantai ruangan</small>
        </div>

        
        <div class="form-group">
            <label>Penanggung Jawab Ruang</label>
            <input type="text" name="pj_ruang" class="form-control" value="<?php echo $rg->pj_ruang?>">
        </div>

        <div class="form-group">
            <label>No Telepon/Whatsapp Penanggung Jawab Ruang</label>
            <input type="text" name="no_tlp" class="form-control" value="<?php echo $rg->no_tlp?>">
        </div>

        <div class="form-group">
            <label>Alamat Penanggung Jawab Ruang</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $rg->alamat?>">
        </div>

        <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?> 
</div>