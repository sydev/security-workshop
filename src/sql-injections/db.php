<?php

class Database
{

  /**
   * @var PDO
   */
  protected $client;

  public function __construct()
  {
    $this->client = new PDO("mysql:host=mysql;dbname=sw", 'sw', 'abcdef');
  }

  public function build()
  {
    $users = [
      ['email' => 'test@pemedia.de', 'password' => 'test'],
      ['email' => 'sql@pemedia.de', 'password' => 'sql'],
      ['email' => 'injection@pemedia.de', 'password' => 'injection']
    ];

    $this->client->query("CREATE TABLE IF NOT EXISTS `user`(
      id INT AUTO_INCREMENT,
      email varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      PRIMARY KEY(id)
    )");

    $this->client->query("TRUNCATE `user`");

    foreach ($users as $user) {
      $stmt = $this->client->prepare("INSERT INTO `user` (email, `password`) VALUES (:email, :pw)");
      $stmt->execute([':email' => $user['email'], ':pw' => $user['password']]);
    }
  }
}
