<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$peserta = query("select * from peserta");

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="css/pdf.css">
</head>
<body><h1>Data Peserta</h1>
<table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>No.</th>
<th>Photo</th>
<th>Name</th>
<th>Category</th>
<th>Gender</th>
<th>Status</th>
</tr>';
$i=1;
foreach($peserta as $row){
    $html .= '<tr>
    <td>'.$i++.'</td>
    <td><img src="img/'.$row["photo"].'" alt=""></td>
    <td>'.$row["name"].'</td>
    <td>'.$row["category"].'</td>
    <td>'.$row["gender"].'</td>
    <td>'.$row["status"].'</td>
    </tr>';
}

$html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Data Peserta '.date('d-m-Y').'.pdf', 'I');
?>
