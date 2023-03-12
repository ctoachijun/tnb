<?php
include "./hp.php";

$intro_title = addslashes($intro_title);
$intro_title_en = addslashes($intro_title_en);
$intro = addslashes($intro);
$intro_en = addslashes($intro_en);
$all_his = addslashes($all_his);
$all_his_en = addslashes($all_his_en);
$comp = addslashes($comp);
$comp_en = addslashes($comp_en);
$owner = addslashes($owner);
$owner_en = addslashes($owner_en);

// var_dump($_POST);
// var_dump($_FILES);
// echo "<br><br>";
// foreach($_FILES as $v){
//   print_r($v);
//   echo "<br>";
// }


// 파일 있는것들만 업로드 및 SQL 칼럼 만들어서 붙여넣기.
// 이름은 고정 이름으로. - main / intro / metc / sub1~8

$upload = "assets/img/";

$mainImg = $_FILES['main_img1'];
$boonImg = $_FILES['main_img2'];
$spImg = $_FILES['main_img3'];

// 메인이미지 업로드 처리
$main_name = $mainImg['name'];
if(!empty($main_name)){
  $main_tmp = $mainImg['tmp_name'];
  $name_box = explode(".",$main_name);
  $whak = end($name_box);
  $fname = "main.".$whak;

  $main_where = ", main_img = '{$fname}'";
  $re = move_uploaded_file($main_tmp, $upload.$fname);
  // echo "main 파일 업로드 $re <br>";
}


// 사업분야 이미지 업로드 처리
$boon_name = $boonImg['name'];
if(!empty($boon_name)){
  $boon_tmp = $boonImg['tmp_name'];
  $name_box = explode(".",$boon_name);
  $whak = end($name_box);
  $fname = "boon.".$whak;

  $boon_where = ", boon_img = '{$fname}'";
  $re1 = move_uploaded_file($boon_tmp, $upload.$fname);
  // echo "boon 파일 업로드 $re1 <br>";
}


// 특징 이미지 업로드 처리
$sp_name = $spImg['name'];
if(!empty($sp_name)){
  $sp_tmp = $spImg['tmp_name'];
  $name_box = explode(".",$sp_name);
  $whak = end($name_box);
  $fname = "sp.".$whak;

  $sp_where = ", sp_img = '{$fname}'";
  $re2 = move_uploaded_file($sp_tmp, $upload.$fname);
  // echo "sp 파일 업로드 $re2 <br>";
}



// 기존에 등록 된 서브 파일 뒤에 새로운 파일을 추가.
$sql = "SELECT * FROM mainData";
$re = sql_fetch($sql);

$sub_img = $re['sub_img'];
if(!empty($sub_img)){
  $sub_box = explode("|",$sub_img);
}else{
  $sub_box = array();
}


for($i=1,$a=1; $i<9; $i++){
  $sub = $_FILES['sub_img'.$i];
  $name = $sub['name'];

  if(!empty($name)){
    // echo "sub {$i} : {$name} 있음요!!! <br>";

    $tmp = $sub['tmp_name'];
    $name_box = explode(".",$name);
    $whak = end($name_box);
    $time = strtotime("-{$i} second");
    $fname = "sub{$time}.{$whak}";
    array_push($sub_box,$fname);

    $re = move_uploaded_file($tmp, $upload.$fname);
    $a++;
  }
}

$sub_txt = implode("|",$sub_box);
$sub_where = ", sub_img = '{$sub_txt}'";


if($type=="insert"){
  $sql = "INSERT INTO mainData SET comp = '{$comp}', comp_en = '{$comp_en}', owner = '{$owner}', owner_en = '{$owner_en}',
    tel = '{$tel}', fax = '{$fax}', email = '{$email}', reg_no = '{$reg_no}', intro_title = '{$intro_title}', intro_title_en = '{$intro_title_en}',
    intro = '{$intro}', intro_en = '{$intro_en}', history = '{$all_his}', history_en = '{$all_his_en}', post = '{$post}',
    addr = '{$addr}', addr_en = '{$addr_en}', f1post = '{$fpost}', f1addr = '{$faddr}', f1addr_en = '{$faddr_en}'
    {$main_where} {$boon_where} {$sp_where} {$sub_where}, wdate = now()
  ";

}else{
  $sql = "UPDATE mainData SET comp = '{$comp}', comp_en = '{$comp_en}', owner = '{$owner}', owner_en = '{$owner_en}',
    tel = '{$tel}', fax = '{$fax}', email = '{$email}', reg_no = '{$reg_no}', intro_title = '{$intro_title}', intro_title_en = '{$intro_title_en}',
    intro = '{$intro}', intro_en = '{$intro_en}', history = '{$all_his}', history_en = '{$all_his_en}', post = '{$post}',
    addr = '{$addr}', addr_en = '{$addr_en}', f1post = '{$fpost}', f1addr = '{$faddr}', f1addr_en = '{$faddr_en}'
    {$main_where} {$boon_where} {$sp_where} {$sub_where}, udate = now()
  ";

}

// echo $sql;
$re = sql_exec($sql);

if($re){
  echo "<script>alert('정상 등록되었습니다.');</script>";
}else{
  echo "<script>alert('등록 오류입니다. 개발팀에 문의주세요.');</script>";
}

echo "<script>location.replace('./hpEdit.php');</script>";



?>
