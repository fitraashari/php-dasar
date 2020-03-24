<h3>Daftar Peserta</h3>
    <form action="" method="post" class="form">
        <div class="form-group row">
        <div class="col-sm-4">
        <input type="text" name="keyword" class="keyword form-control" id="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" >
        </div>
        <button type="submit" name="cari" class="tombolcr" id="tombolcr">Cari</button>
        <img src="img/loading.gif" class="loading" width="40px">
    </div>
    </form>
    <div id="container">
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
            <td class="aksi"><a class="btn btn-primary" href="index.php?page=ubah&id=<?= $row["id"];?>"><i class="fa fa-edit"></i></a>  <a class="btn btn-danger" href='hapus.php?id=<?= $row["id"]; ?>' onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a></td>
            <td><img src="img/<?= $row["photo"]; ?>" alt=""></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["category"]; ?></td>
            <td><?= $row["gender"]?></td>
            <td><span class="badge badge-<?php echo ($row["status"]=="Pending")? 'danger':'success'; ?>"><?= $row["status"]; ?></td>
        </tr>
        <?php $i++ ?>
<?php endforeach; ?>

    </table>