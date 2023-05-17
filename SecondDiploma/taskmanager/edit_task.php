<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="styles/add_task.css">
    <title>Task Manager</title>
    <link rel="icon" href="images/TaskManageLogo.png">
    <script src="https://kit.fontawesome.com/eca1301800.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="add-task">
        <a href><i class="fa fa-xmark"></i></a>
        <p>Редактирование записи</p>
        <form action="actions/edit_task.php" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="text" id="heading" name="name" placeholder="Например: Подготовить ТЗ" required>
            <input type="text" id="theme" name="tag" placeholder="Например: Работа" required>
            <input type="submit" value="Добавить задачу">
        </form>
    </div>
</body>

</html>