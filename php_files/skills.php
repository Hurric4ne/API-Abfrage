<?php
  //Dekodieren der JSON-Datei
  $char_uri = $_SESSION['link_arr'][substr($_SERVER['REQUEST_URI'],41)];
  $char_content = file_get_contents($char_uri);
  $char_decode = json_decode($char_content, true);

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

?>
