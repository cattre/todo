<?php


namespace App\Models;


class TaskModel
{
    private \PDO $db;

    /**
     * TaskModel constructor.
     *
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getActiveTasks($user, $filter): array
    {
        $query = $this->db->prepare('SELECT * FROM `tasks` WHERE `user` = :id AND `completed` = 0 AND `archived` = 0 AND `category` like :filter ORDER BY `DUE` IS NULL, `DUE` ASC;');
        $query->execute([':id' => $user, ':filter' => $filter]);
        return $query->fetchAll();
    }

    public function getTasks($user, string $filter): array
    {
        $query = $this->db->prepare('SELECT * FROM `tasks` WHERE `user` = :id AND `archived` = 0 AND `category` like :filter ORDER BY `DUE` IS NULL, `DUE` ASC;');
        $query->execute([':id' => $user, ':filter' => $filter]);
        return $query->fetchAll();
    }

    public function addTask(int $user, string $task, string $category, $due)
    {
        $query = $this->db->prepare('INSERT INTO `tasks` (`user`, `task`, `category`, `due`) VALUES (:user, :task, :category, :due);');
        $query->execute([':user' => $user, ':task' => $task, ':category' => $category, ':due' => $due]);
    }

    public function updateStatus(int $taskId, int $status)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `completed` = :status WHERE `id` = :taskId;');
        $query->execute([':taskId' => $taskId, ':status' => $status]);
    }

    public function deleteTask(int $taskId)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `archived` = 1 WHERE `id` = :taskId;');
        $query->execute([':taskId' => $taskId]);
    }

    public function getTask(int $taskId): array
    {
        $query = $this->db->prepare('SELECT * FROM `tasks` WHERE `id` = :taskId;');
        $query->execute([':taskId' => $taskId]);
        return $query->fetch();
    }

    public function updateTask(int $taskId, string $task, string $category, $due)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `task` = :task, `category` = :category, `due` = :due WHERE `id` = :taskId;');
        $query->execute([':taskId' => $taskId, ':task' => $task, ':category' => $category, ':due' => $due]);
    }

    public function reopenTask(int $taskId)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `completed` = 0 WHERE `id` = :taskId;');
        $query->execute([':taskId' => $taskId]);
    }
}