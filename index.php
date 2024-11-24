<?php
include "koneksi.php";
include "auth.php";

require "vendor/autoload.php";
$query = "SELECT * FROM masuk ORDER BY id_barang ASC LIMIT 3";
$sql = mysqli_query($conn, $query);
$no = 0;

// Initialize arrays to store data
$data = [];
$categories = [];

$jumlahMasuk = [];
$jumlahKeluar = [];

// Query untuk menghitung jumlah barang masuk
$queryMasuk = "SELECT COUNT(*) AS total FROM masuk WHERE status = 'masuk'";
$resultMasuk = mysqli_query($conn, $queryMasuk);
if ($rowMasuk = mysqli_fetch_assoc($resultMasuk)) {
    $jumlahMasuk = $rowMasuk["total"];
}

// Query untuk menghitung jumlah barang keluar
$queryKeluar = "SELECT COUNT(*) AS total FROM masuk WHERE status = 'keluar'";
$resultKeluar = mysqli_query($conn, $queryKeluar);
if ($rowKeluar = mysqli_fetch_assoc($resultKeluar)) {
    $jumlahKeluar = $rowKeluar["total"];
}

// mysqli_close($conn);

$total = $jumlahMasuk + $jumlahKeluar;
if ($total != 0) {
    $persentaseMasuk = ($jumlahMasuk / $total) * 100;
    $persentaseKeluar = ($jumlahKeluar / $total) * 100;
} else {
    // Handle the case where $total is zero
    $persentaseMasuk = 0;
    $persentaseKeluar = 0;
}

// Bulatkan persentase jika diperlukan
$persentaseMasuk = round($persentaseMasuk, 2);
$persentaseKeluar = round($persentaseKeluar, 2);

// Pastikan total persentase adalah 100%
// Ini bisa dilakukan dengan menyesuaikan salah satu persentase berdasarkan pembulatan
$totalPersentase = $persentaseMasuk + $persentaseKeluar;
if ($totalPersentase > 100) {
    $persentaseKeluar -= $totalPersentase - 100;
} elseif ($totalPersentase < 100) {
    $persentaseKeluar += 100 - $totalPersentase;
}

$years = [];
$sqlYear = "SELECT DISTINCT YEAR(tanggal) AS year FROM masuk UNION SELECT DISTINCT YEAR(tanggal_keluar) AS year FROM masuk";
$resultYear = $conn->query($sqlYear);

if ($resultYear->num_rows > 0) {
    while ($row = $resultYear->fetch_assoc()) {
        if ($row['year'] != '0000') { // Exclude any invalid year, such as '0000'
            $years[] = $row['year'];
        }
    }
}

// Assuming you have already fetched the selected year from the URL parameter
$selected_year = isset($_GET['selected_year']) ? $_GET['selected_year'] : null;

// Construct your SQL queries with the selected year filter
$query_masuk = "SELECT COUNT(*) AS jumlahMasuk FROM masuk WHERE status = 'masuk'";
$query_keluar = "SELECT COUNT(*) AS jumlahKeluar FROM masuk WHERE status = 'keluar'";

if ($selected_year) {
    // Add the year filter to both queries
    $query_masuk .= " AND YEAR(tanggal) = " . $selected_year;
    $query_keluar .= " AND YEAR(tanggal_keluar) = " . $selected_year;
}

// // Debug: Print SQL queries
// echo "Query Masuk: " . $query_masuk . "<br>";
// echo "Query Keluar: " . $query_keluar . "<br>";

// Execute your SQL queries to get the counts
$result_masuk = mysqli_query($conn, $query_masuk);
$result_keluar = mysqli_query($conn, $query_keluar);

// Debug: Check if queries return results
if (!$result_masuk || !$result_keluar) {
    echo "Error in executing SQL queries.";
}

// Fetch the counts from the result sets
$jumlahMasuk = mysqli_fetch_assoc($result_masuk)['jumlahMasuk'];
$jumlahKeluar = mysqli_fetch_assoc($result_keluar)['jumlahKeluar'];

// // Debug: Check the counts
// echo "Jumlah Masuk: " . $jumlahMasuk . "<br>";
// echo "Jumlah Keluar: " . $jumlahKeluar . "<br>";

// Now you can use $jumlahMasuk and $jumlahKeluar to construct your $dataPie array
$dataPie = [(int)$jumlahMasuk, (int)$jumlahKeluar];

// Debug: Check the contents of dataPie array
// print_r($dataPie);
// $dataPie = [(int)$jumlahMasuk, (int)$jumlahKeluar];

$labels_pie = ["Barang Masuk", "Barang Keluar"];

$data_pie_json = json_encode($dataPie);
$labels_pie_json = json_encode($labels_pie);

$data_json = json_encode($data);
$categories_json = json_encode($categories);

$row_count = 0; // Initialize row counter
while ($result = mysqli_fetch_assoc($sql)) {
    $row_count++; ?>
        <tr>
            <!-- Display other table data as before -->
        </tr>
    <?php if ($row_count >= 3) {
        // Break the loop if 3 rows are reached
        break;
    }
}
// Assuming you have already established a database connection

// Fetch data from your database
// Query to get the count of items that are 'masuk'


$queryMasuk = "SELECT nama_barang, COUNT(*) AS total FROM masuk WHERE status = 'masuk' GROUP BY nama_barang";
$resultMasuk = mysqli_query($conn, $queryMasuk);

// Query to get the count of items that are 'keluar'
$queryKeluar = "SELECT nama_barang, COUNT(*) AS total FROM masuk WHERE status = 'keluar' GROUP BY nama_barang";
$resultKeluar = mysqli_query($conn, $queryKeluar);

// Initialize arrays to store categories and data
$categories = [];
$categories1 = [];
$jumlahKeluar = [];
$jumlahMasuk = [];

// Iterate through the results for 'masuk' and populate the arrays
while ($row = mysqli_fetch_assoc($resultMasuk)) {
    $categories[] = $row["nama_barang"];
    $jumlahMasuk[] = (int) $row["total"]; // Convert total to integer
}

// Iterate through the results for 'keluar' and populate the arrays
while ($row = mysqli_fetch_assoc($resultKeluar)) {
    $categories1[] = $row["nama_barang"];
    $jumlahKeluar[] = (int) $row["total"]; // Convert total to integer
}


?>
<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2033%2034'%20fill-rule='evenodd'%20stroke-linejoin='round'%20stroke-miterlimit='2'%20xmlns:v='https://vecta.io/nano'%3e%3cpath%20d='M3%2027.472c0%204.409%206.18%205.552%2013.5%205.552%207.281%200%2013.5-1.103%2013.5-5.513s-6.179-5.552-13.5-5.552c-7.281%200-13.5%201.103-13.5%205.513z'%20fill='%23435ebe'%20fill-rule='nonzero'/%3e%3ccircle%20cx='16.5'%20cy='8.8'%20r='8.8'%20fill='%2341bbdd'/%3e%3c/svg%3e" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
  <link rel="stylesheet" crossorigin href="./assets/compiled/css/app.css">
  <link rel="stylesheet" crossorigin href="./assets/compiled/css/auth.css">
</head>

<body>
    
    <script src="assets/static/js/initTheme.js"></script>

    <script>
    window.onload = function() {
        var logo = document.querySelector('.logoBMKG img');


        var options = {
            series: [{
                name: 'Jumlah Barang',
                data: <?php echo json_encode($jumlahMasuk); ?>
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 0.5,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?php echo json_encode($categories); ?>
            },
            yaxis: {
                title: {
                    text: 'Jumlah Barang'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return Math.floor(val) + " buah";
                    }
                }
            }
        };

        var options1 = {
            series: [{
                name: 'Jumlah Keluar',
                data: <?php echo json_encode($jumlahKeluar); ?>
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 0.5,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?php echo json_encode($categories1); ?>
            },
            yaxis: {
                title: {
                    text: 'Jumlah Barang'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return Math.floor(val) + " buah";
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options); //CHART BAR
        var chartkeluar = new ApexCharts(document.querySelector("#chartkeluar"), options1); //CHART BAR

        var optionsPie = {
            series: <?php echo json_encode($dataPie); ?>,
    chart: {
        width: 480,
        type: 'pie',
        toolbar: {
            show: false
        }
    },
    labels: [
    "Jumlah Barang Masuk",
    "Jumlah Barang Keluar"
],

    responsive: [{
        breakpoint: 750,
        options: {
            chart: {
                width: 320
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

        var chartPie = new ApexCharts(document.querySelector("#chartPie"), optionsPie);
        chartPie.render();
        chartkeluar.render();
        chart.render();

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
                class="sidebar-item active ">
                <a href="index.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
                

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
                class="sidebar-item">
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
            

        </li>
            
            <li
            class="sidebar-item  has-sub">
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
                
                <li class="submenu-item  ">
                    <a href="semuaBarang.php" class="submenu-link">Semua Barang</a>
                    
                </li>
                
            </ul>
            

        </li> -->

        <li
                class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Akun</span>
                </a>
                
                <ul class="submenu">
                    
                    <li class="submenu-item ">
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
    <h3>Penyimpanan Inventaris Gereja Kristen Jawa Sedayu</h3>
</div> 

<div class="row">
    <!-- Left Column: Data Barang Keluar Masuk -->
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-header">
                <h4>Data Barang Masuk & Rusak</h4>
                <div class="btn-group mb-1">
    <div class="dropdown">
        <!-- Replace "Pilih Tahun" with the selected year or "Semua Tahun" if no year is selected -->
        <?php
            // Determine the placeholder text based on the selected year
            $placeholder = $selected_year ? $selected_year : "Semua Tahun";
        ?>
        <button class="btn btn-primary dropdown-toggle me-1" type="button"
            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <?php echo $placeholder; ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="?selected_year=">Semua Tahun</a>
            <?php foreach ($years as $year) : ?>
                <a class="dropdown-item" href="?selected_year=<?php echo $year; ?>"><?php echo $year; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center" style="height: 280px;">
                    <div id="chartPie" style="width: 300px; height: 100%;"></div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-header">
                <h4>Data Barang Masuk</h4>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-header">
                <h4>Data Barang Rusak</h4>
            </div>
            <div class="card-body">
                <div id="chartkeluar"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Barang Masuk/Rusak Terakhir</h5>
                <p class="mt-3">10 Barang Terakhir</p>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <!-- Tambahkan kolom sesuai dengan data yang ingin ditampilkan -->
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Rusak</th>
                            <th>Nama Barang</th>
                            <th>Jenis Peralatan</th>
                            <th>Merk</th>
                            <th>SN</th>
                            <th>Asal Perolehan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    // Adjust your SQL query to order by tanggal and tanggal_keluar
    $query =
        "SELECT * FROM masuk ORDER BY tanggal DESC, tanggal_keluar DESC LIMIT 10";
    $sql = mysqli_query($conn, $query);

    // Close the connection after executing the query
    mysqli_close($conn);

    $row_count = 0; // Initialize row counter
    while ($result = mysqli_fetch_assoc($sql)) {
        $row_count++; ?> 
        <tr>
            <td><?php echo (new DateTime($result["tanggal"]))->format(
                "d-m-Y"
            ); ?></td>
            <td><?php 
                if ($result["status"] == 'masuk') {
                    echo "Tidak Keluar";
                } else {
                    echo !empty($result["tanggal_keluar"])
                        ? (new DateTime($result["tanggal_keluar"]))->format("d-m-Y")
                        : "-";
                }
            ?></td>
            <td><?php echo $result["nama_barang"]; ?></td>
            <td><?php echo $result["jenis_peralatan"]; ?></td>
            <td><?php echo $result["merk"]; ?></td>
            <td><?php echo $result["sn"]; ?></td>
            <td><?php echo $result["asal_perolehan"]; ?></td>
            <td><?php echo $result["keterangan"]; ?></td>
            <td>
                <?php if (!empty($result["status"])) {
                    if ($result["status"] == "masuk") {
                        echo '<span class="badge bg-success">Masuk</span>';
                    } elseif ($result["status"] == "keluar") {
                        echo '<span class="badge bg-danger">Keluar</span>';
                    } else {
                        echo $result["status"];
                    }
                } ?>
            </td> 
            <td><img src="./uploads/<?php echo $result[
                "foto"
            ]; ?>" alt="Photo" style="max-width: 100px; max-height: 100px;"></td>
        </tr>
    <?php if ($row_count >= 10) {
        // Break the loop if 3 rows are reached
        break;
    }
    }
    ?>
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>



            <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>copyright &copy; Gereja Kristen Jawa Sedayu</p>
        </div>
        <div class="float-end" id="footerText">
            <p><a href="#"> Tim IT Universitas Kristen Duta Wacana</a></p>
        </div>
    </div>
</footer>

        </div>
    </div>
    <script>
    // Function to hide footer text on small screens
    // Function to hide footer text on small screens
function toggleFooterText() {
    var footerText = document.getElementById('footerText');
    if (window.innerWidth <= 768) { // Change the width condition as needed
        footerText.style.display = 'none';
    } else {
        footerText.style.display = 'block';
    }
}

// Call the function on page load and when the window is resized
window.addEventListener('DOMContentLoaded', function() {
    toggleFooterText(); // Call the function after DOM content is loaded
});

window.onresize = toggleFooterText; // Keep the window.onresize event as it is
</script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="assets/compiled/js/app.js"></script>
    

    
<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/dashboard.js"></script>
<script src="assets/extensions/dayjs/dayjs.min.js"></script>
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/ui-apexchart.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script src="assets/extensions/toastify-js/src/toastify.js"></script>
<script src="assets/static/js/pages/toastify.js"></script>


</body>

</html>