<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard dengan Sidebar</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="../images/logo1.png" alt="logo">
            <h2>SIPANGAN</h2>
        </div>
        <ul class="links">
            <h4>Sidebar</h4>
            <li>
                <span class="material-symbols-outlined">meeting_room</span>
                <a href="#">Ruangan</a>
            </li>
            <li>
                <span class="material-symbols-outlined">library_add</span>
                <a href="ruanganterpilih.html">Ruangan Terpilih</a>
            </li>
            <li>
                <span class="material-symbols-outlined">chat</span>
                <a href="#">Komentar</a>
            </li>
            <li>
                <span class="material-symbols-outlined">Logout</span>
                <a href="Main.html">Logout</a>
            </li>
            <hr>
        </ul>
    </aside>
    <div class="menu-atas">
        <ul>
            <li><a href="#">Tentang</a></li>
            <li><a href="#">Kontak</a></li>
            <li><a href="#">Bantuan</a></li>
            <li><a href="profile.php">JOHN DOE</a></li>
        </ul>
    </div>
    <div class="hapus"></div>
    <div class="judul">
        <div class="isi-judul"></div>
    </div>
    
    <div class="glass-rectangle">
        <div class="glass-rectangle-content">
            <div class="halaman1">
                <div class="isi-halaman">
                    <div class="isi">
                        <div class="artikel">
                            <h3>Data Ruangan Digunakan</h3>
                            <hr>
                            <form method="post" action="">
                                <table class="tabel">
                                    <tr class="tr1">
                                        <td width="100px"><b>Kode Ruangan</b></td>
                                        <td>:</td>
                                        <td>RUANG001</td>
                                    </tr>
                                    <tr class="tr1">
                                        <td><b>Lantai</b></td>
                                        <td>:</td>
                                        <td>1</td>
                                    </tr>
                                    <tr class="tr1">
                                        <td><b>Gedung</b></td>
                                        <td>:</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="tr1">
                                        <td><b>Fasilitas</b></td>
                                        <td>:</td>
                                        <td>Proyektor, AC</td>
                                    </tr>
                                    <tr class="tr1">
                                        <td colspan="3">
                                            <a href="ruangan_terpilih.html?aksi=aktif&id_ruangan=1" onclick="return confirm('Anda yakin akan meninggalkan ruangan RUANG001?')" class="a">Tinggalkan Ruangan</a>
                                        </td>
                                        <input type="hidden" name="id_ruangan" value="1">
                                        <input type="hidden" name="tanggal" value="2023-05-16">
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea class="kotak" name="komentar" placeholder="Saran/Komentar Tentang Ruangan" required=""></textarea>
                                            <div align="align-items-center">
                                                <button type="submit" name="simpan" class="kotak" style="width: 110px;">Komentar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
