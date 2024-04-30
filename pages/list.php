<!DOCTYPE html>
<html lang="en">


<title>VSGA</title>
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<!-- Bootstrap CSS v5.2.1 -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar -->
    <?php 
    include('./components/nav.php');
    include('../app/http/list.php');
    ?>
    <!-- End Navbar -->
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <!-- Table -->
        <div class="container-fluid">
            <div class="mt-4">
                <h3>Daftar Sewa</h3>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Telp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jenis Bus</th>
                                <th scope="col">Tanggal Sewa</th>
                                <th scope="col">Lama Sewa</th>
                                <th scope="col">Jumlah Orang</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                               while($sewa = mysqli_fetch_array($query)){
                                echo "<tr>";
                            
                                echo "<td>".$sewa['id']."</td>";
                                echo "<td>".$sewa['nama']."</td>";
                                echo "<td>".$sewa['telp']."</td>";
                                echo "<td>".$sewa['email']."</td>";
                                echo "<td>".$sewa['jenis_bus']."</td>";
                                echo "<td>".$sewa['tgl_sewa']."</td>";
                                echo "<td>".$sewa['hari_sewa']."</td>";
                                echo "<td>".$sewa['jumlah_orang']."</td>";
                                echo "<td>Rp ".$sewa['discount']."</td>";
                                echo "<td>Rp ".$sewa['total_harga']."</td>";
                            
                                echo "<td>";
                                echo "<a class='btn btn-primary' href='form-edit.php?id=".$sewa['id']."'>Edit</a>  ";
                                echo "<a class='btn btn-danger' href='hapus.php?id=".$sewa['id']."'>Hapus</a>";
                                echo "</td>";
                            
                                echo "</tr>";
                            }
                            
                                ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- End Table -->
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>