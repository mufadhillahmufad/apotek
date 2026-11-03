<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Apotek</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            margin: 0;
            background: #fff0f8;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #d63384, #f783ac);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .hero {
            background: linear-gradient(
                135deg,
                #d63384,
                #f783ac
            );

            color: white;

            border-radius: 25px;

            padding: 50px;

            margin-top: 40px;

            box-shadow: 0 10px 30px rgba(214, 51, 132, .2);
        }

        .hero h1 {
            font-weight: bold;
        }

        .menu-card {
            background: white;

            border: none;

            border-radius: 20px;

            padding: 30px;

            height: 100%;

            box-shadow: 0 5px 20px rgba(0,0,0,.08);

            transition: .3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);

            box-shadow: 0 10px 25px rgba(214,51,132,.18);
        }

        .icon {
            font-size: 50px;
        }

        .btn-pink {
            background: #d63384;

            color: white;

            border: none;

            border-radius: 10px;
        }

        .btn-pink:hover {
            background: #b02a6f;

            color: white;
        }

        footer {
            text-align: center;

            color: #777;

            padding: 30px;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark">

    <div class="container">

        <a
            href="/"
            class="navbar-brand"
        >
            🏥 Apotek
        </a>

        <div>

            <a
                href="/pelanggan"
                class="btn btn-light btn-sm me-2"
            >
                👥 Pelanggan
            </a>

            <a
                href="/staf"
                class="btn btn-light btn-sm me-2"
            >
                👨‍⚕️ Staf
            </a>

            <a
                href="/obat"
                class="btn btn-light btn-sm"
            >
                💊 Obat
            </a>

        </div>

    </div>

</nav>


<!-- CONTENT -->

<div class="container">


    <!-- HERO -->

    <div class="hero">

        <h1>
            Selamat Datang di Apotek 💊
        </h1>

        <p class="lead mt-3 mb-0">

            Sistem Informasi Apotek untuk mengelola
            data pelanggan, staf, dan obat dengan mudah.

        </p>

    </div>


    <!-- MENU -->

    <div class="row g-4 mt-2">


        <!-- PELANGGAN -->

        <div class="col-md-4">

            <div class="menu-card text-center">

                <div class="icon">
                    👥
                </div>

                <h4 class="fw-bold mt-3">
                    Data Pelanggan
                </h4>

                <p class="text-muted">

                    Mengelola data pelanggan
                    yang terdaftar di apotek.

                </p>

                <a
                    href="/pelanggan"
                    class="btn btn-pink px-4"
                >
                    Kelola Pelanggan
                </a>

            </div>

        </div>


        <!-- STAF -->

        <div class="col-md-4">

            <div class="menu-card text-center">

                <div class="icon">
                    👨‍⚕️
                </div>

                <h4 class="fw-bold mt-3">
                    Data Staf
                </h4>

                <p class="text-muted">

                    Mengelola data staf
                    dan pegawai apotek.

                </p>

                <a
                    href="/staf"
                    class="btn btn-pink px-4"
                >
                    Kelola Staf
                </a>

            </div>

        </div>


        <!-- OBAT -->

        <div class="col-md-4">

            <div class="menu-card text-center">

                <div class="icon">
                    💊
                </div>

                <h4 class="fw-bold mt-3">
                    Data Obat
                </h4>

                <p class="text-muted">

                    Mengelola stok dan
                    tanggal kadaluarsa obat.

                </p>

                <a
                    href="/obat"
                    class="btn btn-pink px-4"
                >
                    Kelola Obat
                </a>

            </div>

        </div>


    </div>


</div>


<footer>

    Sistem Informasi Apotek © 2026

</footer>


</body>

</html>