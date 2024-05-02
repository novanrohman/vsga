<!DOCTYPE html>
<html lang="en">


<title>VSGA</title>
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<!-- Bootstrap CSS v5.2.1 -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<!-- Navbar -->

<?php include('../../config/config.php') ?>
<?php include('../components/nav-login.php') ?>
<!-- End Navbar -->
<header>

</header>
<main class="container">

    <div class="row">
        <div class="col-md-4">

        </div>
    </div>
    <div class="container my-3 col-md-8">
        <?php
        // Check for status message in URL parameter
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status === "sukses") {
                // If status is success, display success alert
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data inserted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }


        $id = $_GET['id']; //mengambil id get
        $query_mysql = mysqli_query($conn, "SELECT * FROM sewa WHERE id='$id'") or die(mysqli_error());
        // $nomor = 1;
        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>

            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-3">Edit Sewa</h3>
                    <form class="row g-3 needs-validation " novalidate onsubmit="return simpan()" action="/app/http/update.php"   method="POST">
                        <input hidden type="text" class="form-control" id="validationCustom01" name="id" placeholder="Nama anda" value="<?php echo $data['id'] ?>">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="validationCustom01" name="nama" placeholder="Nama anda" value="<?php echo $data['nama'] ?>" required old>
                            <div class="invalid-feedback">
                                Nama belum diisi
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="validationCustom01" name="email" placeholder="E-mail anda" value="<?php echo $data['email'] ?>" required old>
                            <div class="invalid-feedback">
                                E-mail belum diisi
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Telp</label>
                            <input type="text" class="form-control" id="validationCustom01" name="telp" placeholder="Telp anda" value="<?php echo $data['telp'] ?>" required old>
                            <div class="invalid-feedback">
                                Telp belum diisi
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Tanggal Sewa</label>
                            <input type="date" class="form-control" id="validationCustom02" name="tgl_sewa" placeholder="dd/mm/yy" value="<?php echo $data['tgl_sewa'] ?>" required>
                            <div class="invalid-feedback">
                                Tanggal harus diisi
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Jenis Bus</label>
                            <select type="text" class="form-select" id="validationCustom03" name="jenis_bus" " required>

                            <?php if ($data['jenis_bus'] == "Vip") echo "<option value='Vip' selected >Vip</option>";
                            else echo "<option value='Vip'  >Vip</option>"; ?>
                            <?php if ($data['jenis_bus'] == "Standar") echo "<option value='Standar' selected >Standar</option>";
                            else echo "<option value='Standar'  >Standar</option>"; ?>
                            <?php if ($data['jenis_bus'] == "Ekonomi") echo "<option value='Ekonomi' selected >Ekonomi</option>";
                            else echo "<option value='Ekonomi'  >Ekonomi</option>"; ?>

                        </select>
                        <div class=" invalid-feedback">
                                Pilih jenis bus.
                        </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Hari</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $data['hari_sewa'] ?>" min="1" name="hari_sewa" placeholder="Jumlah orang" plarequired>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="validationCustom03" class="form-label">Tujuan</label>
                    <select type="text" class="form-select" id="validationCustom03" name="tujuan" required>

                        <?php if ($data['jenis_bus'] == "Alas Purwo") echo "<option value='Alas Purwo' selected >Alas Purwo</option>";
                        else echo "<option value='Alas Purwo'  >Alas Purwo</option>"; ?>
                        <?php if ($data['jenis_bus'] == "Baluran") echo "<option value='Baluran' selected >Baluran</option>";
                        else echo "<option value='Baluran'  >Baluran</option>"; ?>
                        <?php if ($data['jenis_bus'] == "Djawatan") echo "<option value='Djawatan' selected >Djawatan</option>";
                        else echo "<option value='Djawatan'  >Djawatan</option>"; ?>
                        
                    </select>
                    <div class="invalid-feedback">
                        Pilih tempat
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Jumlah orang</label>
                    <div class="input-group">
                        
                        <input type="number" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" value="<?php echo $data['jumlah_orang'] ?>" name="jumlah_orang" required>
                        <span class="input-group-text" id="inputGroupPrepend2">/Orang</span>
                    </div>
                </div>
                
                <div id="emailHelp" class="form-text text-danger">*Lebih dari 10 orang discount 5% | Lebih dari 25 orang discount 10% | Lebih dari 40 orang discount 15%</div>

                <input type="hidden" name="total_harga" id="total_harga_input" value="0">
                <input type="hidden" name="discount" id="discount_input" value="0">
                <div class="col-12">
                    <button class="btn btn-primary w-100" id="hitung-btn" onclick="simpan()">Hitung</button>
                </div>
                <!-- Detail Pembayaran -->
                <hr>
                <p class="fw-bold">Detail pembayaran</p>

                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row">Lama sewa</th>
                            <td class="text-end"><span id="hari">0</span> hari</td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah orang</th>
                            <td class="text-end"><span id="jml_orang">0</span> orang</td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Sewa</th>
                            <td class="text-end">Rp <span id="sewa">0</span> </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-danger">PPN 11%</th>
                            <td class="text-end text-danger">Rp <span id="ppn">0</span></td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td class="text-end">Rp <span id="total_harga">0</span></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-success">Discount</th>
                            <td class="text-end text-success">- Rp <span id="disc">0</span></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Pembayaran</th>
                            <td class="text-end" name="total_bayar">Rp <span id="total_bayar">0</span></td>
                        </tr>
                </table>

                <button name="submit" value="update" name="update" class="btn btn-outline-primary mx-auto w-100 mt-3">Update</button>

                </form>
            </div>
    </div>
    </div>
    </div>
</main>

<?php } ?>

<footer class="bg-primary text-white ">
    <div class="container">
        <div class="row p-3">
            <div class="col-sm-8 col-xxl-9">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                    <a class="m-3 text-white text-decoration-none" href="#">@Kodekita</a>
                </div>

                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    <a class="m-3 text-white text-decoration-none">Kodekita</a>
                </div>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                    <a class="m-3 text-white text-decoration-none">+628123456789</a>
                </div>
            </div>

            <div class="col-sm-4 col-xxl-3 text-end mb-3">
                Jl. Palagan Tentara Pelajar No.81, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman,
                Daerah Istimewa Yogyakarta
                55581
            </div>
        </div>
    </div>

    <div class="text-center p-3" style="background-color: #0a54c2;">
        © 2024 Copyright
    </div>

</footer>



<!-- Bootstrap JavaScript Libraries -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
</script>

<!-- Code cek total bayar -->
<script>
    document.getElementById("hitung-btn").addEventListener("click", function(event) {
        event.preventDefault();
        simpan();
    });

    function simpan() {

        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('click', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        let hari = document.getElementsByName("hari_sewa")[0].value;
        let jml_orang = document.getElementsByName("jumlah_orang")[0].value;
        let tujuan = document.getElementsByName("tujuan")[0].value;
        let bus = document.getElementsByName("jenis_bus")[0].value;
        var harga_wisata = 0; //Harga tempat Wisata
        var harga_bus = 0; //Harga Bus
        var disc = 0;
        // console.log(tujuan);


        //Cek harga jenis bus
        if (bus == "Vip") {
            harga_bus = 80000;
        } else if (bus == "Standar") {
            harga_bus = 60000;
        } else if (bus == "Ekonomi") {
            harga_bus = 50000;
        }

        //Cek harga tujuan
        if (tujuan == "Alas Purwo") {
            harga_wisata = 100000;
        } else if (tujuan == "Baluran") {
            harga_wisata = 150000;
        } else if (tujuan == "Djawatan") {
            harga_wisata = 50000;
        }

        //Cek jumlah orang
        if (jml_orang >= 10) {
            disc = (0.5);
        } else if (jml_orang >= 25) {
            disc = 0.10;
        } else if (jml_orang >= 40) {
            disc = 0.15;
        } else {
            disc = 0;
        }

        var sewa = harga_wisata + (harga_bus * jml_orang); //Harga sewa bus dengan tujuan tertentu
        var total = (sewa * hari); //Harga sewa
        var ppn = total * (11 / 100);
        total_harga = total + ppn;
        disc = total_harga * disc;
        var total_bayar = total_harga - disc;
        // console.log(totalBayar);
        //Output
        document.getElementById("total_bayar").innerText = parseInt(total_bayar);
        document.getElementById("ppn").innerText = parseInt(ppn);
        document.getElementById("disc").innerText = (disc);
        document.getElementById("sewa").innerText = parseInt(total);
        document.getElementById("hari").innerText = hari;
        document.getElementById("jml_orang").innerText = jml_orang;
        document.getElementById("total_harga").innerText = parseInt(total_harga);

        document.getElementById("total_harga_input").value = parseInt(total_harga);
        document.getElementById("discount_input").value = parseInt(disc);
        console.log(total_bayar);

        return true;
    }
</script>

<script src="../js/popper.min.js"></script>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>