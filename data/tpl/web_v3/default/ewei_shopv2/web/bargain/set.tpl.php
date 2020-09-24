<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .select2{
        margin:0;
        width:100%;
        height:34px;
        border-radius: 3px;
        border-color: rgb(229, 230, 231);
    }
    .select2 .select2-choice{
        height: 34px;
        line-height: 32px;
        border-radius: 3px;
        border-color: rgb(229, 230, 231);
    }
    .select2 .select2-choice .select2-arrow{
        background: #fff;
    }
    .form-group .radio-inline{
        padding-top: 0px;;
    }
</style>
<div class="page-header">
    当前位置：<span class="text-primary">砍价活动设置</span>

</div>
<div class="page-content">
<form action="" method="post" class="form-horizontal form-search form-validate" id="myform">

    <div class="form-group">
        <label class="col-lg control-label">砍价入口</label>
        <div class="col-sm-9 col-xs-12">
            <a href='javascript:;' class="js-clip" title='点击复制链接' data-url="<?php  echo mobileUrl('bargain',null,1)?>" ><?php  echo mobileUrl('bargain',null,1)?></a>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg control-label">商城名称</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" class="form-control" placeholder="给你的砍价商城起个好听的名字吧" name="shop" maxlength="20" value="<?php  echo $res['mall_name'];?>" required="required">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg control-label">商城分享标题</label>
        <div class="col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="分享商城时的标题" name="mall_title" value="<?php  echo $res['mall_title'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">商城分享描述</label>
        <div class="col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="分享商城时的描述" name="mall_content" value="<?php  echo $res['mall_content'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">商城分享LOGO</label>
        <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image2(mall_logo,$res['mall_logo']);?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <input type="submit" value="保存" class="btn btn-primary">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </div>
    </div>


</form>
</div>
</body>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
