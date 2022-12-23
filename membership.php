<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylemembership.css">
    <title>KESITA</title>
</head>
<body>
    <div class="container">
        <div class="col-1">
            <a href="index.php">
                <img src="images/logo.png" class="logo">
            </a>
            <ul>
                <li><img src="images/icon.png">Promo Event Bulanan.</li>
                <li><img src="images/icon.png">Diskon 30% Semua Produk & Merch.</li>
                <li><img src="images/icon.png">Include Donasi yang Disalurkan ke PeduliHutan.</li>
                <li><img src="images/icon.png">Dapat Mengumpulkan Point di Setiap Pembelian.</li>
                <li><img src="images/icon.png">Otomatis tergabung dalam komunitas dengan informasi yang menarik.</li>
                <li><img src="images/icon.png">Berkesempatan Mendapatkan Undian yang Menarik.</li>
            </ul>
        </div>
        <div class="col-2">
            <h2><img src="images/icon.png">Our Plans</h2>
            <form method="post" action="membership3.php">
                <label for="paid">
                    <input type="radio" name="plans" id="paid">
                    <span>RP. 50000<small>/bulan</small></span> 1 Bulan
                </label>
                <br>
                <p>YOUR NAME</p>
                <input type="text" name="nama" placeholder="Enter Your Name">
                <p>EMAIL ADDRESS</p>
                <input type="email" name="email" placeholder="Enter Your Email Id">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</body>
</html>