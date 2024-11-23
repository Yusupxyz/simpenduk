<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>EDIT PENGGUNA</b></h4><hr>
      </div>

      <div class="box-body">

        <?php
if ($this->session->flashdata('sukses')) {
	?>
         <div class="callout callout-success">
          <p style="font-size:14px">
            <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
          </p>
        </div>
        <?php
}
        ?>

        <?php
        if ($this->session->flashdata('error')) {
            ?>
        <div class="callout callout-danger">
            <p style="font-size:14px">
                <i class="fa fa-check"></i> <?php echo $this->session->flashdata('error'); ?>
            </p>
        </div>
        <?php
        }
        ?>

        <form action="<?php echo base_url('pengguna/proses_edit'); ?>" method="post">
            <div class="form-group">
          <label>Nama<span style="color:red;">*</span></label>
          <input type="hidden" name="id" value="<?php echo $pengguna->id; ?>"  class="form-control" />
          <input type="text" name="nama" value="<?php echo $pengguna->nama_petugas; ?>"  class="form-control" />
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip" value="<?php echo $pengguna->nip; ?>"  class="form-control" />
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" value="<?php echo $pengguna->username; ?>"  class="form-control" />
        </div>
        <div class="form-group">
          <label>Level<span style="color:red;">*</span></label>
          <select name="level" class="form-control">
          <option value="admin" <?php if($pengguna->level == "admin"){ echo "selected"; } ?>>Admin</option>
          <option value="kepaladesa" <?php if($pengguna->level == "kepaladesa"){ echo "selected"; } ?>>Kepala Desa</option>
          <option value="sekretaris" <?php if($pengguna->level == "sekretaris"){ echo "selected"; } ?>>Sekretaris Desa</option>
          </select>
        </div>
        <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control"  />
          </div>
          <div class="form-group">
              <label>Ulangi Password</label>
              <input type="password" name="ulangi_password" class="form-control"  />
          </div>
        <div class="form-group">
          <button class="btn btn-success">Simpan</button>
          <a href="<?php echo base_url('pengguna'); ?>" class="btn btn-danger">Batal</a>
        </div>
      </form>
    </div>
  </div>
</section>
</div>
