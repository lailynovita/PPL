<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
    .form-group {
        margin-bottom: 16px;
    }

    label {
        margin-bottom: 8px;
    }

    .error {
        color: red;
    }
    </style>

    <title>Entry Mahasiswa Baru</title>
</head>

<body>
<div class="card m-5">
            <div class="card-header">Entry Mahasiswa Baru</div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                        minlength="1" maxlength="100">
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim"
                        minlength="14" maxlength="14">
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan:</label>
                        <input type="text" class="form-control" id="angkatan" name="angkatan"
                        minlength="4" maxlength="4">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" id="nim" name="nim"
                        value="Aktif" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                   
</body>
</html>
