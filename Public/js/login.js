   $(function(){
        $tab = $(".navs-slider a");
        $signin = $(".navs-slider .signin");
        $signup = $(".navs-slider .signup");

        function clickTab(index){
            if(index == 1){
                $(".subtitle1").fadeOut("fast,linear");
                $signup.removeClass("active");
                $signin.addClass("active");
                $(".view-signup").css("display","none");
                $(".view-signin").css("display","block");
                $(".navs-slider-bar").css("left","6.2rem");
                $(".subtitle1").fadeIn("fast,linear");
                 $(".subtitle1").html("此刻 需要你的"+"\“"+"书"+"\”"+"出");
                // $(".subtitle2").addClass("show");
            }else if(index == 0){
                $(".subtitle1").fadeOut("fast,linear");
                $signin.removeClass("active");
                $signup.addClass("active");
                $(".view-signin").css("display","none");
                $(".view-signup").css("display","block");
                $(".navs-slider-bar").css("left","0");
                 $(".subtitle1").fadeIn("fast,linear");
                  $(".subtitle1").html("此刻 等待你的"+"\“"+"书"+"\”"+"入");
                // $(".subtitle2").removeClass("show").addClass("hide");
                // $(".subtitle1").addClass("show");
            }
        }

        $tab.click(function(){
            clickTab($(this).index());
        });


        //登陆注册
      

     
        //账号验证
        function isUser(str){
            var reg = /^[\w\x80-\xff]{3,15}$/;
            return reg.test(str);
        }

        function checkUser(){
            this.flag = 0;
            var $username = $('.username input').val();

            if($username == ''){
                $(".group-inputs .no-user").css("display","block").html("昵称不能为空");
                return false;
        
            }else if($username != ''){
                  
                if(!isUser($username)){
                    $(".group-inputs .no-user").css("display","block").html("昵称格式不正确(长度3-15)");
                }
                else if(isUser($username)){
                    var datas = {
                        "username":$username
                    };
            
                    $.ajax({
                        type:"POST",
                        url:url,
                        dataType:"json",
                        data:datas,
                        success:function(result){
                            // alert(result);
                            if(result.status == -1){
                                $(".group-inputs .no-user").css("display","block").html(result.msg);
                            }else if(result.status == -2){
                                $(".group-inputs .no-user").css("display","none");
                            }
                        },
                        error:function(){
                            alert("error");
                        }
                    });
                }
                else{
                   $(".group-inputs .no-user").css("display","none");
                   this.flag = 1;
                }
             
            }        
        }


    //邮箱验证 
        function isEmail(str){
             var reg = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
             return reg.test(str);
        }

        function checkEmail(){

            this.f = 0;
             var $email = $('.email input').val(); 
            if($email == ''){
                $(".group-inputs .no-email").css("display","block").html("邮箱不能为空");
            }else if($email != ''){
               if(!isEmail($email)){
                    $(".group-inputs .no-email").css("display","block").html("邮箱格式不正确");             
               }
               // else if(isEmail($email)){
               //      var datas = {
               //          "email":$email
               //      };
               //      $.ajax({
               //          type:"POST",
               //          url:url,
               //          dataType:"json",
               //          data:datas,
               //          success:function(result){
               //              if(result.status == -3){
               //                  $(".group-inputs .no-email").css("display","block").html(result.msg);
               //              }else if(result.status == -4){
               //                  $(".group-inputs .no-email").css("display","none");
               //              }
               //          },
               //          error:function(){
               //              alert("error");
               //          }
               //      });
               // }
               else{
                    $(".group-inputs .no-email").css("display","none");
                    this.flag = 1;
               }            
            } 
        }
       

    
       //密码验证

        function checkPass(){
            this.flag = 0;
            var $pass = $('.password input').val(); 
       
            if($pass == ''){
                $(".group-inputs .no-pass").css("display","block").html("密码不能为空");
                return false;
            }else if($pass != ''){
                if($pass.length < 6){
                    $(".group-inputs .no-pass").css("display","block").html("密码长度小于6位");
                }else{
                    $(".group-inputs .no-pass").css("display","none");
                    this.flag = 1;
                }
               
                
            } 
        }
     
        function checkRpwd(){
            this.flag = 0;
            var $repass = $('.confirm-pass input').val();
            var $pass = $('.password input').val();
            if($repass == ''){
                $(".group-inputs .err-rpwd").css("display","block").html("重复密码不能为空");
            }else if($repass != ''){

                if($repass != $pass){
                    $(".group-inputs .err-rpwd").css("display","block").html("密码不一致");
                }else{
                    $(".group-inputs .err-rpwd").css("display","none");
                    this.flag = 1;
                }        
            } 
        }

        $(".username input").blur(function(){
           checkUser();
        });

        $(".email input").blur(function(){
           checkEmail();
        });


        $(".password input").blur(function(){
           checkPass();
            
        });

        $(".confirm-pass input").blur(function(){
           checkRpwd();          
        });

        var $register = $('.register-button');
        $register.click(function(){
            var $username = $('.username input').val();
            var $email = $('.email input').val();
            var $pass = $('.password input').val();
            var $repass = $('.confirm-pass input').val();

            var userFlag = new checkUser();
            var emailFlag = new checkEmail();
            var pwdFlag = new checkPass();
            var rpwdFlag = new checkRpwd();
           

            if($username == '' && $email == '' && $pass == '' && $repass == ''){
                $(".group-inputs .no-user").css("display","block").html("昵称不能为空");
                $(".group-inputs .no-email").css("display","block").html("邮箱不能为空");
                $(".group-inputs .no-pass").css("display","block").html("密码不能为空");
                $(".group-inputs .err-rpwd").css("display","block").html("重复密码不能为空");
                return false;
            }else if($username == ''){
                $(".group-inputs .no-user").css("display","block").html("昵称不能为空");
            }else if($email == ''){
                $(".group-inputs .no-email").css("display","block").html("邮箱不能为空");
            }else if($pass == ''){
                $(".group-inputs .no-pass").css("display","block").html("密码不能为空");
            }else if($repass == ''){
                $(".group-inputs .err-rpwd").css("display","block").html("重复密码不能为空");
            }else if(userFlag.flag == 0 && emailFlag.flag == 1 
                && pwdFlag.flag == 1 && rpwdFlag.flag == 1){
                alert("注册成功");
                var datas = {
                    "username":$username,
                    "email":$email,
                    "password":$pass,
                    "repass":$repass
                };
                $.ajax({
                    type:"POSt",
                    url:saveInfo,
                    dataType:"json",
                    data:datas,
                    success:function(result){
                       
                    },
                    error:function(){

                    }
                });
            }
        });

        //登陆

        function checkAccount(){
            var $account = $('.account input').val();

            if($account == ''){
                $(".group-inputs .err-account").css("display","block").html("账号不能为空");
                return false;
            }else if($account != ''){
                var datas = {
                    "account":$account
                }
                $.ajax({
                  type:"POSt",
                    url:signData,
                    dataType:"json",
                    data:datas,
                    success:function(result){
                        if(result.status == -5){
                            $(".group-inputs .err-account").css("display","block").html(result.msg);
                        }else if(result.status == -6){
                            $(".group-inputs .err-account").css("display","none");
                        }
                      
                    },
                    error:function(){
                        alert("error");
                    }
                });
            }else{
                $(".group-inputs .err-account").css("display","none");
            }
        }

        function checkPasword(){
            var $pwd = $('.vertification input').val();

            if($pwd == ''){
                $(".group-inputs .err-pass").css("display","block").html("密码不能为空");
                return false;
            }else if($pwd != ''){
                 $(".group-inputs .err-account").css("display","none");
            }
        }

         $('.account input').blur(function(){
            checkAccount();
         });

        $('.vertification input').blur(function(){
             checkPasword();
        });


        var $sign = $('.sign-button');
        $sign.click(function(){
            var $account = $('.account input').val();
            var $pwd = $('.vertification input').val();
            if($account == '' && $pwd == ''){
                 $(".group-inputs .err-pass").css("display","block").html("密码和账号不能为空");
            }
            if($account != '' && $pwd != ''){
                var datas = {
                    "account":$account,
                    "pwd":$pwd
                }
                $.ajax({
                    type:"POSt",
                    url:vertifySign, 
                    dataType:"json",
                    data:datas,
                    success:function(result){
                        if(result.status == -7){
                            $(".group-inputs .err-pass").css("display","block").html(result.msg);
                         }else if(result.status == -8){
                            $(".group-inputs .err-pass").css("display","none");
                            window.location.href="../Index/index.html";
                        }  
                                
                    },
                    error:function(){
                        alert("error");
                    }
                });
            }
           
        });


        var $aSign = $('.aSign-button');
        $aSign.click(function(){
            var $account = $('.account input').val();
            var $pwd = $('.vertification input').val();
            if($account == '' && $pwd == ''){
                 $(".group-inputs .err-pass").css("display","block").html("密码和账号不能为空");
            }
            if($account != '' && $pwd != ''){
                var datas = {
                    "account":$account,
                    "pwd":$pwd
                }
                $.ajax({
                    type:"POSt",
                    url:url, 
                    dataType:"json",
                    data:datas,
                    success:function(result){
                        if(result.status == -1){
                            $(".group-inputs .err-pass").css("display","block").html(result.msg);
                         }else if(result.status == -2){
                            $(".group-inputs .err-pass").css("display","none");
                            window.location.href="../Manage/manage.html";
                        }  
                                
                    },
                    error:function(){
                        alert("error");
                    }
                });
            }
           
        });

        //注销

});
