<?
include "./hp.php";

$re = getMainData();

if($re){
  $in_type = "update";
}else{
  $in_type = "insert";
}

$comp = $re['comp'];
$comp_en = $re['comp_en'];
$tel = $re['tel'];
$fax = $re['fax'];
$owner = $re['owner'];
$owner_en = $re['owner_en'];
$email = $re['email'];
$reg_no = $re['reg_no'];
$intro_title = $re['intro_title'];
$intro_title_en = $re['intro_title_en'];
$intro = $re['intro'];
$intro_en = $re['intro_en'];
$addr = $re['addr'];
$addr_en = $re['addr_en'];
$faddr = $re['f1addr'];
$faddr_en = $re['f1addr_en'];

$history = $re['history'];
$history_en = $re['history_en'];

$his_html = setHistoryHtml($history);

$img_src = "assets/img";
$main_img = $re['main_img'];
$boon_img = $re['boon_img'];
$sp_img = $re['sp_img'];

if(!empty($main_img)){
  $main_img = "<img src='{$img_src}/{$main_img}' />";
  $mcan = "<span class='canbtn cb1' onclick='delMainImg(1)'>삭제</span>";
}
if(!empty($boon_img)){
  $boon_img = "<img src='{$img_src}/{$boon_img}' />";
  $bcan = "<span class='canbtn cb2' onclick='delMainImg(2)'>삭제</span>";
}
if(!empty($sp_img)){
  $sp_img = "<img src='{$img_src}/{$sp_img}' />";
  $scan = "<span class='canbtn cb3' onclick='delMainImg(3)'>삭제</span>";
}


$sub_img = $re['sub_img'];
if(!empty($sub_img)){
  $sub_box = explode("|",$sub_img);
}
for($i=0,$a=1; $i<count($sub_box); $i++,$a++){
  ${"sub".$a} = "<img src='{$img_src}/".$sub_box[$i]."' />";
  ${"subcan".$a} = "<span class='canbtn sub{$a}' onclick='delSubImg({$a})'>삭제</span>";
}


$he = "active";
$ie = "";
$fe = "";
include "./editHeader.php";
?>

  <style>
    section{margin-top:50px;}
    .img_div{width:200px;height:150px;border:1px solid #ced4da;box-shadow:none;border-radius:4px;display:flex;justify-content: center;align-items:center;}
    .img_div img{width:100%;max-height:90%;object-fit:scale-down}
    .canbtn{margin-left:10px;font-size:11px;text-decoration:underline;cursor:pointer}
    .canbtn:hover{color:red;font-weight:bold}
    .simg_div{width:120px;height:120px;border:1px solid #ced4da;box-shadow:none;border-radius:4px;display:flex;justify-content: center;align-items:center;}
    .simg_div img{width:100%;max-height:90%;object-fit:scale-down}
    .history_div{width:80%;height:300px;border:1px solid #ced4da;box-shadow:none;border-radius:4px;overflow-y:auto;padding:1.5rem;}
  </style>



  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>기본정보 관리</h2>
          <p>아이템과 카테고리를 제외 한 정보를 관리합니다. 단, 업종에 따라 기본정보 이외의 데이터는 여기서 할 수 없습니다.<br>기본 정보 이외의 데이터는 개발팀으로 문의 주세요.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <form method="post" role="form" class="php-email-form" onsubmit="return chkInputData();" enctype="multipart/form-data">
            <!-- <form action="./editExec.php" method="post" class="php-email-form" onsubmit="return chkInputData();"> -->
              <input type="hidden" name="post" id="post" />
              <input type="hidden" name="fpost" id="fpost" />
              <input type="hidden" name="all_his" value="<?=$history?>" />
              <input type="hidden" name="all_his_en" value="<?=$history_en?>" />
              <input type="hidden" name="type" value="<?=$in_type?>" />
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="comp" class="form-control" id="comp" placeholder="업체명" value="<?=$comp?>" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="comp_en" id="comp_en" placeholder="업체명 영문" value="<?=$comp_en?>" required>
                </div>
                <div class="col form-group">
                  <input type="text" name="tel" class="form-control" id="tel" placeholder="전화번호" value="<?=$tel?>" required onkeyup="onlyNumHypen(this)" maxlength="15" />
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="fax" id="fax" placeholder="팩스번호" value="<?=$fax?>" onkeyup="onlyNumHypen(this)" maxlength="15" />
                </div>
              </div>

              <div class="row">
                <div class="col form-group">
                  <input type="text" name="owner" class="form-control" id="owner" placeholder="대표명" value="<?=$owner?>" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="owner_en" id="owner_en" placeholder="대표명 영문" value="<?=$owner?>" required>
                </div>
                <div class="col form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="대표메일" value="<?=$email?>" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="reg_no" id="reg_no" placeholder="사업자등록번호" value="<?=$reg_no?>" required onkeyup="onlyNumHypen(this)">
                </div>
              </div>

              <div class="row">
                <div class="col form-group">
                  <input style="margin-bottom:20px;" type="text" class="form-control" name="intro_title" id="intro_title" placeholder="회사소개 제목" value="<?=$intro_title?>" required >
                  <textarea id="intro" class="form-control" name="intro" placeholder="회사소개" rows="8" required><?=$intro?></textarea>
                </div>
                <div class="col form-group">
                  <input style="margin-bottom:20px;" type="text" class="form-control" name="intro_title_en" id="intro_title_en" placeholder="영문 회사소개 제목" value="<?=$intro_title_en?>" required >
                  <textarea id="intro_en" class="form-control" name="intro_en" placeholder="회사소개 영문" rows="8" required><?=$intro_en?></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <div class="col form-group">
                    <input type="button" class="btn btn-warning post_btn" value="본사 주소찾기" onclick="openPost('b')" />
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="addr" class="form-control" id="addr" placeholder="본사 주소" value="<?=$addr?>" readonly />
                    </div>
                    <div class="col form-group">
                      <input type="text" class="form-control" name="addr_en" id="addr_en" placeholder="본사 주소 영문" value="<?=$addr_en?>" readonly />
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <div class="col form-group">
                    <input type="button" class="btn btn-warning post_btn" value="공장1 주소찾기" onclick="openPost('f')" />
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="faddr" class="form-control" id="faddr" placeholder="공장1 주소" value="<?=$faddr?>" readonly />
                    </div>
                    <div class="col form-group">
                      <input type="text" class="form-control" name="faddr_en" id="faddr_en" placeholder="공장1 주소 영문" value="<?=$faddr_en?>" readonly />
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="row">
                    <div class="col form-group">
                      <div class="main_img img_div">
                        <?=$main_img?>
                      </div>
                      <div class="main_img_txt" style="padding:0.5rem;">
                        메인 이미지(대문) : <a onclick="clickMainFile(1)" class=""style="text-decoration:underline;color:#336829;cursor:pointer">클릭</a><?=$mcan?><br>
                        <span class="mainFile1"></span>
                        <input type="file" name="main_img1" id="main_img1" style="display:none;" onchange="setMainFileName(this,1)" />
                      </div>
                    </div>

                    <div class="col form-group">
                      <div class="boon_img img_div">
                        <?=$boon_img?>
                      </div>
                      <div class="main_img_txt" style="padding:0.5rem">
                        사업분야 이미지 : <a onclick="clickMainFile(2)" class=""style="text-decoration:underline;color:#336829;cursor:pointer">클릭</a><?=$bcan?><br>
                        <span class="mainFile2"></span>
                        <input type="file" name="main_img2" id="main_img2" style="display:none;" onchange="setMainFileName(this,2)" />
                      </div>
                    </div>

                    <div class="col form-group">
                      <div class="sp_img img_div">
                        <?=$sp_img?>
                      </div>
                      <div class="main_img_txt" style="padding:0.5rem">
                        특징 이미지 : <a onclick="clickMainFile(3)" class=""style="text-decoration:underline;color:#336829;cursor:pointer">클릭</a><?=$scan?><br>
                        <span class="mainFile3"></span>
                        <input type="file" name="main_img3" id="main_img3" style="display:none;" onchange="setMainFileName(this,3)" />
                      </div>
                    </div>
                </div>
              </div>


              <div class="col-lg-12">
                <div class="row">
<?               for($i=1; $i<9; $i++) :
                  if($i == 5){
?>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="row">
<?
                  }

?>
                  <div class="col form-group">
                    <div class="sub_img<?=$i?> simg_div">
                      <?=${"sub".$i}?>
                    </div>
                    <div class="sub_img<?=$i?>_txt" style="padding:0.5rem">
                      서브<?=$i?> : <a onclick="clickSubFile(<?=$i?>)" class=""style="text-decoration:underline;color:#336829;cursor:pointer">클릭</a><?=${"subcan".$i}?><br>
                      <span class="subFile<?=$i?>" style="word-break:break-all;"></span>
                      <input type="file" name="sub_img<?=$i?>" id="sub_img<?=$i?>" style="display:none;" onchange="setSubFileName(this,<?=$i?>)" />
                    </div>
                  </div>
<?                endfor; ?>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col form-group">
                        <input type="text" class="form-control" name="year" id="year" placeholder="년도" maxlength="4" />
                      </div>
                      <div class="col form-group">
                        <input type="text" class="form-control" name="month" id="month" placeholder="월" maxlength="2" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10">
                        <div class="col form-group">
                          <input type="text" class="form-control" name="hcont" id="hcont" placeholder="한글 내용" />
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="col form-group cancle_btn">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10">
                        <div class="col form-group">
                          <input type="text" class="form-control" name="hcont_en" id="hcont_en" placeholder="영문 내용" onkeyup="chkNoKo(this)"/>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="col form-group his_btn">
                          <input type="button" class="btn btn-info" value="추가" onclick="setHistory()" />
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="col form-group">
                      <div class="history_div" style=""><?=$his_html?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button class='btn btn-primary' type="submit" style="margin-top:30px;">저장하기</button>
              </div>
              </form>
            </div>

          </div>
        </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

<? include "./editFooter.php"; ?>
