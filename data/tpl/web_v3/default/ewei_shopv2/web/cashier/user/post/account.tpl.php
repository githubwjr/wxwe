<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label must">后台登录用户名</label>
    <div class="col-sm-8">
        <?php if( ce('cashier.user' ,$item) ) { ?>
        <input type="text" class="form-control" name="username" value="<?php  echo $item['username'];?>" required/>
        <?php  } else { ?>
        <div class="form-control-static must"><?php  echo $item['username'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">后台登录密码</label>
    <div class="col-sm-8">
        <?php if( ce('cashier.user' ,$item) ) { ?>
        <input type="password" class="form-control" name="password" placeholder="默认空,则不修改原密码!"/>
        <?php  } else { ?>
        <div class="form-control-static">******</div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">绑定管理员微信号</label>
    <div class="col-sm-8">
        <?php if( ce('cashier.user' ,$item) ) { ?>
        <?php  echo tpl_selector('manageopenid',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>0,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择管理员', 'items'=>$manageopenid,'url'=>webUrl('member/query') ))?>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['manageopenid'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">手机端管理</label>
    <div class="col-sm-8">
        <?php if( ce('cashier.user' ,$item) ) { ?>
        <?php  echo tpl_selector('management',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>1,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择手机端管理员', 'items'=>$management,'url'=>webUrl('member/query') ))?>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['management'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">
        使用期限
    </label>
    <?php if( ce('goods' ,$item) ) { ?>
    <div class="col-sm-4 col-xs-6">
        <?php echo tpl_form_field_daterange('lifetime', array('starttime'=>date('Y-m-d H:i', !empty($item['lifetimestart'])?$item['lifetimestart']:time()),'endtime'=>date('Y-m-d H:i', !empty($item['lifetimeend'])?$item['lifetimeend']:time()+365*24*3600)),true);?>
    </div>
    <?php  } else { ?>
    <div class="col-sm-6 col-xs-6">
        <div class='form-control-static'>
            <?php  echo date('Y-m-d H:i',$item['lifetimestart'])?> - <?php  echo date('Y-m-d H:i',$item['lifetimeend'])?>
        </div>
    </div>
    <?php  } ?>
</div>

<div class="form-group">
    <label class="col-lg control-label">状态</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('cashier.user' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 开启
        </label>
        <label class='radio-inline'>
            <input type='radio' name='status' value='0' <?php  if(empty($item['status'])) { ?>checked<?php  } ?> /> 关闭
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($item['status']==1) { ?>开启<?php  } else { ?>关闭<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
