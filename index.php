<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biodata</title>
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
    .dark-theme {
        background-color: #121212;
        color: #ffffff;
    }
    .dark-theme .bg-light {
        background-color: #333 !important;
    }
    .dark-theme .bg-primary {
        background-color: #164a7a !important;
    }
    .dark-theme .bg-danger-subtle {
        background-color: #0b52ea !important;
    }
    .dark-theme .navbar, .dark-theme .card, .dark-theme footer {
        background-color: #333;
    }
    

    .dark-theme .navbar-light .navbar-brand, 
    .dark-theme .navbar-light .nav-link {
      background-color: #333;
        color: #ffffff !important; 
    }
    .dark-theme .navbar-light .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 30 30'%3E%3Cpath stroke='white' stroke-width='2' d='M5 7h20M5 15h20M5 23h20'/%3E%3C/svg%3E");
    }

    .dark-theme .card-text, .dark-theme .card-title, .dark-theme h1, .dark-theme h2, .dark-theme h4 {
        color: #ffffff;
    }
</style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
          <a class="navbar-brand" href="#">Profil Windah Basudara</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
              
              <li class="nav-item">
                <a class="nav-link" href="#hero">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#artikel">Artikel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#galeri">Galeri</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#about me">About Me</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="login.php" target="_blank">Login</a>
              </li>
              <li class="nav-item">
                <button class="nav-link" onclick="dark()" class="btn btn-link p-0"><i class="bi bi-moon-fill"></i></button>
              </li>
              <li class="nav-item">
                <button class="nav-link" onclick="light()" class="btn btn-link p-0"><i class="bi bi-brightness-high-fill"></i></button>
              </li>
            </ul>
          </div>
              
        </div>
      </nav>

        <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start" >
            <div class="container">
                <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                    <img src="img/foto3.jpg" class="img-fluid" width="300">
                    <div> 
                        <h1 class="fw-bold display-4">Profil Windah Basudara</h1>
                        <h4 class="lead display-6">Kehidupan Masa Kecil, Awal Karir hingga Kesuksesannya</h4>
                            <h6>
                                <span id="tanggal"></span>
                                <span id="jam"></span>
                            </h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- article begin -->
<section id="artikel" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Artikel</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

<section id="galeri" class="text-center p-5 bg-danger-subtle">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">Galeri</h1>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $sql = "SELECT * FROM galeri ORDER BY tanggal DESC"; // Pastikan nama tabel Anda benar
                $hasil = $conn->query($sql);
                $first = true; // Untuk menandai item pertama

                while($row = $hasil->fetch_assoc()) {
                ?>
                    <div class="carousel-item <?php if ($first) { echo 'active'; $first = false; } ?>">
                        <div class="col">
                            <div class="card h-100">
                                <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="..." />
                                <div class="card-footer">
                                    <small class="text-body-secondary">
                                        <?= $row["tanggal"] ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

        <section id="schedule" class="text-center p-5">
          <div class="container">
            <h1 class="fw-bold display-4 pb-3">Schedule</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-sm-end">
              <div class="col">
              <div class="card text mb-3 md-4" style="max-width: 18rem;">
                <div class="card-header bg-danger text-light">SENIN</div>
                <div class="card-body">
                  <p class="card-text">Basis Data<br>10.20-12.00 | H5.12</p>
                  <hr>
                  <p class="card-text">Rancangan Perangkat Lunak <br> 12.00-15.00 | H5.9</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text mb-3" style="max-width: 18rem;">
                <div class="card-header bg-danger text-light ">SELASA</div>
                <div class="card-body">
                  <p class="card-text">Pendidikan Kewarganegaran <br>8.40-10.20 | E.Aula</p>
                  <hr>
                  <p class="card-text">Basis Data <br>10.20-12.00 | D3.J</p>
                </div>
              </div>
            </div>
              <div class="col">
              <div class="card textmb-3" style="max-width: 18rem;">
                <div class="card-header bg-danger text-light">RABU</div>
                <div class="card-body">
                  <p class="card-text">PBW <br>10.20-12.00 | D2.J</p>
                  <hr>
                  <p class="card-text">Sistem operasi <br>12.00-15.00 | h4.9</p>
                </div>
              </div>
              </div>
              <div class="col">
              <div class="card text mb-3" style="max-width: 18rem;">
                <div class="card-header bg-danger text-light">KAMIS</div>
                <div class="card-body">
                  <p class="card-text">Sistem Infotmasi<br>9.30-12.00 | h5.4</p>
                  
                  <hr>
                  <p class="card-text">Logika Informatika<br>12.00-15.00 | h4.5</p>
                  
                </div>
              </div>
              </div>
              <div class="col">
              <div class="card text mb-3" style="max-width: 18rem;">
                <div class="card-header bg-danger text-light">JUMAT</div>
                <div class="card-body">
                  <p class="card-text">Probabilitas dan statistika <br> 12.00-15.00 | h4.9</p>
                </div>
              </div>
              </div>
              <div class="col">
              <div class="card text mb-3" style="max-width: 18rem;">
                <div class="card-header bg-danger text-light">SABTU</div>
                <div class="card-body ">
                  <p class="card-text">FREEE <br></p>
                </div>
              </div>
              </div>

            </div>
            

        </section>
        <section id="about me" class="text-center p-5 bg-danger-subtle text-sm-start" >
          <div class="container">
              <div class="d-sm-flex  align-items-center mp-5">
                  <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxASEBAQEhIQDxAPDxAPDxAQEBAPDw4QFREWGBURFRUYHSggGBolGxUTIjEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGi0lICYtLSstKy0tLS0tLS0tLS0tLS0tLS0tLS0rLS0tLS0tKy0rLS0tLS0tLS0rLS0tLS0rK//AABEIAKgBLAMBIgACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAAAAgEDBAUGB//EADwQAAICAQIDBgMFBwMEAwAAAAABAhEDEiEEBTEGIkFRYXETgZEyUqGxwQcjQmLR4fAUcqIVM5KyJEOC/8QAGgEBAAMBAQEAAAAAAAAAAAAAAAECBQQDBv/EACkRAQACAgIBAwMEAwEAAAAAAAABEQIDBCESBTFRIjJBEyNhcTOBkRT/2gAMAwEAAhEDEQA/AN8BFhZ8szUgAAAAAAAAAEpkAESZMkQlMBhkKCAcCDF5hzHFhjqySq+i6yl7L9SYiZmoIi2TOSSbbSSVtt0kvNs0mbtTg/8Ar/eL7zlog/Z02/pXqcpzfns87m9WnB0rUnDanTp959PqaSGFzi5aXoT2c20vfSamj0+4vN746fl6ry7mmPNtHaSW8XTr2a2ZnHjWLNPG1KEZ4/FTU1hTV1cXV770ZGHtJxOOaf8Aqcq9JTXEw9peRGz06b+mSdHw9cYpz3Je1EMsUsumMumuDvG36/d+f1Ogs4NmnPXNZQ8JxmPcMUlsgpEIBEmEmKyYgArJbFCYArGYjYSAIsNQEgRqDUBICtkAOQ2KBIyQITArQmwsAFAsLABQLCwAUCyUyAEwUcBUxkyqqUMIY3HcfHCtU9oeMulP3LY4zlNQmO2Pz/m64fE57am9Mb33afh8jzDj+Y5M+S8k241cm62XntsvYu7X83ebJd9LpeC9Ea3kPLcnE5VijdNrU/Kjc4vHjVjc+7s06qZOXLq0whFyilsk3pjT2VdW/Ft+bMxf6nu/u5OKaajpq37Ueo9nuzHD8PFJR1S21Slu2zpoYI19mP0R0fq/DsjQ8K4nFKb1ZYR1tPvZm2o/7IfZ282YmXgsbX27q3cYP6J/oe7cXyDhpvVPFBv2NdxXZLgZp3hitv4bjX0J/V+T/wA8/Lw6EpYrnjc0vHZ6JfXr9Dsex3a69PD52220sU6vf7kn+TMjtJ2HUFKfDPVXXHNJ7fyvzOBz4NCU1aqWmS6OMl/iPPbhjuxqXht0/iXuJDZz3YjnEuI4bvvVkxS+HKXjJUnGT9a2+RvzC2YThlOMs7KKmgK2S2KUQAYCthaA2JIlyFAAAiwJAiwskSAthYoMAgChkgRYWQJAiwsCQIsLAkCLJsAJTIAEmJEGsilTxOe7c8V8Phm73m1jUGrjK3ds31nBftA47LviniksTlcMlqpUum3Tr47nRxdflsh6a4uXFPh3J+FdW/D5HpH7N+XKMJTreTq35HE8Lli4taVSTSXyXVnp3ZfhJY8WKL2Xw4yl5tvc3c/Zqafd1uKeNJXJLw3dGfhcfB2vO7NJk4eM1Wnw6t0a+GKeKXddJ9d7POIiHRcy7PwMbNE12TPKGLXbkjRz5nxc3WNKn5qx1KfZteKw9X4HkPbnhljzZNKSjlqXtLxZ6pDPnS/eJetHnH7RGpSjJeq+fkThFS8ttTiv/Zbtj4n/AH41fsn/AFO5s4L9luOeniZt9xyxwS/nSbb+kondmRzP8ssjd94BsiyGcryFiyYSYoWgCsmxZMmAALYWWDALYWAxDYoEBrCxQFjJAWwsqGAWwsBgFsLAYBbCwGJsTUTqAsAQmwijHJftF4ZywY5JLuZN3Xepp+PkdW2YPOODWfDPFdaqp1dNM9dOfhnGS+E1LzPknBOeSMdqnOMfa2kz2zheC1RtPS6SW1pV5HmHI+BePPGL+1h4iUciTvStOqD+aaPXeXZE0jcznyqmvojpoON7LZp9OJ4pNttvG1Db7tKtjccBylYovebtRSjKWumlvLU7dv3o3sYKjB47LTpb+foRXT1iOy8VCLw6aNNx/BZtLeDIsbUY6FpuOra3k6trr0r5m6zxfw78+j8Cvl0tSfn4oikzFuVxf9Q2+MsWTVep4nKOn2Uv6/I5rt3y5rh5TreOSMvk4tP9D1XPiX4HEdvEnw2Re35iJm1M8fpaD9my/wDiZH58TOvX93jX6HWHlfK+Ky4caUZZYL7T0ylGNvx+iN1wHafLja+JJ5cbdSUt5xXnGXX5O/kcfI4meWU5wydmuZmZd0K2LGSaTTtNJprxT6MLM2nikVsGxWyaE2K2BDZIAFshgOFiAA9kahQAbUGoUAMiwsSwsrQewsSwsUHsLEsLFB7CxLCxQeySuybFB7JsrCyA7ZDkI2K2SMDLgcc88iVxy44KT2WmeOfddeNqUvojp+V56+ia8DnOY8ToxuXgpQT9FKcU/wAzb8I7UWn4Gtxc5yw7/DT4mUzjTo5cb3fE5/m8uNTccMcbcqk3k16Uvu3HozIfFKG8nSXn0stXMsaacskF0ezs6od8Of43nPHafhwwylkj1TlpgvPvNdDc9neYZp/bh8PTFKVO46/JS8V6mW+Owu6yRle+ztFb45Lbbdbb7MmUTDY8RxG39+hwfbbiYvDNN7WlXm7ujoOK4p0/0OA7ccUljhFt6nPVFfe2ad/VERHby2T012Lmi6aXp28d68dq+nkVSwRam1sta9NnNGnjnMiPF91r1T/5Lc9cYiHDT0jkMr4XBfhjjH/x2/QzzVdnJ3wuB+cW/k5M2TkYG375/txZe6SBbIcjzQbUK2LYrYD2Fiag1APYWJqI1APYWJqDUA9hYmoNQGQAlhZWg4CWAoOAgCg4CAKDgJYCg5DYpDZNBtQkmQ2Y3E8XCH2pJenWX0ROMX7LY4zlNRDG7QY3Phs8V1eKbVdbStV9CexnO1mwQbfeglGf+5Lc1vG88e6xxr+aW/4GHym8UfjKrnNtpJRTV77LbrZqcXDLDGYyhp8fRs1xeUU9Mx44TpuMZ10TVr8TRZezvB/Gdw+FO7WlzUJxvwitl8jI5DzmE0oppPrXib/iuCx5o1KMZL1V/Q6senXEw5biOy2B7qbg/OLywdV6v8g5fybFCMmsmfJTqLlPur2S8PVm4fZnGt7lJfdlOen6XQcc4Yoq2opfJImZWnx/EMHisqpKOyrdt+B5n2rySz8Q3CpRxrRFXTvxf+eR0faDm7lrhjaez3XscvwEfysQjHV+pNNPOMo/aTj7qgeTuv5fmdXCO25XLluCTTlji6d0ripejS6k+Sc/TsvfGXVdn+7wvDJ9Vgx2veKf6mxs0uDmqW0otJfd3S+RsMHEwn9mSfp0a+Ri7deUZTMwxd3G265vLFlWQxLIbPFznchbIsUBgsUAGsLFABrCxbIsB7DUJYWBeBGoNQEgRqDUBIEag1ASBGoNQEk2LqBMCTF4vmGPHs3cvux3fz8jW855o03jg6racl1v7qNRGJ16eL5ReTX4fpk7Y8s+obLiubZJfZ7i9PtfU1z3JaJgjvw144R1De08XXqisYUZY7P2NlylKeHT5OS/X9TEcSOW8b8DI9X/AG57S9PKR6U8+VhePSOKwzxTUotpp2mjc8v7azgqyK68Ve5kZ8cZxtU01afWzRcXy70DNnp0PE9u4fwRk/fajmuYc4zcRK26V7RXh7lGPlu5veW8sSVtCUNR/pXHHKT66JN/T+pg8BDZ+xt+0nGR2wQ3d3OvCukTDwYqil49SYd3E1/k2NfgOiEt/dfiiZLa/Iq0aSh4SaaadNdGvAWJMmJi1MsIyipbzl/G61T2mv8AkvNGYcqsji011TtfI6eM7Sa6NJr2ZmcnTGE3D5f1HixpzvH2k9i2Q2I2c0M09hYgFqDhZXYWKFlhZXYWRQssLK7CxQyLCxbCyoawsWybAmybFsLAawsWwsBrKeM4jRjnP7q29+i/EsswOdb4JLzcfzRfXF5RD104+WzHGflz0Vd+f9SyD/IrxbNeqr5ommm/W6Nuqh9rhFQu8AgREtlipJppqStea9GF4kjRTmxpovFaJhExbBwcXlwuovVG94vp8vIz49oMTVTjKL8aWpGPlgYssCfhuS4tvFuemy/67gjuozl8kvzZj8T2gzZFpxR+GvvXcv7GJHhUZOPEkR0rjxO+1PCcLW73b3bM6CFiyyId2GMYxUEzdL8nZKlt7kzKcb29iqxsbGk/zK29xJz39k2yUTKZz76XlRvuUZ9WKK8YXH5eH4M5vDK3fvI2fIM3elH7y1L3X9n+Bz8nDywZHqmHlpv4b2yLIFbMx80YBLCwHASwsBwEsLAcBLCwMmwsrsLKCywsrsLAssLK7CwLLCyuwsCyzX86lWNLzml+DMyzV8/n3If77+i/ue2iL2Q6uFF78f7am+vnF2ixyTp+llc+urw8Spurj/8AqPt5Gy+xumVil3UXcPkpdE6dpu9v8ZiYpbF0HswmrWuVtvzYshYsmZKSTMfJHxLmVyCsiErLIlDVFkWEWsHTK2yEyKSeRVqosKsviRSfwXLk3XkY0p9f5nv7Irzz3XkMof8Ak/Dy9CaeU5XNLYvuyfnsvct4TLoyRf3Wk/bxKqtqPhC3L1kIn4/5uRlFxTy34eWM4uwshsxuCy6scH/Kk/dbfoX2Y2UVNPkM8fHKYNYWLYWVUTYWRYWBIEWFgSBFhYF4C6g1FAwC6g1AMAuoNQTRgF1EWTSaOannsv8Atr0m/wD1NnZpedT/AHkF5Q/Ns6OLj+5Du9Pi9+LCwu1Xlt8hMsdvVdPbyC6d+HR/1Gc1dPZ+D8Ga76qO4Rhlt7ls5d33ZruIg7W70qSl876GXKTbXoEY5d0yohJlamdByXlWBqU+MyS4bG6hjuM45JS+25q/DTGSVppua9BEK7NuOvG5aTHgnOSjCMpyptRhGU5NJW3S3pIobOy4btJg4WOSHDYtey+Dnko9/MrbcrxqTUXJ1b6Y4rSrbOb4VYp5pZOIbx4m55JQwx785N2sULtQturl0XmW8XNjzPecoqGHjjFvvTWOP3mm0vkjfcFLlmSOOE3lw/CpPJDvR4q9LlKXdk09Skkm4pKS32obB2iyY7XD4uG4KNd3Rihm4hx/nz5lJy+iCXaPNPbiIcPxcfLPw+FSS/lyYoxnF+tl41y4NvO856uGBzzgY4MqxRnHKvhwbnGSnFzqppNLpqUjWN7mz5lwWJxfEcNq+FcVmwzevLwsm6Vy/jxt7Kfns96vVzZ5zFS1ONtjPXE3ZlMTiJbFVleWXgQ9ZyVOSte5drrf+J/Z9P5jFy/qXRjVuTSvq31+SCkT2sS0wfnLZfqxX0X+eAk8ltJbJLa+rGyfw+zCMu4brkubuyj5O17M2Oo57lebTkXlLuv59DfWZnJwrO3zXO1+O2f5PqDUJYWc9OOj6g1CWFiij6g1CWFiij6g1CWFiimTYaiQKlosLAAWiwskAIsLJACLNDzWX72XpS/AAOrife0/S4/e/wBMef5lU3/C+j6Py9CANN9Ept3pe/k/MyIsACsMnh8bnKMUrlKSjFebbpI2U+Dx4uNhjz5IZcccsf8AUzwucrjGX7yFtKWrZr59QAtDm5GUxNfxK/tF2lzcU9LfwuHg/wBxw0KjiwxqoqlSk68feqNJKVeKfzIA9mDYnJd1xtd3vJyT39NvwCOd3vuAEoZ3A8TPDOOX4cnBpxayQlHFxGKVxnj1NU00pLbo1fgUcwwLHNxTbhJRnik+ssU1cW/WnT9UwA88+4t38DKYzr5ZvKeL4TDNZMmDJmqcGoyyqUYU71JJQ1O0tpWqsyeL5ty+OPPDh8GZOcG4/E0OMMnw82NSeqcn9nMns0tULSXQAKw6t2vu7n/rjM09vmWxS6tJJeC6v3ACjpwm5NFNv1Y+SXefoqAA9Z9i4nudHgy6oqXmvx8SQOTlR9Nsb1LGPGJPYWAHAxxYWAAFhYAAWFgAH//Z" 
                  class="rounded-circle"  width="300" height="300">
                  <div class="card-body text-lg-start mp-4 md"> 
                      <h5>A11.2023.15217</h5>
                      <h1 class="fw-bold display-6">Bisono Priyambodo Murwiko</h1>
                      <h4 class="lead display-6">Progam studi Teknik Informatika</h4>
                      <a href="https://dinus.ac.id/" class="fw-bold text-dark">Universitas Dian Nuswantoro </a>
                         
                  </div>
              </div>
          </div>
      </section>

        <footer class ="text-center p-5">
            <a href="https://www.instagram.com/windahbasudara"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
           <a href="https://www.instagram.com/windahbasudara"><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a> 
            <a href="https://www.youtube.com/@WindahBasudara"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
            <div>
              Bisono Priyambodo Murwiko &copy; 2023
            </div>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()",1000);

        function tampilWaktu(){
            var waktu= new Date();
            var bulan = waktu.getMonth() +1;

            setTimeout("tampilWaktu()",1000)
            document.getElementById("tanggal").innerHTML =
            waktu.getDate() + "/" + bulan +"/" +waktu.getFullYear();
            document.getElementById("jam").innerHTML =
            waktu.getHours() +
            ":" +
            waktu.getMinutes() +
            ":" +
            waktu.getSeconds();
        }

    </script>
    <script type="text/javascript">
      function dark() {
        document.body.classList.add('dark-theme');
    }
    function light() {
        document.body.classList.remove('dark-theme');
    }
        
    </script>
  </body>
</html>