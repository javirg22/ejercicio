<?php
class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTasksByUser($userId) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function getTaskByIdAndUser($taskId, $userId) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ? AND user_id = ?");
        $stmt->execute([$taskId, $userId]);
        return $stmt->fetch();
    }

    public function createTask($title, $description, $userId) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description, user_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $userId]);
    }

    public function updateTask($taskId, $title, $description) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $taskId]);
    }

    public function deleteTask($taskId) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$taskId]);
    }
}
?>
