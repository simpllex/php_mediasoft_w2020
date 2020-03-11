<?php
$connection = new PDO('mysql:host=127.0.0.1:3306 ;dbname=myphp','root', '');
$id = $_GET['id'];
$stmt = $connection->prepare("SELECT * FROM word WHERE text_id=?");
$stmt->execute([$id]);
$text = $stmt->fetchAll(PDO::FETCH_ASSOC);


function body($array) {
    foreach ($array as $arr) {
        echo "<tr>";
        echo "<td>{$arr['id']}</td>";
        echo "<td>{$arr['text_id']}</td>";
        echo "<td>{$arr['word']}</td>";
        echo "<td>{$arr['count']}</td>";
        echo "</tr>";
    }
}

?>
<table>
    <thead>
    <td>Id</td>
    <td>text_id</td>
    <td>word</td>
    <td>count</td>
    </thead>
    <tbody>
    <?php body($text) ?>
    </tbody>
</table>
