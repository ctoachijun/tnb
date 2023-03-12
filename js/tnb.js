function spaceFe(obj){
    let re = obj.value;
    re = re.replace(/(^\s+)|(\s*$)/g,'');
    obj.value = re;
}

function notReady(){
    alert("준비중 입니다.");
    return false;
}

function setCate2(obj){
    let cate1 = obj.value;

    $("input[name=cate1").val(cate1);
    $("form").submit();

}

function viewProduct(obj){
    let cate2 = obj.value;
    $("input[name=cate2").val(cate2);
    $("form").submit();

}

function goSearch(){
    let sw = $("#sw").val();
    let c1 = $("#cate1").val();
    let c2 = $("#cate2").val();
 
    $("input[name=sw").val(sw);
    // $("input[name=cate1").val(c1);
    $("input[name=cate2").val(c2);
    $("form").submit();
}

function viewDetail(idx){
    // $("form").append("<input type='hidden' name='productIdx' value='"+idx+"'>");
    $("input[name=stop").val(idx);
    $("form").attr("action","product_view.php");
    $("form").submit();
}

function setColorData(idx){
    let target = "c"+idx;

    $.ajax({
        url : "ajax.php",
        type: "post",
        data: {"w_mode":"setColorData","idx":idx},
        success: function(result){
            let json = JSON.parse(result);
            // console.log(json);

            $(".pvitem").html(json.iimg);
            $(".iname").html(json.iname);
            $(".circle").removeClass('cactive');
            $("."+target).addClass('cactive');
        }
    })
}

function pageBack(){
    let qs = $("input[name=qs]").val();
    location.href="./product.php?"+qs;
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
  
  function movePage(num){

    if(num == 1){
      location.href="./product.php";
    }else if(num == 2){
      location.href="./process.php";
    }else{
      location.href="./history.php";
    }   

  }

  function bannerChange(tidx){

    $(".proBar").hide();
    $(".ggbar").removeClass('pro-ani');

    if(tidx == 1){
        $("#slick-slide-control10").click();
        $(".inbar1").css("display","flex");
        $(".gage1").addClass('pro-ani');

        $(".title").html("<h1>환경</h1><h3>을 생각하는 원재료</h3>");
        $(".contxt").html("티앤비우드는 더 우수한 <br>기술개발로 폐자원을 조금이라도 <br>더 많이 재활용 할 수 있도록 <br>노력하는 회사로 발전 해 나가고 <br>있습니다.");

    }else if(tidx == 2){
        $("#slick-slide-control11").click();
        $(".inbar2").css("display","flex");
        $(".inbar2").show();
        $(".gage2").addClass('pro-ani');

        $(".title").html("<h1>맞춤제작</h1><h3>으로 고객니즈 충족</h3>");
        $(".contxt").html("다양한 색상의 자재와 디자인을<br> 보유, 고객의 니즈에 맞추어 <br>드릴 수 있는 기술을 보유하고 <br>있습니다. ");

    }else if(tidx == 3){
        $("#slick-slide-control12").click();
        $(".inbar3").css("display","flex");
        $(".inbar3").show();
        $(".gage3").addClass('pro-ani');

        $(".title").html("<h1>일관성</h1><h3>&nbsp;있는 완제품</h3>");
        $(".contxt").html("압출, 전사, 절단 등 고객이 <br>제공하는 디자인을 구현하는데 <br>필요한 대부분의 공정을 <br>자동화하여 일관성있는 품질을 <br>제공합니다. ");

    }else if(tidx == 4){
        $("#slick-slide-control13").click();
        $(".inbar4").css("display","flex");
        $(".inbar4").show();
        $(".gage4").addClass('pro-ani');

        $(".title").html("<h1>품질 검수</h1><h3>&nbsp;및 테스트</h3>");
        $(".contxt").html("고객사의 일부 조립공정을 <br>그대로 재현하여 고객사의 <br>생산라인에서 발생 할 수 있는 <br>불량을 최소화 할 수 있도록 <br>노력하고 있습니다.");

    }
}

function bannerChange_en(tidx){

  $(".proBar").hide();
  $(".ggbar").removeClass('pro-ani');

  if(tidx == 1){
      $("#slick-slide-control10").click();
      $(".inbar1").show(); 
      $(".gage1").addClass('pro-ani');

      $(".title").html("<h1>Environmentally</h1><h3>conscious raw materials</h3>");
      $(".contxt").html("T&Bwood is developing into a company that strives to recycle even a little more waste resources with better technology development");

  }else if(tidx == 2){
      $("#slick-slide-control11").click();
      $(".inbar2").css("display","flex");
      $(".inbar2").show();
      $(".gage2").addClass('pro-ani');

      $(".title").html("<h1>Customize</h1><h3>to meet customer needs</h3>");
      $(".contxt").html("We have various colors of materials and designs, and we have the technology to meet your needs.");

  }else if(tidx == 3){
      $("#slick-slide-control12").click();
      $(".inbar3").css("display","flex");
      $(".inbar3").show();
      $(".gage3").addClass('pro-ani');

      $(".title").html("<h1>A consistent</h1><h3>finished product</h3>");
      $(".contxt").html("It automates 1005 most of the processes required to implement customer-provided designs, including extrusion, transfer, and cutting, to deliver consistent quality.");

  }else if(tidx == 4){
      $("#slick-slide-control13").click();
      $(".inbar4").css("display","flex");
      $(".inbar4").show();
      $(".gage4").addClass('pro-ani');

      $(".title").html("<h1>Quality Inspection</h1><h3>and Testing</h3>");
      $(".contxt").html("We are trying to minimize possible defects in the customer's production line by reproducing some of the customer's assembly processes.");

  }
}

