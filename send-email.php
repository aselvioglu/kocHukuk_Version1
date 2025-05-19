<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al ve temizle
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // e-posta adresi
    $to = "info@canhukuk.eu";

    // Mail başlıkları
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Mail gövdesi
    $body = "Ad Soyad: $name\n";
    $body .= "Email: $email\n";
    $body .= "Konu: $subject\n\n";
    $body .= "Mesaj:\n$message";

    // Mail gönder
    if (mail($to, $subject, $body, $headers)) {
        echo "Mesajınız başarıyla gönderildi!";
    } else {
        echo "Hata: Mesaj gönderilemedi.";
    }
} else {
    echo "Geçersiz istek.";
}
?>
