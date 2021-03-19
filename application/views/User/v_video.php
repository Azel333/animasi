<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Tanggal Upload</th>
      <th scope="col">Detail</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
        <?php
        $no =1;
        foreach($video as $row)
        {
          echo '<tr>';
          echo '<th scope="row">'.$no++.'</th>';
          echo '<td>'.$row->judul_video.'</td>';
          echo '<td>'.$row->deskripsi_video.'</td>';
          echo '<td>'.date('m/d/Y', $row->tgl_upload_video).'</td>';
          echo '<td><a href="'. base_url('index.php/video_saya/' . $row->id_video) .'" class="btn btn-primary btn-xs">
            <i class="fa fa-pencil"></i> Lihat Detail
          </a></td>';
          echo '<td>'.$row->cek.'</td>';
          echo '</tr>';
        }
        ?>
  </tbody>
</table>