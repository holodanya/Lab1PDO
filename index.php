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

    function getStudent($dbhh)
    {
        $sql = "SELECT * FROM lesson";
        foreach ($dbhh->query($sql) as $row) {
            print "
            <table>
            <thead>
                <tr>
                    <th>$row[ID_Lesson]</th>
                    <th>$row[type]</th>
                    <th>$row[disciple]</th>
                </tr>   
            </thead>
            </table>
            "
            ;
        }
    }

    getStudent($dbh);

    ?>

</body>

</html>