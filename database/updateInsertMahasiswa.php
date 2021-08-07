<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<?php
include "config.php";
$page = $_GET['page'];

//NRP (4 digit awal prefix nrp prodi, 2 digit tahun terima)

$nama = $_POST['nama'];
$thnTerima = $_POST['thnTerima'];
$tglLahir = $_POST['tglLahir'];
$email = $_POST['email'] ?? '';
$ipk = $_POST['ipk'];
$idProdi = $_POST['idProdi'];
$nrp = "";
// echo $nama.'-'.$thnTerima.'-'.$tglLahir.'-'.$email.'-'.$ipk.'-'.$idProdi;

//select prodi prefix nrp
$stmt = $conn->prepare("SELECT PrefixNrp FROM prodi WHERE IdProdi=?");
$stmt->bind_param('i', $idProdi);
$stmt->execute();
$res = $stmt->get_result();
if($row = $res->fetch_assoc()) {
    $prefix = $row['PrefixNrp'];
    $cari = '%'.$prefix.substr($thnTerima,2).'%';
    $stmt = $conn->prepare("SELECT Nrp FROM mahasiswa WHERE Nrp LIKE ? ORDER BY Nrp DESC LIMIT 1");
    $stmt->bind_param('s', $cari);
    $stmt->execute();
    $res = $stmt->get_result();
    // print_r($res);
    if($row = $res->fetch_assoc()){
        if(!empty($row['Nrp']) AND $row['Nrp']!="" AND $page=='tambah')$nrp = $row['Nrp']+1;
        else $nrp = $row['Nrp'];
    }
    else $nrp = $prefix.substr($thnTerima,2).'001';
    // echo $cari.'ok<br>';
    // echo $nrp;
    if($page!='ubah') {
        $query = "INSERT INTO mahasiswa VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssi', $nrp, $thnTerima, $nama, $tglLahir, $email, $ipk, $idProdi);
        $stmt->execute();
    }
    else {
        $query = "UPDATE mahasiswa SET Nrp=?, ThnTerima=?, Nama=?, TglLahir=?, Email=?, Ipk=?, IdProdi=? WHERE Nrp=? OR Nama=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssiss', $nrp, $thnTerima, $nama, $tglLahir, $email, $ipk, $idProdi, $nrp, $nama);
        $stmt->execute();
        //where NRP or name (assuming that there'd be NRP changes for a student if accidently input wrong prodi/thnterima)
    }

    // echo "Data Berhasil Ditambah/Diubah";

    echo "<script>
    alert('Data berhasil ditambah/diubah');
    window.location.href='../mahasiswa/index.php';
    </script>";

    // header('location: ../mahasiswa/index.php');
}


?>