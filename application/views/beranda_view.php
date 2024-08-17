<!DOCTYPE html>
<html>
<head>
    <title>Daftar Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/beranda.css'); ?>">
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

    <div id="judul-halaman">
        <h1>Daftar Lokasi & Proyek PT. SEI</h1>
    </div>


    <h2>Daftar Lokasi</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
                <th>Negara</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lokasi)) : ?>
                <?php foreach ($lokasi as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['namaLokasi']); ?></td>
                        <td><?php echo htmlspecialchars($item['negara']); ?></td>
                        <td><?php echo htmlspecialchars($item['provinsi']); ?></td>
                        <td><?php echo htmlspecialchars($item['kota']); ?></td>
                        <td>
                            <a href="<?php echo site_url('beranda/edit_lokasi/' . $item['id']); ?>">
                                <button class="action-button" id="tombol_edit">Edit</button>
                            </a>
                            <a href="<?php echo site_url('beranda/delete_lokasi/' . $item['id']); ?>" onclick="return confirm('Yakin ingin menghapus lokasi ini?');">
                                <button class="action-button" id="tombol_hapus">Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Daftar Proyek</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Proyek</th>
                <th>Client</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Pimpinan Proyek</th>
                <th>Keterangan</th>
                <th>ID Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($proyek)) : ?>
                <?php foreach ($proyek as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['namaProyek']); ?></td>
                        <td><?php echo htmlspecialchars($item['client']); ?></td>
                        <td><?php echo htmlspecialchars($item['tglMulai']); ?></td>
                        <td><?php echo htmlspecialchars($item['tglSelesai']); ?></td>
                        <td><?php echo htmlspecialchars($item['pimpinanProyek']); ?></td>
                        <td><?php echo htmlspecialchars($item['keterangan']); ?></td>
                        <td><?php echo htmlspecialchars($item['lokasiId']); ?></td>
                        <td>
                            <a href="<?php echo site_url('beranda/edit_proyek/' . $item['id']); ?>">
                                <button class="action-button" id="tombol_edit">Edit</button>
                            </a>
                            <a href="<?php echo site_url('beranda/delete_proyek/' . $item['id']); ?>" onclick="return confirm('Yakin ingin menghapus proyek ini?');">
                                <button class="action-button" id="tombol_hapus">Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if (isset($error_message) && $error_message): ?>
        <script>
            alert("<?php echo $error_message; ?>");
        </script>
    <?php endif; ?>
</body>
</html>
