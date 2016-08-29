<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>API-Abfrage</title>
    <link rel="shortcut icon" href="../res/img/favicon.ico">
    <link rel="stylesheet" href="../res/css/main.css" charset="utf-8">
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
          <a href="../index.html"><li>Startseite</li></a>
          <a class="active"><li>Account-Auswahl</li></a>
          <a href="char_overview.php"><li>Charakter-Übersicht</li></a>
          <a href="char_compare.php"><li>Charakter-Vergleich</li></a>
        </ul>
      </nav>
    </header>
    <main>
      <div class="input-wrapper">
        <form action="account_select.php" method="post">
          <input type="text" name="BattleTag" placeholder="Hurric4ne#2268" required>
          <input type="submit" name="search" value="suchen">
        </form>
      </div>
      <div class="account-wrapper">
        <?php
        include 'BattleTag_check.php';
        echo $BattleTag;
        ?>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
