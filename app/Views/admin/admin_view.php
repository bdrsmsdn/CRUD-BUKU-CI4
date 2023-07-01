<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Data Buku</title>
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
    <?php include 'navbar_admin.php'; ?>
    <!-- CONTAINER -->
    <div class="row-6">
        <div class="col-8 mx-auto mt-4">
            <!-- CARD BUKU -->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Data Buku Admin
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        + Tambah Data Buku
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Buku</h5>
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
                                    <!-- <input type="hidden" id="inputId"> -->
                                    <div class="mb-3 row">
                                        <label for="inputId" class="col-sm-4 col-form-label">ID Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputId">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputBidang" class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <select id="inputBidang" class="form-select">
                                                <option value="keilmuan">Keilmuan</option>
                                                <option value="bisnis">Bisnis</option>
                                                <option value="novel">Novel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputNama" class="col-sm-4 col-form-label">Judul Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputNama">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputHarga" class="col-sm-4 col-form-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputHarga">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputStok" class="col-sm-4 col-form-label">Stok</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputStok">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPenerbit" class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <select id="inputPenerbit" class="form-select">
                                                <?php foreach ($penerbit as $p) { ?>
                                                    <option value='<?php echo $p['id_penerbit']; ?>'><?php echo $p['penerbit']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Edit -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Buku</h5>
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
                                        <label for="inputEditNoBuku" class="col-sm-4 col-form-label">ID Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditNoBuku">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditBidang" class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <select id="inputEditBidang" class="form-select">
                                                <option value="keilmuan">Keilmuan</option>
                                                <option value="bisnis">Bisnis</option>
                                                <option value="novel">Novel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditNama" class="col-sm-4 col-form-label">Judul Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditNama">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditHarga" class="col-sm-4 col-form-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputEditHarga">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditStok" class="col-sm-4 col-form-label">Stok</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="inputEditStok">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditPenerbit" class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <select id="inputEditPenerbit" class="form-select">
                                                <?php foreach ($penerbit as $p) { ?>
                                                    <option value='<?php echo $p['id_penerbit']; ?>'><?php echo $p['penerbit']; ?></option>
                                                <?php } ?>
                                            </select>
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
                                        <button type="button" id="buku" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="edit(<?php echo $k['id_buku'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?php echo $k['id_buku'] ?>)"><i class="bi bi-trash-fill text-light"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row-6">
        <div class="col-8 mx-auto mt-4">
            <!-- CARD PENERBIT -->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Data Penerbit Admin
                </div>
                <div class="card-body">
                    <!-- MODAL -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahPenerbit">
                        + Tambah Data Penerbit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalTambahPenerbit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Penerbit</h5>
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
                                    <!-- <input type="hidden" id="inputId"> -->
                                    <div class="mb-3 row">
                                        <label for="inputId" class="col-sm-4 col-form-label">ID Penerbit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputIdPenerbit">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputId" class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputNamaPenerbit">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputId" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputAlamat">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputId" class="col-sm-4 col-form-label">Kota</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputKota">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputId" class="col-sm-4 col-form-label">Telepon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputTelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="tombolSimpanP">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Edit Penerbit -->
                    <div class="modal fade" id="editModalPenerbit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Penerbit</h5>
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
                                    <input type="hidden" id="inputEditIdPenerbit">
                                    <div class="mb-3 row">
                                        <label for="inputEditNoPenerbit" class="col-sm-4 col-form-label">ID Penerbit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditNoPenerbit">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditNamaPenerbit" class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditNamaPenerbit">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditAlamat" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditAlamat">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditKota" class="col-sm-4 col-form-label">Kota</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditKota">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEditTelp" class="col-sm-4 col-form-label">Telepon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEditTelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="tombolSaveChangeP">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($penerbit as $p) {
                                //$nomor = $nomor + 1;
                            ?>
                                <tr>
                                    <td><?php echo $p['no_penerbit'] ?></td>
                                    <td><?php echo $p['penerbit'] ?></td>
                                    <td><?php echo $p['alamat'] ?></td>
                                    <td><?php echo $p['kota'] ?></td>
                                    <td><?php echo $p['telepon'] ?></td>
                                    <td>
                                        <button type="button" id="penerbit" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModalPenerbit" onclick="editP(<?php echo $p['id_penerbit'] ?>)"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusP(<?php echo $p['id_penerbit'] ?>)"><i class="bi bi-trash-fill text-light"></i></button>
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

        //DELETE PENERBIT
        function hapusP($id) {
            var result = confirm('Yakin mau melakukan proses delete');
            if (result) {
                window.location = "<?php echo site_url("admin/deletepenerbit") ?>/" + $id;
            }
        }

        //EDIT BUKU
        function edit($id) {
            $.ajax({
                url: "/admin/editbuku/" + $id,
                type: "GET",
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.id_buku != '') {
                        $('#inputEditId').val($obj.id_buku);
                        $('#inputEditNoBuku').val($obj.no_buku);
                        $('#inputEditNama').val($obj.nama);
                        // $('#inputBidang').val($obj.bidang);
                        $('#inputEditHarga').val($obj.harga);
                        $('#inputEditStok').val($obj.stok);
                        // $('#inputPenerbit').val($obj.penerbit);
                    }
                }

            });
        }

        //EDIT PENERBIT
        function editP($id) {
            $.ajax({
                url: "/admin/editpenerbit/" + $id,
                type: "GET",
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.id_penerbit != '') {
                        $('#inputEditIdPenerbit').val($obj.id_penerbit);
                        $('#inputEditNoPenerbit').val($obj.no_penerbit);
                        $('#inputEditNamaPenerbit').val($obj.penerbit);
                        $('#inputEditAlamat').val($obj.alamat);
                        $('#inputEditKota').val($obj.kota);
                        $('#inputEditTelp').val($obj.telepon);
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
            var $no_buku = $('#inputEditNoBuku').val();
            var $nama = $('#inputEditNama').val();
            var $kategori = $('#inputEditBidang').val();
            var $harga = $('#inputEditHarga').val();
            var $stok = $('#inputEditStok').val();
            var $id_penerbit = $('#inputEditPenerbit').val();

            $.ajax({
                url: "/admin/saveedit",
                type: "POST",
                data: {
                    id_buku: $id_buku,
                    no_buku: $no_buku,
                    nama: $nama,
                    kategori: $kategori,
                    harga: $harga,
                    stok: $stok,
                    id_penerbit: $id_penerbit,
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

        //INI EDIT PENERBIT
        $('#tombolSaveChangeP').on('click', function() {
            var $id_penerbit = $('#inputEditIdPenerbit').val();
            var $no_penerbit = $('#inputEditNoPenerbit').val();
            var $nama = $('#inputEditNamaPenerbit').val();
            var $alamat = $('#inputEditAlamat').val();
            var $kota = $('#inputEditKota').val();
            var $telepon = $('#inputEditTelp').val();

            $.ajax({
                url: "/admin/saveeditpenerbit",
                type: "POST",
                data: {
                    id_penerbit: $id_penerbit,
                    no_penerbit: $no_penerbit,
                    penerbit: $nama,
                    alamat: $alamat,
                    kota: $kota,
                    telepon: $telepon,
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

        $('#tombolSimpan').on('click', function() {
            var $id_buku = $('#inputId').val();
            var $nama = $('#inputNama').val();
            var $kategori = $('#inputBidang').val();
            var $harga = $('#inputHarga').val();
            var $stok = $('#inputStok').val();
            var $id_penerbit = $('#inputPenerbit').val();

            $.ajax({
                url: "/admin/addbuku",
                type: "POST",
                data: {
                    no_buku: $id_buku,
                    nama: $nama,
                    kategori: $kategori,
                    harga: $harga,
                    stok: $stok,
                    id_penerbit: $id_penerbit,
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

        $('#tombolSimpanP').on('click', function() {
            var $id_penerbit = $('#inputIdPenerbit').val();
            var $nama = $('#inputNamaPenerbit').val();
            var $alamat = $('#inputAlamat').val();
            var $kota = $('#inputKota').val();
            var $telepon = $('#inputTelp').val();

            $.ajax({
                url: "/admin/addpenerbit",
                type: "POST",
                data: {
                    no_penerbit: $id_penerbit,
                    penerbit: $nama,
                    alamat: $alamat,
                    kota: $kota,
                    telepon: $telepon,
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