<div class="container-fluid">
    <h3>Edit Data user</h3>

    <?php foreach($user as $u) : ?>
        <form method="post" action="<?= base_url()?>Admin/Dashboard_admin/update" enctype="multipart/form-data">

        <div class="form-group">
        <input type="hidden" name="id" class="form-control" value="<?php echo $u->id ?>">
            <label>Nama user</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $u->nama?>">
            <small class="form-text text-muted">Silahkan mengisi nama admin </small>
        </div>

        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="<?php echo $u->nip?>">
            <small class="form-text text-muted">Silahkan mengisi nip admin</small>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $u->username?>">
            <small class="form-text text-muted">isi Username</small>
        </div>
 
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" value="<?php echo $u->password?>">
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto_admin" class="form-control" value="<?php echo $u->foto_admin?>">
        </div>

        <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?> 
</div>