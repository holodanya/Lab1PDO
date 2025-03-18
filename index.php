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

                <label>Група:</label>
                <select name="group">
                    <option value="">Виберіть групу</option>
                    <option value="KI-12-1">KI-12-1</option>
                    <option value="KI-12-2">KI-12-2</option>
                    <option value="KI-12-3">KI-12-3</option>
                    <option value="KI-12-4">KI-12-4</option>
                    <option value="KI-12-5">KI-12-5</option>
                    <option value="KI-12-6">KI-12-6</option>
                </select>

                <label>Викладач:</label>
                <select name="teacher">
                    <option value="">Виберіть викладача</option>
                    <option value="Kovalenko A.A.">Kovalenko A.A.</option>
                    <option value="Yankovskiy O.A.">Yankovskiy O.A.</option>
                    <option value="Ivaschenko G.S.">Ivaschenko G.S.</option>
                    <option value="Semenov V.O.">Semenov V.O.</option>
                </select>

                <label>Аудиторія:</label>
                <select name="auditorium">
                    <option value="">Виберіть аудиторію</option>
                    <option value="10012">10012</option>
                    <option value="104i">104i</option>
                    <option value="221i">221i</option>
                    <option value="229">229</option>
                </select>

                <button type="submit">Отримати розклад</button>
            </fieldset>
        </form>
    </div>

</body>

</html>