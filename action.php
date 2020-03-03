<pre>
<?php 
//подсчитывает количетсво использований каждого слова
function analysis($myString){
    $myString = mb_strtolower($myString);
    //заменить знаки препинания на пустые строки
    $myString = str_replace([',', '.', ';', ':', '!', '?', ' -', '=', '(', ')'], '', $myString);
    $myString = str_replace('  ', ' ', $myString);
    $pieces = explode(" ", $myString);
    $array = [];

    foreach ($pieces as $key)
    if (array_key_exists ($key, $array)){
        $array[$key]++;
    } else {
        $array[$key] = 1;
    } 
    return $array;
}
//сохраняет результат в файл с уникальным именем
function to_csv($myArray, $str){
    $file = $str . ((string) date("Y-m-d H:i:s")) . '.csv';
    $fp = fopen($file, 'a+');
    foreach ($myArray as $key => $value) {
        fputcsv($fp, array($key, $value));
    }
    fclose($fp);
}


if (!empty($_POST['test'])) {
    $myString = $_POST['test'];
    to_csv(analysis($myString), 'txt');
    echo ("Успешно обработана строка\n");
} else {
    echo ("Пустая строка\n");
}


if ($_FILES['file']['name'] != "") {
    $myFileString = file_get_contents($_FILES['file']['tmp_name']);
    to_csv(analysis($myFileString), 'file');
    echo ("Успешно обработан файл\n");
} else {
    echo ("Нет файла\n");
}
?>