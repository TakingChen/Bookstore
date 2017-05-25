$(function(){



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


 
});