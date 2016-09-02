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
    'Leben' => $char_decode['stats']['life'],
    'Elitekills' => $char_decode['kills']['elites']
  );

  $socket_arr = array();
  //Dekodieren der Items für Socketanzahl-Abfragen

  if (isset($char_decode['items']['head'])) {
    $head_content = file_get_contents($continent.$api_item.$char_decode['items']['head']['tooltipParams'].$locale.$apikey);
    $head_decode = json_decode($head_content, true);
    if (isset($head_decode['attributesRaw']['Sockets'])) {
      $socket_arr[0] = $head_decode['attributesRaw']['Sockets']['min'];
      if(isset($head_decode['gems'][0])) {
        $head_gem = $item_icon.$head_decode['gems'][0]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['neck'])) {
    $neck_content = file_get_contents($continent.$api_item.$char_decode['items']['neck']['tooltipParams'].$locale.$apikey);
    $neck_decode = json_decode($neck_content, true);
    if (isset($neck_decode['attributesRaw']['Sockets'])) {
      $socket_arr[1] = $neck_decode['attributesRaw']['Sockets']['min'];
      if(isset($neck_decode['gems'][0])) {
        $neck_gem = $item_icon.$neck_decode['gems'][0]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['torso'])) {
    $torso_content = file_get_contents($continent.$api_item.$char_decode['items']['torso']['tooltipParams'].$locale.$apikey);
    $torso_decode = json_decode($torso_content, true);
    if (isset($torso_decode['attributesRaw']['Sockets'])) {
      $socket_arr[2] = $torso_decode['attributesRaw']['Sockets']['min'];
      if(isset($torso_decode['gems'][0])) {
        $torso_gem[0] = $item_icon.$torso_decode['gems'][0]['item']['icon'].'.png';
      }
      if(isset($torso_decode['gems'][1])) {
        $torso_gem[1] = $item_icon.$torso_decode['gems'][1]['item']['icon'].'.png';
      }
      if(isset($torso_decode['gems'][2])) {
        $torso_gem[2] = $item_icon.$torso_decode['gems'][2]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['leftFinger'])) {
    $leftFinger_content = file_get_contents($continent.$api_item.$char_decode['items']['leftFinger']['tooltipParams'].$locale.$apikey);
    $leftFinger_decode = json_decode($leftFinger_content, true);
    if (isset($leftFinger_decode['attributesRaw']['Sockets'])) {
      $socket_arr[3] = $leftFinger_decode['attributesRaw']['Sockets']['min'];
      if(isset($leftFinger_decode['gems'][0])) {
        $leftFinger_gem = $item_icon.$leftFinger_decode['gems'][0]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['rightFinger'])) {
    $rightFinger_content = file_get_contents($continent.$api_item.$char_decode['items']['rightFinger']['tooltipParams'].$locale.$apikey);
    $rightFinger_decode = json_decode($rightFinger_content, true);
    if (isset($rightFinger_decode['attributesRaw']['Sockets'])) {
      $socket_arr[4] = $rightFinger_decode['attributesRaw']['Sockets']['min'];
      if(isset($rightFinger_decode['gems'][0])) {
        $rightFinger_gem = $item_icon.$rightFinger_decode['gems'][0]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['legs'])) {
    $legs_content = file_get_contents($continent.$api_item.$char_decode['items']['legs']['tooltipParams'].$locale.$apikey);
    $legs_decode = json_decode($legs_content, true);
    if (isset($legs_decode['attributesRaw']['Sockets'])) {
      $socket_arr[5] = $legs_decode['attributesRaw']['Sockets']['min'];
      if(isset($legs_decode['gems'][0])) {
        $legs_gem[0] = $item_icon.$legs_decode['gems'][0]['item']['icon'].'.png';
      }
      if(isset($legs_decode['gems'][1])) {
        $legs_gem[1] = $item_icon.$legs_decode['gems'][1]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['mainHand'])) {
    $mainHand_content = file_get_contents($continent.$api_item.$char_decode['items']['mainHand']['tooltipParams'].$locale.$apikey);
    $mainHand_decode = json_decode($mainHand_content, true);
    if (isset($mainHand_decode['attributesRaw']['Sockets'])) {
      $socket_arr[6] = $mainHand_decode['attributesRaw']['Sockets']['min'];
      if(isset($mainHand_decode['gems'][0])) {
        $mainHand_gem = $item_icon.$mainHand_decode['gems'][0]['item']['icon'].'.png';
      }
    }
  }

  if (isset($char_decode['items']['offHand'])) {
    if ($mainHand_decode['type']['twoHanded'] == false) {
      $offHand_content = file_get_contents($continent.$api_item.$char_decode['items']['offHand']['tooltipParams'].$locale.$apikey);
      $offHand_decode = json_decode($offHand_content, true);
      if (isset($offHand_decode['attributesRaw']['Sockets'])) {
        $socket_arr[7] = $offHand_decode['attributesRaw']['Sockets']['min'];
        if(isset($offHand_decode['gems'][0])) {
          $offHand_gem = $item_icon.$offHand_decode['gems'][0]['item']['icon'].'.png';
        }
      }
    }
  }

?>
