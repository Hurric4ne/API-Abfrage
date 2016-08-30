<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>API-Abfrage</title>
    <link rel="shortcut icon" href="../res/img/favicon.ico">
    <link rel="stylesheet" href="../res/css/main.css" charset="utf-8">
    <?php require 'variables.php'; ?>
  </head>
  <body>
    <header>
      <h3>Charakter-Übersicht</h3>
      <nav>
        <ul>
          <a href="../index.html"><li>Startseite</li></a>
          <a href="account_select.php"><li>Account-Auswahl</li></a>
          <a class="active"><li>Charakter-Übersicht</li></a>
          <a href="char_compare.php"><li>Charakter-Vergleich</li></a>
        </ul>
      </nav>
    </header>
    <main>
      <div class="char-wrapper">
        <div class="text-wrapper">
          <ul>
            <li>Name:</li>
            <li><?php  echo "Worusk"; ?></li>
          </ul>
          <ul>
            <li>Klasse:</li>
            <li><?php  echo "Barbar"; ?></li>
          </ul>
        </div><hr>

        <div class="slot-wrapper">

          <div class="slot head-slot">

          </div>

          <div class="slot shoulder-slot">

          </div>

          <div class="slot amulet-slot">

          </div>

          <div class="slot glove-slot">

          </div>

          <div class="slot chest-slot">

          </div>

          <div class="slot bracer-slot">

          </div>

          <div class="slot left_ring-slot">

          </div>

          <div class="slot belt-slot">

          </div>

          <div class="slot right_ring-slot">

          </div>

          <div class="slot pants-slot">

          </div>

          <div class="slot weapon-slot">

          </div>

          <div class="slot boot-slot">

          </div>

          <div class="slot offhand-slot">

          </div>
        </div> <!-- slot-wrapper -->
        <hr>
        <div class="skill-wrapper">

        </div>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
