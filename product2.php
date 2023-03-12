 
<? include "./inc/header.html"; ?>



<div class="pwrap">
  <form action="<?=$PHP_SELF?>" id='dform'>
    <input type="hidden" name="cate1" />
    <input type="hidden" name="cate2" />
    <input type="hidden" name="sw" />
  </form>
  <div class="pcont">
    <div class="pbanner"><img src="./img/banner04.jpg"></div><!-- pbanner -->
    <div class="ptop">
      <h3>제품소개</h3>
    </div><!-- ptop -->
    <div class="pinner">
      <div class="pinner2">
        <div class="pbox">
            <div class="pselect">
                <select name="cate1" id="cate1" onchange="setCate2(this)">
                  <option value="all">전체보기</option>
                  <option value="1">데크</option>
                  <option value="2">몰딩</option>
                </select>
            </div><!-- pselect -->
            <div class="pserise">
                <select name="cate2" id="cate2" onchange="viewProduct(this)" >
                  <option value="all">시리즈 넘버</option>
                </select>
            </div><!-- pseries -->
            <div class="psearch">
              <div class="psi">
                <input class="sw" name="sw" type="search">
                <div class="sb"><img src="/img/sb.jpg" alt="검색"></div>
              </div><!-- psi -->
            </div><!-- search -->
        </div><!-- pbox -->

        <div class="pcont">
          <div class="plist">
            <div class="pimg"><img src="/img/test_img.jpg" alt="테스트">
            </div><!-- pimg -->
            <div class="dup">
              <img src="/img/search.png" alt="자세히보기">
              <p>자세히보기</p>
            </div><!-- dup -->
          </div><!-- plist -->
          
        </div><!-- pcont -->
        
      </div><!-- pinner2 -->
    </div><!-- pinner -->
  </div><!-- pcont -->
</div><!-- pwrap -->

<? include "./inc/footer.html"; ?>