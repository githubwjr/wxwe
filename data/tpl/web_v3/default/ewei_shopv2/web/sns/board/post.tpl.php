<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>版块 <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】<?php  } ?></small></span>
</div>

<div class="page-content">
    <div class="page-sub-toolbar">
        <span class=''>
            <?php if(cv('sns.board.add')) { ?>
                <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('sns/board/add')?>">添加新版块</a>
            <?php  } ?>
        </span>
    </div>
<form <?php if( ce('sns.board' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />


<input type="hidden" id="tab" name="tab" value="#tab_<?php  echo $_GPC['tab'];?>" />
<div class="tabs-container>
	 <div class="tabs-left">
<ul class="nav nav-tabs" id="myTab">
    <li  <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>class="active"<?php  } ?>><a href="#tab_basic">基本</a></li>
    <li  <?php  if($_GPC['tab']=='credit') { ?>class="active"<?php  } ?>><a href="#tab_credit">积分</a></li>
    <li  <?php  if($_GPC['tab']=='share') { ?>class="active"<?php  } ?>><a href="#tab_share">关注及分享</a></li>
    <li  <?php  if($_GPC['tab']=='member') { ?>class="active"<?php  } ?>><a href="#tab_member">会员权限</a></li>
    <?php  if(p('commission')) { ?>
    <li  <?php  if($_GPC['tab']=='commission') { ?>class="active"<?php  } ?>><a href="#tab_commission">分销商权限</a></li>
    <?php  } ?>
    <?php  if(p('globonus')) { ?>
    <li  <?php  if($_GPC['tab']=='globonus') { ?>class="active"<?php  } ?>><a href="#tab_globonus">股东权限</a></li>
    <?php  } ?>


</ul>
<div class="tab-content ">
    <div class="tab-pane   <?php  if(empty($_GPC['tab']) || $_GPC['tab']=='basic') { ?>active<?php  } ?>" id="tab_basic"><div class=""><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sns/board/tab/basic', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/tab/basic', TEMPLATE_INCLUDEPATH));?></div></div>
    <div class="tab-pane   <?php  if($_GPC['tab']=='credit') { ?>active<?php  } ?>" id="tab_credit"><div class=""><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sns/board/tab/credit', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/tab/credit', TEMPLATE_INCLUDEPATH));?></div></div>
    <div class="tab-pane   <?php  if($_GPC['tab']=='share') { ?>active<?php  } ?>" id="tab_share"><div class=""><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sns/board/tab/share', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/tab/share', TEMPLATE_INCLUDEPATH));?></div></div>
    <div class="tab-pane   <?php  if($_GPC['tab']=='member') { ?>active<?php  } ?>" id="tab_member"><div class=""><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sns/board/tab/member', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/tab/member', TEMPLATE_INCLUDEPATH));?></div></div>
    <?php  if(p('commission')) { ?>
    <div class="tab-pane   <?php  if($_GPC['tab']=='commission') { ?>active<?php  } ?>" id="tab_commission"><div class=""><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sns/board/tab/commission', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/tab/commission', TEMPLATE_INCLUDEPATH));?></div></div>
    <?php  } ?>
    <?php  if(p('globonus')) { ?>
    <div class="tab-pane   <?php  if($_GPC['tab']=='globonus') { ?>active<?php  } ?>" id="tab_globonus"><div class=""><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('sns/board/tab/globonus', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/tab/globonus', TEMPLATE_INCLUDEPATH));?></div></div>
    <?php  } ?>

</div>
</div>
<?php if( ce('sns.board' ,$item) ) { ?>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <input type="submit"  value="提交" class="btn btn-primary" />
    </div>
</div>
<?php  } ?>

</form>
</div>
<script language='javascript'>
    require(['bootstrap'], function () {
        $('#myTab a').click(function (e) {
            $('#tab').val($(this).attr('href'));
            e.preventDefault();
            $(this).tab('show');
        })
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
