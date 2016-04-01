<?php
/*
 * php tsv.php <dir>
 * generate pdf.tsv on <dir>
 */
$dir = $argv[1];
$files = glob("$dir/*.pdf");
$fp = fopen("$dir/pdf.tsv", 'w');
fputcsv($fp, array('TsvHttpData-1.0'), "\t");
$base = "http://acervo.coletaneasdentalpress.com.br/pdfs";

foreach($files as $file) {
  $file = basename($file);
  echo $file . PHP_EOL;
  $size = filesize($file);
  $url = "$base/$file";
  $md5 = base64_encode( md5_file($file, true) );
  $row = array($url, $size, $md5);
  fputcsv($fp, $row, "\t");
}

fclose($fp);
