<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- PANGIL FILE NAVBAR.PHP -->
    <?php include 'navbar_user.php'; ?>
    <!-- CONTAINER -->
    <div class="col-8 mx-auto mt-4">
        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Buku Saya
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul Buku</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transaksi as $d) {
                            //$nomor = $nomor + 1;
                        ?>
                            <tr>
                                <td><?php echo $d['nama_buku'] ?></td>
                                <td><?php echo $d['jumlah'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>