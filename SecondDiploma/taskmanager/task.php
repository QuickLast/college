<?php require_once('components/base.php'); ?>

<?php

$tasks = getAllTasks();

if (isset($_GET['q']))
{
  $tasks = getAllTasks($_GET['q']);
}

$id = intval($_GET['id']); 

$task = getTaskById($id);

$comments = getAllCommentsByTaskId($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="styles/task.css">
    <title>Task Manager</title>
    <link rel="icon" href="images/TaskManageLogo.png">
    <script src="https://kit.fontawesome.com/eca1301800.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="">Task Manager</a>
                <p>Управляй задачами легко и просто!</p>
            </div>
            <a href="index.php"><button>Назад к списку</button></a>
        </nav>
    </header>
    <div class="task-info">
        <i style="color:white" class="fa fa-xmark"></i>
        <p style="color:white"><a style="color:white" href=""> <i class="fa fa-comment"></i></a> <?= getTaskCommentsCount($task['id']); ?> <a style="color:white" href=""><i class="fa fa-calendar"></i></a> <?= date("d.m.Y", strtotime($task['created_at']));?></p>
        <p id="p"><?= $task['name']?></p>
        <button><?= $task['tag']?></button>
        <i style="color: white" class="fa fa-arrow-right"></i>
    </div>
    <div class="commentaries">
        <p id="p">Комментарии</p>
        
        <?php if (count($comments) > 0) : ?>
            <ul>
            <?php foreach ($comments as $comment) : ?>
                <!-- comment -->
                <li class="comment_li">
                <div class="comment">
                    <img src="images/amazonmusic.png" alt="logo">
                    <div class="text">
                        <p><b><?=$comment['username'];?></b> (<?=date("d.m.Y", strtotime($comment['created_at']));?>)</p>
                        <p><?=$comment['text'];?></p>
                    </div>
                </div>
                </li>
                <!-- end comment -->
            <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <div class="no-comment">
                <p>На данный момент никто не оставил комментариев</p>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['AUTH_USER'])) : ?>
            <p id="p">Добавить комментарий</p>
            <form id="form-comment" action="actions/add_task_comment.php" method="post">
                <input type="hidden" name="task_id" value="<?= $id ?>">
                <textarea id="textarea" name="text" placeholder="Добавьте комментарий"></textarea>
                <input id="submit" type="submit" value="Добавить комментарий">
            </form>
        <?php endif; ?>
    </div>
</body>

</html>