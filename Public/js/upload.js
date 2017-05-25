    var $lastIndex = 0;
    var $lastSB = 0;
    $(".img-show").hover(
        function(){

            $(this).css("cursor","pointer");
            $(".file-bar").eq($(this).index()).addClass("file-hover");
            $lastIndex = $(this).index();   
        },
        function(){
            $(".file-bar").eq($(this).index()).removeClass("file-hover");
        }           
    );

    $(".file-del").click(function(){
        var $id = $(".file-name").eq($lastIndex).text();
        $(".img-show").eq($lastIndex).remove();
        var datas = {
            "id":$id
        }
        $.ajax({
            type:"POST",
            url:deleteImg,
            dataType:"json",
            data:datas,
            // success:function(result){
            //  alert(result);
            // }
        });

    });

    $(".sb-show").hover(
        function(){
            $(this).css("cursor","pointer");
            $(".sb-bar").eq($(this).index()).addClass("file-hover");
            $lastSB = $(this).index();   
        },
        function(){
            $(".sb-bar").eq($(this).index()).removeClass("file-hover");
        }           
    );

    $(".sb-del").click(function(){
        var $zxid = $(".sb-name").eq($lastSB).text();
        alert($zxid);
        $(".sb-show").eq($lastSB).remove();
        var datas = {
            "sb_id":$zxid
        }
        $.ajax({
            type:"POST",
            url:deleteSBImg,
            dataType:"json",
            data:datas
            // success:function(result){
            //  alert(result);
            // }
        });

    });
   
   $(".book-show").hover(
        function(){
            $(this).css("cursor","pointer");
            $(".book-bar").addClass("file-hover");   
        },
        function(){
            $(".book-bar").removeClass("file-hover");
        }           
    );

    $(".book-del").click(function(){
        var $id = $(".book-bar .file-name").text();
        $(".book-show").remove();
        // var datas = {
        //     "id":$id
        // }
        // $.ajax({
        //     type:"POST",
        //     url:deleteBook,
        //     dataType:"json",
        //     data:datas,
        //     // success:function(result){
        //     //  alert(result);
        //     // }
        // });

    });
