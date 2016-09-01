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

          <div class="slot head-slot <?php echo $char_decode['items']['head']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['head']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['head']['icon'].'.png';?>" />
              </span>
              <span class="socket middle">
              </span>
            </a>
          </div>

          <div class="slot shoulders-slot <?php echo $char_decode['items']['shoulders']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['shoulders']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['shoulders']['icon'].'.png';?>" />
              </span>
            </a>
          </div>

          <div class="slot neck-slot <?php echo $char_decode['items']['neck']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['neck']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['neck']['icon'].'.png';?>" />
              </span>
              <span class="socket middle">
              </span>
            </a>
          </div>

          <div class="slot hands-slot <?php echo $char_decode['items']['hands']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['hands']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['hands']['icon'].'.png';?>" />
              </span>
            </a>
          </div>

          <div class="slot torso-slot <?php echo $char_decode['items']['torso']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['torso']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['torso']['icon'].'.png';?>" />
              </span>
              <span class="socket top">
              </span>
              <span class="socket middle">
              </span>
              <span class="socket bottom">
              </span>
            </a>
          </div>

          <div class="slot bracers-slot <?php echo $char_decode['items']['bracers']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['bracers']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['bracers']['icon'].'.png';?>" />
              </span>
            </a>
          </div>

          <div class="slot leftFinger-slot <?php echo $char_decode['items']['leftFinger']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['leftFinger']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['leftFinger']['icon'].'.png';?>" />
              </span>
              <span class="socket middle">
              </span>
            </a>
          </div>

          <div class="slot waist-slot <?php echo $char_decode['items']['waist']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['waist']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['waist']['icon'].'.png';?>" />
              </span>
            </a>
          </div>

          <div class="slot rightFinger-slot <?php echo $char_decode['items']['rightFinger']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['rightFinger']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['rightFinger']['icon'].'.png';?>" />
              </span>
              <span class="socket middle">
              </span>
            </a>
          </div>

          <div class="slot legs-slot <?php echo $char_decode['items']['legs']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['legs']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['legs']['icon'].'.png';?>" />
              </span>
              <span class="socket special">
              </span>
              <span class="socket special">
              </span>
            </a>
          </div>

          <div class="slot mainHand-slot <?php echo $char_decode['items']['mainHand']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['mainHand']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['mainHand']['icon'].'.png';?>" />
              </span>
              <span class="socket middle">
              </span>
            </a>
          </div>

          <div class="slot feet-slot <?php echo $char_decode['items']['feet']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['feet']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['feet']['icon'].'.png';?>" />
              </span>
            </a>
          </div>

          <div class="slot offHand-slot <?php echo $char_decode['items']['offHand']['displayColor'];?>">
            <a href="<?php echo $item_url.$char_decode['items']['offHand']['tooltipParams'];?>">
              <span class="img-wrap">
                <img src="<?php echo $item_icon.$char_decode['items']['offHand']['icon'].'.png';?>" />
              </span>
              <span class="socket middle">
              </span>
            </a>
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
          <tr>
            <td>getötete Elitegegner:</td>
            <td><?php echo $stat_arr['Elitekills']; ?></td>
          </tr>
        </table>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
