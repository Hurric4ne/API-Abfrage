<?php
  session_start();
  require 'variables.php';
  $compare_arr = ['Schaden', 'Zähigkeit', 'Erholung', 'Leben'];

  if (isset($_POST['char1']) && isset($_POST['char2'])) {
    //erster Charakter dekodieren
    //$char1_uri = "../dummy-folder/Lidra.json";
    $char1_uri = $_SESSION['link_arr'][$_POST['char1']];
    $char1_content = file_get_contents($char1_uri);
    $char1_decode = json_decode($char1_content, true);

    //Werte des ersten Charakters in Array speichern
    $char1_stat_arr = array(
      $char1_decode['name'],
      (double)$char1_decode['stats']['damage'],
      (double)$char1_decode['stats']['toughness'],
      (double)$char1_decode['stats']['healing'],
      (double)$char1_decode['stats']['life']
    );

    //zweiter Charakter dekodieren
    //$char2_uri = "../dummy-folder/Haemmerli.json";
    $char2_uri = $_SESSION['link_arr'][$_POST['char2']];
    $char2_content = file_get_contents($char2_uri);
    $char2_decode = json_decode($char2_content, true);

    //Werte des zweiten Charakters in Array speichern
    $char2_stat_arr = array(
      $char2_decode['name'],
      (double)$char2_decode['stats']['damage'],
      (double)$char2_decode['stats']['toughness'],
      (double)$char2_decode['stats']['healing'],
      (double)$char2_decode['stats']['life']
    );

    //Werte der beiden Charaktere vergleichen und Unterschied in Array speichern
    $difference_left_arr = array();
    $difference_right_arr = array();
    $difference_stat_arr = array();

    for ($i=1; $i <= 4; $i++) {
      if ($char1_stat_arr[$i] > $char2_stat_arr[$i]) {
        $difference_left_arr[$i] = "green";
        $difference_right_arr[$i] = "red";
        $difference_stat_arr[$i] = 100 - round(100 / $char1_stat_arr[$i] * $char2_stat_arr[$i], 2);
      } elseif($char1_stat_arr[$i] < $char2_stat_arr[$i]) {
        $difference_left_arr[$i] = "red";
        $difference_right_arr[$i] = "green";
        $difference_stat_arr[$i] = 100 - round(100 / $char2_stat_arr[$i] * $char1_stat_arr[$i], 2);
      } else {
        $difference_left_arr[$i] = "blue";
        $difference_right_arr[$i] = "blue";
        $difference_stat_arr[$i] = 0;
      }
    }
  }else { //ende isset-if
    $no_account = "Bitte Charaktere auswählen!";
  }
?>
