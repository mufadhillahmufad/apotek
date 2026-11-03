<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Data Staf - Apotek</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #fff0f8;

            font-family: Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(
                90deg,
                #d63384,
                #f783ac
            );
        }

        .card {
            border: none;

            border-radius: 18px;

            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        .main-container {
            padding-top: 40px;

            padding-bottom: 50px;
        }

        .page-title {
            color: #d63384;

            font-weight: bold;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #d63384;

            box-shadow:
                0 0 0 .2rem
                rgba(214,51,132,.15);
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

        .table thead th {
            background: #d63384;

            color: white;

            text-align: center;

            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .total-data {
            background: #fce4ec;

            color: #d63384;

            padding: 8px 15px;

            border-radius: 20px;

            font-weight: bold;
        }

        footer {
            text-align: center;

            color: #777;

            padding: 20px;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark">

    <div class="container">

        <a
            href="/"
            class="navbar-brand fw-bold"
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
                href="/pelanggan"
                class="btn btn-light btn-sm me-2"
            >
                👥 Pelanggan
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


<div class="container main-container">


    <!-- JUDUL -->

    <div
        class="d-flex justify-content-between align-items-center mb-4"
    >

        <div>

            <h2 class="page-title">
                👨‍⚕️ Data Staf Apotek
            </h2>

            <p class="text-muted mb-0">
                Kelola data staf apotek
            </p>

        </div>

        <span class="total-data">

            Total:
            {{ count($staf ?? []) }}
            staf

        </span>

    </div>


    <!-- SUCCESS -->

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
        >

            ✅ {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- ERROR -->

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- FORM -->

    <div class="card mb-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                ➕ Tambah Data Staf
            </h4>


            <form
                action="/staf"
                method="POST"
            >

                @csrf


                <div class="row">


                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            ID Staff
                        </label>

                        <input
                            type="text"
                            name="id_staff"
                            class="form-control"
                            placeholder="Contoh: ST001"
                            required
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Nama staf"
                            required
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Alamat
                        </label>

                        <input
                            type="text"
                            name="alamat"
                            class="form-control"
                            placeholder="Alamat"
                            required
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            class="form-control"
                            required
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Tempat Lahir
                        </label>

                        <input
                            type="text"
                            name="tempat_lahir"
                            class="form-control"
                            placeholder="Tempat lahir"
                            required
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            placeholder="08xxxxxxxxxx"
                            required
                        >

                    </div>


                </div>


                <button
                    type="submit"
                    class="btn btn-pink px-4"
                >

                    💾 Simpan Data

                </button>


            </form>

        </div>

    </div>


    <!-- TABLE -->

    <div class="card">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-3">
                📋 Daftar Staf
            </h4>


            <div class="table-responsive">

                <table
                    class="table table-bordered table-hover"
                >

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>ID Staff</th>

                            <th>Nama</th>

                            <th>Alamat</th>

                            <th>Tanggal Lahir</th>

                            <th>Tempat Lahir</th>

                            <th>No HP</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>


                    @forelse($staf ?? [] as $index => $item)

                        <tr>

                            <td class="text-center">
                                {{ $index + 1 }}
                            </td>

                            <td>
                                {{ $item->id_staff }}
                            </td>

                            <td>
                                {{ $item->nama }}
                            </td>

                            <td>
                                {{ $item->alamat }}
                            </td>

                            <td>
                                {{ $item->tanggal_lahir }}
                            </td>

                            <td>
                                {{ $item->tempat_lahir }}
                            </td>

                            <td>
                                {{ $item->no_hp }}
                            </td>

                            <td class="text-center">


                                <!-- EDIT -->

                                <a
                                    href="/staf/{{ $item->id }}/edit"
                                    class="btn btn-warning btn-sm"
                                >

                                    ✏️ Edit

                                </a>


                                <!-- DELETE -->

                                <form
                                    action="/staf/{{ $item->id }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data staf ini?')"
                                    >

                                        🗑️ Hapus

                                    </button>

                                </form>


                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-4"
                            >

                                📭 Belum ada data staf.

                            </td>

                        </tr>

                    @endforelse


                    </tbody>

                </table>

            </div>

        </div>

    </div>


</div>


<footer>

    Sistem Informasi Apotek © 2026

</footer>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>