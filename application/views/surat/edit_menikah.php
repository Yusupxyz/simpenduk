<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <h4 style="text-align:center"><b>EDIT SURAT MENIKAH</b></h4><hr>
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

              <form action="<?php echo base_url('surat/menikah/edit'); ?>" method="post">

                <div class="card-body">
                  <div class="form-group">
                    <label>NIK</label>
                      <input type="hidden" name="id" class="form-control" required  value="<?php echo $menikah->id_menikah; ?>"/>
					  <select name="nik" class="form-control" id="nama"  required>
						<?php
foreach ($penduduk as $penduduk):
	if ($penduduk->nik == $menikah->nik) {
		?>
								<option value="<?php echo $penduduk->nik; ?>" selected><?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?></option>
							<?php
	} else {
		?>
							<option value="<?php echo $penduduk->nik; ?>"><?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?></option>
							<?php
	}
endforeach;
?>
					  </select>
                  </div>
                  <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" required value="<?php echo $menikah->no_surat; ?>" />
                  </div>
                  <div class="form-group">
                    <label>Tanda Tangan</label>
                      <select name="pejabat" class="form-control" required>
						<?php
foreach ($pejabat as $pejabat):
	if ($pejabat->id == $menikah->id_pejabat) {
		?>
							<option value="<?php echo $pejabat->id; ?>"><?php echo $pejabat->nama_petugas; ?></option>
							<?php
	} else {
		?>
							<option value="<?php echo $pejabat->id; ?>"><?php echo $pejabat->nama_petugas; ?></option>
							<?php
	}
endforeach;
?>
					  </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="edit_menikah" class="btn btn-success" value="Simpan">
                    <a href="<?php echo base_url('surat/menikah/'); ?>" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
