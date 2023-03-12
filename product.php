<? 
include "./inc/header.php"; 

if(!$start){
  $start = 0;
}
if(!$end){
  $end = 12;
}
if(!$cur_page){
  $cur_page = 1;
}


// 셀렉트 초기화 및 값 세팅
if(!$cate1) $cate1 = "all";
if(!$cate2) $cate2 = "all";

$cate1_sel = setCateSel($cate1,"ko");
$cate2_sel = setCate2Sel($cate1,$cate2,"ko");


// 아이템 영역 세팅
$item_html = setItemHtml($cate1,$cate2,$start,$end,$cur_page,$sw,"ko");


$qs = $QUERY_STRING;

?>

<script>
    $(document).ready(function(){
        let mpoint = $(".pbox").offset().top;
        let c1 = $("input[name=cate1").val();

        if(c1){
          $("html, body").animate({
            scrollTop: mpoint
          }, 1000);
        }

        $(".sw").on("keyup",function(key){
        if(key.keyCode==13) {
            goSearch();
        }
    });

    })
</script>
<style>
  .sb,.pbi{cursor:pointer;}
  input[type=search]::-webkit-search-cancel-button {
    cursor: pointer;
  }
  .resultox{width:100%;min-height:10vh;display:flex;justify-content:center;align-items:center;}
</style>


<div class="pwrap">
  <form action="<?=$PHP_SELF?>" id='dform'>
    <input type="hidden" name="stop" />
    <input type="hidden" name="cate1" value="<?=$_GET['cate1']?>"/>
    <input type="hidden" name="cate2" />
    <input type="hidden" name="qs" value="<?=$qs?>" />
    <input type="hidden" name="sw" />
  </form>    
  <div class="pcont">
    <div class="pbanner"><img src="./img/banner04.jpg"></div><!-- pbanner -->
    <div class="ptop">
      <h3 class='ptitle'>제품소개</h3>
    </div><!-- ptop -->
    <div class="pinner">
      <div class="pinner2">
        <div class="pbox">
            <div class="pselect">
                <select id="cate1" onchange="setCate2(this)">
                  <?=$cate1_sel?>
                </select>
            </div><!-- pselect -->
            <div class="pserise">
                <select id="cate2" onchange="viewProduct(this)" >
                  <?=$cate2_sel?>
                </select>
            </div><!-- pseries -->
            <div class="psearch">
              <div class="psi">
                <input id="sw" class="sw" type="search" onchange="spaceFe(this)" value="<?=$sw?>">
                <div class="sb"><img src="/img/sb.jpg" alt="검색" onclick="goSearch()"></div>
              </div><!-- psi -->
            </div><!-- search -->
        </div><!-- pbox -->

        <?=$item_html?>      

      </div><!-- pinner2 -->
    </div><!-- pinner -->
  </div><!-- pcont -->
</div><!-- pwrap -->

<? include "./inc/footer.html"; ?>