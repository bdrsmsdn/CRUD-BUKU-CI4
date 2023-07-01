<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
    <div class="row-6">
        <div class="col-8 mx-auto mt-4">
            <!-- CARD BUKU -->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Data Buku Admin
                </div>
                <div class="card-body">
                    <!-- LOKASI TEXT PENCARIAN -->
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="<?php echo $katakunci ?>" name="katakunci" placeholder="Masukkan Kata Kunci" aria-label="Masukkan Kata Kunci" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>

                    <!-- Modal for Edit -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Pembelian Buku</h5>
                                    <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- KALAU ERROR -->
                                    <div class="alert alert-danger error" role="alert" style="display: none;">
                                    </div>
                                    <!-- KALAU SUKSES -->
                                    <div class="alert alert-success sukses" role="alert" style="display: none;">
                                    </div>
                                    <!-- FORM INPUT DATA -->
                                    <input type="hidden" id="inputEditId">
                                    <div class="mb-3 row">
                                        <label for="inputEditNama" class="col-sm-4 col-form-label">Judul Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditNama" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditHarga" class="col-sm-4 col-form-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputEditHarga" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditStok" class="col-sm-4 col-form-label">Jumlah</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputEditStok">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="tombolSaveChange">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Judul Buku</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
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
                                    <td>
                                        <button type="button" id="buku" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="edit(<?php echo $k['id_buku'] ?>)"><i class="bi bi-cart3"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        //DELETE BUKU
        function hapus($id) {
            var result = confirm('Yakin mau melakukan proses delete');
            if (result) {
                window.location = "<?php echo site_url("admin/deletebuku") ?>/" + $id;
            }
        }

        //EDIT BUKU
        function edit($id) {
            $.ajax({
                url: "/user/belibuku/" + $id,
                type: "GET",
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.id_buku != '') {
                        $('#inputEditId').val($obj.id_buku);
                        $('#inputEditNama').val($obj.nama);
                        $('#inputEditHarga').val($obj.harga);
                    }
                }

            });
        }

        function bersihkan() {
            $('#inputId').val('');
            $('#inputNama').val('');
            $('#inputHarga').val('');
            $('#inputStok').val('');
        }

        $('.tombol-tutup').on('click', function() {
            if ($('.sukses').is(":visible")) {
                window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING'] ?>";
            }
            $('.alert').hide();
            bersihkan();
        });

        //INI EDIT BUKU
        $('#tombolSaveChange').on('click', function() {
            var $id_buku = $('#inputEditId').val();
            var $jumlah = $('#inputEditStok').val();
            var $user = <?= session()->get('id_user'); ?>

            $.ajax({
                url: "/user/saveedit",
                type: "POST",
                data: {
                    id_buku: $id_buku,
                    id_user: $user,
                    jumlah: $jumlah
                },
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                }
            });
            bersihkan();

        });
    </script>
</body>

</html>