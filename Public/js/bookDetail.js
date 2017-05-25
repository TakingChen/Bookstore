$(function(){
    var $lis = $(".intro-title .ul-intro li");
    var $content = $(".intro-content .tab-content");
    var lastIndex = 0;
    var lastOption = 0;


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

    $lis.click(function(){
        if(lastIndex == 0 || $(this).index() != lastIndex){
         $lis.eq(lastIndex).removeClass("active");
            $content.eq(lastIndex).css("display","none");
            lastIndex = $(this).index();
        }
         $lis.eq(lastIndex).addClass("active");
         $content.eq(lastIndex).css("display","block");
    });

    var $num = $(".transition .tr-count .count-input");
    var $reduce = $(".transition .tr-count .reduce");
    var $add = $(".transition .tr-count .add");
    var val = parseInt($num.val());

    $add.click(function(){
        val = val + 1;
        $reduce.html('-');
        $num.val(val);
    });

    $reduce.click(function(){
        if(val > 1){
            val = val - 1;
            $num.val(val);
        }
        if(val <= 1){
            $reduce.html('');
        }
    });

    $(".btn-add").click(function(){
        $iName = $(".book-title .main-title").text();
        $amount = $(".tr-count .count-input").val();
        $img = $(".book-img img").attr("src");
        $price = $(".price .num").text();
        var datas = {
            "item_name":$iName,
            "item_price":$price,
            "item_amount":$amount,
            "item_url":$img
        };
        $.ajax({
            type:"POST",
            url:editShopcar,
            dataType:"json",
            data:datas,
            success:function(result){
               if(result.status==-2){
                    alert("success");
               }
            },
            error:function(){

            }
        });
    });

    $(".btn-buy").click(function(){
        
        $iName = $(".book-title .main-title").text();
        $amount = $(".tr-count .count-input").val();
        $img = $(".book-img img").attr("src");
        $price = $(".price .num").text();
        var datas = {
            "item_name":$iName,
            "item_price":$price,
            "item_amount":$amount,
            "item_url":$img
        };
        $.ajax({
            type:"POST",
            url:editOrder,
            dataType:"json",
            data:datas,
            success:function(result){
               // if(result.status==-2){
                  
               // }
            },
            error:function(){

            }
        });
    });

       $(".book-oper .btn-borrow").click(function(){
        var myDate = new Date();
        var $date = myDate.toLocaleDateString();
        alert("借阅成功");
        var $deadline = $(".tr-deadline #deadline option:selected").text();
        var $bookid = $(".contact").text()
        var datas = {
            "bookid":$bookid,
            "date":$date,
            "deadline":$deadline
        };
        $.ajax({
            type:"POST",
            url:editBorrow,
            dataType:"json",
            data:datas,
            success:function(result){
            },
            error:function(){

            }
        }); 
        $(".btn-borrow").css("display","none");
        $(".btn-borrowed").css("display","block");
    });
    

    

});
