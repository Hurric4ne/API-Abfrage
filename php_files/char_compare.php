<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>API-Abfrage</title>
    <link rel="shortcut icon" href="../res/img/favicon.ico">
    <link rel="stylesheet" href="../res/css/main.css" charset="utf-8">
    <?php require 'variables.php'; session_start();?>
  </head>
  <body>
    <header>
      <h3>Charakter-Vergleich</h3>
      <nav>
        <ul>
          <a href="../index.html"><li>Startseite</li></a>
          <a href="account_select.php"><li>Account-Auswahl</li></a>
          <a class="active"><li>Charakter-Vergleich</li></a>
        </ul>
      </nav>
    </header>
    <main>
      <div class="input-wrapper compare-wrapper">
        <form action="account_select.php" method="post">
          <input type="text" name="BattleTag" pattern="^\D.{2,11}#\d{4,5}$" value="Hurric4ne#2268" required>
          <input type="submit" name="search" value="suchen">
          <input type="text" name="BattleTag" pattern="^\D.{2,11}#\d{4,5}$" value="Megalomon#2727" required>
        </form>
      </div>
      <div class="table-wrapper">
        <?php
        $compare_arr = ['Schaden', 'Zähigkeit', 'Erholung', 'Leben'];
        ?>
        <table cellspacing="0">
          <th>
            <td>
              Charakter 1
            </td>
            <td>
              Charakter 2
            </td>
          </th>
          <?php
            for ($i=0; $i < sizeof($compare_arr); $i++) {
              echo "
              <tr>
                <td>$compare_arr[$i]</td>
                <td></td>
                <td></td>
              </tr>
              ";
            }
           ?>
        </table>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
