<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">排序</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>"/>
        <span class='help-block'>数字越大，排名越靠前</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['displayorder'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label must">分类</label>
    <div class="col-sm-9 col-xs-12">

        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='cid' class='form-control' data-rule-required="true">
            <option value=""  <?php  if($item['cid']=='') { ?>selected<?php  } ?>>--请选择分类--</option>
            <?php  if(is_array($category)) { foreach($category as $c) { ?>
            <option value="<?php  echo $c['id'];?>" <?php  if($c['id']==$item['cid']) { ?>selected<?php  } ?>><?php  echo $c['name'];?></option>
            <?php  } } ?>
        </select>
        <?php  } else { ?>
        <div class='form-control-static'>

            <?php  if(is_array($category)) { foreach($category as $c) { ?>
            <?php  if($c['id']==$item['cid']) { ?><?php  echo $c['name'];?><?php  } ?>
            <?php  } } ?>
        </div>

        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label must">版块名称</label>
    <div class="col-sm-9 col-xs-12 ">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" id='title' name="title" class="form-control" value="<?php  echo $item['title'];?>"
               data-rule-required="true"/>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['title'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">版块LOGO</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <?php  echo tpl_form_field_image2('logo', $item['logo'])?>
        <span class='help-block'>建议尺寸:100 * 100 , 请将所有版块LOGO尺寸保持一致</span>
        <?php  } else { ?>
        <?php  if(!empty($item['logo'])) { ?>
        <a href='<?php  echo tomedia($item[' logo'])?>' target='_blank'>
        <img src="<?php  echo tomedia($item['logo'])?>" style='width:100px;border:1px solid #ccc;padding:1px'/>
        </a>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">版块描述</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <textarea name="desc" class="form-control" rows="5"><?php  echo $item['desc'];?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['desc'];?></div>
        <?php  } ?>

    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">版块Banner</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <?php  echo tpl_form_field_image2('banner', $item['banner'])?>
        <span class='help-block'>建议尺寸:640 * 320</span>
        <?php  } else { ?>
        <?php  if(!empty($item['banner'])) { ?>
        <a href='<?php  echo tomedia($item[' banner'])?>' target='_blank'>
        <img src="<?php  echo tomedia($item['banner'])?>" style='width:100px;border:1px solid #ccc;padding:1px'/>
        </a>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">允许发图</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='noimage' value='0' <?php  if($item['noimage']==0) { ?>checked<?php  } ?> /> 允许
        </label>
        <label class='radio-inline'>
            <input type='radio' name='noimage' value='1' <?php  if($item['noimage']==1) { ?>checked<?php  } ?> /> 不允许
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['noimage'])) { ?>允许<?php  } else { ?>不允许<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<!--<div class="form-group">-->
    <!--<label class="col-lg control-label">允许发语音</label>-->
    <!--<div class="col-sm-9 col-xs-12">-->
        <?php if( ce('sns.board' ,$item) ) { ?>
        <!--<label class='radio-inline'>-->
            <!--<input type='radio' name='novoice' value='0' <?php  if($item['novoice']==0) { ?>checked<?php  } ?> /> 允许-->
        <!--</label>-->
        <!--<label class='radio-inline'>-->
            <!--<input type='radio' name='novoice' value='1' <?php  if($item['novoice']==1) { ?>checked<?php  } ?> /> 不允许-->
        <!--</label>-->
        <?php  } else { ?>
        <!--<div class='form-control-static'><?php  if(empty($item['novoice'])) { ?>允许<?php  } else { ?>不允许<?php  } ?></div>-->
        <?php  } ?>
    <!--</div>-->
<!--</div>-->
<div class="form-group">
    <label class="col-lg control-label">发帖需要审核</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='needcheck' value='1' <?php  if($item['needcheck']==1) { ?>checked<?php  } ?> /> 需要
        </label>
        <label class='radio-inline'>
            <input type='radio' name='needcheck' value='0' <?php  if($item['needcheck']==0) { ?>checked<?php  } ?> /> 不需要
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['needcheck'])) { ?>不需要<?php  } else { ?>需要<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">版主发帖需要审核</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='needcheckmanager' value='1' <?php  if($item['needcheckmanager']==1) { ?>checked<?php  } ?> /> 需要
        </label>
        <label class='radio-inline'>
            <input type='radio' name='needcheckmanager' value='0' <?php  if($item['needcheckmanager']==0) { ?>checked<?php  } ?> /> 不需要
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['needcheckmanager'])) { ?>不需要<?php  } else { ?>需要<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">回帖需要审核</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='needcheckreply' value='1' <?php  if($item['needcheckreply']==1) { ?>checked<?php  } ?> /> 需要
        </label>
        <label class='radio-inline'>
            <input type='radio' name='needcheckreply' value='0' <?php  if($item['needcheckreply']==0) { ?>checked<?php  } ?> /> 不需要
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['needcheckreply'])) { ?>不需要<?php  } else { ?>需要<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">版主回帖需要审核</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='needcheckreplymanager' value='1' <?php  if($item['needcheckreplymanager']==1) { ?>checked<?php  } ?> /> 需要
        </label>
        <label class='radio-inline'>
            <input type='radio' name='needcheckreplymanager' value='0' <?php  if($item['needcheckreplymanager']==0) { ?>checked<?php  } ?> /> 不需要
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['needcheckreplymanager'])) { ?>不需要<?php  } else { ?>需要<?php  } ?></div>
        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-lg control-label">关键词</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="keyword" class="form-control" value="<?php  echo $item['keyword'];?>"/>
        <span class='help-block'>平台回复关键词</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['keyword'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">是否推荐</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='isrecommand' value='1' <?php  if($item['isrecommand']==1) { ?>checked<?php  } ?> /> 是
        </label>
        <label class='radio-inline'>
            <input type='radio' name='isrecommand' value='0' <?php  if($item['isrecommand']==0) { ?>checked<?php  } ?> /> 否
        </label>

        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['isrecommand'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">选择版主</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <?php  echo tpl_selector('openid',array('key'=>'openid','text'=>'nickname','multi'=>1, 'thumb'=>'avatar','placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择会员', 'items'=>$managers,'url'=>webUrl('member/query') ))?>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if(is_array($managers)) { foreach($managers as $m) { ?>
            <?php  echo $m['nickname'];?>;
            <?php  } } ?>
        </div>
        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-lg control-label">状态</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 显示
        </label>
        <label class='radio-inline'>
            <input type='radio' name='status' value='0' <?php  if($item['status']==0) { ?>checked<?php  } ?> /> 隐藏
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['status'])) { ?>隐藏<?php  } else { ?>显示<?php  } ?></div>
        <?php  } ?>
    </div>
</div>