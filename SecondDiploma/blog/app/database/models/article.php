<?php

function getAllArticles(string $query = "")
{
    global $database;

    //$articles = $database->query("SELECT * FROM `articles`")->fetchAll(PDO::FETCH_ASSOC);

    $articles_sql = "SELECT `articles`.*, `users`.`username` 
                    FROM `articles` JOIN `users` 
                    ON `articles`.`author_id` = `users`.`id`";

    if (strlen($query) > 0)
    {
        $articles_sql .= " WHERE `articles`.`title` LIKE '%$query%'";
    }

    $articles_sql .= " ORDER BY `articles`.`created_at` DESC";

    $state = $database->prepare($articles_sql);
    $state->execute();

    $articles = $state->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function getArticleById($id)
{
    global $database;

    $state = $database->prepare("SELECT * FROM `articles` WHERE `id` = :id");
    $state->execute(['id' => $id]);

    $article = $state->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        return [];
    }

    return $article;
}

function getAllCommentsByArticleId($id)
{
    global $database;

    $articles_sql = "SELECT `article_comments`.*, `users`.`username`, `users`.`path`
                    FROM `article_comments`
                    JOIN `users`
                    ON `users`.`id` = `article_comments`.`user_id`
                    WHERE `article_comments`.`article_id` = :id
                    ORDER BY `article_comments`.`created_at` DESC";

    $state = $database->prepare($articles_sql);
    $state->execute(['id' => $id]);

    $articles = $state->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function getArticleCommentsCount(int $id): int
{
    global $database;

    $sql = "SELECT count(`id`) AS 'comment_size'
            FROM `article_comments`
            WHERE `article_comments`.`article_id` = $id";

    $count = $database->query($sql)->fetch(PDO::FETCH_ASSOC);

    $count = $count['comment_size'];

    return intval($count);
}

function createArticle(array $article) {
    global $database;

    $sql = "INSERT INTO `articles`
            (`title`, `theme`, `content`, `author_id`)
            VALUES (:title, :theme, :content, :author_id)";

    $state = $database->prepare($sql);

    $state->execute([
        'title' => $article['title'],
        'theme' => $article['theme'],
        'content' => $article['content'],
        'author_id' => $article['author_id']
    ]);

    var_dump($article);

    die();

    $articleId = $database->lastInsertID();

    if ($article['image_path']) {
        $image_path = $article['image_path'];

        $sql = "UPDATE `articles` SET `image_path`=\"$image_path\" WHERE `id` = $articleId";

        $database->query($sql);
    }

    return getArticleById($articleId);
}

function updateArticle(array $article)
{
    global $database;

    $sql = "UPDATE `articles` SET
                              `title` = :title,
                              `theme` = :theme,
                              `content` = :content,
                              WHERE `id` = :id
    ";

    $state = $database->prepare($sql);

    $state->execute([
        'title' => $article['title'],
        'theme' => $article['theme'],
        'content' => $article['content'],
        'id' => $article['id'],
    ]);

    $articleId = $article['id'];

    if ($article['image_path']) {
        $image_path = $article['image_path'];

        $sql = "UPDATE `articles` SET `image_path`=\"$image_path\" WHERE `id` = $articleId";

        $database->query($sql);
    }

    return getArticleById($articleId);
};