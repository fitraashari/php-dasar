<?php
sleep(1);
require '../functions.php';
// $qr ="SELECT * FROM peserta";
// $peserta = query($qr);
$keyword = $_GET['keyword'];
$peserta = cari($keyword)
//var_dump($peserta);
?>
    <table class="table table-hover" cellpadding="10" cellspacing=0>
        <thead>
        <tr>
            <th>No.</th>
            <th class="aksi">Aksi</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Category</th>
            <th>Gender</th>
            <th>Status</th>
        </tr></thead>
        <?php $i=1 ?>
        <?php foreach( $peserta as $row ):  ?>
        <tr>
            <td><?= $i; ?></td>
            <td><a class="btn btn-primary" href="ubah.php?id=<?= $row["id"];?>"><i class="fa fa-edit"></i></a>  <a class="btn btn-danger" href='hapus.php?id=<?= $row["id"]; ?>' onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a></td>
            <td><img src="img/<?= $row["photo"]; ?>" alt=""></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["category"]; ?></td>
            <td><?= $row["gender"]?></td>
            <td><span class="badge badge-<?php echo ($row["status"]=="Pending")? 'danger':'success'; ?>"><?= $row["status"]; ?></span></td>
        </tr>
        <?php $i++ ?>
<?php endforeach; ?>

    </table>