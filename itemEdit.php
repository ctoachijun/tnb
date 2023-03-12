<?
include "./lib/tnb.php";

$cate_html = getCategoryHtml();
$sel_html = getCategorySelect(1);

$sel2_html = getCategorySelect(2);
$sel_i2_html = setCategory2Select(0);


$he = "";
$ie = "active";
$fe = "";

include "./editHeader.php";
?>

  <style>
    section{margin-top:50px;}
    .cate1_div,.cate2_div{padding-top:.5rem;padding-bottom:2rem;font-weight:700;}
    .addBtn_div{height:100%;display:flex;justify-content:center;align-items:center;}
    .addBtn_div input{width:70px;height:55px;margin-top:-20px;}
    .addBtn_div span{text-decoration: underline;margin-left:10px;margin-top:10px;cursor:pointer;}
    .addBtn_div span:last-child{font-weight:bold;color:red}
    .cateList_div,.item_div,.cate2List_div{width:100%; border:1px solid #ced4da;box-shadow:none;border-radius:4px;padding:2rem;max-height:50vh;overflow:auto}
    .cateList_div .clist:nth-child(odd){background-color:#EFEFEF;}
    .clist {box-shadow:none;padding-bottom:.7rem;margin-bottom:10px;padding:0.2rem;cursor:pointer;}
    .clist .deltxt{font-size:13px;margin-left:20px;text-decoration:underline;cursor:pointer;}
    .clist .deltxt:hover{color:red;font-weight:bold}
    .c2row{display:flex;justify-content:flex-start;margin-bottom:10px;}
    .c2row .c2list {border:1px solid #CECECE; width:30%; padding:0.2rem;text-align:center;margin-right:10px;cursor:pointer;}
    .c2row img{width:100%;cursor:pointer;object-fit:contain;}
    .c2row .c2list .c2list_dbtn{margin-top:5px;text-align:right;color:red;font-size:13px;text-decoration:underline;cursor:pointer;}
    .php-email-form button[type=submit]{margin-top:50px;}
    .simg_div{width:120px;height:120px;border:1px solid #ced4da;box-shadow:none;border-radius:4px;}
    .select_box{position:relative;}
    .icon-show{position:absolute;right:10px;top:10px;}
    .item_div{min-height:300px;overflow:auto;}
    .item_div .itemimg_div{border:1px solid #CECECE; width:30%;height:170px;padding:0.2rem;text-align:center;margin-right:10px;cursor:pointer;display:inline-block}
    .item_div .itemimg_div img{width:100%;height:60%;object-fit:contain;}
    .item_div .itemname_div{display:flex;flex-direction:column;border-top:1px solid #999;padding-top:8px;padding-bottom:5px;margin-top:5px;}

    .selItemDiv{border:3px solid #0C77BF !important;}
    .itemname_div .color_div{display:flex;justify-content:center}
    .itemname_div .back{width:30px;height:30px;background-repeat:no-repeat;}
  </style>



  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>아이템정보 관리</h2>
          <p>아이템과 관련된 정보를 관리합니다. 카테고리 / 아이템 관련입니다.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <form method="post" role="form" class="php-email-form">
              <input type="hidden" name="org_img" />
              <input type="hidden" name="org_img2" />
              <input type="hidden" name="org_name" />
              <input type="hidden" name="org_name2" />
              <input type="hidden" name="num" />
              <input type="hidden" name="c2idx" />
              <input type="hidden" name="iidx" />
              <div class="row">
                <div class="col-md-12">
                  <div class="cate1_div">1차 카테고리(대분류)</div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="category" class="form-control" id="category" placeholder="카테고리" onchange="spaceFe(this)" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="category_en" class="form-control" id="category_en" placeholder="카테고리 영문" onchange="spaceFe(this)" onkeyup="chkNoKo(this)" />
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="addBtn_div cateBtn">
                    <input type="button" class="btn btn-outline-primary right" value=">" onclick='addCategory(1)' />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="cateList_div">
                    <?=$cate_html?>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:40px;padding-top:50px;border-top:1px solid #ced4da;">
                <div class="col-md-12">
                  <div class="cate2_div">2차 카테고리(시리즈)</div>
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="col form-group">
                      <div class="select_box cate1_sel_div">
                        <?=$sel2_html?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="category1" class="form-control" id="category1" placeholder="카테고리" onchange="spaceFe(this)" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group imgAddDiv">
                      <input type="button" class="btn btn-outline-secondary" value="단면도" onclick="clickImg(1)" /><span class="img_txt" style="margin-left:15px;"></span>
                      <input type="file" name="dan_img" id="dan_img" style="display:none;position:absolute;top:0;left:0" onchange="setImgName(1)" />
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="addBtn_div danBtn">
                    <input type="button" class="btn btn-outline-primary right" value=">" onclick='addCategory(2)' />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="cate2List_div">
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top:40px;padding-top:50px;border-top:1px solid #ced4da;">
                <div class="col-md-12">
                  <div class="cate2_div">제품 상세</div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col form-group">
                      <div class="select_box cate_sel_div">
                        <?=$sel_html?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <div class="select_box cate2_sel_div">
                        <?=$sel_i2_html?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="item_name" class="form-control" id="item_name" placeholder="제품명" onchange="spaceFe(this)" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input type="text" name="class_name" class="form-control" id="class_name" placeholder="색상 클래스" onchange="spaceFe(this)" onkeyup="chkNoKo(this)" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group imgAddDiv2">
                      <input type="button" class="btn btn-outline-secondary" value="이미지" onclick="clickImg(2)" /><span class="img2_txt" style="margin-left:15px;"></span>
                      <input type="file" name="item_img" id="item_img" style="display:none;position:absolute;top:0;left:0" onchange="setImgName(2)" />
                    </div>
                  </div>

                </div>
                <div class="col-md-2">
                  <div class="addBtn_div itemBtn">
                    <input type="button" class="btn btn-outline-primary right" value=">" onclick='addItem()' />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="item_div">
                    <?=$item_html?>
                  </div>
                </div>
              </div>


              <!-- <div class="text-center"><button type="submit">저장하기</button></div> -->
            </form>
          </div>


        </div>

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <script>

  </script>


<? include "./editFooter.php"; ?>
