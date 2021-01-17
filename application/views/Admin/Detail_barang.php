<div class="container-fluid">

    <div class="card">
    <div class="card-header">Detail barang</div>
    </div>
    <div class="card-body">

        <?php foreach($barang as $brg): ?>
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td>Kode barang</td>
                        <td><strong><?php echo $brg->kode_barang ?></strong></td>
                    </tr>

                    <tr>
                        <td>Nama barang</td>
                        <td><strong><?php echo $brg->nama_barang ?></strong></td>
                    </tr>

                    <tr>
                        <td>Merk barang</td>
                        <td><strong><?php echo $brg->merk ?></strong></td>
                    </tr>

                    <tr>
                        <td>Tahun Peroleh</td>
                        <td><strong><?php echo $brg->tahun_peroleh ?></strong></td>
                    </tr>

                    <tr>
                        <td>Jumlah</td>
                        <td><strong><?php echo $brg->jumlah ?></strong></td>
                    </tr>

                    <tr>
                        <td>Satuan</td>
                        <td><strong><?php echo $brg->satuan ?></strong></td>
                    </tr>

                    <tr>
                        <td>Penguasaan</td>
                        <td><strong><?php echo $brg->penguasaan ?></strong></td>
                    </tr>

                    <tr>
                        <td>Tanggal Penambahan</td>
                        <td><strong><?php echo $brg->created ?></strong></td>
                    </tr>

                    <tr>
                        <td>Tanggal Perubahan</td>
                        <td><strong><?php echo $brg->modified ?></strong></td>
                    </tr>

                    <tr>
                        <td>Keadaan</td>
                        <td><strong><?php echo $brg->keadaan ?></strong></td>
                    </tr>
                    
                    <tr>
                        <td>Keterangan</td>
                        <td><strong><?php echo $brg->keterangan ?></strong></td>
                    </tr>
                </table>
                
                <a href="<?= base_url(); ?>Admin/Data_barang" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>