<?php

function getAllTasks(string $query = "")
{
    global $database;

    $tasks_sql = "SELECT `tasks`.*
                    FROM `tasks`";

    if (strlen($query) > 0)
    {
        $tasks_sql .= "WHERE `tasks`.`name` LIKE '%$query%'";
    }

    $tasks_sql .= "ORDER BY `tasks`.`created_at` DESC";

    $state = $database->prepare($tasks_sql);
    $state->execute();

    $tasks = $state->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

function getTaskById($id)
{
    global $database;

    $state = $database->prepare("SELECT * FROM `tasks` WHERE `id` = :id");
    $state->execute(['id' => $id]);

    $task = $state->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        return [];
    }

    return $task;
}

function createTask(array $task)
{
    global $database;

    $sql = "INSERT INTO `tasks`
            (`name`, `tag`)
            VALUES (:name, :tag)";

    $state = $database->prepare($sql);

    $state->execute([
        'name' => $task['name'],
        'tag' => $task['tag'],
    ]);

    $taskId = $database->lastInsertID();

    return getTaskById($taskId);
}

function updateTask(array $task)
{
    global $database;

    $sql = "UPDATE `tasks` SET `name`=:name, `tag`=:tag WHERE `id` = :id";

    $state = $database->prepare($sql);

    $state->execute([
        'name' => $task['name'],
        'tag' => $task['tag'],
        'id' => $task['id'],
    ]);

    $taskId = $task['id'];

    return getTaskById($taskId);
}

function getTaskCommentsCount($id): int
{
    global $database;

    $sql = "SELECT count(`task_id`) AS 'comment_size'
            FROM `task_comments`
            WHERE `task_comments`.`task_id` = $id";

    $count = $database->query($sql)->fetch(PDO::FETCH_ASSOC);

    $count = $count['comment_size'];

    return intval($count);
}

function getAllCommentsByTaskId($id)
{
    global $database;

    $tasks_sql = "SELECT `task_comments`.*, `users`.`username`
                    FROM `task_comments`
                    JOIN `users`
                    ON `users`.`id` = `task_comments`.`user_id`
                    WHERE `task_comments`.`task_id` = :id
                    ORDER BY `task_comments`.`created_at` DESC";

    $state = $database->prepare($tasks_sql);
    $state->execute(['id' => $id]);

    $tasks = $state->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
