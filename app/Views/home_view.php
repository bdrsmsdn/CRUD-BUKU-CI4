<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
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
    <?php include 'templates/navbar.php'; ?>
    <!-- CONTAINER -->    
    <div class="col-8 mx-auto mt-4">
        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Data Buku
            </div>
            <div class="card-body">
                <!-- LOKASI TEXT PENCARIAN -->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $katakunci ?>" name="katakunci" placeholder="Masukkan Kata Kunci" aria-label="Masukkan Kata Kunci" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Judul Buku</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                        foreach ($dataBuku as $k) {
                            //$nomor = $nomor + 1;
                         ?> 
                            <tr>
                                <td><?php echo $k['no_buku'] ?></td>
                                <td><?php echo ucfirst($k['kategori']) ?></td>
                                <td><?php echo $k['nama'] ?></td>
                                <td><?php echo $k['harga'] ?></td>
                                <td><?php echo $k['stok'] ?></td>
                                <td><?php echo $k['penerbit'] ?></td>                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php /*
                $linkPagination = $pager->links();
                $linkPagination = str_replace('<li class="active">', '<li class="page-item active">', $linkPagination);
                $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
                $linkPagination = str_replace("<a", "<a class='page-link'", $linkPagination);
                echo $linkPagination; */
                ?>
            </div>
        </div>
    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>