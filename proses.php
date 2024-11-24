<?php
include "koneksi.php";
include "auth.php";


if (isset($_POST["aksi"])) {
    if ($_POST["aksi"] == "add") {
        $tanggal = $_POST["tanggal"];
        $tanggal_keluar = $_POST["tanggal_keluar"];
        $id_barang = $_POST["id_barang"];
        $nama_barang = $_POST["nama_barang"];
        $jenis_peralatan = $_POST["jenis_peralatan"];
        $merk = $_POST["merk"];
        $sn = $_POST["sn"];
        $asal_perolehan = $_POST["asal_perolehan"];
        $harga = $_POST["harga"];
        $status = $_POST["status"];
        $lokasi = $_POST["lokasi"]; // Added lokasi
        $teknisi = $_POST["teknisi"]; // Added teknisi
        $foto = $_FILES["foto"]["name"];
        $file = $_FILES["file"]["name"];
        $keterangan = $_POST["keterangan"];
        $dir = "./uploads/";
        $tmpFile = $_FILES["foto"]["tmp_name"];
        $tmpFile2 = $_FILES["file"]["tmp_name"];


        move_uploaded_file($tmpFile, $dir . $foto);
        move_uploaded_file($tmpFile2, $dir . $file);


        $query = "INSERT INTO masuk VALUES(null, '$tanggal','$tanggal_keluar', '$id_barang', '$nama_barang', '$jenis_peralatan', '$merk', '$sn', '$asal_perolehan','$harga','$status','$lokasi','$teknisi','$foto','$file','$keterangan')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            if ($status == "masuk") {
                header("location: barangMasuk.php");
            } elseif ($status == "keluar") {
                header("location: barangRusak.php");
            }
        } else {
            echo $query;
        }
    } elseif ($_POST["aksi"] == "edit") {
        $id = $_POST["id"];
        $tanggal = $_POST["tanggal"];
        $tanggal_keluar = $_POST["tanggal_keluar"];
        $nama_barang = $_POST["nama_barang"];
        $jenis_peralatan = $_POST["jenis_peralatan"];
        $merk = $_POST["merk"];
        $sn = $_POST["sn"];
        $asal_perolehan = $_POST["asal_perolehan"];
        $harga = $_POST["harga"];
        $lokasi = $_POST["lokasi"];
        $teknisi = $_POST["teknisi"];
        $keterangan = $_POST["keterangan"];
    
        // Retrieve existing data
        $queryShow = "SELECT * FROM masuk WHERE id = '$id'";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);
        $status = $result["status"]; // Retrieve the existing status
    
        // Handle file uploads
        if (!empty($_FILES["foto"]["name"])) {
            $foto = $_FILES["foto"]["name"];
            unlink("./uploads/" . $result["foto"]); // Delete old file
            move_uploaded_file($_FILES["foto"]["tmp_name"], "./uploads/" . $foto); // Upload new file
        } else {
            $foto = $result["foto"]; // Retain existing file name
        }
    
        if (!empty($_FILES["file"]["name"])) {
            $file = $_FILES["file"]["name"];
            unlink("./uploads/" . $result["file"]); // Delete old file
            move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/" . $file); // Upload new file
        } else {
            $file = $result["file"]; // Retain existing file name
        }
    
        // Update the database
        $query = "UPDATE masuk SET tanggal='$tanggal',tanggal_keluar='$tanggal_keluar', nama_barang='$nama_barang',jenis_peralatan='$jenis_peralatan',merk='$merk',sn='$sn',asal_perolehan='$asal_perolehan',harga='$harga',keterangan='$keterangan', foto='$foto', file='$file', status='$status', lokasi='$lokasi', teknisi='$teknisi' WHERE id='$id'";
        $sql = mysqli_query($conn, $query);
    
        if ($sql) {
            if ($status == "masuk") {
                header("location: barangMasuk.php");
            } elseif ($status == "keluar") {
                header("location: barangRusak.php");
            }
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    
}

if (isset($_GET["hapus"])) {
    $id = $_GET["hapus"];
    $origin = isset($_GET["origin"]) ? $_GET["origin"] : "barangMasuk.php";

    $queryShow = "SELECT * FROM masuk WHERE id = '$id';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("./uploads/" . $result["foto"]);

    $query = "DELETE FROM masuk WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: $origin");
    } else {
        echo $query;
    }
}
