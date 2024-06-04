<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LIHAT RUANGAN</title>
  <link rel="stylesheet" href="../style/slider.css" />
</head>

<body>
  <div class="container">
    <div class="slider">
      <div class="slides" style="--img: url('../images/laboratorium basda.png')">
        <div class="content">
          <h2>Laboratorium Basis Data</h2>
          <p>
            Lab Basis Data, berada di bagian dalam Fakultas Ilmu Komputer, cocok digunakan
            untuk kebutuhan Development Aplikasi Basis data dan kerja kelompok.
          </p>
          <br>
          <button onclick="window.location.href='mahasiswaPilih.php'">Pilih Ruangan</button>
        </div>
      </div>
      <div class="slides" style="--img: url('../images/A3.1.png')">
        <div class="content">
          <h2>RUANG A3.1</h2>
          <p>
            Ruangan ini berada di lantai 3 Fakultas Ilmu Komputer, dilengkapi dengan Smart TV,
            AC, dan papan tulis. Cocok untuk digunakan untuk acara dengan kapasitas 50 orang.
            <br>
            <button onclick="window.location.href='mahasiswaPilih.php'">Pilih Ruangan</button>
          </p>
        </div>
      </div>
      <div class="slides" style="--img: url('../images/A3.2.png')">
        <div class="content">
          <h2>RUANG A3.2</h2>
          <p>
            Ruangan ini berada di lantai 3 Fakultas Ilmu Komputer, dilengkapi dengan Smart TV,
            AC, dan papan tulis. Cocok untuk digunakan untuk acara dengan kapasitas 50 orang.
            <br>
            <button onclick="window.location.href='mahasiswaPilih.php'">Pilih Ruangan</button>
          </p>
        </div>
      </div>
      <div class="slides" style="--img: url('../images/digitalcreative.png')">
        <div class="content">
          <h2>Digital Creative</h2>
          <p>
            Ruangan Digital Creative Hub, cocok digunakan untuk creative brainstorming
          </p>
          <br>
          <button onclick="window.location.href='mahasiswaPilih.php'">Pilih Ruangan</button>
        </div>
      </div>
      <div class="slides" style="--img: url('../images/auditorium.png')">
        <div class="content">
          <h2>Auditorium</h2>
          <p>
            Ruangan ini berada di lantai 4 di dalam Fakultas Ilmu Komputer, dilengkapi dengan Smart TV,
            AC dan kurs. Cocok untuk digunakan untuk acara dengan kapasitas 50 orang.
          </p>
          <br>
          <button onclick="window.location.href='mahasiswaPilih.php'">Pilih Ruangan</button>
        </div>
      </div>
      <div class="slides" style="--img: url('../images/laboratorium GIS.png')">
        <div class="content">
          <h2>>Laboratorium GIS</h2>
          <p>
            Ruangan ini berada di lantai 2 di dalam Fakultas Ilmu Komputer, dilengkapi dengan banyak komputer dan menjadi server room.
            Cocok digunakan untuk membuat aplikasi GIS
          </p>
          <br>
          <button onclick="window.location.href='mahasiswaPilih.php'">Pilih Ruangan</button>
        </div>
      </div>
    </div>
    <div class="buttons">
      <span class="prev"></span>
      <span class="next"></span>
    </div>
  </div>

  <script>
    let prev = document.querySelector(".prev");
    let next = document.querySelector(".next");
    let slider = document.querySelector(".slider");

    next.addEventListener("click", function() {
      let slides = document.querySelectorAll(".slides");
      slider.appendChild(slides[0]);
    });
    prev.addEventListener("click", function() {
      let slides = document.querySelectorAll(".slides");
      slider.prepend(slides[slides.length - 1]);
    });
  </script>
</body>

</html>