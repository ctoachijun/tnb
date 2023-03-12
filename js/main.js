/**
* Template Name: Presento - v3.8.1
* Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 16
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });
  /**
   * Clients Slider
   */
//   new Swiper('.clients-slider', {
//     speed: 400,
//     loop: true,
//     autoplay: {
//       delay: 5000,
//       disableOnInteraction: false
//     },
//     slidesPerView: 'auto',
//     pagination: {
//       el: '.swiper-pagination',
//       type: 'bullets',
//       clickable: true
//     },
//     breakpoints: {
//       320: {
//         slidesPerView: 2,
//         spaceBetween: 40
//       },
//       480: {
//         slidesPerView: 3,
//         spaceBetween: 60
//       },
//       640: {
//         slidesPerView: 4,
//         spaceBetween: 80
//       },
//       992: {
//         slidesPerView: 6,
//         spaceBetween: 120
//       }
//     }
//   });
//
//   /**
//    * Porfolio isotope and filter
//    */
//   window.addEventListener('load', () => {
//     let portfolioContainer = select('.portfolio-container');
//     if (portfolioContainer) {
//       let portfolioIsotope = new Isotope(portfolioContainer, {
//         itemSelector: '.portfolio-item',
//         layoutMode: 'fitRows'
//       });
//
//       let portfolioFilters = select('#portfolio-flters li', true);
//
//       on('click', '#portfolio-flters li', function(e) {
//         e.preventDefault();
//         portfolioFilters.forEach(function(el) {
//           el.classList.remove('filter-active');
//         });
//         this.classList.add('filter-active');
//
//         portfolioIsotope.arrange({
//           filter: this.getAttribute('data-filter')
//         });
//         portfolioIsotope.on('arrangeComplete', function() {
//           AOS.refresh()
//         });
//       }, true);
//
//     }
//
//   });
//
//   /**
//    * Initiate portfolio lightbox
//    */
//   const portfolioLightbox = GLightbox({
//     selector: '.portfolio-lightbox'
//   });
//
//   /**
//    * Portfolio details slider
//    */
//   new Swiper('.portfolio-details-slider', {
//     speed: 400,
//     loop: true,
//     autoplay: {
//       delay: 5000,
//       disableOnInteraction: false
//     },
//     pagination: {
//       el: '.swiper-pagination',
//       type: 'bullets',
//       clickable: true
//     }
//   });
//
//   /**
//    * Testimonials slider
//    */
//   new Swiper('.testimonials-slider', {
//     speed: 600,
//     loop: true,
//     autoplay: {
//       delay: 5000,
//       disableOnInteraction: false
//     },
//     slidesPerView: 'auto',
//     pagination: {
//       el: '.swiper-pagination',
//       type: 'bullets',
//       clickable: true
//     },
//     breakpoints: {
//       320: {
//         slidesPerView: 1,
//         spaceBetween: 20
//       },
//
//       1200: {
//         slidesPerView: 3,
//         spaceBetween: 20
//       }
//     }
//   });
//
//   /**
//    * Animation on scroll
//    */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });
//
//   /**
//    * Initiate Pure Counter
//    */
//   new PureCounter();
//
})()



// 공통

function chkNoKo(obj){
  let re = obj.value;
  re = re.replace(/[ㄱ-ㅎ||ㅏ-ㅣ||가-힣]/g,'');
  obj.value = re;
}

function onlyNumHypen(obj){
  let re = obj.value;
  re = re.replace(/[^0-9\-]/g,'');
  obj.value = re;
}

function spaceFe(obj){
  let re = obj.value;
  re = re.replace(/(^\s+)|(\s*$)/g,'');
  obj.value = re;
}

function openPost(jud){
  let width = 500;
  let height = 500;

  new daum.Postcode({
    width: width,
    height: height,
    oncomplete: function(data) {
      let post = data.zonecode;
      let jaddr = data.jibunAddress;
      let jaddr_en = data.jibunAddressEnglish;
      let raddr = data.roadAddress;
      let raddr_en = data.roadAddressEnglish;

      if(!jaddr){
        jaddr = data.autoJibunAddress;
        jaddr_en = data.autoJibunAddressEnglish;
      }


      if(jud == 'b'){
        document.getElementById('post').value = post;
        document.getElementById('addr').value = raddr;
        document.getElementById('addr_en').value = raddr_en;
        // console.log(post+" : "+raddr+" : "+raddr_en);
        // $("input[name=post]").val(post);
        // $("input[name=addr]").val(raddr);
        // $("input[name=addr_en]").val(raddr_en);
      }else{
        document.getElementById('fpost').value = post;
        document.getElementById('faddr').value = raddr;
        document.getElementById('faddr_en').value = raddr_en;

        // $("input[name=fpost]").val(post);
        // $("input[name=faddr]").val(raddr);
        // $("input[name=faddr_en]").val(raddr_en);
      }

    },
    onsearch: function(data){
      animation: "true"
    }

  }).open({
    popupName: 'searchAddr',
    left: (width + 300) - (window.screen.width),
    top: (window.screen.height / 2) - (height / 2)
  });
}

function chgLang(num){
  let page = $("input[name=curr]").val();
  let path;

  if(page == "index.php") page = "";

  if(num == 1){
    location.href="http://tnbwood.com/"+page;
    $(".kr").addClass("active");
    $(".en").removeClass("active");
  }else{
    location.href="http://tnbwood.com/eng/"+page;
    $(".kr").removeClass("active");
    $(".en").addClass("active");
  }
}



// 메인페이지

function clickMainFile(num){
  document.getElementById("main_img"+num).click();
}

function setMainFileName(obj,num){
  let name = obj.files[0].name;
  document.querySelector(".mainFile"+num).innerText = name;
}

function clickSubFile(num){
  document.getElementById("sub_img"+num).click();
}

function setSubFileName(obj,num){
  let name = obj.files[0].name;
  document.querySelector(".subFile"+num).innerText = name;
}


function setHistory(){
  let y = $("#year").val();
  let m = $("#month").val();
  let cont = $("#hcont").val();
  let cont_en = $("#hcont_en").val();
  let all_his = $("input[name=all_his]").val();
  let all_his_en = $("input[name=all_his_en]").val();
  let date = new Date();
  let jy = date.getFullYear();


  if(!y){
    alert("연도를 입력 해 주세요.");
    $("#year").focus();
    return false;
  }

  if(y > jy){
    alert("올해보다 미래의 연도는 안됩니다.");
    $("#year").focus();
    return false;
  }

  if(y < 1900){
    alert("1900년보다 오래 된 경우에는 개발자에게 문의주세요");
    $("#year").focus();
    return false;
  }

  if(m > 12 || m < 1){
    alert("월 지정은 제대로 해 주세요.");
    $("#month").focus();
    return false;
  }

  if(!cont){
    alert("내용을 입력 해 주세요");
    $("#hcont").focus();
    return false;
  }

  $.ajax({
    url : "./ajax.php",
    type: "post",
    data: {"w_mode":"setHistory","y":y,"m":m,"cont":cont,"cont_en":cont_en,"his":all_his,"his_en":all_his_en}
  }).done(function(result){
    let json = JSON.parse(result);
    // console.log(json);

    $(".history_div").html(json.html);
    $("input[name=all_his]").val(json.all_his);
    $("input[name=all_his_en]").val(json.all_his_en);
    $("#year").val("");
    $("#month").val("");
    $("#hcont").val("");
    $("#hcont_en").val("");
  })

}

function delHistory(num){
  if(confirm("해당 내용을 삭제하시겠습니까?")){
    let all_his = $("input[name=all_his]").val();
    let all_his_en = $("input[name=all_his_en]").val();

    $.ajax({
      url : "./ajax.php",
      type: "post",
      data: {"w_mode":"delHistory","num":num,"his":all_his,"his_en":all_his_en}
    }).done(function(result){
      let json = JSON.parse(result);

      $(".history_div").html(json.html);
      $("input[name=all_his]").val(json.all_his);
      $("input[name=all_his_en]").val(json.all_his_en);
    })
  }
}

function setEditHistory(num){
  let y = $("#year").val();
  let m = $("#month").val();
  let cont = $("#hcont").val();
  let cont_en = $("#hcont_en").val();
  let all_his = $("input[name=all_his]").val();
  let all_his_en = $("input[name=all_his_en]").val();

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"setEditHistory","his":all_his,"his_en":all_his_en,"num":num}
  }).done(function(result){
    let json = JSON.parse(result);

    $("#year").val(json.year);
    $("#month").val(json.month);
    $("#hcont").val(json.hcont);
    $("#hcont_en").val(json.hcont_en);

    $(".his_btn").html("<input type='button' class='btn btn-success' value='수정' onclick='editHistory("+num+")' />");
    $(".cancle_btn").html("<input type='button' class='btn btn-secondary' value='취소' onclick='cancleHis()' />");

  })
}

function cancleHis(){
  $("#year").val("");
  $("#month").val("");
  $("#hcont").val("");
  $("#hcont_en").val("");

  $(".his_btn").html("<input type='button' class='btn btn-info' value='추가' onclick='setHistory()' />");
  $(".cancle_btn").html("");
}

function editHistory(num){
  let y = $("#year").val();
  let m = $("#month").val();
  let cont = $("#hcont").val();
  let cont_en = $("#hcont_en").val();
  let all_his = $("input[name=all_his]").val();
  let all_his_en = $("input[name=all_his_en]").val();
  let date = new Date();
  let jy = date.getFullYear();


  if(!y){
    alert("연도를 입력 해 주세요.");
    $("#year").focus();
    return false;
  }

  if(y > jy){
    alert("올해보다 미래의 연도는 안됩니다.");
    $("#year").focus();
    return false;
  }

  if(y < 1900){
    alert("1900년보다 오래 된 경우에는 개발자에게 문의주세요");
    $("#year").focus();
    return false;
  }

  if(m > 12 || m < 1){
    alert("월 지정은 제대로 해 주세요.");
    $("#month").focus();
    return false;
  }

  if(!cont){
    alert("내용을 입력 해 주세요");
    $("#hcont").focus();
    return false;
  }

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"editHistory","y":y,"m":m,"cont":cont,"cont_en":cont_en,"his":all_his,"his_en":all_his_en,"num":num}
  }).done(function(result){
    let json = JSON.parse(result);

    $(".history_div").html(json.html);
    $("input[name=all_his]").val(json.all_his);
    $("input[name=all_his_en]").val(json.all_his_en);

    $("#year").val("");
    $("#month").val("");
    $("#hcont").val("");
    $("#hcont_en").val("");

    $(".his_btn").html("<input type='button' class='btn btn-info' value='추가' onclick='setHistory()' />");
    $(".cancle_btn").html("");

  })
}

function chkInputData(){
  let addr = $("#addr").val();
  let his = $("input[name=all_his]").val();

  if(!addr){
    alert("주소를 입력 해 주세요.");
    openPost('b');
    return false;
  }
  $("form").attr("action","./editExec.php");
  // return true;
}

function delMainImg(num){
  if(confirm("삭제 하시겠습니까? 삭제 후 복구는 안됩니다.")){
    $.ajax({
      url : "ajax.php",
      type: "post",
      data: {"w_mode":"delMainImg","num":num}
    });

    if(num == 1){
      $(".main_img").html("");
      $(".cb1").remove();
    }else if(num == 2){
      $(".boon_img").html("");
      $(".cb2").remove();
    }else{
      $(".sp_img").html("");
      $(".cb3").remove();
    }
  }
}

function delSubImg(num){
  if(confirm("삭제 하시겠습니까? 삭제 후 복구는 안됩니다.")){
    $.ajax({
      url : "ajax.php",
      type: "post",
      async: false,
      data: {"w_mode":"delsubImg","num":num}
    }).done(function(result){
      let json = JSON.parse(result);
    })
    location.reload();
  }
}


// 아이템 페이지

function addCategory(num){
  let cate,cate_en,cidx,cha,cnum;

  if(num == 1){
    cate = $("#category").val();
    cate_en = $("#category_en").val();
    cidx = "";
    cha = "1차";
    cnum = "";
  }else{
    cate = $("#category1").val();
    // cate_en = $("#category1_en").val();
    cidx = $("#cate1_sel").val();
    cha = "2차";
    cnum  = "1";

    if(cidx == "NO"){
      alert("1차 카테고리를 선택 해 주세요");
      return false;
    }
  }

  if(!cate){
    alert(cha+" 카테고리 이름을 입력 해 주세요.");
    $("#category"+cnum).focus();
    return false;
  }
  if(num == 1 && !cate_en){
    alert(cha+" 영문 카테고리 이름을 입력 해 주세요.");
    $("#category_en").focus();
    return false;
  }

  // console.log(cidx+" "+cate);

  $("input[name=num]").val(num);
  let f = new FormData($("form")[0]);
  f.append("w_mode","addCategory");


  $.ajax({
    url : "ajax.php",
    type: "post",
    data:f,
    type:'post',
    enctype:"multipart/form-data",
    processData:false,
    contentType:false,
  }).done(function(result){
    let json = JSON.parse(result);
    console.log(json);
    if(json.state == "HJ"){
      alert("카테고리 이름이 중복입니다.");
      $("#category").focus();
      return false;
    }else if(json.state == "YJ"){
      alert("영문 카테고리 이름이 중복입니다.");
      $("#category_en").focus();
      return false;
    }else if(json.state == "DJ"){
      alert("서버에 동일한 이름의 디렉토리가 있습니다.");
      return false;
    }else{

      if(num == 1){
        $(".cateList_div").html(json.html);
        $(".cate2List_div").html("");
        $(".item_div").html("");
        $(".cate1_sel_div").html(json.s1html);
        $(".cate_sel_div").html(json.shtml);
        $(".cate2_sel_div").html(json.s2html);
        $("#category").focus();

      }else{
        $(".cate2List_div").html(json.c2html);
        $("#category1").val("");
        $("#category1").focus();
        $(".img_txt").html("");
      }
      cancelEditItem();
    }
  })
}

function delCategory(num,type){
  if(confirm("해당 카테고리를 삭제 하시겠습니까?\n관련 된 제품들도 모두 삭제 됩니다.")){
    $.ajax({
      url : "ajax.php",
      type: "post",
      data: {"w_mode":"delCategory","num":num,"type":type}
    }).done(function(result){
      let json = JSON.parse(result);
      console.log(json);

      if(json.state == "N"){
        alert("시스템 오류입니다. 개발자를 호출해주세요~!!!");
        return false;
      }else if(json.state == "IN"){
        alert("아이템 삭제부분에서 오류가 발생했습니다. 개발자를 호출해주세욥!");
        return false;
      }else{
        if(type == 1){
          $(".cate1_sel_div").html(json.shtml_d);
        }
        $(".cateList_div").html(json.html);
        $(".cate2List_div").html(json.c2html);
        $(".cate_sel_div").html(json.shtml);
        $(".cate2_sel_div").html(json.shtml2);
        $(".item_div").html("");
        cancelEditItem();

      }
    })
  }
}

function setCate2Html(obj){
  let idx = obj.value;
  console.log(idx);

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"setCate2Html","idx":idx}
  }).done(function(result){
    let json = JSON.parse(result);

    $(".cate2List_div").html(json.c2html);
    cancelEditItem();
  });

}

function setCate2Sel(obj){
  let idx = obj.value;

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"setCate2Sel","idx":idx}
  }).done(function(result){
    let json = JSON.parse(result);
    console.log(json);

    $(".cate2_sel_div").html(json.c2sel);
    $(".item_div").html("");
  });
}

function setCatet2Sel(obj){
  let idx = obj.value;

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"setCate2tSel","idx":idx}
  }).done(function(result){
    let json = JSON.parse(result);
    // console.log(json);

    $(".cate2t_sel_div").html(json.c2sel);
  });
}

function setItemHtml(obj){
  let val = obj.value;
  console.log(val);
  $.ajax({
    url : 'ajax.php',
    type: 'post',
    data: {"w_mode":"setItemHtml",'caidx':val},
    success: function (result){
      let json = JSON.parse(result);
      $(".item_div").html(json.html);
      cancelEditItem();
    }
  })
}

function clickImg(num){
  if(num == 1){
    $("#dan_img").click();
  }else{
    $("#item_img").click();
  }
}

function setImgName(num){
  let name;
  console.log(num);
  if(num == 1){
    name = $("#dan_img")[0].files[0].name;
    $(".img_txt").html(name);
  }else{
    name = $("#item_img")[0].files[0].name;
    $(".img2_txt").html(name);
  }
  console.log(name);

}

function addItem(){
  let cate1 = $("#cate_sel").val();
  let cate2 = $("#cate2_sel").val();
  let name = $("#item_name").val();
  let cls = $("#class_name").val();

  if(cate1 == "NO"){
    alert('1차 카테고리를 선택 해 주세요.');
    return false;
  }
  if(cate2 == "NO"){
    alert('2차 카테고리를 선택 해 주세요.');
    return false;
  }
  if(!name){
    alert("제품명을 확인 해 주세요.");
    $("#item_name").focus();
    return false;
  }
  if(!cls){
    alert("색상 클래스를 확인 해 주세요.");
    $("#class_name").focus();
    return false;
  }

  if(!$("#item_img")[0].files[0]){
    alert("제품 이미지가 없습니다.");
    clickImg();
    return false;
  }

  let f = new FormData($("form")[0]);
  f.append("w_mode","addItem");

  $.ajax({
      url:"ajax.php",
      data:f,
      type:'post',
      enctype:"multipart/form-data",
      processData:false,
      contentType:false,
      success:function(result){
        let json = JSON.parse(result);
        console.log(json);
        if(json.state == "FJ"){
          alert("이미 등록 된 제품이름입니다.");
          $("#item_name").focus();
          return false;
        }else{
          $(".item_div").html(json.item_html);
          cancelEditItem();
        }
      }
  });
}

function editItem(){
  let cate1 = $("#cate_sel").val();
  let cate2 = $("#cate2_sel").val();
  let name = $("#item_name").val();
  let cls = $("#class_name").val();

  if(cate1 == "NO"){
    alert('1차 카테고리를 선택 해 주세요.');
    return false;
  }
  if(cate2 == "NO"){
    alert('2차 카테고리를 선택 해 주세요.');
    return false;
  }
  if(!name){
    alert("제품명을 확인 해 주세요.");
    $("#item_name").focus();
    return false;
  }
  if(!cls){
    alert("색상 클래스를 확인 해 주세요.");
    $("#class_name").focus();
    return false;
  }


  let f = new FormData($("form")[0]);
  f.append("w_mode","editItem");

  $.ajax({
      url:"ajax.php",
      data:f,
      type:'post',
      enctype:"multipart/form-data",
      processData:false,
      contentType:false,
      success:function(result){
        let json = JSON.parse(result);
        console.log(json);
        if(json.state == "FJ"){
          alert("이미 등록 된 제품이름입니다.");
          $("#item_name").focus();
          return false;
        }else{
          $(".item_div").html(json.item_html);
          cancelEditItem();
        }
      }
  });
}


function setItemData(idx){
  $("input[name=c2idx]").val(idx);

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode" : "setItemData", "idx":idx}
  }).done(function (result){
    let json = JSON.parse(result);
    // console.log(json);
    $("#category1").val(json.name);
    $(".img_txt").html(json.img);
    $("input[name=org_img]").val(json.img);
    $("input[name=org_name]").val(json.name);
    $(".danBtn").html(json.btn);
    $(".imgunit").removeClass("selItemDiv");
    $(".img"+idx).addClass("selItemDiv");
  })
}

function setItemData2(idx){
  $("input[name=iidx]").val(idx);

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode" : "setItemData2", "idx":idx}
  }).done(function (result){
    let json = JSON.parse(result);
    console.log(json);
    $("#item_name").val(json.iname);
    $("#class_name").val(json.iclass);
    $(".img2_txt").html(json.iimg);
    $("input[name=org_name2]").val(json.iname);
    $("input[name=org_img2]").val(json.iimg);
    $(".itemBtn").html(json.btn);
    $(".iimgunit").removeClass("selItemDiv");
    $(".iimg"+idx).addClass("selItemDiv");

  })
}


function cancelEditItem(){

  $("#category").val("");
  $("#category_en").val("");
  $(".cateunit").removeClass("selItemDiv");
  $(".cateBtn").html("<input type='button' class='btn btn-outline-primary right' value='>' onclick='addCategory(1)' />");

  $("#category1").val("");
  $("#item_name").val("");
  $("#class_name").val("");
  $(".imgunit").removeClass("selItemDiv");
  $(".iimgunit").removeClass("selItemDiv");

  $(".img_txt").html("");
  $(".danBtn").html("<input type='button' class='btn btn-outline-primary right' value='>' onclick='addCategory(2)' />");
  $("#dan_img").remove();
  $(".imgAddDiv").append("<input type='file' name='dan_img' id='dan_img' style='display:none;position:absolute;top:0;left:0' onchange='setImgName(1)' />");

  $(".img2_txt").html("");
  $(".itemBtn").html("<input type='button' class='btn btn-outline-primary right' value='>' onclick='addItem()' />");
  $("#item_img").remove();
  $(".imgAddDiv2").append("<input type='file' name='item_img' id='item_img' style='display:none;position:absolute;top:0;left:0' onchange='setImgName(2)' />");
}



function editCate2(idx){
  let f = new FormData($("form")[0]);
  f.append("w_mode","editCate2");
  f.append("idx",idx);

  $.ajax({
      url:"ajax.php",
      data:f,
      type:'post',
      enctype:"multipart/form-data",
      processData:false,
      contentType:false,
      success:function(result){
        let json = JSON.parse(result);
        console.log(json);
        if(json.state == "DJ"){
          alert("중복 된 디렉토리가 존재합니다.");
          $("#category1").focus();
          return false;
        }else{
          $(".cate2List_div").html(json.c2html);
          cancelEditItem();
        }

      }
  });
}

function delItem(idx){
  if(confirm("해당 제품을 삭제 하시겠습니까?")){
    $.ajax({
      url : "ajax.php",
      type: "post",
      data: {"w_mode":"delItem","idx":idx}
    }).done(function (result){
      let json = JSON.parse(result);

      if(json.state == "Y"){
        $(".item_div").html(json.item_div);
        cancelEditItem();
      }else{
        alert("시스템 오류입니다.");
      }
    })
  }
}

function setCateData(idx){
  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"setCateData", "idx":idx},
    success: function(result){
      let json = JSON.parse(result);
      console.log(json);

      $("#category").val(json.cate);
      $("#category_en").val(json.cate_en);
      $(".cateBtn").html(json.btn);

      $(".cateunit").removeClass("selItemDiv");
      $(".cate"+idx).addClass("selItemDiv");

    }
  })
}

function editCategory(idx){
  let cate = $("#category").val();
  let cate_en = $("#category_en").val();

  if(!cate){
    alert("카테고리 이름을 확인 해 주세요.");
    $("#category").focus();
    return false;
  }
  if(!cate_en){
    alert("카테고리(영문) 이름을 확인 해 주세요.");
    $("#category_en").focus();
    return false;
  }

  $.ajax({
    url : "ajax.php",
    type: "post",
    data: {"w_mode":"editCategory","idx":idx,"cate":cate,"cate_en":cate_en},
    success: function(result){
      let json = JSON.parse(result);
      // console.log(json);
      if(json.state == "N"){
        alert("시스템 오류입니다.");
        return false;
      }else if(json.state == "DJ"){
        alert("중복된 디렉토리 이름입니다.");
        $("#category_en").focus();
        return false;
      }else{
        $(".cateList_div").html(json.html);
      }
      cancelEditItem();
    }
  })

}
