<?php

require_once 'db.php';

class Solution extends Database
{
  public function login($email, $password)
  {
    // Mit PDO::prepare
    $stmt = $this->client->prepare("SELECT * FROM `user` WHERE email = :email AND `password` = :password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    return $stmt->fetchAll();
  }
}
