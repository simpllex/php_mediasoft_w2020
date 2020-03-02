Введен текст, <?php 
$myString = $_POST['name'];
$myString = mb_strtolower($myString);
//заменить знаки препинания на пустые строки
$myString = str_replace([',', '.', ';', '!', '?', ' - '], '', $myString);
$pieces = explode(" ", $myString);
$array = [];

foreach ($pieces as $key)
if (array_key_exists ($key, $array)){
    $array[$key]++;
} else {
    $array[$key] = 1;
} 

$file = 'file.csv';
// touch($file);
// $current = "";
// foreach ($array as $key => $value) {
//     $current .= $key . ' -- ' . $value . "\n";
// }
// file_put_contents($file, $current);

$fp = fopen($file, 'w');

foreach ($array as $key => $value) {
    fputcsv($fp, array($key, $value));
}

fclose($fp);
?>