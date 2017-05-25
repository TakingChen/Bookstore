$(document).ready(function(){
  
    if($(".account").text()==""){
      $(".top ul li:nth-child(5)").remove();
      $(".top ul li:nth-child(2) a").text("登陆注册");
      $(".account").click(function(){
            window.document.location.href="../User/login.html";
        });
      $(".top ul li:nth-child(3) a").click(function(){
        alert("请先登陆");
        $(".top ul li:nth-child(3) a").attr("target", "_self");
        window.document.location.href="../Index/index.html"; 
      });
      $(".top ul li:nth-child(4) a").click(function(){
        alert("请先登陆");
         $(".top ul li:nth-child(4) a").attr("target", "_self");
        window.document.location.href="../Index/index.html"; 
      });

     }else{
        $(".account").click(function(){

         window.document.location.href="../Mine/mine.html"; 

       });
        $(".top ul li:nth-child(3) a").click(function(){
          window.location.href="../Shopcar/shopcar.html"; 
      });
         $(".top ul li:nth-child(4) a").click(function(){
          window.location.href="../User/editStock.html"; 
      });

     }

        function a(){

        if(($(document.body).width()) < 480){
            var $value = $(".selector .wrap .book-value");
            var $ul = $(".selector .wrap .book-value ul");
            var $key = $(".selector .wrap .book-key");
            var $cWidth = $(window).width();
            var $upIcon = $(".wrap .book-key span");
            $ul.width($cWidth);
            var flag = false;
            var lastIndex = 0;
            $key.click(function(){
                alert($key.index(this));
                if($key.index(this) == 0){

                    $upIcon.eq(0).css("background","url(./img/up.png)");
                    $value.eq(0).css("display","inline-block");
                }else if($key.index(this) == 1){

                     $upIcon.eq(1).css("background","url(./img/up.png)");
                     $value.eq(1).css("display","inline-block");
                }else if($key.index(this) == 2){
                    $upIcon.eq(2).css("background","url(./img/up.png)");
                     $value.eq(2).css("display","inline-block");
                }
                // if(lastIndex == 0 || $(this).index() != lastIndex){
                //     $upIcon.eq(lastIndex).css("background","url(./img/down.png)");
                //     $upIcon.eq($(this).index()).css("background","url(./img/up.png)");
                //     $value.eq(lastIndex).css("display","none");
                //     $value.eq($(this).index()).css("display","inline-block");

                //     if($(this).index() == lastIndex){
                //     $upIcon.eq(lastIndex).css("background","url(./img/down.png)");
                //     $value.eq(lastIndex).css("display","none");
                // // }


                    // b();
                    // flag = true;
                    // lastIndex = $(this).index();



        });
        }

        }

        function b(){
            var oMask = document.createElement("div");
            var $div = $(".book-item");
            oMask.id = "mask";
            $div.prepend(oMask);
        }
a();





});
