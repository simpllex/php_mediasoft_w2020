<?php
$connection = new PDO('mysql:host=127.0.0.1:3306 ;dbname=myphp','root', '');

$selectQuery = 'SELECT * FROM uploaded_text';
$allRows = $connection->query($selectQuery)->fetchAll(PDO::FETCH_ASSOC);

function body($array) {
    foreach ($array as $arr) {
        $shortContent = mb_strimwidth($arr['content'], 0, 50, "...");
        echo "<tr>";
        echo "<td>{$arr['id']}</td>";
        echo "<td>$shortContent</td>";
        echo "<td>{$arr['date']}</td>";
        echo "<td>{$arr['words_count']}</td>";
        echo "<td><a href=personel.php/?id={$arr['id']}> ----- </a></td>";
        echo "</tr>";
    }
}

?>
<a href="load.php">Загрузка текста</a>
<table>
    <thead>
        <td>Id</td>
        <td>Content</td>
        <td>Date</td>
        <td>Words count</td>
        <td>   >>>>>>   </td>
    </thead>
    <tbody>
        <?php body($allRows) ?>
    </tbody>
</table>


