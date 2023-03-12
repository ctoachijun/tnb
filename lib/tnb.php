<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once "{$root}/lib/db_config.php";
$host = $_SERVER["SERVER_NAME"];

ini_set("session.use_trans_sid", 0);    // PHPSESSID를 자동으로 넘기지 않음
ini_set("url_rewriter.tags","");  // 링크에 PHPSESSID가 따라다니는것을 무력화함 (해뜰녘님께서 알려주셨습니다.)
ini_set("session.cache_expire", 180); // 세션 캐쉬 보관시간 (분)
ini_set("session.gc_maxlifetime", 10800); // session data의 garbage collection 존재 기간을 지정 (초)
ini_set("session.gc_probability", 1); // session.gc_probability는 session.gc_divisor와 연계하여 gc(쓰레기 수거) 루틴의 시작 확률을 관리합니다. 기본값은 1입니다. 자세한 내용은 session.gc_divisor를 참고하십시오.
ini_set("session.gc_divisor", 100); // session.gc_divisor는 session.gc_probability와 결합하여 각 세션 초기화 시에 gc(쓰레기 수거) 프로세스를 시작할 확률을 정의합니다. 확률은 gc_probability/gc_divisor를 사용하여 계산합니다. 즉, 1/100은 각 요청시에 GC 프로세스를 시작할 확률이 1%입니다. session.gc_divisor의 기본값은 100입니다.
ini_set("session.cookie_lifetime",0);

// ini_set("session.cookie_domain",$host);
// ini_set('display_errors', 1);
// ini_set('error_reporting', E_ALL);

// session_set_cookie_params(2589000, "/", "iamvaluechain.com");
// session_start();
session_start();
//==========================================================================================================================
// extract($_GET); 명령으로 인해 page.php?_POST[var1]=data1&_POST[var2]=data2 와 같은 코드가 _POST 변수로 사용되는 것을 막음
// 081029 : letsgolee 님께서 도움 주셨습니다.
//--------------------------------------------------------------------------------------------------------------------------
$ext_arr = array ('PHP_SELF', '_ENV', '_GET', '_POST', '_FILES', '_SERVER', '_COOKIE', '_SESSION', '_REQUEST',
                  'HTTP_ENV_VARS', 'HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_POST_FILES', 'HTTP_SERVER_VARS',
                  'HTTP_COOKIE_VARS', 'HTTP_SESSION_VARS', 'GLOBALS');
$ext_cnt = count($ext_arr);
for ($i=0; $i<$ext_cnt; $i++) {
    // POST, GET 으로 선언된 전역변수가 있다면 unset() 시킴
    if (isset($_GET[$ext_arr[$i]]))  unset($_GET[$ext_arr[$i]]);
    if (isset($_POST[$ext_arr[$i]])) unset($_POST[$ext_arr[$i]]);
}

// PHP 4.1.0 부터 지원됨
// php.ini 의 register_globals=off 일 경우
@extract($_GET);
@extract($_POST);
@extract($_SERVER);


function translate($content,$t1,$t2){
    $url = "https://www.googleapis.com/language/translate/v2";

    $data = array('key' => "AIzaSyBbHfgv0x5cUKjGtvQ2CQD1WnzN8xZh7lg",
                    'q' => $content,
                    'source' => $t1,
                    'target' => $t2);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-HTTP-Method-Override: GET'));
    $response = curl_exec($ch);
    $responseDecoded = json_decode($response, true);
    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return  $responseDecoded['data']['translations'][0]['translatedText'];
}


function getMainData(){
  $sql = "SELECT * FROM mainData";
  $re = sql_fetch($sql);

  return $re;
}

function getCategoryData($idx){
  if($idx !== 0){
    $sql = "SELECT * FROM category WHERE idx = {$idx}";
  }else{
    $sql = "SELECT * FROM category";
  }
  $re = sql_query($sql);
  return $re;
}

function getCategory2Data($idx){
  $sql = "SELECT * FROM category2 WHERE idx = {$idx}";
  $re = sql_fetch($sql);
  return $re;
}

function getColorCode($idx){
  $sql = "SELECT idx,iclass FROM itemData WHERE ca2idx = {$idx}";
  $re = sql_query($sql);
  return $re;
}

function getItemData(){
  $sql = "SELECT * FROM itemData";
  $re = sql_query($sql);

  return $re;
}

function getItem($idx){
  $sql = "SELECT * FROM itemData WHERE idx = {$idx}";
  $re = sql_fetch($sql);

  return $re;
}

function getCategoryItemData($caidx){
  $sql = "SELECT * FROM itemData WHERE caidx = {$caidx}";
  $re = sql_query($sql);

  return $re;
}

function getMainItemData(){

  $arr = array();

  $cate = "SELECT * FROM category";
  $cre = sql_query($cate);

  foreach($cre as $v){
    $caidx = $v['idx'];

    $sql = "SELECT * FROM itemData WHERE caidx = {$caidx} LIMIT 0,4";
    $re = sql_query($sql);

    foreach($re as $val){
      if(!empty($val['name'])){
        array_push($arr,$val);
      }
    }
  }
  shuffle($arr);
  return $arr;
}


function setHistoryHtml($his){
    if(!empty($his)){
      $his_box = explode("||",$his);
    }

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

    return $html;
}

function getCategoryHtml(){

  $sql = "SELECT * FROM category";
  $re = sql_query($sql);

  if($re){
    foreach($re as $v){
      $idx = $v['idx'];
      $cate = $v['name'];
      $cate_en = $v['name_en'];

      $html .= "
          <div class='clist cateunit cate{$idx}' onclick='setCateData({$idx})' >
            <div class='clist_kr'><span>{$cate}</span></div>
            <div class='clist_en'><span>{$cate_en}</span></div>
          </div>
      ";
    }
  }
  return $html;
}

function getCategory2Html($idx){

  $sql = "SELECT * FROM category2 WHERE c1idx = {$idx}";
  $re = sql_query($sql);

  if($re){
    $cnt = 0;
    $html = "<div class='c2row'>";

    foreach($re as $v){
      $idx = $v['idx'];
      $cate = $v['name'];

      $cate1_name = getC1cateName($idx);
      $dir1 = preg_replace("/\s/","_",$cate1_name);
      $dir1 = preg_replace("/\//","-",$dir1);

      $cate2_name = $cate;
      $dir2 = preg_replace("/\s/","_",$cate2_name);
      $dir2 = preg_replace("/\//","-",$dir2);
      $dir = "img/products/{$dir1}/{$dir2}/dan";

      $sql2 = "SELECT * FROM category2 WHERE idx = {$idx}";
      $re2 = sql_fetch($sql2);
      $img = $re2['danview'];
      if(empty($img)){
        $dir = "img";
        $img = "no-img.png";
      }

      if($cnt > 0 && $cnt % 3 == 0){
        $html .= "</div>";
        $html .= "<div class='c2row'>";
      }

      $html .= "<div class='c2list imgunit img{$idx}' onclick='setItemData($idx)'>";
      $html .= "<div class='c2list_kr'>
                  <img src='{$dir}/{$img}' class=''  />
                  <span>{$cate}</span>
                </div>
                <div class='c2list_dbtn'></div>";
      $html .= "</div>";

      $cnt++;
    }
    $html .= "</div>";
  }

  return $html;
}


function getCategorySelect($num){

  if($num == 1){
    $shtml = "<select class='form-control' name='cate_sel' id='cate_sel' onchange='setCate2Sel(this)'>";
  }else{
    $shtml = "<select class='form-control' name='cate1_sel' id='cate1_sel' onchange='setCate2Html(this)'>";
  }

  $sql = "SELECT * FROM category";
  $re = sql_query($sql);

  // $shtml = "<select class='form-control' name='cate{$num}_sel' id='cate{$num}_sel' onchange='setItemHtml(this)'>";
  $shtml .= "<option value='NO' selected>== 1차 카테고리 선택 ==</option>";
  foreach($re as $v){
    $val = $v['idx'];
    $opt = $v['name'];
    $shtml .= "<option value='{$val}'>{$opt}</option>";
  }
  $shtml .= "</select>";
  $shtml .= "<i class='bx bx-chevron-down icon-show'></i>";

  return $shtml;
}

function getCategory2Select(){

  $sql = "SELECT * FROM category2";
  $re = sql_query($sql);

  $shtml = "<select class='form-control' name='cate2_sel' id='cate2_sel' onchange='setItemHtml(this)'>";
  $shtml .= "<option value='NO'>== 2차 카테고리 선택 ==</option>";
  // foreach($re as $v){
  //   $val = $v['idx'];
  //   $opt = $v['name'];
  //   $shtml .= "<option value='{$val}'>{$opt}</option>";
  // }
  $shtml .= "</select>";
  $shtml .= "<i class='bx bx-chevron-down icon-show'></i>";

  return $shtml;
}

function setCategory2Select($idx){
  $where = $idx > 0 ? "WHERE c1idx = {$idx}" : "";
  $sql = "SELECT * FROM category2 {$where}";
  $re = sql_query($sql);

  $shtml = "<select class='form-control' name='cate2_sel' id='cate2_sel' onchange='setItemHtml(this)'>";
  $shtml .= "<option value='NO'>== 2차 카테고리 선택 ==</option>";
  if($idx > 0){
    foreach($re as $v){
      $val = $v['idx'];
      $opt = $v['name'];
      $shtml .= "<option value='{$val}'>{$opt}</option>";
    }
  }
  $shtml .= "</select>";
  $shtml .= "<i class='bx bx-chevron-down icon-show'></i>";

  return $shtml;
}


function getCategoryItem($caidx){
  $sql = "SELECT * FROM itemData WHERE ca2idx = {$caidx}";
  $re = sql_query($sql);

  foreach($re as $v){
    $cate2 = getCategory2Data($caidx);
    $cate2_name = $cate2['name'];
    $c1idx = $cate2['c1idx'];

    $cate = getCategoryData($c1idx);
    $cate1_en = $cate[0]['name_en'];
    $dir1 = preg_replace("/\s/","_",$cate1_en);
    $dir1 = preg_replace("/\//","-",$dir1);

    $dir2 = preg_replace("/\s/","_",$cate2_name);
    $dir2 = preg_replace("/\//","-",$dir2);

    $dir = "{$dir1}/{$dir2}";

    $name = $v['iname'];
    $cls = $v['iclass'];
    $img = $v['iimg'];
    $idx = $v['idx'];

    if(empty($img)){
      $dir = "img";
      $img = "no-img.png";
    }

    $html .= "
    <div class='itemimg_div iimgunit iimg{$idx}' onclick='setItemData2($idx)'>
      <img src='img/products/{$dir}/{$img}' />
      <div class='itemname_div'>{$name}
        <div class='color_div'>
          <div class='{$cls} ieback iecircle'></div><span>{$cls}</span>
        </div>
      </div>
    </div>
    ";
  }

  return $html;
}

function getC1cateName($idx){
  $sql = "SELECT c1idx FROM category2 WHERE idx = {$idx}";
  $re = sql_fetch($sql);
  $c1idx = $re['c1idx'];

  $c1 = getCategoryData($c1idx);
  $name = $c1[0]['name_en'];

  return $name;
}

function setCateSel($val,$lang){
  $sql = "SELECT * FROM category";
  $re = sql_query($sql);


  if($lang == "en"){
    $col = "_{$lang}";
    $t1 = "ALL";
  }else{
    $col = "";
    $t1 = "전체보기";
}

  $html = "<option value='all' {$dv}>{$t1}</option>";

  foreach($re as $v){
    $c1idx = $v['idx'];
    $name = $v['name'.$col];

    $df = $val == $c1idx ? "selected" : "";
    $html .= "<option value='{$c1idx}' {$df}>{$name}</option>";
  }

  return $html;
}

function setCate2Sel($c1,$val,$lang){

  if($lang == "en"){
      $col = "_{$lang}";
      $t2 = "Series Number";
  }else{
      $col = "";
      $t2 = "시리즈 넘버";
  }

  if($c1 == "all"){
    $wv = 1;
    $html = "<option value='all' selected >{$t2}</option>";
  }else{
    $wv = "c1idx = {$c1}";
    $html = "<option value='all'>{$t2}</option>";
  }

  $sql = "SELECT * FROM category2 WHERE {$wv}";
  $re = sql_query($sql);

  
  if($c1 != "all"){
    foreach($re as $v){
      $c2idx = $v['idx'];
      $name = $v['name'];
  
      $df = $val == $c2idx ? "selected" : "";
      $html .= "<option value='{$c2idx}' {$df}>{$name}</option>";
    }
  }

  return $html;
}

function setItemHtml($cate1,$cate2,$start,$end,$cur_page,$sw,$lang){
  if($cate1 != "all"){
    $c1 = "caidx = {$cate1} ";
  }else{
    $c1 = "1";
  }

  if($cate2 != "all"){
    $c2 = "AND ca2idx = {$cate2} ";
  }else{
    $c2 = "";
  }

  if(!empty($sw)){
    $sword = "AND iname like '%{$sw}%'";
  }else{
    $sword = "";
  }
  

  if($cur_page > 1){
    $num = $cur_page * $end + 1 - $end;
    $start = $num - 1;
  }else{
    $start = 0;
    $num = 1;
  }

  if($lang == "en"){
    $srch = "View detail";
  }else{
    $srch = "자세히 보기";
  }



  $sql = "SELECT * FROM itemData WHERE {$c1} {$c2} {$sword} ORDER BY wdate DESC LIMIT $start,$end";  
  // var_dump($sql);
  $re = sql_query($sql);

  $pl = $pd = 0;
  $html = "<div class='pdiv'>";
  $html .= "<div class='plist'>";


  if($re){
    foreach($re as $v){
  
      if($pd == 4){
        $pd = $pl = 0;
        $html .= "</div></div>";
        $html .= "<div class='pdiv'>";
        $html .= "<div class='plist'>";
      }
      if($pd > 0 && $pl == 2){
        $html .= "</div>";
        $html .= "<div class='plist'>";
        $pl = 0;
      }
      
      $iidx = $v['idx'];
      $iimg = $v['iimg'];
      $iname = $v['iname'];
      $c1_idx = $v['caidx'];    
      $c2_idx = $v['ca2idx'];    
      
      $c1_box = getCategoryData($c1_idx);
      $c1_name = $c1_box[0]['name_en'];
      $c2_box = getCategory2Data($c2_idx);
      $c2_name = $c2_box['name'];
      
      $path = "/img/products/{$c1_name}/{$c2_name}";
      $img_path = $path."/".$iimg;
  
      // <div class='pimg'><img src='{$img_path}' alt='테스트'></div><!-- pimg -->
      $html .= "
        <div class='psetbox'>
          <div class='pbi' onclick='viewDetail({$iidx})'>
            <div class='pimg'><img src='{$img_path}' alt='{$iname}'></div><!-- pimg -->
            <div class='ps'>
              <img src='/img/search.png' alt='{$srch}'>
              <p>{$srch}</p>
            </div><!-- ps -->
          </div><!-- pbi -->
          <p>{$iname}</p>
          </div><!-- psetbox -->
      ";
  
      $pl++;
      $pd++;
    }
  
  
    $html .= "</div></div>";
    $html .= "<div class='paging'>";
    $html .= getPaging($cate1,$cate2,$start,$end,$cur_page,$sw);
    $html .= "</div>";

  }else{
    $html = "
      <div class='pdiv'>
        <div class='resultox'>검색 결과가 없습니다.</div>
      </div>
    ";
  }

  return $html;

}



function getPaging($cate1,$cate2,$start,$end,$cur_page,$sw){
  // echo "cur : $cur_page <br>";
  // echo "end : $end <br>";
  // if($end < 20){
  //   $end = 20;
  // }

  if($cate1 != "all"){
    $c1 = "caidx = {$cate1} ";
  }else{
    $c1 = "1";
  }

  if($cate2 != "all"){
    $c2 = "AND ca2idx = {$cate2} ";
  }else{
    $c2 = "";
  }

  if(!empty($sw)){
    $sword = "AND iname like '%{$sw}%'";
  }else{
    $sword = "";
  }
  
  $sql = "SELECT count(*) as total FROM itemData WHERE {$c1} {$c2} {$sword}";
  // echo "<br> top sql : $sql <br>";
  $re = sql_fetch($sql);

  $total_cnt = $re['total'];  // 전체 게시물수
  $page_rows = $end;  // 한페이지에 표시할 데이터 수
  $total_page = ceil($total_cnt / $page_rows); // 총 페이지수

  // echo "total_cnt : $total_cnt <br>";
  // echo "total_page : $total_page <br>";

  // 총페이지가 0이라면 1로 설정
  if($total_page == 0){
    ++$total_page;
  }

  $block_limit = 10; // 한 화면에 뿌려질 블럭 개수
  $total_block = ceil($total_page / $block_limit);  // 전체 블록수
  $cur_page = $cur_page ? $cur_page : 1;  // 현재 페이지
  $cur_block = ceil($cur_page / $block_limit); // 현재블럭 : 화면에 표시 될 페이지 리스트
  $first_page = (((ceil($cur_page / $block_limit) -1) * $block_limit) +1);  // 현재 블럭의 시작
  $end_page = $first_page + $block_limit - 1; // 현재 블럭의 마지막

  // echo "total_block : $total _block <br>";
  // echo "cur_block : $cur_block<br>";
  // echo "cur_page : $cur_page<br>";
  // echo "first_page : $first_page <br>";
  // echo "end_page : $end_page <br>";



  if($total_page < $end_page){
    $end_page = $total_page;
  }

  $prev = $first_page - 1;
  $next = $end_page + 1;
  // 페이징 준비 끝


  $sql = "SELECT * FROM itemData LIMIT {$first_page},{$end_page}";
  // echo $sql;
  $total_cnt = sql_num_rows($sql);

  // 이전 블럭을 눌렀을때 현재 페이지 세팅.
  // $pre_block = $cur_page - $block_limit;
  // 처음 if 조건은, 현재페이지가 23페이지일경우, 이전블럭을 눌렀을때
  //  20페이지가 아닌, 13페이지로 세팅이 되어서 계산조절한것.
  if($end_page == $total_page){
    $pre_block = floor($end_page / $block_limit) * $block_limit;
  }else{
    $pre_block = $end_page - $block_limit;
  }
  if($pre_block < $block_limit+1){
    $pre_block = $block_limit;
  }

  // 다음블럭의 첫번째 페이지 산출
  // $next_block = $cur_page + $block_limit;
  $next_block = $end_page + 1;
  if($next_block > $total_page){
    $next_block = (($cur_block + 1) * $block_limit) - ($block_limit-1);
  }

  // 이전 버튼을 눌렀을때 LIMIT 처리
  $prev_start = $first_page - $block_limit;
  $prev_end = $end_page - $block_limit;
  if($prev_start < $block_limit+1){
    $prev_start = 1;
    $prev_end = $block_limit;
  }

  // 다음 버튼을 눌렀을때 LIMIT 처리
  $next_start = $first_page + $block_limit;
  $next_end = $end_page + $block_limit;
  if($next_end > $total_page){
    $next_end = $total_page;
    if($next_start > $next_end){
      $next_start = $cur_block * $block_limit + 1;
    }
  }

  // echo "<br>";
  // echo "prev_start : $prev_start <br>";
  // echo "next_start : $next_start <br>";

  // $qs = "?cate1={$cate1}&cate2={$cate2}&start={$start}&end={$end}&cur_pate={$cur_page}&sw={$sw}";

  $cur_path = $_SERVER['SCRIPT_NAME'];
  $prev_url = $cur_path."?cate1={$cate1}&cate2={$cate2}&start={$prev_start}&end={$page_rows}&cur_page={$pre_block}&sw={$sw}";
  $next_url = $cur_path."?cate1={$cate1}&cate2={$cate2}&start={$next_start}&end={$page_rows}&cur_page={$next_block}&sw={$sw}";


  // 이전, 다음버튼 제어 처리
  if($cur_block == $total_block){
    $end_class = "disabled";
    $li_href2 = " ";
  }else{
    $end_class = " ";
    $li_href2 = "href='{$next_url}'";
  }
  if($cur_block == 1){
    $start_class = "disabled";
    $li_href1 = " ";
  }else{
    $start_class = " ";
    $li_href1 = "href='{$prev_url}'";
  }



  $phtml = "<ul class='pagination'>";
    // <!-- li태그의 클래스에 disabled를 넣으면 마우스를 위에 올렸을 때 클릭 금지 마크가 나오고 클릭도 되지 않는다.-->
    // <!-- disabled의 의미는 앞의 페이지가 존재하지 않다는 뜻이다. -->
  $phtml .= "<li class='page-item {$start_class}'>";
  $phtml .= "<a {$li_href1}>«</a>";
  $phtml .= "</li>";
    // <!-- li태그의 클래스에 active를 넣으면 색이 반전되고 클릭도 되지 않는다. -->
    // <!-- active의 의미는 현재 페이지의 의미이다. -->
    for($i=$first_page; $i<=$end_page; $i++){
      if($i==$cur_page){
        $act = "active";
        $cont = "<a class='active'>{$i}</a>";
      }else{
        $act = " ";
        $cur_url = $cur_path."?cate1={$cate1}&cate2={$cate2}&start={$start}&end={$end}&cur_page={$i}&sw={$sw}";
        $cont = "<a href='{$cur_url}'>{$i}</a>";
      }
      $phtml .= "<li class='page-item'>{$cont}</li>";
    }
  $phtml .= "<li class='page-item {$end_class}'><a {$li_href2}>»</a></li>";
  $phtml .= "</ul>";

  return $phtml;

}


?>
