<?php

include "auth.php";
include "koneksi.php";
require "vendor/autoload.php";



$query = "";

if (
    isset($_POST["search"]) &&
    isset($_POST["date1"]) &&
    isset($_POST["date2"])
) {

    $date1 = date("Y-m-d", strtotime($_POST["date1"]));
    $date2 = date("Y-m-d", strtotime($_POST["date2"]));

    $status = isset($_POST["status"]) ? $_POST["status"] : "";

    if (!empty($status)) {
        $query = "SELECT * FROM masuk WHERE DATE(tanggal) BETWEEN '$date1' AND '$date2' AND status = '$status'";
    } else {
        $query = "SELECT * FROM masuk WHERE DATE(tanggal) BETWEEN '$date1' AND '$date2'";
    }
} else {

    $query = "SELECT * FROM masuk";
}


($result = mysqli_query($conn, $query)) or die(mysqli_error($conn));
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Barang</title>
    
    
    
    <!-- <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon"> -->
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    
<link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">


  <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">
  <link rel="stylesheet" href="./assets/compiled/css/app.css">
  <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/static/js/pages/datatables.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="assets/static/js/initTheme.js"></script>
</head>

<body>
    <div id="app">
        
        <div id="sidebar">
            <div class="sidebar-wrapper">
                
    <div class="sidebar-header position-relative m-0">
        <div class="justify-content-between align-items-center">
        <div class="logoGKJ" style="display: flex; justify-content: center; align-items: center;">
                    <a href="index.php"><img src="./assets/compiled/png/logoGKJ.jpeg" alt="Logo" style="width: 150px; height: auto;" srcset=""></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-4">
                        </g>
                    </svg>
                    </svg>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item ">
                <a href="index.php" class='sidebar-link'>
                    <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span>
                </a>
                

            </li>

            </li>

            <li
                class="sidebar-item active">
                <a href="semuabarang.php" class='sidebar-link'>
                    <i class="bi bi-database-fill"></i>
                    <span>Daftar Barang</span>
                </a>
                

            </li>
            

        <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Akun</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="akun.php" class="submenu-link">Keamanan</a>
                        
                    </li>
                    
                </ul>
                

            </li>
            
        <li class="sidebar-item">
            <a id="background" href="logout.php" class="btn btn-outline-danger btn-block">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>
        
        
            
        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Semua Barang</h3>
            
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="row">
                
                
            </div>
        <div class="card-header">
                <a href="kelola.php?status=masuk" class="btn icon icon-left btn-warning"><i data-feather="plus"></i>Tambah Barang Masuk</a>
                <a href="pilihKeluar.php" class="btn icon icon-left btn-warning"><i data-feather="plus"></i>Tambah Barang Rusak</a>
                <button id="btnPrintDetail" class="btn icon icon-left btn-primary"><i data-feather="printer"></i> Print</button>
                <button id="btnExcel" class="btn icon icon-left btn-success"><i class="bi bi-file-earmark-excel"></i> Download Excel</button>
                <button id="btnPDF" class="btn icon icon-left btn-danger"><i class="bi bi-file-earmark-pdf"></i> Download PDF</button>
                </div>
                
            </div>
            <div class="card-header"><script>
                        $(document).ready(function() {
                            table = $('#table1').DataTable({
                            dom: '<"d-flex justify-content-between"lf>tip',
                                aLengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
                                buttons: [
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5],
                                }
                            }
                        ]

                            });
                            $('#btnExcel').on('click', function() {
                                table.button(0).trigger(); 
                            });
                            $('#btnPrintDetail').on('click', function() {
                                table.button(1).trigger(); 
                            });
                            $('#btnPDF').on('click', function() {
                                table.button(2).trigger(); 
                            });
                        });
                    </script> 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="table1">
    <thead>
        <tr>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Nama Barang</th>
            <th>Asal Perolehan</th>
            <th>Harga (Rp)</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 

while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo (new DateTime($row["tanggal"]))->format("d-m-Y"); ?></td>
    <td><?php 
                if ($row["status"] == 'masuk') {
                    echo "-";
                } else {
                    echo !empty($row["tanggal_keluar"])
                        ? (new DateTime($row["tanggal_keluar"]))->format("d-m-Y")
                        : "-";
                }
            ?></td>
    <td><?php echo $row["nama_barang"]; ?></td>
    <td><?php echo $row["asal_perolehan"]; ?></td>
    <td><?php echo number_format($row["harga"], 0, ".", "."); ?></td>
    <td>
        <?php if ($row["status"] == "masuk") {
            echo '<span class="badge bg-success">Masuk</span>';
        } elseif ($row["status"] == "keluar") {
            echo '<span class="badge bg-danger">Rusak</span>';
        } else {
            echo $row["status"]; 
        } ?>
    </td>
    <td><?php echo $row["keterangan"]; ?></td>
    <td>
    <img src="./uploads/<?php echo $row["foto"]; ?>" 
         alt="Photo" 
         style="width: 3cm; height: 3cm; object-fit: cover;">
</td>

<td>

        <a href="#" onclick="confirmDelete(<?php echo $row [
            "id"
        ]; ?>, 'semuaBarang.php')" class="btn icon btn-danger"><i class="bi bi-trash"></i></a>


    </td>
</tr>
<?php } ?>

    </tbody>
</table>

                </div>
            </div>
        </div>
  
        <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel120" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel120">Hapus Data
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tidak</span>
                                                        </button>
                                                        <button type="button" class="btn btn-danger ms-1 btn-danger-confirm" onclick="window.location.href=this.getAttribute('href')">
    <i class="bx bx-check d-block d-sm-none"></i>
    <span class="d-none d-sm-block">Ya</span>
</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    </section>
    <!-- Basic Tables end -->

</div>

        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="assets/compiled/js/app.js"></script>
    
<script>
    function confirmDelete(id, origin) {
        $('#danger').modal('show');
        // Set the href attribute of the "Ya" button to the deletion URL
        $('.btn-danger-confirm').attr('href', 'proses.php?hapus=' + id + '&origin=' + origin);
    }
</script>
</body>

</html>