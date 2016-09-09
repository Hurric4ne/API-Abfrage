<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>API-Abfrage</title>
    <link rel="shortcut icon" href="../res/img/favicon.ico">
    <link rel="stylesheet" href="../res/css/main.css">
    <?php
      require 'variables.php';
      session_start();
    ?>
  </head>
  <body>
    <header>
      <h3>Account-Auswahl</h3>
      <nav>
        <ul>
          <li><a href="../index.html">Startseite</a></li>
          <li><a class="active">Account-Auswahl</a></li>
          <li><a href="char_compare.php">Charakter-Vergleich</a></li>
          <li class="unset-wrapper">
            <form action="account_select.php" method="post">
              <input type="submit" name="unset" value="Ausloggen">
            </form>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="input-wrapper">
        <form action="account_select.php" method="post">
          <select name="continent">
            <option value="eu">Europa</option>
            <option value="us">Amerika</option>
          </select>
          <input type="text" name="BattleTag" pattern="^\D[0-9A-Za-z]{2,11}#\d{4,5}$" value="Hurric4ne#2268" required>
          <input type="submit" name="search" value="suchen">
        </form>
      </div>
      <div class="account-wrapper">
        <?php
          require 'acc_request.php';
        ?>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
