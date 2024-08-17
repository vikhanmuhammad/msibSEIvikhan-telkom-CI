<!DOCTYPE html>
<html>
<head>
    <title>Tambah Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tambahLokasi.css'); ?>">
</head>
<body>
    <nav id="navbar">
        <div id="navbar-brand">PT. SEI</div>
        <div id="navbar-links">
            <button id="navbar-button" onclick="window.location.href='<?php echo site_url('beranda/index'); ?>'">Beranda</button>
            <div class="dropdown">
                <button id="navbar-button" class="dropdown-button">Tambah Data</button>
                <div class="dropdown-content">
                    <a href="<?php echo site_url('beranda/show_add_lokasi_form'); ?>">Tambah Lokasi Baru</a>
                    <a href="<?php echo site_url('beranda/show_add_proyek_form'); ?>">Tambah Proyek Baru</a>
                </div>
            </div>
        </div>
    </nav>
    <h1>Tambah Lokasi Baru</h1>
    <form action="<?php echo site_url('beranda/add_lokasi'); ?>" method="post">
        <label for="namaLokasi">Nama Lokasi:</label>
        <input type="text" id="namaLokasi" name="namaLokasi" required><br>

        <label for="negara">Negara:</label>
        <input type="text" id="negara" name="negara" required><br>

        <label for="provinsi">Provinsi:</label>
        <input type="text" id="provinsi" name="provinsi" required><br>

        <label for="kota">Kota:</label>
        <input type="text" id="kota" name="kota" required><br>

        <button id="tombol_submit" type="submit">Tambah</button>
        <button id="tombol_batal" type="button" onclick="window.location.href='<?php echo site_url('beranda'); ?>'">Batal</button>
    </form>
</body>
</html>
