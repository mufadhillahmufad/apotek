<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pelanggan - Apotek</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff0f8;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #d63384, #f783ac);
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,.1);
        }

        .btn-pink {
            background: #d63384;
            color: white;
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

        <a href="/pelanggan" class="btn btn-light">
            ← Kembali
        </a>
    </div>
</nav>

<div class="container py-5">

    <div class="card p-4">

        <h3 class="fw-bold mb-4">
            ✏️ Edit Data Pelanggan
        </h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/pelanggan/{{ $pelanggan->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">
                    ID Pelanggan
                </label>

                <input
                    type="text"
                    name="id_pelanggan"
                    class="form-control"
                    value="{{ old('id_pelanggan', $pelanggan->id_pelanggan) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama', $pelanggan->nama) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3"
                    required
                >{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">
                    No HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp', $pelanggan->no_hp) }}"
                    required
                >
            </div>

            <button type="submit" class="btn btn-pink">
                💾 Simpan Perubahan
            </button>

            <a href="/pelanggan" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>

</body>
</html>