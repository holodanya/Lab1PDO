<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Розклад</title>
</head>

<body>

    <div id="SelectForm">
        <form action="getTimetable.php" method="GET">
            <fieldset>
                <legend><b>Вибір Розкладу</b></legend>
                <?php
                include 'dbConnect.php';

                $stmt = $dbh->query("SELECT title FROM groups");
                $groups = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $dbh->query("SELECT name FROM teacher");
                $teachers = $stmt->fetchAll(PDO::FETCH_COLUMN);

                $stmt = $dbh->query("SELECT DISTINCT auditorium FROM lesson");
                $auditoriums = $stmt->fetchAll(PDO::FETCH_COLUMN);
                ?>
                <label>Група:</label>
                <select name="group">
                    <option value="">Виберіть групу</option>';
                    <?php
                    foreach ($groups as $group) {
                        echo '<option value="' . $group . '">' . $group . '</option>';
                    }
                    ?>
                </select>
                <label>Викладач:</label>
                <select name="teacher">
                    <option value="">Виберіть викладача</option>';
                    <?php
                    foreach ($teachers as $teacher) {
                        echo '<option value="' . $teacher . '">' . $teacher . '</option>';
                    }
                    ?>
                </select>
                <label>Аудиторія:</label>
                <select name="auditorium">
                    <option value="">Виберіть аудиторію</option>';
                    <?php foreach ($auditoriums as $auditorium) {
                        echo '<option value="' . $auditorium . '">' . $auditorium . '</option>';
                    }
                    ?>
                </select>
                <button type="submit">Отримати розклад</button>
            </fieldset>
        </form>
    </div>

</body>

</html>