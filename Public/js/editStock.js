$(function() {
   var $lis = $(".container-left .tab li");
   var $divs = $(".container-right .edit-tab");
   var $tab1 = $(".u-size li");
   var $show = $(".e-ad .ad-size");
   var $tab2 = $(".u-zhenxuan li");
   var $op = $(".e-books .op-book");
   var $delete = $(".delete-book .delete");

   var lastIndex = 0;
   var lastSize = 0;
   var lastOP = 0;

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

 $tab2.click(function(){
        if(lastOP == 0 || $(this).index() != lastOP){
            $tab2.eq(lastOP).removeClass("active");
            $op.eq(lastOP).css("display","none");
            lastOP = $(this).index();
        }
         $tab2.eq(lastOP).addClass("active");
         $op.eq(lastOP).css("display","block");

   });



    $(".btn-add-book").click(function(){
        var $id = $(".book-bar .file-name").text();
        var $bookName = $(".book-detail .book-name input").val();
        var $bookAuthor = $(".book-detail .book-author input").val();
        var $bookPrice = $(".book-detail .book-price input").val();
        var $bookContent = $(".book-detail .book-content textarea").val();
        var $bookexperience = $(".book-detail .book-recommend textarea").val();
        var $bookTag = $(".book-detail .book-tag select").val();
        var datas = {
          "id":$id,
          "bookname":$bookName,
          "bookauthor":$bookAuthor,
          "bookprice":$bookPrice,
          "bookcontent":$bookContent,
          "bookexperience":$bookexperience,
          "booktag":$bookTag
        }
        $.ajax({
          type:"POST",
          url:editBookContent,
          dataType:"json",
          data:datas,
        success:function(result){
            if(result.status == -4){
              alert(result.msg);
            }
        },
        error:function(){

        }
      });
    });

     //删除甄选图书
    $delete.click(function(){
         var $id = $(this).parent().children().first().text();
         $(this).parent().remove();
          var datas ={
              "book_id":$id
            };
            $.ajax({
              type:"POST",
              url:deleteBook,
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
      });