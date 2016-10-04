<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>API-Abfrage</title>
    <link rel="shortcut icon" href="../res/img/favicon.ico">
    <link rel="stylesheet" href="../res/css/main.css">
    <?php
      require 'variables.php';
      require 'compare_request.php';
    ?>
  </head>
  <body>
    <header>
      <h3>Charakter-Vergleich</h3>
      <nav>
        <ul>
          <li><a href="../index.html">Startseite</a></li>
          <li><a href="account_select.php">Account-Auswahl</a></li>
          <li><a class="active">Charakter-Vergleich</a></li>
          <li class="unset-wrapper">
            <form action="account_select.php" method="post">
              <input type="submit" name="unset" value="Ausloggen">
            </form>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="select-wrapper">
        <form action="char_compare.php" method="post">
          <select name="char1">
            <?php
              for ($i=0; $i < sizeof($_SESSION['charnames']); $i++) {
                echo "<option value='".$_SESSION['char_id'][$i]."'>".$_SESSION['charnames'][$i]."</option>";
              }
            ?>
          </select>
          <input type="submit" name="compare" value="vergleichen" onclick="showLoading()">
          <select name="char2">
            <?php
            if (isset($_SESSION['charnames'])) {
              for ($i=0; $i < sizeof($_SESSION['charnames']); $i++) {
                echo "<option value='".$_SESSION['char_id'][$i]."'>".$_SESSION['charnames'][$i]."</option>";
              }
            }
            ?>
          </select>
        </form>
      </div>
      <div class="loading-wrapper">
        <img id="loading" class="hideLoading" src="../res/img/loading.gif" alt="loading" />
      </div>
      <div class="table-wrapper">
        <?php
          if (isset($_POST['char1']) && isset($_POST['char2']) ) {
        ?>
        <table>
          <tr>
            <th></th>
            <th><?php echo $char1_stat_arr[0]; ?> </th>
            <th><?php echo $char2_stat_arr[0]; ?> </th>
            <th>Unterschied</th>
          </tr>
          <?php
            for ($i=0; $i < sizeof($compare_arr); $i++) {
                echo "<tr>";
                  echo "<td>".$compare_arr[$i]."</td>";
                  echo "<td class='".$difference_left_arr[$i+1]."'>".str_replace('.', ',', $char1_stat_arr[$i+1])."</td>";
                  echo "<td class='".$difference_right_arr[$i+1]."'>".str_replace('.', ',', $char2_stat_arr[$i+1])."</td>";
                  echo "<td>".str_replace('.', ',', $difference_stat_arr[$i+1])." %</td>";
                echo "</tr>";
              }
            } else {
              if (isset($_SESSION['charnames'])) {
                echo "<h1>".$select_chars."</h1>";
              } else {
                echo "<h1>".$no_account."</h1>";
              }
            }
           ?>
        </table>
      </div>
    </main>
    <footer>
      <p>©1996 - 2016 Blizzard Entertainment, Inc. All rights reserved.<br>Battle.net, Blizzard Entertainment, Diablo and Reaper of Souls are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>
    </footer>
    <script src="../res/javascript/main.js"></script>
  </body>
</html>
