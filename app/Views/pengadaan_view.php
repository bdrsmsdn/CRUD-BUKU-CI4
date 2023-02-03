<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengadaan</title>
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
                Data Pengadaan
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                        foreach ($dataPengadaan as $d) {
                            //$nomor = $nomor + 1;
                         ?> 
                            <tr>
                                <td><?php echo $d['nama'] ?></td>
                                <td><?php echo $d['penerbit'] ?></td>                                
                                <td><?php echo $d['stok'] ?></td>
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