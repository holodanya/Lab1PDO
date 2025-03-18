<?php
include 'dbConnect.php';

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

    $group = isset($_GET['group']) ? $_GET['group'] : null;
    $teacher = isset($_GET['teacher']) ? $_GET['teacher'] : null;
    $auditorium = isset($_GET['auditorium']) ? $_GET['auditorium'] : null;

    if (empty($group) && empty($teacher) && empty($auditorium)) {
        return [];
    }

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

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Розклад</title>
</head>

<body>

    <h3>Розклад занять</h3>

    <table>
        <tr>
            <th>День тижня</th>
            <th>Номер заняття</th>
            <th>Аудиторія</th>
            <th>Дисципліна</th>
            <th>Викладач</th>
            <th>Тип заняття</th>
        </tr>
        <?php if (!empty($lessons)): ?>
            <?php foreach ($lessons as $lesson): ?>
                <tr>
                    <td><?= $lesson['week_day'] ?></td>
                    <td><?= $lesson['lesson_number'] ?></td>
                    <td><?= $lesson['auditorium'] ?></td>
                    <td><?= $lesson['disciple'] ?></td>
                    <td><?= $lesson['teacher_name'] ?></td>
                    <td><?= $lesson['type'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Немає даних</td>
            </tr>
        <?php endif; ?>
    </table>

</body>

</html>