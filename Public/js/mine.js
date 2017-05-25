$(function() {
   var $lis = $(".container-left .tab li");
   var $divs = $(".container-right .edit-tab");
   
   var lastIndex = 0;
   var lastSize = 0;
 
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

   //左侧导航栏操作
   $lis.click(function(){
        if(lastIndex == 0 || $(this).index() != lastIndex){
            $lis.eq(lastIndex).removeClass("active");
            $divs.eq(lastIndex).css("display","none");
            lastIndex = $(this).index();
        }
         $lis.eq(lastIndex).addClass("active");
         $divs.eq(lastIndex).css("display","block");

   });

   //修改账户名
    var $aBtn = $(".a-btn");
    var $oUserName = $(".u-base input").val();
    $aBtn.click(function(){
      var $eUserName = $(".u-base input").val();
          if($eUserName == ''){
             $(".u-base .d1 .err-userName").css("display","block").html("账户名不能为空");
          }else if($eUserName == $oUserName){
              $(".u-base .d1 .err-userName").css("display","block").html("账户名未修改");
          }else{
              $(".u-base .d1 .err-userName").css("display","none");
              var datas = {
                "oUserName":$oUserName,
                "eUserName":$eUserName
              };
              $.ajax({
                type:"POST",
                url:editAccount,
                dataType:"json",
                data:datas,
                success:function(result){
                  if(result.status == -6){
                      window.alert("修改成功，确定后将重新登陆");
                      window.document.location.href="../User/login.html";
                  }
                },
                error:function(){
                  alert("error");
                }
              });
          }
          
              
          
        });

   //修改密码
   
   $(".u-password .old-pass input").blur(function(){
      var $oPass = $(".u-password .old-pass input").val();
      
      var datas = {
        "oPass":$oPass
      }

      $.ajax({
        type:"POST",
        url:editPass,
        dataType:"json",
        data:datas,  
        success:function(result){
            if(result.status == -1){
              $(".u-password .old-pass .err-oPass").css("display","block").html(result.msg);
            }else if(result.status == -2){
              $(".u-password .old-pass .err-oPass").css("display","none");
            }else{
              alert(result);
            }  
        },
        error:function(){
            alert("error");
        }
      });

   });

   $(".u-password .confirm-pass input").blur(function(){
      var $nPass = $(".u-password .new-pass input").val();
      var $cPass = $(".u-password .confirm-pass input").val();
      if($nPass != $cPass){
          $(".u-password .confirm-pass .err-cPass").css("display","block").html("密码不一致");
      }else{
          $(".u-password .confirm-pass .err-cPass").css("display","none");
      }
   });

   var $pBtn = $(".e-password .p-btn");
   $pBtn.click(function(){
      var $oPass = $(".u-password .old-pass input").val();
      var $nPass = $(".u-password .new-pass input").val();
      var $cPass = $(".u-password .confirm-pass input").val();
      if($oPass == '' || $nPass == '' || $cPass == ''){
        $(".u-password .confirm-pass .err-cPass").css("display","block").html("以上信息不能为空不一致");
      }else{
         $(".u-password .confirm-pass .err-cPass").css("display","none");
         var datas = {
            "nPass":$nPass
         }
         $.ajax({
            type:"POST",
            url:saveNewPass,
            dataType:"json",
            data:datas,  
            success:function(result){
                if(result.status == -3){
                  alert("成功修改密码");
                  window.history.go(0);
                } 
            },
            error:function(){
                alert("error");
            }
         });
      }
   });


   var $del = $(".delete-article .del");
   var $pub = $(".add-article .p-btn");
   // var $pubContent = $('.publish-content textarea').val();
   var lastArticle = 0;

        // 删除文章
    $del.click(function(){
         if(lastArticle == 0 || $(this).index() != lastArticle){
            $del.eq($(this).index()).parent().css("display","none");
            lastArticle = $(this).index();
        }


    });


 
    //去掉字符串前后空格
    function Trim(str){ 
        return str.replace(/(^\s*)|(\s*$)/g, ""); 
     }

    $pub.click(function(){
      var $title = $(".add-article .publish-title input").val();
      var $content = $(".add-article .publish-content textarea").val();
      Trim($content);
      if($title == ''){
        alert("文章标题不能为空");
      }
      if($content == ''){
        alert("不能发布空消息");
      }else{
        var date = new Date();
        var localDateTime = date.toLocaleDateString( );
        var msg = "<li><span>" + localDateTime + "</span><span>" + $title +"</span><a class='del'>删除</a></li>";

        // $(".del-notice .delete-notice ul li:first-child").html($pubContent);
        $(".delete-article ul").append(msg);

        var datas ={
           "title":$title, 
           "content":$content,
           "time":localDateTime
        };

        $.ajax({
          type:"POST",
          url:editArticle,
          dataType:"json",
          data:datas,
          success:function(result){
            if(result.status == -4){
              alert("发布成功");
            }
          },  
          error:function(){

          }
        });


        bindListener();
      }
    });

    function bindListener(){
     
        $(".delete-article ul li a").unbind().click(function(){
            $content = $(this).prev().text();
            Trim($content);
            $(this).parent().remove();
            var datas ={
              "title":$title,
            };
            $.ajax({
              type:"POST",
              url:deleteArticle,
              dataType:"json",
              data:datas,
              success:function(result){
                if(result.status == -8){
                  alert("删除成功");
                }
              },  
              error:function(){
                alert("error");
              }
            });
        });
    }

    bindListener();


  

});
