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
$nrp = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM mahasiswa");
$stmt->execute();
$res = $stmt->get_result();
while($row=$res->fetch_assoc()) {
    if(md5($row['Nrp'])==$nrp){
        // $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE Nrp=?");
        // $stmt->bind_param('s', $row['Nrp']);
        // $stmt->execute();

        //work but ain't so pretty
        // echo "<script>
        // alert('Data berhasil dihapus');
        // window.location.href='../mahasiswa/index.php';
        // </script>";

        //did work but somehow can't go to index page
        // echo '<script>
        //     setTimeout(function() {
        //         swal({
        //             title: "Congratulations!",
        //             text: "Data berhasil dihapus!",
        //             type: "success"
        //         }, function() {
        //             window.location.href = "coba.php";
        //             console.log("The Ok Button was clicked.");
        //         });
        //     }, 1000);
        // </script>';


        echo '<script>
        $(document).ready(function() {
            swal({
              title: "Success",
               text: "Data telah dihapus",
                type: "success"
              },
              function(){
                window.location.href = "coba.php";
            });
            });
        </script>';

        // header('location: ../mahasiswa/index.php');
    }
}
?>