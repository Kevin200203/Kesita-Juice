<h2>Ubah Produk</h2>
<?php
$ambil= $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
    <div calss="form-group">
        <label >Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div>
        <label >Harga Produk</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div>
        <label >Ukuran (Ml)</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['ukuran']; ?>">
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskirpsi" class="form-control" rows="10">
            <?php echo $pecah['deskripsi_produk'] ?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto=$_FILES['foto']['tmp_name'];
    // jika foto diubah
    if (!empty($lokasifoto)){
        move_uploaded_file($lokasifoto, "../foto)produk/$namafoto");
        $koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', ukuran='$_POST[ukuran]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]'");
    }
    else 
    {
        move_uploaded_file($lokasifoto, "../foto/produk/$namafoto");
        $koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', ukuran='$_POST[ukuran]',  deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk';<script>";

}