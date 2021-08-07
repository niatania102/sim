<?php
include "config.php";
$nrp = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM mahasiswa");
$stmt->execute();
$res = $stmt->get_result();
while($row=$res->fetch_assoc()) {
    if(md5($row['Nrp'])==$nrp){
        $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE Nrp=?");
        $stmt->bind_param('s', $row['Nrp']);
        $stmt->execute();
        header('../mahasiswa/index.php');
    }
}
?>