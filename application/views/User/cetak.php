<!DOCTYPE html>
<html lang="en">
  <head>
      <link href="<?php echo base_url('asset/') ?>css/cetak.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Cetak Video</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?php echo base_url('asset/')?>img/logo.jpeg">
      </div>
      <h1>MOOV</h1>
      <?php
  $pod = $this->db->get_where('meta_user', ['id_meta' => $video['id_meta']])->row_array();
                ?>
      <div id="project">
        <div><span>NAMA</span> <?= $pod['nama_depan'].' '.$pod['nama_belakang'] ?></div>
        <div><span>USERNAME</span> <?= $user['username'] ?></div>
        <div><span>NO. TELP.</span> <?= $pod['nomor_hp'] ?></div>
        <div><span>EMAIL</span> <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></div>
        <div><span>TANGGAL</span> <?= date('Y-m-d'); ?></div>
      </div>
    </header>
    <main>
        
  <body>
      <table>
        <thead>
          <tr>
            <th class="service">JUDUL</th>
            <th class="desc">DESKRIPSI</th>
            <th>TANGGAL UPLOAD</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?= $video['judul_video'] ?></td>
            <td class="desc"><?= $video['deskripsi_video'] ?></td>
            <td class="unit"><?= $video['tgl_upload_video'] ?></td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>

<script type="text/javascript">
        window.print();
    </script>