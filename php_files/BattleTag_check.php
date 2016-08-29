<?php
  require 'variables.php';

  if (isset($_SESSION['sessionTag']) && !isset($_POST['BattleTag'])) {
    $BattleTag = $_SESSION['sessionTag'];
  } else {
    if (isset($_POST['BattleTag'])) {
      $BattleTag = $_POST['BattleTag'];
      $_SESSION['sessionTag'] = $_POST['BattleTag'];
    } else {
      echo "Bitte BattleTag eingeben!";
    }
  }

  $BattleTag = str_replace("#","-",$BattleTag);
  if(strpos($BattleTag,'-') == null && $BattleTag != NULL) {
    $BattleTag = substr($BattleTag,0,-4).'-'.substr($BattleTag,-4,4);
  }
?>
