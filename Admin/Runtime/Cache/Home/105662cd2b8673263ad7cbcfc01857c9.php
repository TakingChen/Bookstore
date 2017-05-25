<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员界面</title>

    <link rel="stylesheet" href="/ShareBooks/Public/css/upload.css">
    <link rel="stylesheet" href="/ShareBooks/Public/css/admin.css">
</head>
<body>
      <header>
       <header>
        <nav class="top clearfix">
            <div class="logo">
                <a href="index.html" class="brand">
                    <img src="/ShareBooks/Public/img/logo.png" alt="首页">
                </a>
            </div>
            <div class="admin-status">
                <div class="admin-n">

                    欢迎<span class="adminName"><?php echo (session('admin')); ?></span>来到Books管理页面
                </div>
                <div class="out">
                    <ul>
                    <li class="login-out"><a href="<?php echo U('Manage/logout');?>">注销</a></li>
                    </ul>
                </div>
            </div>

        </nav>
    </header>
    </header>
    <div class="container clearfix">
        <div class="container-left">
            <nav class="tab">
                <ul>
                    <li class="active">
                        <a href="#">账号信息</a>
                    </li>
                    <li>
                        <a href="#">修改密码</a>
                    </li>
                    <li>
                        <a href="#">首页编辑</a>
                    </li>
                    <li>
                        <a href="#">书圈编辑</a>
                    </li>
                    <li>
                        <a href="#">读书笔记</a>
                    </li>
                    <li>
                        <a href="#">发现编辑</a>
                    </li>
                     <li>
                        <a href="#">活动编辑</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container-right">
            <div class="edit-account edit-tab" style="display: block;">
                <div class="e-touxiang">
                    <a href="#" class="img">
                        <img src="/ShareBooks/Public/img/default.jpg" alt="">
                    </a>
                </div>
                <div class="e-base edit">
                    <ul class="u-base">
                        <li class="l1">
                            <div class="d1">
                                <span>账户名:</span>
                                    <input type="text" value="<?php echo (session('admin')); ?>">
                                    <span class="err-adminName" style="color: red"></span>
                            </div>
                        </li>
                    </ul>
                     <button class="a-btn btn" type="submit">
                        修改
                    </button>
                </div>
            </div>
          <!-- end of edit-account -->
          <div class="edit-password edit-tab" style="display:none;">
              <div class="e-password edit">
                  <ul class="u-password">
                        <li class="l1">
                            <div class="d1 old-pass">
                                <span>原密码:</span>
                                <input type="password">
                                <span class="err err-oPass"></span>
                            </div>
                        </li>
                        <li class="l1">
                            <div class="d1 new-pass">
                                <span>新密码:</span>
                                <input type="password">
                                <span class="err err-nPass"></span>
                            </div>
                        </li>
                         <li class="l1">
                            <div class="d1 confirm-pass">
                                <span>确认密码:</span>
                                <input type="password">
                                <span class="err err-cPass"></span>
                            </div>
                        </li>
                    </ul>
                    <button class="p-btn btn" type="submit">
                        提交
                    </button>
              </div>
          </div>
          <!-- end of edit-password -->
          <div class="edit-index edit-tab" style="display:none;">
              <div class="e-index edit">

                    <div class="e-notice">
                        <h2 class="edit-square">编辑公告</h2>
                        <div class="add-notice">
                            <h3>发布新公告</h3>
                             <div class="publish-content">
                                 <span>发布内容：</span>
                                  <textarea name="" id="" cols="50" rows="10"></textarea>
                              </div>
                              <button class="p-btn btn" type="submit">
                                发布
                             </button>
                        </div>
                        <!-- end of add-notice -->
                        <div class="del-notice">
                            <div class="delete-notice">
                                <h3>删除公告</h3>
                                <span class="s-time">时间</span>
                                 <span class="s-content">公告内容</span>
                                <ul class="clearfix">
                                   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "没有新公告" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li>
                                        <span><?php echo ($data['notice_date']); ?></span>
                                        <span>
                                       <?php echo ($data['notice_content']); ?>
                                        </span>
                                        <a class="del">删除</a>
                                    </li><?php endforeach; endif; else: echo "没有新公告" ;endif; ?>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of e-notice -->
                    <div class="e-ad">
                        <h2 class="edit-square">编辑首页广告图片(每个规格最多只能上传3张)</h2>
                        <ul class="u-size u clearfix">
                            <li class="active"><a href="javascript:void(0)">1600*1600规格</a></li>
<!--                             <li><a href="javascript:void(0)">800*800规格</a></li>
                            <li><a href="javascript:void(0)">480*480规格</a></li> -->
                        </ul>
                        <div class="n-ad ad-size" style="display: block;">
                            <h3>1600*1600规格：</h3>
                            <div class="clearfix">
                               
                                    <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><div class="img-show">
                                            <div class="file-bar">
                                                <div style="padding:5px;">
                                                    <p class="file-name" title="<?php echo ($img['id']); ?>.png"><?php echo ($img['id']); ?></p>
                                                    <span class="file-del" title="delete"></span>
                                                </div>
                    
                                            </div>
                                            <a class="imgBox">
                                                <div class="uploadImg">
                                                    <img src="/ShareBooks/Public/Uploads/lImg/<?php echo ($img['img_url']); ?>" style="width: expression(this.width > 125 ? 125px:this.width);" />
                                                </div>
                                            </a>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                               
                            </div>
                            <br>
                            <form action="<?php echo U('Manage/upload');?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="image"/>
                                <input type="submit" value="上传" id="button">
                            </form>
                        </div>

                  <!--       <div class="m-ad ad-size" style="display: none;">
                            <h3>800*800规格：</h3>
                            <div class="clearfix">
                                    <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><div class="img-show">
                                            <div class="file-bar">
                                                <div style="padding:5px;">
                                                    <p class="file-name" title="<?php echo ($img['id']); ?>.png"><?php echo ($img['id']); ?></p>
                                                    <span class="file-del" title="delete"></span>
                                                </div>
                    
                                            </div>
                                            <a class="imgBox">
                                                <div class="uploadImg">
                                                    <img src="/ShareBooks/Public/Uploads/mImg/<?php echo ($img['img_url']); ?>" style="width: expression(this.width > 125 ? 125px:this.width);" />
                                                </div>
                                            </a>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <br>
                            <form action="<?php echo U('Manage/upload');?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="image"/>
                                <input type="submit" value="上传" id="button">
                            </form>
                           
                        </div> -->
     <!--                    <div class="l-ad ad-size" style="display: none;">
                            <h3>480*480规格：</h3>
                               <div class="clearfix">
                            
                                    <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><div class="img-show">
                                            <div class="file-bar">
                                                <div style="padding:5px;">
                                                    <p class="file-name" title="<?php echo ($img['id']); ?>.png"><?php echo ($img['id']); ?></p>
                                                    <span class="file-del" title="delete"></span>
                                                </div>
                    
                                            </div>
                                            <a class="imgBox">
                                                <div class="uploadImg">
                                                    <img src="/ShareBooks/Public/Uploads/sImg/<?php echo ($img['img_url']); ?>" style="width: expression(this.width > 125 ? 125px:this.width);" />
                                                </div>
                                            </a>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                              
                            </div>
                            <br>
                            <form action="<?php echo U('Manage/upload');?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="image"/>
                                <input type="submit" value="上传" id="button">
                            </form>
                        </div> -->
                        <!-- <button class="p-btn btn" type="submit">
                        提交
                        </button> -->
                    </div>
                    <!-- end of e-ad -->

                    <div class="e-books clearfix">
                        <h2 class="edit-square">编辑甄选图书</h2>
                        <ul class="u-zhenxuan u clearfix">
                            <li class="active">
                                <a href="javascript:void(0)">添加甄选图书</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">删除甄选图书</a>
                            </li>
                        </ul>
                        <div class="add-book op-book">
                             
                         <h3>选择图片：</h3>
                            <?php if(is_array($zx_img)): $i = 0; $__LIST__ = $zx_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zx_img): $mod = ($i % 2 );++$i;?><div class="clearfix">
                                <div class="book-show">
                                    <div class="book-bar">
                                        <div style="padding:5px;">
                                            <p class="file-name" title="<?php echo ($zx_img['zx_id']); ?>.png"><?php echo ($zx_img['zx_id']); ?></p>
                                            <span class="book-del" title="delete"></span>
                                        </div>
                    
                                    </div>
                                    <a class="imgBox">
                                        <div class="uploadImg">
                                            <img src="/ShareBooks/Public/Uploads/zxImg/<?php echo ($zx_img['img_url']); ?>" style="width: expression(this.width > 125 ? 125px:this.width);" />
                                        </div>
                                    </a>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <br>
                             <form method="post" action="<?php echo U('Manage/zxImg');?>" enctype="multipart/form-data">
                                <input type="file" name="image"/>
                                <input type="submit" value="上传" id="btn">
                            </form>
                                   
                            <div class="book-detail" style="display: block;">
                                <div class="book-name">
                                    <span>书 名：</span>
                                    <input type="text">
                                </div>
                                <div class="book-author">
                                    <span>作 者：</span>
                                    <input type="text">
                                </div>
                                <div class="book-price">
                                    <span>价 格：</span>
                                    <input type="text">
                                </div>
                                <div class="book-isbn">
                                    <span>索引号:</span>
                                    <input type="text">
                                </div>
                                <div class="book-content">
                                    <span>简 介：</span>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="book-recommend">
                                    <span>推 荐：</span>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="book-tag">
                                    <span>标 签：</span>
                                    <select name="" id="">
                                        <?php if(is_array($typeName)): $i = 0; $__LIST__ = $typeName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typeName): $mod = ($i % 2 );++$i;?><option value="<?php echo ($typeName['catid']); ?>">
                                            <?php echo ($typeName['catname']); ?>
                                        </option>
                                        <!-- <option value="2">历史/纪实</option>
                                        <option value="3">辅导书/教科书</option>
                                        <option value="4">小说</option> --><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn-add-book">提交</button>
                   

                           
                        
                           
                        </div>
                        <!-- end of add-book -->
                         <div class="delete-book op-book" style="display: none;">
                            <h3>选择删除的图书：</h3>
                            <div class="del-book">
                                <div class="delBooks">
                                    <span class="s-id">ID</span>
                                    <span class="s-time">创建时间</span>
                                    <span class="s-content">书名</span>
                                    <ul class="clearfix">
                                        <?php if(is_array($del)): $i = 0; $__LIST__ = $del;if( count($__LIST__)==0 ) : echo "没有新的甄选图书" ;else: foreach($__LIST__ as $key=>$del): $mod = ($i % 2 );++$i;?><li>
                                            <span><?php echo ($del['zx_id']); ?></span>
                                            <span><?php echo (substr($del['img_url'],0,8)); ?></span>
                                             <span>
                                                <?php echo ($del['book_name']); ?>
                                             </span>
                                            <a class="delete">删除</a>
                                             </li><?php endforeach; endif; else: echo "没有新的甄选图书" ;endif; ?>
                                
                                </ul>
                            </div>
                        </div>
                        </div>
                        <!-- end of delete-book -->
                    </div>
                    <!-- end of e-books -->
              </div>
          </div>
            <!-- end of edit-index  -->
            <div class="edit-shareBook edit-tab" style="display: none;">
                <div class="e-bookType edit">
                    <h3>编辑书圈书籍类型</h3>
                    <div class="e-type edit">
                        <span>书籍类型ID</span>
                        <span>书籍类型名称</span>
                        <ul class="u-type">
                            <?php if(is_array($catname)): $i = 0; $__LIST__ = $catname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$catname): $mod = ($i % 2 );++$i;?><li>
                                <span><?php echo ($catname['catid']); ?></span>
                                <span><?php echo ($catname['catname']); ?></span>
                                <a class="update-type">修改</a>
                                <a class="confirm">确定</a>
                                <a class="cancel">取消</a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                 <div class="e-ad">
                        <h2 class="edit-square">编辑分享书圈广告图片(最多上传3张)</h2>
                        <div class="n-ad ad-size" style="display: block;">
                            <h3>1600*1600规格：</h3>
                            <div class="clearfix">
                               
                                    <?php if(is_array($sbImg)): $i = 0; $__LIST__ = $sbImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sbImg): $mod = ($i % 2 );++$i;?><div class="sb-show">
                                            <div class="sb-bar">
                                                <div style="padding:5px;">
                                                    <p class="sb-name" title="<?php echo ($sbImg['sb_id']); ?>.png"><?php echo ($sbImg['sb_id']); ?></p>
                                                    <span class="sb-del" title="delete"></span>
                                                </div>
                    
                                            </div>
                                            <a class="imgBox">
                                                <div class="uploadImg">
                                                    <img src="/ShareBooks/Public/Uploads/sbImg/<?php echo ($sbImg['img_url']); ?>" style="width: expression(this.width > 125 ? 125px:this.width);" />
                                                </div>
                                            </a>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                               
                            </div>
                            <br>
                            <form action="<?php echo U('Manage/sbImg');?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="image"/>
                                <input type="submit" value="上传" id="sbImg">
                            </form>
                        </div>
                    </div>
                    <!-- end of e-ad -->
               
            </div>
            <!-- end of edit-shareBook -->

        </div>
        <!-- end of container-right -->
    </div>
    <!-- end of container -->
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script>
    var editPass = "<?php echo U('Manage/editPass');?>";
    var editAdmin = "<?php echo U('Manage/editAdmin');?>";
    var saveNewPass = "<?php echo U('Manage/saveNewPass');?>";
    var editNotice = "<?php echo U('Manage/editNotice');?>";
    var deleteNotice = "<?php echo U('Manage/deleteNotice');?>"; 
    var deleteImg = "<?php echo U('Manage/deleteImg');?>";
    var deleteBook = "<?php echo U('Manage/deleteBook');?>";
    var upload = "<?php echo U('Manage/Upload');?>";
    var editZXContent = "<?php echo U('Manage/editZXContent');?>";
    var deleteZX = "<?php echo U('Manage/deleteZX');?>";
    var updateType = "<?php echo U('Manage/updateType');?>"; 
    var deleteSBImg = "<?php echo U('Manage/deleteSBImg');?>"; 
    var logout = "<?php echo U('Manage/logout');?>";
</script>
<script src="/ShareBooks/Public/js/admin.js"></script>
<script src="/ShareBooks/Public/js/upload.js"></script>
<script>

</script>

</html>