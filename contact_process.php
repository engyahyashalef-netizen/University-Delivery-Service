<?php
$name    = htmlspecialchars($_POST['name']    ?? '', ENT_QUOTES, 'UTF-8');
$email   = htmlspecialchars($_POST['email']   ?? '', ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($_POST['subject'] ?? '', ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');
$sentAt  = date('Y-m-d H:i:s');


$htmlFile = __DIR__ . '/contact_messages.html';


$html = file_get_contents($htmlFile);
if ($html === false) {
    die('خطأ: لا يمكن قراءة contact_messages.html');
}


$newEntry = <<<HTML
    <div class="contact-entry">
      <h2>من: {$name} &lt;{$email}&gt; <small>({$sentAt})</small></h2>
      <p><strong>الموضوع:</strong> {$subject}</p>
      <p>{$message}</p>
      <hr>
    </div>

    <!-- NEW_CONTACTS -->
HTML;


$htmlUpdated = str_replace('<!-- NEW_CONTACTS -->', $newEntry, $html, $count);
if ($count === 0) {
    die('خطأ: لم أجد التعليق <!-- NEW_CONTACTS --> في contact_messages.html');
}

if (file_put_contents($htmlFile, $htmlUpdated) === false) {
    die('خطأ: فشل حفظ contact_messages.html');
}

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title>تم إرسال رسالتك</title>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/styles.css"/>

  <style>
    .confirm-message {
      margin: 50px auto; padding: 20px; max-width: 500px;
      border: 1px solid #4CAF50; background: #e8f5e9;
      color: #2e7d32; text-align: center; font-size: 1.1em;
    }
  </style>
</head>
<body>
  <header>
   <nav class="top-menu">
      <ul>
        <li><a href="index.html">الرئيسية</a></li>
        <li><a href="about.html">من نحن</a></li>
        <li><a href="contact.html">اتصل بنا</a></li>
<li><a href="view_requests.html">عرض الطلبات</a></li>

      </ul>
    </nav>
  </header>
  <main>
    <div class="confirm-message">
      شكراً لتواصلك معنا، تم استلام رسالتك بنجاح!
    </div>
    <p style="text-align:center;">
      <a href="contact.html">العودة إلى صفحة اتصل بنا</a>
      │
      <a href="contact_messages.html">عرض جميع الرسائل</a>
    </p>
  </main>
  <footer>
   
  <div class="social-icons">
                <a href="#" title="Facebook"><img src="./img/Facebook.jpg" alt="Facebook"></a>
                <a href="#" title="Instagram"><img src="./img/Instagram.jpg" alt="Instagram"></a>
                <a href="#" title="X"><img src="./img/x.jpg" alt="X"></a>
                <a href="#" title="YouTube"><img src="./img/Youtube.jpg" alt="YouTube"></a>
                <a href="#" title="Snapchat"><img src="./img/Snapchat.jpg" alt="Snapchat"></a>
                <a href="#" title="LinkedIn"><img src="./img/LinkedIn.jpg" alt="LinkedIn"></a>
                <a href="#" title="WhatsApp"><img src="./img/whatsapp.jpg" alt="WhatsApp"></a>
                <a href="#" title="TikTok"><img src="./img/tiktok.jpg" alt="TikTok"></a>
            </div>
  <p>&copy; 2025 خدمة التوصيل داخل الجامعة</p>
  <p>للتواصل: <strong>0551234567</strong></p>
  </footer>
</body>
</html>
