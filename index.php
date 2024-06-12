<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Konfigurasi FTP
$ftp_server = "milan.id.domainesia.com";
$ftp_username = "stikerid";
$ftp_userpass = "I1Mlj0;k71RKv;";

// Membuat koneksi FTP
$conn_id = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
if (!@ftp_login($conn_id, $ftp_username, $ftp_userpass)) {
    die("Could not log in to FTP server");
}

// Set mode pasif
ftp_pasv($conn_id, true);

// Path file di server FTP
$server_file = 'testupload.eunoiaid.com/testUpload/data.txt';

// Path file lokal untuk menyimpan file yang di-download
$local_file = '/Applications/XAMPP/xamppfiles/htdocs/ftpDownload/download/file.txt';

// Coba download file dari server FTP dan simpan ke lokasi lokal
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Successfully downloaded $server_file to $local_file\n";
} else {
    echo "There was a problem downloading $server_file\n";
}

// Tutup koneksi FTP
ftp_close($conn_id);
?>