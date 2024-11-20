<style type="text/css">
@media print and (width: 21cm) and (height: 33cm) {
    @page {
        margin: 1cm;
    }
}

.tabelku {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 2px;
}
</style>
<style type="text/css" media="print">
@page {
    size: portrait;
}
</style>
<img src="<?php echo base_url('assets/images/kop-surat.png'); ?>" width="100%" height="30%">
<br /><br /><br />
<center>
    <font size="5"><u><b>SURAT KETERANGAN TIDAK MAMPU</b></u></font><br />Nomor:
    <?php echo $sktm_kesehatan->no_surat; ?>
</center>
<br /><br /><br />
<font align="justify">
    Yang bertandatangan di bawah ini , 
    <?php 
        // Menentukan level berdasarkan jabatan
        if ($sktm_pendidikan->level == 'kepaladesa') {
            echo 'Kepala Desa';
        } elseif ($sktm_pendidikan->level == 'sekretaris') {
            echo 'Sekretaris Desa';
        } else {
            echo $sktm_pendidikan->level;
        }
    ?>  Penarukan Kecamatan DUSUN UTARA Kabupaten BARITO SELATAN Provinsi Jawa Barat
</font>
<table width="100%">
    <tr>
        <td width="20%">Nama</td>
        <td width="3%">:</td>
        <td width="77%"><?php echo $sktm_pendidikan->nama; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $sktm_pendidikan->jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo $sktm_pendidikan->tempat_lahir; ?>/<?= date('d F Y', strtotime($sktm_pendidikan->tanggal_lahir)); ?>
        </td>
    </tr>
    <?php
	$ayah = $this->db->query("SELECT * FROM penduduk WHERE nik='$sktm_pendidikan->nik_ayah'")->row();
	?>
    <tr>
        <td>Nama Orang Tua</td>
        <td>:</td>
        <td><?php echo $ayah->nama; ?></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $ayah->agama; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan Orang Tua</td>
        <td>:</td>
        <td><?php echo $ayah->pekerjaan; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $ayah->alamat; ?></td>
    </tr>
</table>
<br />
<font align="justify">
    Setelah diadakan penelitian hingga saat dikeluarkan surat keteranan ini, yang bersangkutan benar-benar keadaan
    sosial ekonominya tergolong <b><u>kurang mampu</u></b>.<br /><br />
    Demikian Surat Keterangan ini kami buat dan diberikan kepada yang berkepentingan untuk selanjutnya supaya
    dipergunakan sebagai persyaratan untuk mendapatkan <b>Bantuan Siswa Miskin (BSM)</b>
    <br /><br /><br />
</font>
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Penarukan, <?= date('d F Y', strtotime($sktm_pendidikan->tanggal_sktm_pendidikan)); ?></center>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <center>Kepala Desa Penarukan</center>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <center><b><u><?php echo $sktm_pendidikan->nama_petugas; ?></u></b></center>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <center>NIP. <?php echo $sktm_pendidikan->nip; ?></center>
        </td>
    </tr>
</table>
<script>
window.print();
</script>