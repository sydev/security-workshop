<?php

require_once 'db.php';

class Vulnerable extends Database
{
  public function login($email, $password)
  {
    $stmt = $this->client->query("SELECT * FROM `user` WHERE email = '". $email ."' AND `password` = '". $password ."'");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
