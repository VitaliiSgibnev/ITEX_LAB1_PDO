<?php
include("connect.php");
$teacherName = $_GET["teacherName"];
try {
    $sqlSelect = "SELECT DISTINCT week_day, lesson_number, auditorium, disciple, `type`, title FROM lesson, lesson_teacher, teacher, `groups`, lesson_groups WHERE name=:teacherName AND ID_Teacher=FID_Teacher AND ID_Lesson=FID_Lesson1 AND id_groups=fid_groups AND id_lesson=fid_lesson2";
    echo "<table border='1'>";
    echo "<thead><tr><th>week_day</th><th>lesson_number</th><th>auditorium</th><th>disciple</th><th>type</th></th><th>title</th></tr></thead>";
    echo "<tbody>";
    $sth = $dbh->prepare($sqlSelect);
    $sth->bindValue(":teacherName", $teacherName);
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_NUM);
    foreach($res as $row){
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}