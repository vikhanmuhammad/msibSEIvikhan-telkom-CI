<!DOCTYPE html>
<html>
<head>
    <title>Edit Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/editLokasi.css'); ?>">
</head>
<body>
    <h1>Edit Lokasi</h1>
    <form method="post" action="<?php echo site_url('beranda/update_lokasi'); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($lokasi['id']); ?>">

        <label for="namaLokasi">Nama Lokasi:</label>
        <input type="text" name="namaLokasi" id="namaLokasi" value="<?php echo htmlspecialchars($lokasi['namaLokasi']); ?>" required>
        <br><br>

        <label for="negara">Negara:</label>
        <input type="text" name="negara" id="negara" value="<?php echo htmlspecialchars($lokasi['negara']); ?>" required>
        <br><br>

        <label for="provinsi">Provinsi:</label>
        <input type="text" name="provinsi" id="provinsi" value="<?php echo htmlspecialchars($lokasi['provinsi']); ?>" required>
        <br><br>

        <label for="kota">Kota:</label>
        <input type="text" name="kota" id="kota" value="<?php echo htmlspecialchars($lokasi['kota']); ?>" required>
        <br><br>

        <button id="tombol_simpan" type="submit">Simpan</button>
        <button id="tombol_batal" type="button" onclick="window.location.href='<?php echo site_url('beranda'); ?>'">Batal</button>
    </form>
    
</body>
</html>
