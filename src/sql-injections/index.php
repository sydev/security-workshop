<?php
  require_once 'db.php';
  require_once 'vulnerable.php';
  require_once 'solution.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['form_name']) {
      case 'build-db':
        $db = new Database();
        $db->build();
        break;

      case 'sql-injection':
        $v = new Vulnerable();
        $users = $v->login($_POST['email'], $_POST['password']);
        break;

      case 'solution':
        $s = new Solution();
        $users = $s->login($_POST['email'], $_POST['password']);
        break;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL Injections</title>
</head>
<body>
  <h1>SQL Injections</h1>

  <form method="POST" name="build-db">
    <p>Klicke den Button um die Datenbank aufzusetzen.</p>
    <input type="hidden" name="form_name" value="build-db" />
    <button type="submit">Datenbank aufsetzen</button>
  </form>

  <form method="POST" name="sql-injection">
    <h2>SQL Injection</h2>
    <input type="hidden" name="form_name" value="sql-injection" />
    <input type="text" name="email" placeholder="E-Mail" />
    <input type="text" name="password" placeholder="Passwort" />
    <button type="submit">Absenden</button>
  </form>

  <form method="POST" name="solution">
    <h2>Solution</h2>
    <input type="hidden" name="form_name" value="solution" />
    <input type="text" name="email" placeholder="E-Mail" />
    <input type="text" name="password" placeholder="Passwort" />
    <button type="submit">Absenden</button>
  </form>

  <div>
    <?php if (isset($users)): ?>
      <?php foreach ($users as $user): ?>
        <p><?php echo $user['email']; ?> <?php echo $user['password']; ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</body>
</html>
