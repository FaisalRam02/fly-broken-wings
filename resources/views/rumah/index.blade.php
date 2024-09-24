<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        html {
            scroll-behavior: smooth;
        }
        section {
            padding: 100px 0;
            height: 100vh;
            color: white;
            text-align: center;
            background-size: cover;
            background-position: center;
        }
        #home {
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('https://images.alphacoders.com/136/thumb-1920-1367667.png');
        }
        #layanan {
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('https://images6.alphacoders.com/135/thumb-1920-1351258.png');
        }
        #pengecekan {
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('https://images6.alphacoders.com/970/thumb-1920-970138.jpg');
        }
        #about {
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('https://images5.alphacoders.com/478/thumb-1920-478544.png');
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            z-index: 1000;
        }
        .navbar.transparent {
            background: transparent;
            box-shadow: none;
        }
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: white !important; 
            transition: color 0.5s ease;
        }
        .navbar.scrolled .nav-link {
            color: black !important;
        }
        .masthead {
            background: rgba(0, 0, 0, 0.3);
            padding: 50px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-top: 150px;
            text-align: center;
            text-shadow: -1px 1px 0 #000, 1px 1px 0 #000, 1px -1px 0 #000, -1px -1px 0 #000;
        }
        .card {
            background-color: #333;
            color: white;
            border: none;
        }
        .card-body {
            text-align: left;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .serv-box-2 {
  overflow: hidden;
  position: relative;
  padding: 43px 30px 65px;
  width: 250px;
  height: 300px;
  background: #1d2434;
  color: #ffffff;
  transition: all 0.3s linear;
  -webkit-transition: all 0.3s linear;
  -moz-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  -ms-transition: all 0.3s linear;
}
.serv-box-2 {
  overflow: hidden;
  position: relative;
  padding: 43px 30px 65px;
  width: 100%;
  background: #1d2434;
  color: #ffffff;
  transition: all 0.3s linear;
  -webkit-transition: all 0.3s linear;
  -moz-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  -ms-transition: all 0.3s linear;
}
.serv-box-2 .big-number {
  position: absolute;
  left: -10px;
  top: 0;
  font-size: 100px;
  font-weight: 800;
  font-family: "Montserrat", sans-serif;
  line-height: 72px;
  color: #353c49;
  transition: all 0.3s linear;
  -webkit-transition: all 0.3s linear;
  -moz-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  -ms-transition: all 0.3s linear;
}
.serv-box-2 .icon-main {
  position: absolute;
  bottom: -88px;
  right: -88px;
  width: 188px;
  height: 188px;
  color: #fff;
  background: #0e1118;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  transition: all 0.3s linear;
  -webkit-transition: all 0.3s linear;
  -moz-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  -ms-transition: all 0.3s linear;
}
.serv-box-2 .icon-main i, .serv-box-2 .icon-main span, .serv-box-2 .icon-main img {
  position: absolute;
  top: 42px;
  left: 40px;
  font-size: 35px;
  line-height: 1;
}
.serv-box-2 .icon-main i:before, .serv-box-2 .icon-main span:before, .serv-box-2 .icon-main img:before {
  font-size: 35px;
}
.serv-box-2 .icon-main img {
  width: 35px;
}
.serv-box-2 .content-box {
  position: relative;
  z-index: 1;
}
.serv-box-2 .content-box h5 {
  line-height: 30px;
  color: #fff;
  margin-bottom: 10px;
  transition: all 0.3s linear;
  -webkit-transition: all 0.3s linear;
  -moz-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  -ms-transition: all 0.3s linear;
}
.serv-box-2 .content-box .btn-details {
  display: inline-block;
  margin-top: 30px;
}
.serv-box-2:hover {
  background: #fff;
  color: #6d6d6d;
  box-shadow: 15px 15px 38px 0 rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 15px 15px 38px 0 rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 15px 15px 38px 0 rgba(0, 0, 0, 0.1);
}
.serv-box-2:hover .big-number {
  color: #f4f6f6;
}
.serv-box-2:hover .icon-main {
  background: #F18123;
}
.serv-box-2:hover .content-box h5 {
  color: #1b1d21;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark transparent">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/darkweb.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#layanan">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pengecekan">pengecekan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home">
        <div class="container">
            <div class="masthead">
                <h1>💀</h1>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="bg-dark-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="ot-heading">
                    <span class="text-primary-light">Layanan</span>
                </div>
                <div class="space-20"></div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            foreach ($documents as $b) :
                $i++;
                $a = str_pad($i, 2, '0', STR_PAD_LEFT);
                $surats = $b['nama_surat'];
            ?>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-5">
                    <div class="serv-box-2 s2">
                        <span class="big-number"><?= $a; ?></span>
                        <div class="icon-main"><span class="flaticon-tablet"></span></div>
                        <div class="content-box">
                            <h5><?= $b['nama_surat']; ?></h5>
                            <div>Jika anda ingin membuat <?= $surats ?> klik tombol di bawah!</div>
                            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#createSuratModal">
                                Buat Surat
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Modal untuk Membuat Surat -->
<div class="modal fade" id="createSuratModal" tabindex="-1" aria-labelledby="createSuratModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSuratModalLabel">Buat Surat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('surat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="documents_id">Nama Surat</label>
                        <select name="documents_id" class="form-control" required>
                            <option value="">Pilih Surat</option>
                            @foreach($documents as $document)
                                <option value="{{ $document->id }}">{{ $document->nama_surat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_pengaju">Nama Pengaju</label>
                        <input type="text" class="form-control" name="nama_pengaju" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_diterima">Tanggal Dikirim</label>
                        <input type="date" class="form-control" name="tanggal_diterima" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Layanan Section -->
    <section id="pengecekan" class="bg-secondary text-light text-center">
        <div class="container">
            <h1>pengecekan</h1>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-secondary text-white text-center">
        <div class="container">
            <h1>About Us</h1>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary text-white text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Footer</h5>
                    <p>Isi footer disini</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Hubungi Kami</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="https://web.facebook.com/faram8" class="text-white">Facebook</a></li>
                        <li><a href="" class="text-white">WhatsApp</a></li>
                        <li><a href="" class="text-white">Instagram</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Kontak</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a class="text-white">faisalgaming12323@gmail.com</a></li>
                        <li><a class="text-white">085864173200</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright: <a class="text-white">YourWebsite.com</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
</body>
</html>
