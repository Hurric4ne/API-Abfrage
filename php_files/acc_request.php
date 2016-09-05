<?php
  require 'variables.php';

  if (isset($_POST['continent'])) {
    if ($_POST['continent'] == "us") {
      $continent = "https://us.";
    }
  }

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
    $request_uri = $continent.$api_profile.$BattleTag.'/'.$locale.$apikey;
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
      $_SESSION['charnames'][$i] = $char_name;
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
      //css-Klasse für Charakterlevel
      $char_lvl = $account['heroes'][$i]['level'];
      //css-Klasse für Paragonlevel
      $char_plvl = $account['heroes'][$i]['paragonLevel'];
      //id für charakter
      $char_id = $account['heroes'][$i]['id'];
      $char_url = $continent.$api_profile.$BattleTag."/hero/".$char_id.$locale.$apikey;
      $_SESSION['link_arr'][$char_id] = $char_url;
      $_SESSION['char_id'][$i] = $char_id;

      echo "
      <a href='char_overview.php?$char_id'><div class='$char'>
        <img class='icon' src='$class_icon$icon$gender'/>
        <p class='name'>Name: $char_name</p>
        <p class='class'>Klasse: $char_class</p>
        <p class='level'>Level: $char_lvl</p>
        <p class='plevel'>Paragonstufe: $char_plvl</p>";
        if ($account['heroes'][$i]['seasonal'] == true) {
          echo "<img class='leaf' src='$seasonal_leaf' title='seasonaler Charakter'/>";
        }
      echo "</div></a>";
    } //for
  } else {
    if (!isset($_POST['BattleTag'])) {
      echo "<h1>Bitte BattleTag eingeben!</h1>";
    } else {
      echo "<h1>Keine Helden gefunden!</h1>";
    }
  }
?>
