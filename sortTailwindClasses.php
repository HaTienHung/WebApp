<?php
// Đọc nội dung tệp Blade template vào biến
$fileContent = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/WebApp/resources/views/livewire/product-search-bar.blade.php');

// Định dạng lại các class Tailwind CSS trong biến
$fileContent = preg_replace_callback('/class="([^"]*)"/', function ($matches) {
  $classes = explode(' ', $matches[1]);
  sort($classes);
  $sortedClasses = implode(' ', $classes);
  return 'class="' . $sortedClasses . '"';
}, $fileContent);

// Lưu nội dung đã được định dạng trở lại vào tệp
file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/WebApp/resources/views/livewire/product-search-bar.blade.php', $fileContent);

echo 'Classes sorted successfully.';
