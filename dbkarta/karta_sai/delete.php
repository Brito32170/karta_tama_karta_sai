<?php
// Koneksi ke database (gunakan PDO)
$conn = new PDO("mysql:host=localhost;dbname=kartamci", "root", "");

// Pastikan `id_karta_sai` ada di URL
if (isset($_GET['id_karta_sai'])) {
    $id_karta_sai = intval($_GET['id_karta_sai']); // Ambil id_karta_sai dari URL dan pastikan itu integer

    // Siapkan query DELETE
    $sql = "DELETE FROM tb_karta_sai WHERE id_karta_sai = :id_karta_sai";
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bindParam(':id_karta_sai', $id_karta_sai, PDO::PARAM_INT);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        // Redirect ke halaman daftar kartu dengan pesan sukses
        echo "<script>
                alert('Dadus hamos ona!');
                document.location.href='?pagekarta=karta_sai';
              </script>";
    } else {
        // Jika ada kesalahan, tampilkan pesan error
        echo "<script>alert('Dadus hamos ladiak');</script>";
    }
}
?>