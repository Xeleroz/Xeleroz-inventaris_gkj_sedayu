<!-- PEEERRRHATTTIIIIANNNNNN
KHUUUUSUUUSS FILLLEEE IINNNIIII
REEESUULLLTT DIIIGANTTTII KEEEE ROOOOWWWW -->



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
    
    
    
    <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    
<link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">


  <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">
  <link rel="stylesheet" href="./assets/compiled/css/app.css">
  <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>


    
    <script src="assets/static/js/initTheme.js"></script>
    <script src="assets/static/js/initTheme.js"></script>
    <script>
    window.onload = function() {
        var logo = document.querySelector('.logoBMKG img');
        var toggleDark = document.getElementById('toggle-dark');

        toggleDark.addEventListener('click', function() {
            if (this.checked) {
                logo.src = './assets/compiled/png/logo.png'; // Change to your dark logo path
            } else {
                logo.src = './assets/compiled/png/logoblack.png'; // Change to your light logo path
            }
            // Reload the page only if dark theme is selected
                location.reload();
        });

        // Check the initial theme setting on page load
        if (!toggleDark.checked) {
            logo.src = './assets/compiled/png/logoGKJ.jpeg'; // Set the initial logo based on light theme
        }
    };
</script>
    <div id="app">
        
        <div id="sidebar">
            <div class="sidebar-wrapper">
                
    <div class="sidebar-header position-relative m-0">
        <div class="justify-content-between align-items-center">
            <div class="logoBMKG" style="display: flex; justify-content: center; align-items: center;">
                <a href="index.php"><img src="./assets/compiled/png/logoGKJ.jpeg" alt="Logo" style="width: 150px; height: auto;" srcset=""></a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--system-uicons" width="20" height="20"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                            opacity=".3"></path>
                        <g transform="translate(-210 -1)">
                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                            <circle cx="220.5" cy="11.5" r="4"></circle>
                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                        </g>
                    </g>
                </svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                    </path>
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
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
                

            </li>
            
            </li>

            <li
                class="sidebar-item">
                <a href="barangmasuk.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Barang Masuk</span>
                </a>
                

            </li>

            <li
                class="sidebar-item">
                <a href="barangRusak.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Barang Rusak</span>
                </a>
                

            </li>

            <li
                class="sidebar-item active">
                <a href="semuabarang.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Daftar Barang</span>
                </a>
                

            </li>
            
            <!-- <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
            <i class="bi bi-database"></i>
                <span>Daftar Barang</span>
            </a>
            
            <ul class="submenu ">
                
                <li class="submenu-item  ">
                    <a href="namaBarang.php" class="submenu-link">Nama Barang</a>
                    
                </li>
                
            </ul>
            
        
            
            <li
            class="sidebar-item active has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Tabel Data</span>
            </a>
            
            <ul class="submenu ">
                
                <li class="submenu-item  ">
                    <a href="barangMasuk.php" class="submenu-link">Barang Masuk</a>
                    
                </li>
                
                <li class="submenu-item  ">
                    <a href="barangKeluar.php" class="submenu-link">Barang Keluar</a>
                    
                </li>
                <li class="submenu-item active ">
                    <a href="semuaBarang.php" class="submenu-link">Semua Barang</a>
                    
                </li>
                
            </ul>
            

        </li> -->
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

                <button id="btnPrintDetail" class="btn icon icon-left btn-primary"><i data-feather="printer"></i> Print</button>
                <button id="btnExcel" class="btn icon icon-left btn-success"><i class="bi bi-file-earmark-excel"></i> Download Excel</button>
                <button id="btnPDF" class="btn icon icon-left btn-danger"><i class="bi bi-file-earmark-pdf"></i> Download PDF</button>
                </div>
                
                
                <!-- FILTER DISINI WOOII-->
                <div class="container card-body">
                    <div class="row">
                    <form class="form" method="POST" action="">
                    <div class="col-6 ">
                        <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset(
                            $_POST["date1"]
                        )
                            ? $_POST["date1"]
                            : ""; ?>" />
                        </div>
                    </div>
    
                    <div class="col-6 ">
                        <div class="form-group">
                        <label>To</label>
            <input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset(
                $_POST["date2"]
            )
                ? $_POST["date2"]
                : ""; ?>"/>
                        </div>
                    </div>
          
            <div class="col-6">
                <label>Status Barang</label>
    
                <select name="status" class="form-select">
                    <option value="">Status</option>
                    <option value="masuk" <?php isset($_GET["status"]) == true
                        ? ($_GET["status"] == "masuk"
                            ? "selected"
                            : "")
                        : ""; ?> >Barang Masuk</option>
                    <option value="keluar" <?php isset($_GET["status"]) == true
                        ? ($_GET["status"] == "keluar"
                            ? "selected"
                            : "")
                        : ""; ?> >Barang Keluar</option>
                </select>
            </div>
            <br>
            <button class="btn btn-primary" name="search"><span class="bi bi-search"></span></button> 
            <a href="index.php" type="button" class="btn btn-success"><span class="bi bi-arrow-clockwise"></span></a>
        </form>
    
        
    </div>

                </div>
                

            </div>
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="table1">
    <thead>
        <tr>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>QR Code</th>
            <th>Nama Barang</th>
            <th>Jenis Peralatan</th>
            <th>Merk</th>
            <th>SN</th>
            <th>Asal Perolehan</th>
            <th>Harga (Rp)</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th>File</th> 
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
                    echo "Tidak Keluar";
                } else {
                    echo !empty($row["tanggal_keluar"])
                        ? (new DateTime($row["tanggal_keluar"]))->format("d-m-Y")
                        : "-";
                }
            ?></td>

        <td style="background-color: #FFFFFF;">
    <a href="infoBarang.php?id_barang=<?php echo htmlspecialchars($row["id_barang"]); ?>">
        <?php
        // Assuming $result['id_barang'] contains the ID of the item
        $id_barang = $row['id_barang'];
        $qrContent = "192.168.1.9/whm/infoBarang.php?id_barang=$id_barang";
        ?>

        <!-- Create a canvas element to hold the QR code -->
        <canvas id="qrcodeCanvas<?php echo $id_barang; ?>"></canvas>

        <!-- Include the qrcode.min.js library for browser -->
        <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>

        <!-- Generate QR code -->
        <script>
            // Content to be encoded in the QR code
            var qrContent<?php echo $id_barang; ?> = "<?php echo $qrContent; ?>";

            // Generate QR code and render it onto the canvas
            QRCode.toCanvas(document.getElementById("qrcodeCanvas<?php echo $id_barang; ?>"), qrContent<?php echo $id_barang; ?>, function (error) {
                if (error) {
                    console.error(error);
                } else {
                    console.log('QR code generated successfully');
                }
            });
        </script>
</td>


    <td><?php echo $row["nama_barang"]; ?></td>
    <td><?php echo $row["jenis_peralatan"]; ?></td>
    <td><?php echo $row["merk"]; ?></td>
    <td><?php echo $row["sn"]; ?></td>
    <td><?php echo $row["asal_perolehan"]; ?></td>
    <td><?php echo number_format($row["harga"], 0, ".", "."); ?></td>
    <td>
        <?php if ($row["status"] == "masuk") {
            echo '<span class="badge bg-success">Masuk</span>';
        } elseif ($row["status"] == "keluar") {
            echo '<span class="badge bg-danger">Keluar</span>';
        } else {
            echo $row["status"]; 
        } ?>
    </td>
    <td><?php echo $row["keterangan"]; ?></td>
    <td><img src="./uploads/<?php echo $row[
        "foto"
    ]; ?>" alt="Photo" style="max-width: 100px; max-height: 100px;"></td>
    <td>
    <?php 
    $fileName = $row["file"]; // Use $row instead of $result
    if (strlen($fileName) > 20) {
        $fileName = substr($fileName, 0, 12) . '...'; // Limiting to 20 characters and adding ellipsis
    }
    ?>
    <img src="./uploads/<?php echo $row["file"]; ?>" alt="File Preview" style="max-width: 100px; max-height: 100px;">
    <a href="./uploads/<?php echo $row["file"]; ?>" download><?php echo $fileName; ?></a>
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
<script>
    function confirmDelete(id, origin) {
        $('#danger').modal('show');
        // Set the href attribute of the "Ya" button to the deletion URL
        $('.btn-danger-confirm').attr('href', 'proses.php?hapus=' + id + '&origin=' + origin);
    }
</script>
<script>
    var table;
    $(document).ready(function(){
        table = $('#table1').DataTable({
            "bDestroy": true,
            "paging": false,
            search: {
        return: false
    },
            "aLengthMenu": [[25,50,100,200,-1], [25,50,100,200, "All"]],
            iDisplayLength: 25,
            dom: 'lrt',
            buttons: [
                {
                    extend: 'excel',
                    class: 'buttons-excel',
                    init: function(api, node, config){
                        $(node).hide();
                    },
                    exportOptions: {
                        columns: [0, 1, 3,4,5,6,7,8,9]
                    }
                },
                {
                    extend: 'print',
                    class: 'buttons-print',
                    init: function(api, node, config){
                        $(node).hide();
                    },
                    exportOptions: {
                        columns: [0, 1, 3,4,5,6,7,8,9]
                    }
                },
                {
                    extend: 'pdf',
                    class: 'buttons-pdf',
                    init: function(api, node, config){
                        $(node).hide();
                    },
                    exportOptions: {
                        columns: [0, 1, 3,4,5,6,7,8,9]
                    }
                }
            ]
        });
    });

    $('#btnExcel').on('click', function() {
        table.button('.buttons-excel').trigger();
    });
    $('#btnPrintDetail').on('click', function() {
        table.button('.buttons-print').trigger();
    });
    $('#btnPDF').on('click', function() {
        table.button('.buttons-pdf').trigger();
    });
</script>
</body>

</html>