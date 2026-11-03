<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pelanggan - Apotek</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #fff0f8;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */

        .navbar {
            background: linear-gradient(
                90deg,
                #d63384,
                #f783ac
            );
        }

        .navbar-brand {
            font-weight: bold;
        }

        /* CONTAINER */

        .main-container {
            padding-top: 40px;
            padding-bottom: 50px;
        }

        /* CARD */

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        /* TITLE */

        .page-title {
            color: #d63384;
            font-weight: bold;
        }

        /* FORM */

        .form-control {
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #d63384;
            box-shadow: 0 0 0 0.2rem rgba(214, 51, 132, 0.15);
        }

        /* BUTTON */

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

        .btn-warning {
            color: white;
        }

        /* TABLE */

        .table thead th {
            background: #d63384;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #fff5fa;
        }

        /* BADGE */

        .total-data {
            background: #fce4ec;
            color: #d63384;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
        }

        /* FOOTER */

        footer {
            text-align: center;
            color: #777;
            padding: 20px;
        }

    </style>

</head>


<body>


<!-- ===================================================== -->
<!-- NAVBAR -->
<!-- ===================================================== -->

<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="/"
        >
            🏥 Apotek
        </a>

        <div>

            <a
                href="/"
                class="btn btn-light btn-sm me-2"
            >
                🏠 Dashboard
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


<!-- ===================================================== -->
<!-- MAIN -->
<!-- ===================================================== -->

<div class="container main-container">


    <!-- ================================================= -->
    <!-- JUDUL -->
    <!-- ================================================= -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title">
                👥 Data Pelanggan
            </h2>

            <p class="text-muted mb-0">
                Kelola data pelanggan apotek
            </p>

        </div>

        <div>

            <span class="total-data">

                Total:
                {{ count($pelanggan ?? []) }}
                pelanggan

            </span>

        </div>

    </div>


    <!-- ================================================= -->
    <!-- NOTIFIKASI SUKSES -->
    <!-- ================================================= -->

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >

            ✅ {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- ================================================= -->
    <!-- ERROR VALIDASI -->
    <!-- ================================================= -->

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- ================================================= -->
    <!-- FORM TAMBAH PELANGGAN -->
    <!-- ================================================= -->

    <div class="card mb-4">

        <div class="card-body p-4">

            <h4 class="mb-4 fw-bold">
                ➕ Tambah Data Pelanggan
            </h4>


            <form
                action="/pelanggan"
                method="POST"
            >

                @csrf


                <div class="row">


                    <!-- ID PELANGGAN -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label fw-bold">
                            ID Pelanggan
                        </label>

                        <input
                            type="text"
                            name="id_pelanggan"
                            class="form-control"
                            placeholder="Contoh: 002"
                            value="{{ old('id_pelanggan') }}"
                            required
                        >

                    </div>


                    <!-- NAMA -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label fw-bold">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Nama pelanggan"
                            value="{{ old('nama') }}"
                            required
                        >

                    </div>


                    <!-- ALAMAT -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label fw-bold">
                            Alamat
                        </label>

                        <input
                            type="text"
                            name="alamat"
                            class="form-control"
                            placeholder="Alamat pelanggan"
                            value="{{ old('alamat') }}"
                            required
                        >

                    </div>


                    <!-- NO HP -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label fw-bold">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            placeholder="08xxxxxxxxxx"
                            value="{{ old('no_hp') }}"
                            required
                        >

                    </div>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="btn btn-pink px-4"
                >

                    💾 Simpan Data

                </button>

            </form>

        </div>

    </div>


    <!-- ================================================= -->
    <!-- TABEL DATA -->
    <!-- ================================================= -->

    <div class="card">

        <div class="card-body p-4">


            <div class="d-flex justify-content-between align-items-center mb-3">

                <h4 class="fw-bold mb-0">
                    📋 Daftar Pelanggan
                </h4>

            </div>


            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                ID Pelanggan
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Alamat
                            </th>

                            <th>
                                No HP
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    @forelse($pelanggan ?? [] as $index => $item)


                        <tr>


                            <!-- NOMOR -->

                            <td class="text-center">
                                {{ $index + 1 }}
                            </td>


                            <!-- ID PELANGGAN -->

                            <td>
                                {{ $item->id_pelanggan }}
                            </td>


                            <!-- NAMA -->

                            <td>
                                {{ $item->nama }}
                            </td>


                            <!-- ALAMAT -->

                            <td>
                                {{ $item->alamat }}
                            </td>


                            <!-- NO HP -->

                            <td>
                                {{ $item->no_hp }}
                            </td>


                            <!-- AKSI -->

                            <td class="text-center">


                                <!-- EDIT -->

                                <a
                                    href="/pelanggan/{{ $item->id }}/edit"
                                    class="btn btn-warning btn-sm me-1"
                                >

                                    ✏️ Edit

                                </a>


                                <!-- HAPUS -->

                                <form
                                    action="/pelanggan/{{ $item->id }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data pelanggan ini?')"
                                    >

                                        🗑️ Hapus

                                    </button>

                                </form>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-4"
                            >

                                <div class="text-muted">

                                    📭 Belum ada data pelanggan.

                                </div>

                            </td>

                        </tr>


                    @endforelse


                    </tbody>

                </table>

            </div>

        </div>

    </div>


</div>


<!-- ===================================================== -->
<!-- FOOTER -->
<!-- ===================================================== -->

<footer>

    Sistem Informasi Apotek © 2026

</footer>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>