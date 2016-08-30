<?php
  require 'variables.php';

  if (isset($_SESSION['sessionTag']) && !isset($_POST['BattleTag'])) {
    $BattleTag = $_SESSION['sessionTag'];
  } else {
    if (isset($_POST['BattleTag'])) {
      $BattleTag = $_POST['BattleTag'];
      $_SESSION['sessionTag'] = $_POST['BattleTag'];
    }
  }

  $BattleTag = str_replace("#","-",$BattleTag);
  if(strpos($BattleTag,'-') == null && $BattleTag != NULL) {
    $BattleTag = substr($BattleTag,0,-4).'-'.substr($BattleTag,-4,4);
  }

  if (isset($_SESSION['sessionTag']) || isset($_POST['BattleTag'])) {
    $request_uri = $url.$BattleTag.$locale.$apikey;
    $content_uri = file_get_contents($request_uri);
    $account = json_decode($content_uri, true);
  }

  if (isset($account['heroes'])) {
    for ($i = 0; $i < sizeof($account['heroes']); $i++) {
      $icon = $account['heroes'][$i]['class'];
      $icon = str_replace("-","",$icon);
      $id = $account['heroes'][$i]['id'];
      if($account['heroes'][$i]['class'] == "crusader"){
        $icon = "x1_crusader";
      }
      if($account['heroes'][$i]['gender'] == 1){
        $gender = "_female.png";
      } else {
        $gender = "_male.png";
      }
      $char_name = $account['heroes'][$i]['name'];
      $char_class = $account['heroes'][$i]['class'];

      switch ($char_class) {
        case 'barbarian':
        $char_class = "Barbar";
        break;
        case 'crusader':
          $char_class = "Kreuzritter";
          break;
        case 'demon-hunter':
          $char_class = "Dämonenjäger";
          break;
        case 'monk':
          $char_class = "Mönch";
          break;
        case 'witch-doctor':
          $char_class = "Hexendoktor";
          break;
        case 'wizard':
          $char_class = "Zauberer";
          break;
        default:
         $char_class = "";
         break;
      }
      //css-Klasse für Hardcore Charaktere
      if($account['heroes'][$i]['hardcore'] == true) {
        $char = "char hc_char";
      } else {
        $char = "char";
      }

      echo "
      <a href='#'><div class='$char'>
        <img src='$class_img$icon$gender'/>
        <p>Name: $char_name</p>
        <p>Klasse: $char_class</p>
      </div></a>";
    } //for
  } else {
    if (!isset($_POST['BattleTag'])) {
      echo "<h1>Bitte BattleTag eingeben!</h1>";
    } else {
      echo "<h1>Keine Helden gefunden!</h1>";
    }
  }

?>
