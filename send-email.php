<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al ve temizle
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // e-posta adresi
    $to = "bilgi@birsukoc.av.tr";

    // Mail başlıkları
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Mail gövdesi
    $body  = "Ad Soyad: $name\n";
    $body .= "Email: $email\n";
    $body .= "Konu: $subject\n\n";
    $body .= "Mesaj:\n$message";

    // Mail gönder
    if (mail($to, $subject, $body, $headers)) {
        echo "Mesajınız başarıyla gönderildi. Ana sayfaya yönlendiriliyorsunuz...";
        header("Refresh: 3; URL=index.html");
        exit;
    } else {
        echo "Hata: Mesaj gönderilemedi. Ana sayfaya yönlendiriliyorsunuz...";
        header("Refresh: 3; URL=index.html");
        exit;
    }
} else {
    echo "Geçersiz istek. Ana sayfaya yönlendiriliyorsunuz...";
    header("Refresh: 3; URL=index.html");
    exit;
}
?>
