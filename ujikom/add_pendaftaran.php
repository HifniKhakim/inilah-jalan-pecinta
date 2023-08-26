<?php
include_once("connection.php");

// cek apakah tombol daftar sudah diklik atau belum?
if ($_POST) {
    $file_upload = $_FILES['berkas'];

    if ($file_upload["name"] != "") {
        // Ambil data dari formulir
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $semester = $_POST['semester'];
        $ipk = $_POST['ipk'];
        $beasiswa = $_POST['beasiswa'];
        $status = "belum di verifikasi";
        $berkas = $file_upload['name'];
        // Perintah SQL untuk menambah data
        $query = "INSERT INTO pendaftar (nama, email, hp, semester, ipk, beasiswa, berkas, status) VALUES ('$nama', '$email', '$hp', '$semester', '$ipk', '$beasiswa', '$berkas', '$status')";
        $result = mysqli_query($conn, $query);

            // Pindahkan berkas yang diunggah ke lokasi tujuan
            move_uploaded_file($file_upload["tmp_name"],
            __DIR__ . "/uploads/" . $berkas); 
            
            header("LOCATION: index.php?link_page=3");
    }
}
?>
