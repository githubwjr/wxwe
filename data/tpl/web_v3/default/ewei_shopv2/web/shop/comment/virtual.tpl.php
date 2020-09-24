<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<link href="../addons/ewei_shopv2/static/js/dist/star-rating/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="../addons/ewei_shopv2/static/js/dist/star-rating/star-rating.js" type="text/javascript"></script>

<div class="page-header">当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>虚拟评论</span></div>

<div class="page-content">

    <form action="" method="post" class="form-horizontal form-validate">
        <div class="form-group">
            <label class="col-lg control-label must"> 选择商品</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_selector('goodsid',array('required'=>true, 'value'=>$item['title'], 'url'=>webUrl('goods/query'), 'items'=>$goods,'buttontext'=>'选择商品','placeholder'=>'请输入商品标题'))?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">评论时间</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" name="createtime" value="<?php echo  !empty($item['createtime']) ? date('Y-m-d H:i',$item['createtime']) : date('Y-m-d H:i')?>" placeholder="请选择日期时间" readonly="readonly" class="datetimepicker form-control valid" style="padding-left:12px;" aria-invalid="false">
                <script type="text/javascript">
                    require(["datetimepicker"], function(){
                        var option = {
                            lang : "zh",
                            step : 1,
                            timepicker : true,
                            closeOnDateSelect : true,
                            format : "Y-m-d H:i"
                        };
                        $(".datetimepicker[name = 'createtime']").datetimepicker(option);
                    });
                </script>
                <span class='help-block'>评论时间，如果不选择，默认当前时间</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">用户头像</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('headimgurl',$item['headimgurl'])?>
                <span class='help-block'>用户头像，如果不选择，默认从粉丝表中随机读取</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">用户昵称</label>
            <div class="col-sm-9 col-xs-12">
                <input type='text' class='form-control' name='nickname' value="<?php  echo $item['nickname'];?>"/>
                <span class='help-block'>用户昵称，如果不填写，默认从粉丝表中随机读取</span>
            </div>
        </div>

        <div class="form-group" id='noleveldiv'>
            <label class="col-lg control-label must">评分等级</label>
            <div class="col-sm-9 col-xs-12">
                <input value="<?php  echo $item['level'];?>" type="number" name='level' class="rating" min=0 max=5 step=1
                       data-size="xs">
                <span class='help-block text-danger' id='nolevel' style='display:none'>请选择评分等级</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label must">首次评价</label>
            <div class="col-sm-9 col-xs-12">
                <textarea name='content' class="form-control" data-rule-required='true' rows="5"><?php  echo $item['content'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_multi_image('images',iunserializer($item['images']))?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label">首次回复</label>
            <div class="col-sm-9 col-xs-12">
                <textarea name='reply_content' class="form-control" rows="5"><?php  echo $item['reply_content'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_multi_image('reply_images',iunserializer($item['reply_images']))?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label">追加评价</label>
            <div class="col-sm-9 col-xs-12">
                <textarea name='append_content' class="form-control" rows="5"><?php  echo $item['append_content'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_multi_image('append_images',iunserializer($item['append_images']))?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label">追加回复</label>
            <div class="col-sm-9 col-xs-12">
                <textarea name='append_reply_content' class="form-control" rows="5"><?php  echo $item['append_reply_content'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_multi_image('append_reply_images',iunserializer($item['append_reply_images']))?>
            </div>
        </div>

        <div class="form-group"></div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <input type="submit" value="提交" class="btn btn-primary"/>
                <input type="button" name="back" onclick='history.back()' <?php if(cv('shop.adv.add|shop.adv.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
            </div>
        </div>
    </form>
</div>

<script language='javascript'>
    $('form').submit(function(){
        if($('#goodsid').val()=='0' || $('#goodsid').val()==''){
            $('#goodsid_suggest').parent().addClass('has-error');
            $('#goodsid_suggest').focus();
            return false;
        } else{
            $('#goodsid_suggest').parent().removeClass('has-error');
        }
        if($(':input[name=level]').val()=='0'){
            $('#nolevel').show();
            return false;
        } else{
            $('#nolevel').hide();
        }
        if($.trim($('textarea[name=append_content]').val())==''){
             if($.trim($('textarea[name=append_reply_content]').val())!=''){
                    alert('请填写追加评价后才能添加追加回复!');
                    return false;
             }
        }
        return true;
   });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
