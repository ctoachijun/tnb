<?
include "./lib/tnb.php";

switch($w_mode){
  case "setHistory" :
    strlen($m) == 1 ? $m = sprintf('%02d',$m) : $m = $m;

    if(empty($cont_en)){
      $cont_en = translate($cont,"ko","en");
    }
    $input = "{$y}|{$m}|$cont";
    $input_en = "{$y}|{$m}|$cont_en";

    if(!empty($his)){
      $his_box = explode("||",$his);
      $his_en_box = explode("||",$his_en);
    }else{
      $his_box = array();
      $his_en_box = array();
    }

    array_push($his_box,$input);
    array_push($his_en_box,$input_en);

    asort($his_box);
    asort($his_en_box);

    $cnt = 0;
    foreach($his_box as $v){
      $box = explode("|",$v);
      $year = $box[0];
      $month = $box[1];
      $hcont = $box[2];

      $text = "<span style='cursor:pointer;' onclick='setEditHistory($cnt)'>{$year}&nbsp;&nbsp;&nbsp;{$month}&nbsp;&nbsp;&nbsp;{$hcont}&nbsp;&nbsp;</span>";
      $html .= "<div class='his_line his{$cnt}'>";
      $html .= "{$text}<span style='cursor:pointer' onclick='delHistory({$cnt})'>X</span>";
      $html .= "</div>";
      $cnt++;

    }

    // if(!empty($his)){
      $history = implode("||",$his_box);
      $history_en = implode("||",$his_en_box);
    // }else{
    //   $history = $input;
    //   $history_en = $input_en;
    // }

    $output['html'] = $html;
    $output['all_his'] = $history;
    $output['all_his_en'] = $history_en;

    echo json_encode($output);
  break;

  case "delHistory" :
    $his_box = explode("||",$his);
    $his_en_box = explode("||",$his_en);

    unset($his_box[$num]);
    unset($his_en_box[$num]);

    $cnt=0;
    foreach($his_box as $v){
      $box = explode("|",$v);
      $year = $box[0];
      $month = $box[1];
      $hcont = $box[2];

      $text = "<span style='cursor:pointer;' onclick='setEditHistory($cnt)'>{$year}&nbsp;&nbsp;&nbsp;{$month}&nbsp;&nbsp;&nbsp;{$hcont}&nbsp;&nbsp;</span>";
      $html .= "<div class='his_line his{$cnt}'>";
      $html .= "{$text}<span style='cursor:pointer' onclick='delHistory({$cnt})'>X</span>";
      $html .= "</div>";
      $cnt++;
    }

    $history = implode("||",$his_box);
    $history_en = implode("||",$his_en_box);

    $output['html'] = $html;
    $output['all_his'] = $history;
    $output['all_his_en'] = $history_en;

    echo json_encode($output);
  break;

  case "setEditHistory" :
    $his_box = explode("||",$his);
    $his_en_box = explode("||",$his_en);

    $box = explode("|",$his_box[$num]);
    $box_en = explode("|",$his_en_box[$num]);

    $year = $box[0];
    $month = $box[1];
    $hcont = $box[2];
    $hcont_en = $box_en[2];

    $output['year'] = $box[0];
    $output['month'] = $box[1];
    $output['hcont'] = $box[2];
    $output['hcont_en'] = $box_en[2];

    echo json_encode($output);
  break;


  case "editHistory" :
    strlen($m) == 1 ? $m = sprintf('%02d',$m) : $m = $m;

    if(empty($cont_en)){
      $cont_en = translate($cont,"ko","en");
    }
    $input = "{$y}|{$m}|$cont";
    $input_en = "{$y}|{$m}|$cont_en";

    if(!empty($his)){
      $his_box = explode("||",$his);
      $his_en_box = explode("||",$his_en);
    }else{
      $his_box = array();
      $his_en_box = array();
    }

    $his_box[$num] = $input;
    $his_en_box[$num] = $input_en;

    asort($his_box);
    asort($his_en_box);

    $cnt = 0;
    foreach($his_box as $v){
      $box = explode("|",$v);
      $year = $box[0];
      $month = $box[1];
      $hcont = $box[2];

      $text = "<span style='cursor:pointer;' onclick='setEditHistory($cnt)'>{$year}&nbsp;&nbsp;&nbsp;{$month}&nbsp;&nbsp;&nbsp;{$hcont}&nbsp;&nbsp;</span>";
      $html .= "<div class='his_line his{$cnt}'>";
      $html .= "{$text}<span style='cursor:pointer' onclick='delHistory({$cnt})'>X</span>";
      $html .= "</div>";
      $cnt++;

    }

    // if(!empty($his)){
      $history = implode("||",$his_box);
      $history_en = implode("||",$his_en_box);
    // }else{
    //   $history = $input;
    //   $history_en = $input_en;
    // }

    $output['html'] = $html;
    $output['all_his'] = $history;
    $output['all_his_en'] = $history_en;

    echo json_encode($output);

  break;

  case "delMainImg" :
    $sql = "SELECT * FROM mainData";
    $re = sql_fetch($sql);

    if($num == 1){
      $fname = $re['main_img'];
      $col = "main_img = ''";
    }else if($num == 2){
      $fname = $re['boon_img'];
      $col = "boon_img = ''";
    }else{
      $fname = $re['sp_img'];
      $col = "sp_img = ''";
    }

    $sql = "UPDATE mainData SET {$col}";
    $re = sql_exec($sql);

    if($re){
      $path = "assets/img/";
      exec("rm {$path}{$fname}");
    }
  break;

  case "delsubImg" :
    $sql = "SELECT * FROM mainData";
    $re = sql_fetch($sql);

    $sub_box = explode("|",$re['sub_img']);
    $fname = $sub_box[$num-1];
    unset($sub_box[$num-1]);

    $new_sub = implode("|",$sub_box);

    $sql = "UPDATE mainData SET sub_img = '{$new_sub}'";
    $re = sql_exec($sql);

    if($re){
      $path = "assets/img/";
      exec("rm {$path}{$fname}");
    }

    $output['sub_box'] = $sub_box;
    echo json_encode($output);
  break;

  case "addCategory" :
    if($num == 1){
      $cnum = "";
      $cate = $category;
      $cate_en = $category_en;
      $setcol = "name_en = '{$cate_en}', ";
    }else{
      $cnum = $num;
      $setcol = "c1idx = {$cate1_sel}, ";
      $cate = $category1;
    }
    // $output['setcol'] = $setcol;

    $jj = "N";
    if($num == 1){
      $sql = "SELECT * FROM category WHERE name_en = '{$cate_en}'";
      $re = sql_fetch($sql);
      if($re){
        $output['state'] = "YJ";
        $jj = "Y";
      }
    }else{
      $sql = "SELECT * FROM category{$cnum} WHERE c1idx = {$cate1_sel} AND name = '{$cate}'";
      $re = sql_fetch($sql);
      if($re){
        $output['state'] = "HJ";
        $jj = "Y";
      }
    }

    $output['top_sql'] = $sql;
    if($jj == "N"){

      if($num == 1){
        $dir = preg_replace("/\s/","_",$cate_en);
        $dir = preg_replace("/\//","-",$dir);

        if(is_dir("img/products/{$dir}")){
          $output['state'] = "DJ";
        }else{
          exec("mkdir img/products/{$dir}");
        }

      }else{
        $dir = preg_replace("/\s/","_",$cate);
        $dir = preg_replace("/\//","-",$dir);

        // 제품 추가쪽에 2차 카테고리 새로 추가하기
        $cate1 = getCategoryData($cate1_sel);
        $cate1_en = $cate1[0]['name_en'];
        $dir1 = preg_replace("/\s/","_",$cate1_en);
        $dir1 = preg_replace("/\//","-",$dir1);

        $dir2 = preg_replace("/\s/","_",$cate);
        $dir2 = preg_replace("/\//","-",$dir2);

        $img_path = "img/products/{$dir1}/{$dir2}";
        $output['cate1_sel'] = $cate1_sel;
        $output['img_path'] = $cate1;

        if(is_dir($img_path)){
          $output['state'] = "DJ";
        }else{
          exec("mkdir {$img_path}");
        }

      }

      if($output['state'] != "DJ"){
        $view = rand(4,27);
        if($num == 1){
        }else{

          // 파일 업로드 처리
          $upload_dir = "{$img_path}/dan";
          if(!is_dir($upload_dir)){
            exec("mkdir $upload_dir");
          }
          $file1 = $_FILES['dan_img'];
          // 파일값이 있을때
          if($file1['name']){
            $f1_err = $file1['error'];
            $f1_tmp = $file1['tmp_name'];
            $f1_name = $file1['name'];

            for($d=1; $d<10; $d++){
              $fjud = file_exists($upload_dir."/".$f1_name);
              if($fjud){
                $box = explode(".",$f1_name);
                $f = $box[0]."({$d}).".$box[1];

                // 바꾼이름으로 한번 더 체크
                $fjud2 = file_exists($upload_dir."/".$f);
                if($fjud2){
                  continue;
                }else{
                  break;
                }
              }else{
                $f = $f1_name;
                $output['b'] = "break";
                break;
              }
            }

            if($f1_tmp){
              if($f1_err != 4){
                if($f1_err == 1){
                  $return_txt = "파일 자체에 에러.";
                }else{
                  $re1 = move_uploaded_file($f1_tmp, $upload_dir."/".$f);
                }
              }
            }

            if($re1){
              // $ssql = "SELECT * FROM category2 ORDER BY idx DESC LIMIT 0,1";
              // $sre = sql_fetch($ssql);
              // $ca2_idx = $sre['idx'];

              $c2_txt = ", danview = '{$f}', wdate = now() ";
            }else{
              $return_txt = "파일 업로드 실패.";
            }
          } // 파일있을때
        }


        $sql = "INSERT INTO category{$cnum} SET {$setcol} name = '{$cate}' {$c2_txt} ";
        $re = sql_exec($sql);
        $output['sql'] = $sql;

      }
    }
    $html = getCategoryHtml($num);
    $output['html'] = $html;

    $c2html = getCategory2Html($cate1_sel);
    $output['c2html'] = $c2html;

    $shtml = getCategorySelect(1);
    $output['shtml'] = $shtml;

    $s1html = getCategorySelect(2);
    $output['s1html'] = $s1html;

    $s2html = getCategory2Select();
    $output['s2html'] = $s2html;

    $output['jj'] = $jj;

    echo json_encode($output);
  break;

  case "delCategory" :

    if($type == 1){
      $sql = "DELETE FROM category WHERE idx = {$num}";
      $cate = getCategoryData($num);
      $cate_en = $cate[0]['name_en'];
      $dir = preg_replace("/\s/","_",$cate_en);
      $dir = preg_replace("/\//","-",$dir);

      $sql3 = "DELETE FROM itemData WHERE caidx = {$num}";
      $sql2 = "DELETE FROM category2 WHERE c1idx = {$num}";
      sql_exec($sql3);
      sql_exec($sql2);
    }else{
      $cate2 = getCategory2Data($num);
      $cate2_name = $cate2['name'];
      $c1idx = $cate2['c1idx'];

      $cate = getCategoryData($c1idx);
      $cate1_en = $cate[0]['name_en'];
      $dir1 = preg_replace("/\s/","_",$cate1_en);
      $dir1 = preg_replace("/\//","-",$dir1);

      $dir2 = preg_replace("/\s/","_",$cate2_name);
      $dir2 = preg_replace("/\//","-",$dir2);

      $dir = "{$dir1}/{$dir2}";

      $sql = "DELETE FROM category2 WHERE idx = {$num}";
      $sql2 = "DELETE FROM itemData WHERE ca2idx = {$num}";
      sql_exec($sql2);
    }
    $re = sql_exec($sql);

    $path = "img/products/{$dir}";
    $output['path'] = $path;
    $output['sql'] = $sql;


    // 이하 데이터 처리는 나중에 다시 손볼것. 아직 손도 안댔음 ;;

    if($re){
      $html = getCategoryHtml();
      $output['html'] = $html;

      $c2html = getCategory2Html($c1idx);
      $output['c2html'] = $c2html;

      $shtml = getCategorySelect(1);
      $output['shtml'] = $shtml;

      $shtml_d = getCategorySelect(2);
      $output['shtml_d'] = $shtml_d;

      $shtml2 = getCategory2Select();
      $output['shtml2'] = $shtml2;


      if(!empty($dir) && $dir != "/"){
        $output['del'] = "ok";
        exec("rm -r {$path}");
      }

    }else{
      $output['state'] = "N";
    }

    echo json_encode($output);
  break;

  case "addItem" :
    $csql = "SELECT * FROM itemData WHERE caidx = {$cate_sel} AND ca2idx = {$cate2_sel} AND iname = '{$item_name}'";
    $cre = sql_fetch($csql);

    if($cre){
      $output['state'] = "FJ";
    }else{

      $cate = getCategoryData($cate_sel);
      $cate1_name = $cate[0]['name_en'];

      $cate2 = getCategory2Data($cate2_sel);
      $cate2_name = $cate2['name'];

      $dir1 = preg_replace("/\s/","_",$cate1_name);
      $dir1 = preg_replace("/\//","-",$dir1);

      $dir2 = preg_replace("/\s/","_",$cate2_name);
      $dir2 = preg_replace("/\//","-",$dir2);

      // 파일 업로드 처리
      $upload_dir = "img/products/{$dir1}/{$dir2}";
      $file1 = $_FILES['item_img'];
      // 파일값이 있을때
      if($file1['name']){
        $f1_err = $file1['error'];
        $f1_tmp = $file1['tmp_name'];
        $f1_name = $file1['name'];

        for($d=1; $d<10; $d++){
          $fjud = file_exists($upload_dir."/".$f1_name);
          if($fjud){
            $box = explode(".",$f1_name);
            $f = $box[0]."({$d}).".$box[1];

            // 바꾼이름으로 한번 더 체크
            $fjud2 = file_exists($upload_dir."/".$f);
            if($fjud2){
              continue;
            }else{
              break;
            }
          }else{
            $f = $f1_name;
            $output['b'] = "break";
            break;
          }
        }

        if($f1_tmp){
          if($f1_err != 4){
            if($f1_err == 1){
              $return_txt = "파일 자체에 에러.";
            }else{
              $re1 = move_uploaded_file($f1_tmp, $upload_dir."/".$f);
            }
          }
        }

        if($re1){
          $sql = "INSERT INTO itemData SET caidx = {$cate_sel}, ca2idx = {$cate2_sel}, iname = '{$item_name}', iclass = '{$class_name}',
            iimg = '{$f}', wdate = now()";
          $re = sql_exec($sql);

        }else{
          $return_txt = "파일 업로드 실패.";
        }
      } // 파일있을때

      $output['item_html'] = getCategoryItem($cate2_sel);
    }

    echo json_encode($output);
  break;

  case "setItemHtml" :
    $output['html'] = getCategoryItem($caidx);
    echo json_encode($output);
  break;

  case "setItemData" :
    $c2box = getCategory2Data($idx);

    $output['img'] = $c2box['danview'];
    $output['name'] = $c2box['name'];
    $output['btn'] = "<input type='button' class='btn btn-outline-info right' value='수정' onclick='editCate2({$idx})' /><span onclick='cancelEditItem()'>취소</span><span onclick='delCategory({$idx},2)'>삭제</span>";

    echo json_encode($output);
  break;

  case "setItemData2" :
    $ibox = getItem($idx);

    $output['iname'] = $ibox['iname'];
    $output['iclass'] = $ibox['iclass'];
    $output['iimg'] = $ibox['iimg'];
    $output['btn'] = "<input type='button' class='btn btn-outline-info right' value='수정' onclick='editItem()' /><span onclick='cancelEditItem()'>취소</span><span onclick='delItem({$idx})'>삭제</span>";

    echo json_encode($output);
  break;


  case "editCate2" :

    $cate2 = getCategory2Data($c2idx);
    $cate2_name = $cate2['name'];
    $cate_sel = $cate2['c1idx'];

    $cate = getCategoryData($cate_sel);
    $cate1_name = $cate[0]['name_en'];

    $dir1 = preg_replace("/\s/","_",$cate1_name);
    $dir1 = preg_replace("/\//","-",$dir1);

    $dir2 = preg_replace("/\s/","_",$cate2_name);
    $dir2 = preg_replace("/\//","-",$dir2);

    $jdir = preg_replace("/\s/","_",$category1);
    $jdir = preg_replace("/\//","-",$jdir);

    if($category1 != $org_name && is_dir("img/products/{$dir1}/{$jdir}")){
      $output['state'] = "DJ";
    }else{
      $upload_dir = "img/products/{$dir1}/{$dir2}/dan/";
      $file1 = $_FILES['dan_img'];

      // 파일값이 있을때
      if($file1['name']){
        $f1_err = $file1['error'];
        $f1_tmp = $file1['tmp_name'];
        $f1_name = $file1['name'];

        for($d=1; $d<10; $d++){
          $fjud = file_exists($upload_dir.$f1_name);
          if($fjud){
            $box = explode(".",$f1_name);
            $f = $box[0]."({$d}).".$box[1];

            // 바꾼이름으로 한번 더 체크
            $fjud2 = file_exists($upload_dir.$f);
            if($fjud2){
              continue;
            }else{
              break;
            }
          }else{
            $f = $f1_name;
            $output['b'] = "break";
            break;
          }
        }

        if($f1_tmp){
          if($f1_err != 4){
            if($f1_err == 1){
              $return_txt = "파일 자체에 에러.";
            }else{
              $re1 = move_uploaded_file($f1_tmp, $upload_dir.$f);
            }
          }
        }

        if($re1){
          if(!empty($org_img)) unlink($upload_dir.$org_img);
        }else{
          $return_txt = "파일 업로드 실패.";
        }

      }else{
        $f = $org_img;
      }

      $category1 = addslashes($category1);
      $sql = "UPDATE category2 SET name = '{$category1}', danview = '{$f}' WHERE idx = {$idx}";
      $re = sql_exec($sql);
      $output['sql'] = $sql;

      // DB 수정 성공하면 디렉토리 이름 변경
      if($re){
        exec("mv img/products/{$dir1}/{$dir2} img/products/{$dir1}/{$category1}");
      }

      $output['cate_sel'] = $cate_sel;
      $output['c2html'] = getCategory2Html($cate_sel);
      $output['state'] = "Y";
    }



    echo json_encode($output);
  break;

  case "editItem" :

    $csql = "SELECT * FROM itemData WHERE caidx = {$cate_sel} AND ca2idx = {$cate2_sel} AND iname = '{$item_name}'";
    $cre = sql_fetch($csql);

    if($item_name != $org_name2 && $cre){
      $output['state'] = "FJ";
    }else{
      $cate = getCategoryData($cate_sel);
      $cate1_name = $cate[0]['name_en'];

      $cate2 = getCategory2Data($cate2_sel);
      $cate2_name = $cate2['name'];

      $dir1 = preg_replace("/\s/","_",$cate1_name);
      $dir1 = preg_replace("/\//","-",$dir1);

      $dir2 = preg_replace("/\s/","_",$cate2_name);
      $dir2 = preg_replace("/\//","-",$dir2);

      // 파일 업로드 처리
      $upload_dir = "img/products/{$dir1}/{$dir2}/";
      $file1 = $_FILES['item_img'];

      // 파일값이 있을때
      if($file1['name']){
        $f1_err = $file1['error'];
        $f1_tmp = $file1['tmp_name'];
        $f1_name = $file1['name'];

        for($d=1; $d<10; $d++){
          $fjud = file_exists($upload_dir.$f1_name);
          if($fjud){
            $box = explode(".",$f1_name);
            $f = $box[0]."({$d}).".$box[1];

            // 바꾼이름으로 한번 더 체크
            $fjud2 = file_exists($upload_dir.$f);
            if($fjud2){
              continue;
            }else{
              break;
            }
          }else{
            $f = $f1_name;
            $output['b'] = "break";
            break;
          }
        }

        if($f1_tmp){
          if($f1_err != 4){
            if($f1_err == 1){
              $return_txt = "파일 자체에 에러.";
            }else{
              $re1 = move_uploaded_file($f1_tmp, $upload_dir.$f);
            }
          }
        }

        if($re1){
          unlink($upload_dir.$org_img2);
        }else{
          $return_txt = "파일 업로드 실패.";
        }

      }else{
        $f = $org_img2;
      }

      $item_name = addslashes($item_name);
      $class_name = addslashes($class_name);
      $sql = "UPDATE itemData SET iname = '{$item_name}', iclass = '{$class_name}', iimg = '{$f}' WHERE idx = {$iidx}";
      $re = sql_exec($sql);
      $output['sql'] = $sql;

      $output['item_html'] = getCategoryItem($cate2_sel);
    }

    echo json_encode($output);
  break;


  case "delItem" :
    $sql = "SELECT * FROM itemData WHERE idx = {$idx}";
    $re = sql_fetch($sql);

    $img = $re['iimg'];
    $cate_sel = $re['caidx'];
    $cate2_sel = $re['ca2idx'];

    $cate = getCategoryData($cate_sel);
    $cate1_name = $cate[0]['name_en'];

    $cate2 = getCategory2Data($cate2_sel);
    $cate2_name = $cate2['name'];

    $dir1 = preg_replace("/\s/","_",$cate1_name);
    $dir1 = preg_replace("/\//","-",$dir1);

    $dir2 = preg_replace("/\s/","_",$cate2_name);
    $dir2 = preg_replace("/\//","-",$dir2);

    $upload_dir = "img/products/{$dir1}/{$dir2}/";
    unlink($upload_dir.$img);

    $sql = "DELETE FROM itemData WHERE idx = {$idx}";
    $re = sql_exec($sql);

    if($re){
      $output['state'] = "Y";
      $output['item_div'] = getCategoryItem($cate2_sel);
    }else{
      $output['state'] = "N";
    }

    echo json_encode($output);
  break;

  case "setCate2Html" :
    // $cate2_html = getCategory2Html($idx);
    $output['c2html'] = getCategory2Html($idx);
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
  break;

  case "setCate2Sel" :
    $output['c2sel'] = setCategory2Select($idx);
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
  break;

  case "setCateData":
    $cate = getCategoryData($idx);

    $output['cate'] = $cate[0]['name'];
    $output['cate_en'] = $cate[0]['name_en'];
    $output['btn'] = "<input type='button' class='btn btn-outline-info right' value='수정' onclick='editCategory({$idx})' /><span onclick='cancelEditItem()'>취소</span><span class='deltxt' onclick='delCategory({$idx},1)'>삭제</span>";

    echo json_encode($output,JSON_UNESCAPED_UNICODE);
  break;

  case "editCategory":
    $cate = addslashes($cate);
    $cate_en = addslashes($cate_en);

    if(is_dir("img/products/{$cate_en}")){
      $output['state'] = "DJ";
    }else{
      $ssql = "SELECT * FROM category WHERE idx = {$idx}";
      $sre = sql_fetch($ssql);
      $org_name = $sre['name_en'];

      $sql = "UPDATE category SET name = '{$cate}', name_en = '{$cate_en}' WHERE idx = {$idx}";
      $re = sql_exec($sql);
      // $output['sql'] = $sql;

      if($re){
        exec("mv img/products/{$org_name} img/products/{$cate_en}");
        $output['exec'] = "mv img/products/{$org_name} img/products/{$cate_en}";
        $output['html'] = getCategoryHtml();
        $output['state'] = "Y";
      }else{
        $output['state'] = "N";
      }
    }

    echo json_encode($output);
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

    $img = "img/products/{$c1_name_en}/{$c2_name}/{$iimg}";

    $output['iimg'] = "<img src='{$img}' alt='{$c2_name}'>";
    $output['iname'] = $iname;

    echo json_encode($output);
  break;




  default :
    $output['error'] = "default";

}


?>
