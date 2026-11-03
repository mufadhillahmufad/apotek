<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Staf - Apotek</title>

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
            background: linear-gradient(90deg, #d63384, #f783ac);
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

        <a href="/staf" class="btn btn-light">
            ← Kembali
        </a>

    </div>

</nav>


<div class="container py-5">

    <div class="card p-4">

        <h3 class="fw-bold mb-4">
            ✏️ Edit Data Staf
        </h3>


        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="/staf/{{ $staf->id }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="mb-3">

                <label class="form-label fw-bold">
                    ID Staff
                </label>

                <input
                    type="text"
                    name="id_staff"
                    class="form-control"
                    value="{{ old('id_staff', $staf->id_staff) }}"
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
                    value="{{ old('nama', $staf->nama) }}"
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
                >{{ old('alamat', $staf->alamat) }}</textarea>

            </div>


            <div class="mb-3">

                <label class="form-label fw-bold">
                    Tanggal Lahir
                </label>

                <input
                    type="date"
                    name="tanggal_lahir"
                    class="form-control"
                    value="{{ old('tanggal_lahir', $staf->tanggal_lahir) }}"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label fw-bold">
                    Tempat Lahir
                </label>

                <input
                    type="text"
                    name="tempat_lahir"
                    class="form-control"
                    value="{{ old('tempat_lahir', $staf->tempat_lahir) }}"
                    required
                >

            </div>


            <div class="mb-4">

                <label class="form-label fw-bold">
                    No HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp', $staf->no_hp) }}"
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
                href="/staf"
                class="btn btn-secondary"
            >
                Batal
            </a>

        </form>

    </div>

</div>

</body>

</html>