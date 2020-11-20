<?php


namespace App\Models;


class UsersModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserId($user)
    {
        $query = $this->db->prepare('SELECT `id` FROM `users` WHERE `username` = :userName;');
        $query->execute([':userName' => $user]);
        return $query->fetch()['id'];
    }

    public function getUserPassword($user)
    {
        $query = $this->db->prepare('SELECT `password` FROM `users` WHERE `username` = :userName;');
        $query->execute([':userName' => $user]);
        return $query->fetch()['password'];
    }
}