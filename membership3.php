<?php
include "db_membership.php";
$name=$_REQUEST['nama'];
$alm=$_REQUEST['email'];

$mysqli="INSERT INTO tb_membership (Nama, Email ) VALUES('$name', '$alm')";
$result=mysqli_query($conn, $mysqli);

if($result){
    echo "<script type='text/javascript'>
        alert('Terimakasih telah bergabung bersama kami Di KESITA Juice.Silahkan melakukan pembayaran Rp. 50.000 ke BANK BRI  323-5849-2212 AN. KESITA JUICE dan otomatis anda telah berhasil untuk daftar!')
        </script>";
    echo "<script>location='index.php' ;</script>";
}else{
    echo "input gagal";
}
mysqli_close($conn);

?>