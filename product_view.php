<? 
include "./inc/header.php"; 



// 제품 데이터
$item = getItem($stop);
$iname = $item['iname'];
$iimg = $item['iimg'];

$c1_idx = $item['caidx'];
$c2_idx = $item['ca2idx'];

// 카테고리1 이름
$c1_box = getCategoryData($c1_idx);
$c1_name = $c1_box[0]['name'];
$c1_name_en = $c1_box[0]['name_en'];

// 카테고리2 데이터
$c2_box = getCategory2Data($c2_idx);
$c2_name = $c2_box['name'];
$dan = $c2_box['danview'];

$img_path = "/img/products/{$c1_name_en}/{$c2_name}";

// 컬러코드
$color = getColorCode($c2_idx);

?>

<style>
    button{cursor:pointer;}
</style>


<div class="pvcont">
  <input type="hidden" name="qs" value="<?=$qs?>" />
  <div class="pbanner"><img src="./img/banner04.jpg"></div><!-- pbanner -->
  <div class="pvtop">
    <div class="pvt_in">
    <ul>
      <li><a >전체제품</a></li>
      <li><a ><?=$c1_name?></a></li>
      <li><a >시리즈넘버</a></li>
      <li><a class="active"><?=$c2_name?></a></li>
    </ul>
    </div><!-- pvt_in -->
  </div><!-- pvtop -->
  <div class="pv_box">
    <div class="pv_boxin">
      <div class="pvitem">
        <img src="<?=$img_path?>/<?=$iimg?>" alt="<?=$iname?>">
      </div><!-- pvitem -->
      <div class="pvinfo">
        <table>
            <tr>
              <th class="l1">Series Number</th>
              <td class="l1 c2name"><?=$c2_name?></td>
            </tr>
            <tr>
              <th>제품명</th>
              <td class='iname'><?=$iname?></td>
            </tr>
            <tr>
              <th>색상 코드</th>
              <td class="pvcolor">
<?              foreach($color as $v) : ?>                
                    <div class="<?=$v['iclass']?> circle back c<?=$v['idx']?> <? if($stop == $v['idx']) echo 'cactive'; ?>" onclick="setColorData(<?=$v['idx']?>)"></div>
<?              endforeach; ?>                
            </td>
            </tr>
            <tr>
              <th class="pvdan">제품 단면도</th>
              <td class="pvdan">
                <img src="<?=$img_path?>/dan/<?=$dan?>" alt="단면도">
              </td>
              <td></td>
            </tr>
        </table> 
      </div><!-- pvinfo -->
    </div><!-- pv_boxin -->
  </div><!-- pv_box -->
  <div class="pvbtn">
      <div class="pvbtn_in">
        <button type="button"><img src="/img/btn_icon.png" alt="버튼" onclick='pageBack()'>뒤로가기</button>
      </div><!-- pvbtn_in -->
  </div><!-- pvbtn -->
</div><!-- pvcont -->

<? include "./inc/footer.html"; ?>