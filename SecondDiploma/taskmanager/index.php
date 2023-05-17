<?php require_once('components/base.php'); ?>

<?php

$tasks = getAllTasks();

if (isset($_GET['q']))
{
  $tasks = getAllTasks($_GET['q']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <title>Task Manager</title>
    <link rel="icon" href="images/TaskManageLogo.png">
    <script src="https://kit.fontawesome.com/eca1301800.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php if(auth()): ?>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="">Task Manager</a>
                <p>Управляй задачами легко и просто!</p>
            </div>
            <div class="h-buttons">
                <a href="logout.php"><button>Выйти</button></a>
                <a href="add_task.php"><button>Добавить задачу</button></a>
            </div>
        </nav>
    </header>
    <div class="task-list">
    <div class="task-list">
        <?php if(count($tasks) > 0): ?>

        <?php foreach($tasks as $task): ?>
        
        <!-- Start Task -->
        <div class="task">
            <img src="images/blue-line.png" alt="blue-line">
            <a id="task-name" href="task.php?id=<?=$task['id'];?>">
                <p><?= $task['name']?></p>
            </a>
            <div class="small-info">
                <p style="color:grey"><a href=""><i class="fa fa-comment"></i></a> <?= getTaskCommentsCount($task['id']); ?> <a href=""><i class="fa fa-calendar"></i></a> <?= $task['created_at']?></p>
            </div>
            <div class="task-actions">
                <button><?= $task['tag'] ?></button>
                <p style="color:grey"><a href="edit_task.php?id=<?=$task['id']?>"><i class="fa fa-pen-to-square"></i></a><a href="actions/remove_task.php?id=<?=$task['id'];?>"><i class="fa fa-trash"></i></a></p>
            </div>
        </div>
        <!-- End Task -->
        <?php endforeach; ?>

        <?php else: ?>
            <div class="task">
                <p>На данный момент задач нет.</p>
            </div>
        <?php endif; ?>
    </div>
    <?php else: ?>
        <header>
            <nav class="navbar">
                <div class="logo">
                    <a href="">Task Manager</a>
                    <p>Управляй задачами легко и просто!</p>
                </div>
                <div class="h-buttons">
                    <a href="signup.php"><button>Зарегистрироваться</button></a>
                    <a href="login.php"><button>Войти</button></a>
                </div>
            </nav>
        </header>
        <div class="navbar">
            <p><i class="fa fa-warning"></i> Пожалуйста, войдите в систему, чтобы просмотреть свои задачи.</p>
        </div>
    <?php endif; ?>
</body>
</html>