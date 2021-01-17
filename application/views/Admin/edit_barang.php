<div class="container-fluid">
    <h3>Edit Data Barang</h3>

    <?php foreach ($barang as $brg) : ?>
        <form method="post" action="<?= base_url() ?>Admin/Data_barang/update">

            <div class="form-group">
            <input type="hidden" name="id_barang" class="form-control" value="<?php echo $brg->id_barang ?>">
                <label>Kode Barang </label>
                <input type="text" name="kode_barang" class="form-control" value="<?php echo $brg->kode_barang ?>">
            </div>

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="<?php echo $brg->nama_barang ?>">
            </div>

            <div class="form-group">
                <label>Merk / Type </label>
                <input type="text" name="merk" class="form-control" value="<?php echo $brg->merk ?>">
            </div>

            <div class="form-group">
                <label>Tahun Peroleh </label>
                <input type="text" name="tahun_peroleh" class="form-control" value="<?php echo $brg->tahun_peroleh ?>">
            </div>

            <div class="form-group">
                <label>Jumlah Barang</label>
                <input type="text" name="jumlah" class="form-control" value="<?php echo $brg->jumlah ?>">
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <select class="form-control" name="satuan">
                    <option <?php if ($brg->satuan == "Buah") { ?>selected<?php } ?>>Buah</option>
                    <option <?php if ($brg->satuan == "Unit") { ?>selected<?php } ?>>Unit</option>
                </select>
            </div>

            <div class="form-group">
                <label>Penguasaan</label>
                <select class="form-control" name="penguasaan">
                    <option <?php if ($brg->penguasaan == "-") { ?>selected<?php } ?>>-</option>
                    <option <?php if ($brg->penguasaan == "Milik Sendiri") { ?>selected<?php } ?>>Milik Sendiri</option>
                </select>
            </div>

            <div class="form-group">
                <label>Ruang</label>
                <select class="form-control" name="id_ruang">
                    <?php foreach ($ruang as $r) { ?>
                        <option value="<?= $r['id_ruang'] ?>" <?php if ($r['id_ruang'] == $brg->id_ruang) { ?>selected<?php } ?>><?= $r['uraian_ruang'] ?></option>
                    <?php
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Keadaan</label>
                <select class="form-control" name="keadaan">
                    <option value="Baik" <?php if ($brg->keadaan == "Baik") { ?>selected<?php } ?>>Baik</option>
                    <option value="Rusak Ringan" <?php if ($brg->keadaan == "Rusak Ringan") { ?>selected<?php } ?>>Rusak Ringan</option>
                    <option value="Rusak Berat" <?php if ($brg->keadaan == "Rusak Berat") { ?>selected<?php } ?>>Rusak Berat</option>
                </select>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            </div>
            <a href="<?= base_url() ?>Admin/Data_barang" class="btn btn-danger btn-sm">Batalkan</a>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>