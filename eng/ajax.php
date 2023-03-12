<?
include "../lib/tnb.php";

switch($w_mode){

  case "setCate2Html" :
    // $cate2_html = getCategory2Html($idx);
    $output['c2html'] = getCategory2Html($idx);
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
  break;

  case "setCate2Sel" :
    $output['c2sel'] = setCategory2Select($idx);
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
  break;


  case "setCate2":
    $output['cate2Html'] = setCate2Sel();

    echo json_encode($output);
  break;

  case "setColorData" :
    $item = getItem($idx);

    $iname = $item['iname'];
    $iimg = $item['iimg'];

    $c1_idx = $item['caidx'];
    $c2_idx = $item['ca2idx'];

    $c1_box = getCategoryData($c1_idx);
    $c1_name_en = $c1_box[0]['name_en'];
    $c2_box = getCategory2Data($c2_idx);
    $c2_name = $c2_box['name'];
    $output['c1name'] = $c1_name_en;

    $img = "/img/products/{$c1_name_en}/{$c2_name}/{$iimg}";

    $output['iimg'] = "<img src='{$img}' alt='{$c2_name}'>";
    $output['iname'] = $iname;

    echo json_encode($output);
  break;




  default :
    $output['error'] = "default";

}


?>
