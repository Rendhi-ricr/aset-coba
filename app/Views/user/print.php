<!DOCTYPE html>
<html>

<head>
    <title>Print Peminjaman</title>
    <style>
        @media print {

            /* Gaya khusus untuk tampilan cetak */
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h1>Daftar Peminjaman</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Asal</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Meminjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjaman as $peminjamanItem): ?>
                <tr>
                    <td><?= $peminjamanItem['nama_peminjam']; ?></td>
                    <td><?= $peminjamanItem['nama_aset']; ?></td>
                    <td><?= $peminjamanItem['jumlah_barang']; ?></td>
                    <td><?= $peminjamanItem['tanggal_meminjam']; ?></td>
                    <td><?= $peminjamanItem['tanggal_kembali']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button class="no-print" onclick="window.print()">Print</button>
</body>

</html>