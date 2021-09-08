<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XSS</title>
</head>
<body>
  <h1>XSS</h1>

  <form method="POST">
    <h4>Vulnerable</h4>
    <input type="search" name="search-vulnerable" />
    <button type="submit">Suchen</button>
  </form>

  <form method="POST">
    <h4>Solution</h4>
    <input type="search" name="search-solution" />
    <button type="submit">Suchen</button>
  </form>

  <?php
    include 'vulnerable.php';
    include 'solution.php';

    if (isset($_POST['search-vulnerable'])) {
      echo 'Du hast nach '. Vulnerable::search($_POST['search-vulnerable']) .' gesucht!';
    }

    if (isset($_POST['search-solution'])) {
      echo 'Du hast nach '. Solution::search($_POST['search-solution']) .' gesucht!';
    }
  ?>
</body>
</html>
