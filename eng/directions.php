<? include "./inc/header.php"; ?>


<div id="dcont">
  <div class="dinner">
    <div class="dbanner"><img src="/img/banner01.jpg"></div><!-- dbanner -->
    <div>
      <h2 class='ptitle'>Contact us</h2>
      <div class="dbox">
        <div class="dmap">
          <a href="https://map.kakao.com/?urlX=826421.0&amp;urlY=592731.0&amp;name=%EA%B2%BD%EB%82%A8%20%EC%B0%BD%EB%85%95%EA%B5%B0%20%EB%8C%80%ED%95%A9%EB%A9%B4%20%EB%8C%80%ED%95%A9%EC%82%B0%EC%97%85%EB%8B%A8%EC%A7%80%EB%A1%9C%20136-5&amp;map_type=TYPE_MAP&amp;from=roughmap" target="_blank">
            <img class="map" src="http://t1.daumcdn.net/roughmap/imgmap/a335c8a263647dbb529f23711b167564374eef8fcc66ad47f3ff490c371bde90"  style="border:1px solid #ccc;">
          </a>
        </div><!-- dmap -->
        <div class="dinfo">
          <div class="dinfo2">
            <div><img src="/img/icon01.png" alt="location">136-5, Daehapsaneopdanji-ro, Daehap-myeon, Changnyeong-gun, Gyeongsangnam-do, Korea</div>
            <div><img src="/img/icon02.png" alt="tel">055-532-3115</div>
            <div><img src="/img/icon03.png" alt="fax">055-532-3114</div>
            <div><img src="/img/icon04.png" alt="email">tnbwood@nate.com</div>
          </div><!-- dinfo2 -->
        </div><!-- dinfo -->
      </div><!-- dbox -->
    </div>
  </div><!-- dinner -->
</div><!-- direction -->


<!-- * 카카오맵 - 지도퍼가기 -->
<!-- 1. 지도 노드 -->


<!--
	2. 설치 스크립트
	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
-->
<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1677232633272",
		"key" : "2dutz",
	}).render();
</script>

<? include "./inc/footer.html"; ?>