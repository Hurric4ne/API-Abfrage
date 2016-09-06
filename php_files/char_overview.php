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
    require 'char_request.php';
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
          <li class="unset-wrapper">
            <form action="account_select.php" method="post">
              <input type="submit" name="unset" value="Ausloggen">
            </form>
          </li>
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
            <?php if (isset($char_decode['items']['head'])) {
              echo "<a href=".$item_url.$char_decode['items']['head']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['head']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[0])) {
                  for ($i=0; $i < $socket_arr[0]; $i++) {
                    echo "<span class='socket middle_socket'></span>";
                    if ($head_gem != null) {
                      echo "<img class='gem' src='$head_gem'/>";
                    }
                  }
                }
              echo "</a>";
            }?>
          </div>

          <div class="slot shoulders-slot <?php echo $char_decode['items']['shoulders']['displayColor'];?>">
            <?php if (isset($char_decode['items']['shoulders'])) {
              echo "<a href=".$item_url.$char_decode['items']['shoulders']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['shoulders']['icon'].".png>";
                echo "</span>";
              echo "</a>";
            }?>
          </div>

          <div class="slot neck-slot <?php echo $char_decode['items']['neck']['displayColor'];?>">
            <?php if(isset($char_decode['items']['neck'])){
              echo "<a href=".$item_url.$char_decode['items']['neck']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['neck']['icon'].".png>";
                echo "</span>";
                  if (isset($socket_arr[1])) {
                    for ($i=0; $i < $socket_arr[1]; $i++) {
                      echo "<span class='socket middle_socket'></span>";
                      if (isset($neck_decode['gems'][0])) {
                        echo "<img class='gem' src='$neck_gem'/>";
                      }
                    }
                  }
              echo "</a>";
            }?>
          </div>

          <div class="slot hands-slot <?php echo $char_decode['items']['hands']['displayColor'];?>">
            <?php if (isset($char_decode['items']['hands'])) {
              echo "<a href=".$item_url.$char_decode['items']['hands']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['hands']['icon'].".png>";
                echo "</span>";
              echo "</a>";
            } ?>
          </div>

          <div class="slot torso-slot <?php echo $char_decode['items']['torso']['displayColor'];?>">
            <?php if(isset($char_decode['items']['torso'])) {
              echo "<a href=".$item_url.$char_decode['items']['torso']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['torso']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[2])) {
                  for ($i=0; $i < $socket_arr[2]; $i++) {
                    echo "<span class='socket torso_socket'></span>";
                    if (isset($torso_decode['gems'][$i])) {
                      echo "<img class='gem torso_gem_$i' src='$torso_gem[$i]'/>";
                    }
                  }
                }
              echo "</a>";
            } ?>
          </div>

          <div class="slot bracers-slot <?php echo $char_decode['items']['bracers']['displayColor'];?>">
            <?php if (isset($char_decode['items']['bracers'])) {
              echo "<a href=".$item_url.$char_decode['items']['bracers']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['bracers']['icon'].".png>";
                echo "</span>";
              echo "</a>";
            }?>
          </div>

          <div class="slot leftFinger-slot <?php echo $char_decode['items']['leftFinger']['displayColor'];?>">
            <?php if (isset($char_decode['items']['leftFinger'])) {
              echo "<a href=".$item_url.$char_decode['items']['leftFinger']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['leftFinger']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[3])) {
                  for ($i=0; $i < $socket_arr[3]; $i++) {
                    echo "<span class='socket middle_socket'></span>";
                    if (isset($leftFinger_decode['gems'][0])) {
                      echo "<img class='gem' src='$leftFinger_gem'/>";
                    }
                  }
                }
              echo "</a>";
            }?>
          </div>

          <div class="slot waist-slot <?php echo $char_decode['items']['waist']['displayColor'];?>">
            <?php if (isset($char_decode['items']['waist'])) {
              echo "<a href=".$item_url.$char_decode['items']['waist']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['waist']['icon'].".png>";
                echo "</span>";
              echo "</a>";
            }?>
          </div>

          <div class="slot rightFinger-slot <?php echo $char_decode['items']['rightFinger']['displayColor'];?>">
            <?php if (isset($char_decode['items']['rightFinger'])) {
              echo "<a href=".$item_url.$char_decode['items']['rightFinger']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['rightFinger']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[4])) {
                  for ($i=0; $i < $socket_arr[4]; $i++) {
                    echo "<span class='socket middle_socket'></span>";
                    if (isset($rightFinger_decode['gems'][0])) {
                      echo "<img class='gem' src='$rightFinger_gem'/>";
                    }
                  }
                }
              echo "</a>";
            }?>
          </div>

          <div class="slot legs-slot <?php echo $char_decode['items']['legs']['displayColor'];?>">
            <?php if(isset($char_decode['items']['legs'])) {
              echo "<a href=".$item_url.$char_decode['items']['legs']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['legs']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[5])) {
                  for ($i=0; $i < $socket_arr[5]; $i++) {
                    echo "<span class='socket legs_socket'></span>";
                    if (isset($legs_decode['gems'][$i])) {
                      echo "<img class='gem legs_gem_$i' src='$legs_gem[$i]'/>";
                    }
                  }
                }
              echo "</a>";
            }?>
          </div>

          <div class="slot mainHand-slot <?php echo $char_decode['items']['mainHand']['displayColor'];?>">
            <?php if (isset($char_decode['items']['mainHand'])) {
              echo "<a href=".$item_url.$char_decode['items']['mainHand']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['mainHand']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[6])) {
                  for ($i=0; $i < $socket_arr[6]; $i++) {
                    echo "<span class='socket middle_socket'></span>";
                    if ($mainHand_gem != null) {
                      echo "<img class='gem' src='$mainHand_gem'/>";
                    }
                  }
                }
              echo "</a>";
            }?>
          </div>

          <div class="slot feet-slot <?php echo $char_decode['items']['feet']['displayColor'];?>">
            <?php if(isset($char_decode['items']['feet'])) {
              echo "<a href=".$item_url.$char_decode['items']['feet']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['feet']['icon'].".png>";
                echo "</span>";
              echo "</a>";
            }?>
          </div>

          <div class="slot offHand-slot <?php echo $char_decode['items']['offHand']['displayColor'];?>">
            <?php if(isset($char_decode['items']['offHand'])) {
              echo "<a href=".$item_url.$char_decode['items']['offHand']['tooltipParams'].">";
                echo "<span class='img-wrap'>";
                  echo "<img src=".$item_icon.$char_decode['items']['offHand']['icon'].".png>";
                echo "</span>";
                if (isset($socket_arr[7])) {
                  for ($i=0; $i < $socket_arr[7]; $i++) {
                    echo "<span class='socket middle_socket'></span>";
                    if ($offHand_gem != null) {
                      echo "<img class='gem' src='$offHand_gem'/>";
                    }
                  }
                }
              echo "</a>";
            }?>
          </div>
        </div> <!-- slot-wrapper -->
        <hr>
        <div class="skill-wrapper">
          <?php
            $skill_arr = ['left_mouse', 'right_mouse', 'skill_1', 'skill_2', 'skill_3', 'skill_4'];
            for ($i=0; $i < count($skill_arr); $i++) {
              echo "<div class='active $skill_arr[$i]'>";
                if (isset($activetips_arr[$i])) {
                  echo "<a href='$activetips_arr[$i]'>";
                    echo "<label>";
                    if ($skillactive_arr[$i] != null) {
                      echo "<img src='$skillactive_arr[$i]'/>";
                    }
                    echo "</label>";
                  echo "</a>";
                }
              echo "</div>";
            }
          ?>
        </div> <!-- skill-wrapper -->

        <div class="passive-wrapper">
          <?php
            for ($i=0; $i<=3; $i++) {
              echo "<div class='passive'>";
              if (isset($skillpassive_arr[$i])) {
                echo "<a href='$passivetips_arr[$i]'>";
                  echo "<label>";
                  if ($skillpassive_arr[$i] != null) {
                    echo "<img src='$skillpassive_arr[$i]'/>";
                  }
                  echo "</label>";
                echo "</a>";
              }
              echo "</div>";
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
            <td><?php echo $stat_arr[0]; ?></td>
          </tr>
          <tr>
            <td>Zähigkeit:</td>
            <td><?php echo $stat_arr[1]; ?></td>
          </tr>
          <tr>
            <td>Erholung:</td>
            <td><?php echo $stat_arr[2]; ?></td>
          </tr>
          <tr>
            <td>Leben:</td>
            <td><?php echo $stat_arr[3]; ?></td>
          </tr>
          <tr>
            <td>getötete Elitegegner:</td>
            <td><?php echo $stat_arr[4]; ?></td>
          </tr>
        </table>
      </div>
      <?php ?> <!-- DEBUG -->
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
  </body>
</html>
