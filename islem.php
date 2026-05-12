<?php
// Ödev kuralına göre bilgileri tanımla
$dogru_mail = "b251210564@sakarya.edu.tr";
$dogru_sifre = "b251210564";

// PHP 7.0 altı sürümlerle de tam uyumlu veri alımı
$gelen_mail = isset($_POST['email']) ? $_POST['email'] : '';
$gelen_sifre = isset($_POST['password']) ? $_POST['password'] : '';

// Boş alan kontrolü ve doğrulama
if ($gelen_mail == "" || $gelen_sifre == "") {
    header("Location: login.php?hata=1");
    exit();
}

if ($gelen_mail == $dogru_mail && $gelen_sifre == $dogru_sifre) {
    // Başarılı giriş: Hoşgeldiniz [Öğrenci No] mesajı (Önemli detay)
    echo "<div style='text-align:center; margin-top:50px; font-family:sans-serif;'>
            <h1>Hoşgeldiniz b2412100001</h1>
            <p>Başarıyla giriş yaptınız. Ana sayfaya yönlendiriliyorsunuz...</p>
          </div>";
    header("Refresh: 2; url=index.php");
} else {
    // Hatalı giriş
    header("Location: login.php?hata=1");
    exit();
}
?>