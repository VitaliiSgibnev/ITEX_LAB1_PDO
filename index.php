<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: grey;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }
        h1 {
            text-align: center;
        }
    </style>
    <title>LB_1_PDO</title>
</head>
<body>
    <h1>Сгібнєв В.І. КІУКІ-20-4 </br>
    Варіант 1</h1>
    <hr>
    <section>
        <h2>Розклад занять для довільної групи зі списку:</h2>
        <form action="get_gr.php" method="get">
            <select name="groupName" id="groupName">
                <option value="">Оберіть групу за списком</option>
                <?php
                try {
                    $stmt = $dbh->query("SELECT DISTINCT `title` FROM `groups`");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$row[title]'>$row[title]</option>";
                    }
                } catch(PDOException $ex) {
                    echo $ex->getMessage();
                }
                ?>
            </select>
            <input type="submit" value="Переглянути">
        </form>
    </section>
    <section>
        <h2>Розклад занять для довільного викладача зі списку:</h2>
        <form action="get_th.php" method="get">
            <select name="teacherName" id="teacherName">
                <option value="">Оберіть викладача за списком</option>
                <?php
                try {
                    $stmt = $dbh->query("SELECT DISTINCT `name` FROM `teacher`");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$row[name]'>$row[name]</option>";
                    }
                } catch(PDOException $ex) {
                    echo $ex->getMessage();
                }
                ?>
            </select>
            <input type="submit" value="Переглянути">
        </form>
    </section>
    <section>
        <h2>Розклад занять для довільної аудиторії зі списку:</h2>
        <form action="get_au.php" method="get">
            <select name="auName" id="auName">
                <option value="">Оберіть аудиторію за списком</option>
                <?php
                try {
                    $stmt = $dbh->query("SELECT DISTINCT `auditorium` FROM `lesson`");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='$row[auditorium]'>$row[auditorium]</option>";
                    }
                } catch(PDOException $ex) {
                    echo $ex->getMessage();
                }
                ?>
            </select>
            <input type="submit" value="Переглянути">
        </form>
    </section>
</body>
</html>
