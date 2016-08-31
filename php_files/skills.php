<?php
  //Dekodieren der JSON-Datei
  $char_uri = $_SESSION['link_arr'][substr($_SERVER['REQUEST_URI'],41)];
  $char_content = file_get_contents($char_uri);
  $char_decode = json_decode($char_content, true);
  $char_name = $char_decode['name'];
  $char_class = $char_decode['class'];

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
  //Array mit aktiven Skillicon-Links füllen
  //Array mit Tooltip-URL füllen (für tooltip mouseover)
  $skillactive_arr = array();
  $activetips_arr = array();
  for ($i=0; $i <=5 ; $i++) {
    $skillactive_arr[$i] = $skill_icon.$char_decode['skills']['active'][$i]['skill']['icon'].".png";
    $activetips_arr[$i] = $tooltip_url.$char_decode['class'].'/active/'.$char_decode['skills']['active'][$i]['skill']['slug'].'#'.$char_decode['skills']['active'][$i]['rune']['type'].'+';
  }

  //Array mit passiven Skillicon-Links füllen
  //Array mit Tooltip-URL füllen (für tooltip mouseover)
  $skillpassive_arr = array();
  $passivetips_arr = array();
  for ($i=0; $i <=3 ; $i++) {
    $skillpassive_arr[$i] = $skill_icon.$char_decode['skills']['passive'][$i]['skill']['icon'].".png";
    $passivetips_arr[$i] = $tooltip_url.$char_decode['class'].'/passive/'.$char_decode['skills']['passive'][$i]['skill']['slug'];
  }

  //Array mit statistischen Werten füllen
  $stat_arr = array(
    'Schaden' => $char_decode['stats']['damage'],
    'Zähigkeit' => $char_decode['stats']['toughness'],
    'Erholung' => $char_decode['stats']['healing'],
    'Leben' => $char_decode['stats']['life']);
?>
