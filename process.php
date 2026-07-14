<?php

$fullname   = htmlspecialchars($_POST['fullname']   ?? '', ENT_QUOTES, 'UTF-8');
$phone      = htmlspecialchars($_POST['phone']      ?? '', ENT_QUOTES, 'UTF-8');
$restaurant = htmlspecialchars($_POST['restaurant'] ?? '', ENT_QUOTES, 'UTF-8');
$building   = htmlspecialchars($_POST['building']   ?? '', ENT_QUOTES, 'UTF-8');
$floor      = htmlspecialchars($_POST['floor']      ?? '', ENT_QUOTES, 'UTF-8');
$order      = htmlspecialchars($_POST['order']      ?? '', ENT_QUOTES, 'UTF-8');
$notes      = htmlspecialchars($_POST['notes']      ?? '', ENT_QUOTES, 'UTF-8');
$created_at = date('Y-m-d H:i:s');


$htmlFile = __DIR__ . '/view_requests.html';


$html = file_get_contents($htmlFile);
if ($html === false) {
    die('خطأ: لا يمكن قراءة view_requests.html');
}


$rowCount = preg_match_all('/<tr>\\s*<td>(\\d+)<\\/td>/m', $html, $matches)
            ? intval(max($matches[1])) + 1
            : 1;
$newRow  = "
    <tr>
      <td>{$rowCount}</td>
      <td>{$fullname}</td>
      <td>{$phone}</td>
      <td>{$restaurant}</td>
      <td>{$building}</td>
      <td>{$floor}</td>
      <td>{$order}</td>
      <td>" . ($notes ?: '–') . "</td>
      <td>{$created_at}</td>
    </tr>
    <!-- NEW_ROWS -->";


$htmlUpdated = str_replace('<!-- NEW_ROWS -->', $newRow, $html, $count);
if ($count === 0) {
    die('خطأ: لم أجد التعليق <!-- NEW_ROWS --> في view_requests.html');
}

if (file_put_contents($htmlFile, $htmlUpdated) === false) {
    die('خطأ: فشل حفظ التغييرات');
}


?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تم إرسال الطلب</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <style>
    .confirm-message { margin: 50px auto; padding: 20px; max-width: 500px; border: 1px solid #4CAF50; background: #e8f5e9; color: #2e7d32; text-align: center; font-size: 1.1em; }
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
    <h1>تم إرسال طلبك بنجاح!</h1>
  </header>
  <main>
    <div class="confirm-message">
      شكراً لك، طلبك رقم <strong><?= $rowCount ?></strong> تم إضافته.
    </div>
    <p style="text-align:center;"><a href="index.html">العودة إلى الصفحة الرئيسية</a></p>
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
