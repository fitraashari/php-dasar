<?php
$conn = mysqli_connect("localhost","root","","phpdasar");
function query($qr){
    global $conn;
    $result = mysqli_query($conn, $qr);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data){
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $category = htmlspecialchars($data["category"]);
    $gender = htmlspecialchars($data["gender"]);
    $status = htmlspecialchars($data["status"]);

    //upload gambar
    $photo = upload();
    if ( !$photo ){
        return false;
    }
    
    $qr = "INSERT INTO PESERTA VALUES
    ('','$name','$category','$gender','$status','$photo');";
mysqli_query($conn, $qr);

return mysqli_affected_rows($conn);

}
function upload(){
    $nmFile = $_FILES['photo']['name'];
    $ukFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    //cek gambar
    if( $error === 4){
        echo "<script>
        alert('Pilih gambar dulu');
        </script>";
        return false;
    }
    $eksten = ['jpg','jpeg','png'];
    $ekstenp = explode('.', $nmFile);
    $ekstenp = strtolower(end($ekstenp));
    
    if(!in_array($ekstenp,$eksten)){
        echo "<script>
        alert('Bukan Gambar');
        </script>";
        return false;
    }
    if( $ukFile > 1000000){
        echo "<script>
        alert('gambar terlalu besar');
        </script>";
        return false;
    }
    $nmFilenew = uniqid();
    $nmFilenew .= '.';
    $nmFilenew .= $ekstenp;
    //gambar siap di upload
    move_uploaded_file($tmpName, 'img/'.$nmFilenew);
    return $nmFilenew; 
}
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM peserta WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $category = htmlspecialchars($data["category"]);
    $gender = htmlspecialchars($data["gender"]);
    $status = htmlspecialchars($data["status"]);
    $photolm = htmlspecialchars($data["photolm"]);

    //cek apakah gambar baru
    if($_FILES['photo']['error'] === 4){
        $photo = $photolm;
    }else{
        $photo = upload();
    }

    $qr = "UPDATE peserta SET 
    name = '$name',
    category = '$category',
    gender = '$gender',
    status = '$status',
    photo = '$photo' WHERE id = $id";
mysqli_query($conn, $qr);

return mysqli_affected_rows($conn);
}
function cari($keyword){
    $qr = "SELECT * FROM peserta
    where name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR gender LIKE '%$keyword%' OR status LIKE '%$keyword%'";
    return query($qr);
}
function daftar($data){
    global $conn;

    $username = strtolower((stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username
    $res = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc(($res))){
        echo "<script>alert('Username yang dimasukkan sudah terdaftar')</script>";
        return false;
    }

 if( $password !== $password2){
     echo "<script>alert('Konfirmasi password salah')</script>";
     return false;
 }
 //enkripsi pass
 $password = password_hash($password, PASSWORD_DEFAULT);
 //md5 lemah
 //$password = md5($password);
//  var_dump($password); die;
mysqli_query($conn, "INSERT INTO user values ('','$username','$password','user')");
return mysqli_affected_rows($conn);
}
?>