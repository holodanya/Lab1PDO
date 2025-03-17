<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    $db_driver = "mysql";
    $host = "localhost";
    $database = "lb_pdo_lessons";
    $dsn = "$db_driver:host=$host; dbname=$database";
    $username = "root";
    $password = "";
    $options = array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
        $dbh = new PDO($dsn, $username, $password, $options);
        echo "Connected to database<br>";
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    // $sql = "INSERT INTO groups (ID_Groups, title) VALUES (6, 'KI-12-6')";
    // $sql = "INSERT INTO lesson_groups (FID_Lesson2, FID_Groups) VALUES (1,6), (2,6), (4,6)";
    // $sql = "INSERT INTO lesson (ID_Lesson, week_day, lesson_number, auditorium, disciple, type) VALUES (6, 'Wednesday', 3, '221i', 'Computer Science', 'Lecture')";
    // $sql = "INSERT INTO lesson_groups (FID_Lesson2, FID_Groups) VALUES (6,6)";
    // $sql = "INSERT INTO teacher (ID_Teacher, name) VALUES (4,'Semenov V.O.')";
    // $sql = "INSERT INTO lesson_teacher (FID_Teacher, FID_Lesson1) VALUES (4,6)";
    

    // $dbh->exec($sql);
    

    function getTimetable($dbh)
    {
        $sql = "
        SELECT DISTINCT 
        l.week_day, 
        l.lesson_number, 
        l.auditorium, 
        l.disciple, 
        t.name AS teacher_name, 
        l.type 
    FROM lesson AS l
    JOIN lesson_groups AS lg ON l.ID_Lesson = lg.FID_Lesson2
    JOIN groups AS g ON lg.FID_Groups = g.ID_Groups
    JOIN lesson_teacher AS lt ON l.ID_Lesson = lt.FID_Lesson1
    JOIN teacher AS t ON lt.FID_Teacher = t.ID_Teacher
    WHERE 1=1";

        // $group = isset($_GET['group']) ? $_GET['group'] : null;
        $group = 'KI-12-2';
        $teacher = isset($_GET['teacher']) ? $_GET['teacher'] : null;
        $auditorium = isset($_GET['auditorium']) ? $_GET['auditorium'] : null;

        $params = [];

        if (!empty($group)) {
            $sql .= " AND g.title = :group";
            $params['group'] = $group;
        }

        if (!empty($teacher)) {
            $sql .= " AND t.name = :teacher";
            $params['teacher'] = $teacher;
        }

        if (!empty($auditorium)) {
            $sql .= " AND l.auditorium = :auditorium";
            $params['auditorium'] = $auditorium;
        }


        $stmt = $dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    $lessons = getTimetable($dbh);
    ?>

    <table>
        <tr>
            <th>День недели</th>
            <th>Номер занятия</th>
            <th>Аудитория</th>
            <th>Дисциплина</th>
            <th>Преподаватель</th>
            <th>Тип</th>
        </tr>
        <?php if (!empty($lessons)): ?>
            <?php foreach ($lessons as $lesson): ?>
                <tr>
                    <td><?= htmlspecialchars($lesson['week_day']) ?></td>
                    <td><?= htmlspecialchars($lesson['lesson_number']) ?></td>
                    <td><?= htmlspecialchars($lesson['auditorium']) ?></td>
                    <td><?= htmlspecialchars($lesson['disciple']) ?></td>
                    <td><?= htmlspecialchars($lesson['teacher_name']) ?></td>
                    <td><?= htmlspecialchars($lesson['type']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Нет данных</td>
            </tr>
        <?php endif; ?>
    </table>


</body>

</html>