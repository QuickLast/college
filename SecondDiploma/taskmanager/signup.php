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
        <a href=""><i class="fa fa-xmark"></i></a>
        <p>Регистрация</p>
        <form action="actions/signup.php" method="POST">
            <input type="text" id="heading" name="username" placeholder="Логин" required>
            <input type="text" id="heading" name="email" placeholder="E-mail" required>
            <input type="password" id="theme" name="password" placeholder="Пароль" required>
            <input type="password" id="theme" name="re_password" placeholder="Повторите пароль" required>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
</body>

</html>