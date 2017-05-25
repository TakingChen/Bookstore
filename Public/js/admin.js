$(function() {
   var $lis = $(".container-left .tab li");
   var $divs = $(".container-right .edit-tab");
   var $tab1 = $(".u-size li");
   var $show = $(".e-ad .ad-size");
   var $tab2 = $(".u-zhenxuan li");
   var $op = $(".e-books .op-book");
   var $del = $(".delete-notice .del");
   var $delete = $(".delete-book .delete");
   var $pub = $(".add-notice .p-btn");
   var $pubContent = $('.publish-content textarea').val();
   var lastIndex = 0;
   var lastSize = 0;
   var lastOP = 0;
   var lastNotice = 0;

   if($(".adminName").text()==""){
    alert("未登录");
     window.document.location.href="../Login/login.html";
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
    var $oAdminName = $(".u-base input").val();
    $aBtn.click(function(){
      var $eAdminName = $(".u-base input").val();
          if($eAdminName == ''){
             $(".u-base .d1 .err-adminName").css("display","block").html("账户名不能为空");
          }else if($eAdminName == $oAdminName){
              $(".u-base .d1 .err-adminName").css("display","block").html("账户名未修改");
          }else{
              $(".u-base .d1 .err-adminName").css("display","none");
              var datas = {
                "eAdminName":$eAdminName
              };
              $.ajax({
                type:"POST",
                url:editAdmin,
                dataType:"json",
                data:datas,
                success:function(result){
                  if(result.status == -6){
                      window.alert("修改成功，确定后将重新登陆");
                      window.document.location.href="../Login/login.html";
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

   //首页编辑栏操作

   //选择广告图片大小操作
    $tab1.click(function(){
        if(lastSize == 0 || $(this).index() != lastSize){
            $tab1.eq(lastSize).removeClass("active");
            $show.eq(lastSize).css("display","none");
            lastSize = $(this).index();
        }
         $tab1.eq(lastSize).addClass("active");
         $show.eq(lastSize).css("display","block");
         var datas = {
            "lastSize":lastSize
         }
         $.ajax({
            type:"POST",
            url:upload,
            dataType:"json",
            data:datas
         });

   });

    //甄选图书操作
    $tab2.click(function(){
        if(lastOP == 0 || $(this).index() != lastOP){
            $tab2.eq(lastOP).removeClass("active");
            $op.eq(lastOP).css("display","none");
            lastOP = $(this).index();
        }
         $tab2.eq(lastOP).addClass("active");
         $op.eq(lastOP).css("display","block");

   });

    // $("#btn").click(function(){
    //  $.ajax({
    //       type:"POST",
    //       url:editZXBook,
    //       success:function(result){
    //     },
    //     error:function(){

    //     }
    //   });
    // });

    $(".btn-add-book").click(function(){
        var $id = $(".book-bar .file-name").text();
        var $zxBookName = $(".book-detail .book-name input").val();
        var $zxBookAuthor = $(".book-detail .book-author input").val();
        var $zxBookPrice = $(".book-detail .book-price input").val();
        var $zxBookIsbn = $(".book-detail .book-isbn input").val();
        var $zxBookContent = $(".book-detail .book-content textarea").val();
        var $zxBookRecommend = $(".book-detail .book-recommend textarea").val();
        var $zxBookTag = $(".book-detail .book-tag select").val();
        var zxData = {
          "id":$id,
          "bookname":$zxBookName,
          "bookauthor":$zxBookAuthor,
          "bookprice":$zxBookPrice,
          "bookisbn":$zxBookIsbn,
          "bookcontent":$zxBookContent,
          "bookrecommend":$zxBookRecommend,
          "booktag":$zxBookTag
        }
        $.ajax({
          type:"POST",
          url:editZXContent,
          dataType:"json",
          data:zxData,
        success:function(result){
            if(result.status == -4){
              alert(result.msg);
            }
        },
        error:function(){

        }
      });
    });
   

    // 删除公告
    $del.click(function(){
         if(lastNotice == 0 || $(this).index() != lastNotice){
            $del.eq($(this).index()).parent().css("display","none");
            lastNotice = $(this).index();
        }


    });


    //删除甄选图书
    $delete.click(function(){
         var $id = $(this).parent().children().first().text();
         $(this).parent().remove();
          var datas ={
              "zx_id":$id
            };
            $.ajax({
              type:"POST",
              url:deleteZX,
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

 
    //去掉字符串前后空格
    function Trim(str){ 
        return str.replace(/(^\s*)|(\s*$)/g, ""); 
     }

    $pub.click(function(){
      var $content = $(".add-notice .publish-content textarea").val();
      Trim($content);
      if($content == ''){
        alert("不能发布空消息");
      }else{
        var date = new Date();
        var localDateTime = date.toLocaleDateString( );
        var msg = "<li><span>" + localDateTime + "</span><span>" + $content +"</span><a class='del'>删除</a></li>";

        // $(".del-notice .delete-notice ul li:first-child").html($pubContent);
        $(".delete-notice ul").append(msg);

        var datas ={
           "content":$content,
           "time":localDateTime
        };

        $.ajax({
          type:"POST",
          url:editNotice,
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
     
        $(".delete-notice ul li a").unbind().click(function(){
            $content = $(this).prev().text();
            Trim($content);
            $(this).parent().remove();
            var datas ={
              "content":$content,
            };
            $.ajax({
              type:"POST",
              url:deleteNotice,
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


    //更新书圈书籍类型
    $(".edit-shareBook .update-type").click(function(){
      $(".update-type").css("visibility","hidden");
      $(".confirm,.cancel").css("visibility","visible");
      var $oldTypeName = $(this).prev().text();
      $(this).prev().html("<input value=" + $oldTypeName + ">");
    });

    $(".edit-shareBook .cancel").click(function(){
      var $input = $(this).prev().prev().prev().children();
      var $newTypeName = $input.val();
      $input.remove();
       $(this).prev().prev().prev().html($newTypeName);
      $(".update-type").css("visibility","visible");
      $(".confirm,.cancel").css("visibility","hidden");
     
    });

    $(".edit-shareBook .confirm").click(function(){
      var $input = $(this).prev().prev().children();
      var $getID = $(this).prev().prev().prev().text();
      var $newTypeName = $input.val();
      $input.remove();
       $(this).prev().prev().html($newTypeName);
      $(".update-type").css("visibility","visible");
      $(".confirm,.cancel").css("visibility","hidden");

      var datas = {
        "catid":$getID,
        "catname":$newTypeName
      }
      $.ajax({
        type:"POST",
        url:updateType,
        dataType:"json",
        data:datas,
        success:function(result){
          if(result.status==-9){
            alert("修改成功");
          }
        },  
        error:function(){
          alert("error");
        }
      });
     
    });

});
