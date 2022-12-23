<h2>DATA PELANGGAN<h2>

<table class= "table tabel-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1 ?>
        <?php $ambil=$koneksi->query("SELECT * FROM tb_pelanggan"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td>
                <a href="" class="btn btn-danger">hapus</a>
            </td>
        </tr>
        <?php $nomor++ ?>
        <?php } ?>
    </tbody>
</table>