<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>API-Abfrage</title>
    <link rel="shortcut icon" href="../res/img/favicon.ico">
    <link rel="stylesheet" href="../res/css/main.css" charset="utf-8">
    <script src="../res/javascript/tooltips_overview.js"></script>
    <?php
    session_start();
    require 'variables.php';
    require 'skills.php';
    ?>
  </head>
  <body>
    <header>
      <h3>Charakter-Übersicht</h3>
      <nav>
        <ul class="special">
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
            <li><?php  echo $char_name; ?></li>
          </ul>
          <ul>
            <li>Klasse:</li>
            <li><?php  echo $char_class; ?></li>
          </ul>
        </div><hr>

        <div class="slot-wrapper">

          <div class="slot head-slot">
            <span class="socket-wrapper">
              <span class="socket middle">
              </span>
            </span>
          </div>

          <div class="slot shoulder-slot">

          </div>

          <div class="slot amulet-slot">
            <span class="socket-wrapper">
              <span class="socket middle">
              </span>
            </span>
          </div>

          <div class="slot glove-slot">

          </div>

          <div class="slot chest-slot">
            <span class="socket-wrapper">
              <span class="socket top">
              </span>
              <span class="socket middle">
              </span>
              <span class="socket bottom">
              </span>
            </span>
          </div>

          <div class="slot bracer-slot">

          </div>

          <div class="slot left_ring-slot">
            <span class="socket-wrapper">
              <span class="socket middle">
              </span>
            </span>
          </div>

          <div class="slot belt-slot">

          </div>

          <div class="slot right_ring-slot">
            <span class="socket-wrapper">
              <span class="socket middle">
              </span>
            </span>
          </div>

          <div class="slot pants-slot">
            <span class="socket-wrapper">
              <span class="socket special">
              </span>
              <span class="socket special">
              </span>
            </span>
          </div>

          <div class="slot weapon-slot">
            <span class="socket-wrapper">
              <span class="socket middle">
              </span>
            </span>
          </div>

          <div class="slot boot-slot">

          </div>

          <div class="slot offhand-slot">
            <span class="socket-wrapper">
              <span class="socket middle">
              </span>
            </span>
          </div>
        </div> <!-- slot-wrapper -->
        <hr>
        <div class="skill-wrapper">
        <?php
          $skill_arr = ['left_mouse', 'right_mouse', 'skill_1', 'skill_2', 'skill_3', 'skill_4'];
          for ($i=0; $i < count($skill_arr); $i++) {
            echo
              "<a href='$activetips_arr[$i]'>
                <label class=$skill_arr[$i]>";
                if ($skillactive_arr[$i] != null) {
                  echo "<img src='$skillactive_arr[$i]'/>";
                }
                echo "</label>
              </a>";
          }
        ?>
        </div> <!-- skill-wrapper -->

        <div class="passive-wrapper">
          <?php
            for ($i=0; $i<=3; $i++) {
              echo
              "<a href='$passivetips_arr[$i]'>
                <label>";
                if ($skillpassive_arr[$i] != null) {
                  echo "<img src='$skillpassive_arr[$i]'/>";
                }
                echo "</label>
              </a>";
            }
          ?>
        </div> <!-- passive-wrapper -->
      </div> <!-- char-wrapper -->
      <div class="details-wrapper">
        <table cellspacing='0'>
          <tr>
            <td class="bold">statistische</td>
            <td class="bold">Werte</td>
          </tr>
          <tr>
            <td>Schaden:</td>
            <td><?php echo $stat_arr['Schaden']; ?></td>
          </tr>
          <tr>
            <td>Zähigkeit:</td>
            <td><?php echo $stat_arr['Zähigkeit']; ?></td>
          </tr>
          <tr>
            <td>Erholung:</td>
            <td><?php echo $stat_arr['Erholung']; ?></td>
          </tr>
          <tr>
            <td>Leben:</td>
            <td><?php echo $stat_arr['Leben']; ?></td>
          </tr>
        </table>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
