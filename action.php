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
function words_count($myString) {
    $myString = mb_strtolower($myString);
    //заменить знаки препинания на пустые строки
    $myString = str_replace([',', '.', ';', ':', '!', '?', ' -', '=', '(', ')'], '', $myString);
    $myString = str_replace('  ', ' ', $myString);
    $pieces = explode(" ", $myString);
    return count($pieces);
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

function uploadedText($myString) {
    $connection = new PDO('mysql:host=127.0.0.1:3306 ;dbname=myphp','root', '');
    $insertQuery = 'INSERT INTO uploaded_text(`content`, `date`, `words_count`) VALUES (?, ?, ?);';
    $statement = $connection->prepare($insertQuery);

    $success = $statement->execute([
        $myString,
        date("Y-m-d"),
        words_count($myString)
        ]);
    return $connection->lastInsertId();
}

 function words($myString, int $lastInsertID) {
    $arrayWord = analysis($myString);
    $connection = new PDO('mysql:host=127.0.0.1:3306 ;dbname=myphp','root', '');
    $insertQuery = 'INSERT INTO word(`text_id`, `word`, `count` ) VALUES (?, ?, ?)';
    $statement = $connection->prepare($insertQuery);

    foreach ($arrayWord as $key=>$value) {
        $success = $statement->execute([
            $lastInsertID,
            $key,
            $value,
        ]);
    }


}

if (!empty($_POST['test']))
{
    $lastInsertID = uploadedText($_POST['test']);
    words($_POST['test'], $lastInsertID);
    echo ("Успешно обработана строка\n");
} else {
    echo ("Пустая строка\n");
}


if ($_FILES['file']['name'] != "") {
    $myFileString = file_get_contents($_FILES['file']['tmp_name']);
    $lastInsertID = uploadedText($myFileString);
    words($myFileString, $lastInsertID);
    echo ("Успешно обработан файл\n");
} else {
    echo ("Нет файла\n");
}
?>
