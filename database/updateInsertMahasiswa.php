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
        if(!empty($row['Nrp']) AND $row['Nrp']!="")$nrp = $row['Nrp']+1;
    }
    else $nrp = $prefix.substr($thnTerima,2).'001';
    // echo $cari.'ok<br>';
    // echo $nrp;
    if($page!='ubah')
    $query = "INSERT INTO mahasiswa VALUES (?,?,?,?,?,?,?)";
    else $query = "UPDATE mahasiswa SET Nrp=?, ThnTerima=?, Nama=?, TglLahir=?, Email=?, Ipk=?, IdProdi=? WHERE Nrp=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssi', $nrp, $thnTerima, $nama, $tglLahir, $email, $ipk, $idProdi);
    $stmt->execute();
    echo "Data Berhasil Ditambahkan";
}


?>