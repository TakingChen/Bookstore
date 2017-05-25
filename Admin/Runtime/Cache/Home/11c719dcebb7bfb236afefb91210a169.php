<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    #imgesFilesAuto{  
    width:auto;  
    height:200px;  
    border:#CCC 1px solid;  
}  
#imagesBox{  
    width:auto;  
    height:198px;  
    float:left;  
}  
.imagesItem{  
    width:170px;  
    height:198px;  
    float:left;  
    background-position: center center;  
    background-size: cover;  
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);  
}  
#imgesFiles{  
    width:170px;  
    height:198px;  
    float:left;  
    position:relative;  
    border-right:#CCC 1px solid;  
}  
#imgesFiles span{  
    position:absolute;  
    font-size:126px;  
    display:block;  
    width:170px;  
    text-align:center;  
    height:198px;  
    color:#CCC;  
}  
  </style>
</head>
<body>    
<div class="title">
          <span>shuru:</span>
          <input type="text">
        </div>
  <div id="imgesFilesAuto">  
    
         <div id="imagesBox"></div>  
         <div id="imgesFiles">  
            <span>+</span>  
            <form action="<?php echo U('Check/addInformation');?>" method="post" enctype=”multipart/form-data”>
              <input type="file" name="photoimage" id="uploadImage" multiple="multiple" style="width:170px; height:250px;opacity:0;" accept="image/gif,image/jpeg,image/jpg,image/png"/>  
            </form>
            
         </div>  
      </div>  
          <input type="submit" value="上传" class="add-book-btn" id="btn1"> 
      
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
  var addInformation = "<?php echo U('Check/addInformation');?>";
</script>
<script type="text/javascript">
  var index = 1;  
var fromdata = new FormData();  
$("#uploadImage").on("change", function(){  
      
    //var mFiles = new FromData();  
    // Get a reference to the fileList  
    var files = !!this.files ? this.files : [];  
    // If no files were selected, or no FileReader support, return  
    if (!files.length || !window.FileReader) return;  
    // Only proceed if the selected file is an image  
    if (/^image/.test( files[0].type)){  
        // Create a new instance of the FileReader  
        var reader = new FileReader();  
        // Read the local file as a DataURL  
        reader.readAsDataURL(files[0]);  
          
        fromdata.append("photo"+index, files[0]);  
        // When loaded, set image data as background of div  
        reader.onloadend = function(){  
       $("#imagesBox").show();  
       $("#imagesBox").append("<div class='imagesItem' id='imagesItem"+index+"'></div>");  
       $("#imagesItem"+index).css("background-image", "url("+this.result+")");  
         index++;  
        }  
    
    }  
    
});  
  
$("#btn1").click(function(){  
  var $title = $(".title input").val();
  var datas = {
    "fromdata":fromdata,
    "title":$title
  }

      //alert("/ShareBooks/admin.php/Home/Check");  
      $.ajax({  
          url:addInformation,  
          type: "POST",  
          dataType:"json",
          data: datas,  
          // // processData: false,  // 告诉jQuery不要去处理发送的数据  
          // contentType: false,   // 告诉jQuery不要去设置Content-Type请求头  
          success:function(data){  
            alert(data);
                        // console.log(data);  
                    },  
          error:function(XmlHttpRequest,textStatus,errorThrown){  
                        console.log(XmlHttpRequest);  
                        console.log(textStatus);  
                        console.log(errorThrown);  
                    }  
        });  
      
}); 
</script>
</html>