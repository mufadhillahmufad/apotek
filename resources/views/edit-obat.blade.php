<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Obat - Apotek</title>

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

        .btn-pink {
            background: #d63384;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background: #b02a6f;
            color: white;
        }

    </style>

</head>


<body>


<nav class="navbar navbar-dark">

    <div class="container">

        <span class="navbar-brand fw-bold">
            🏥 Apotek
        </span>

        <a
            href="/obat"
            class="btn btn-light"
        >
            ← Kembali
        </a>

    </div>

</nav>


<div class="container py-5">

    <div class="card p-4">

        <h3 class="fw-bold mb-4">
            ✏️ Edit Data Obat
        </h3>


        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="/obat/{{ $obat->id }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="mb-3">

                <label class="form-label fw-bold">
                    Kode Obat
                </label>

                <input
                    type="text"
                    name="kode_obat"
                    class="form-control"
                    value="{{ old('kode_obat', $obat->kode_obat) }}"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label fw-bold">
                    Nama Obat
                </label>

                <input
                    type="text"
                    name="nama_obat"
                    class="form-control"
                    value="{{ old('nama_obat', $obat->nama_obat) }}"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label fw-bold">
                    Stock Obat
                </label>

                <input
                    type="number"
                    name="stock_obat"
                    class="form-control"
                    min="0"
                    value="{{ old('stock_obat', $obat->stock_obat) }}"
                    required
                >

            </div>


            <div class="mb-4">

                <label class="form-label fw-bold">
                    Tanggal Kadaluarsa
                </label>

                <input
                    type="date"
                    name="tanggal_expired"
                    class="form-control"
                    value="{{ old('tanggal_expired', $obat->tanggal_expired) }}"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn btn-pink px-4"
            >

                💾 Simpan Perubahan

            </button>


            <a
                href="/obat"
                class="btn btn-secondary"
            >

                Batal

            </a>


        </form>

    </div>

</div>


</body>

</html>