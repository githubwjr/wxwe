<?php defined('IN_IA') or exit('Access Denied');?><div class="alert alert-primary">
    版主或社区超级管理员不受条件控制
</div>
<div class="form-group">
    <label class="col-lg control-label">允许非股东浏览</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='notpartner' value='0' <?php  if($item['notpartner']==0) { ?>checked<?php  } ?> /> 允许
        </label>
        <label class='radio-inline'>
            <input type='radio' name='notpartner' value='1' <?php  if($item['notpartner']==1) { ?>checked<?php  } ?> /> 禁止
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['notpartner'])) { ?>允许<?php  } else { ?>禁止<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">股东等级浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks">

        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='showpartnerlevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['showpartnerlevels']!='' && is_array($item['showpartnerlevels'])  && in_array('0', $item['showpartnerlevels'])) { ?>selected<?php  } ?>>普通等级</option>
            <?php  if(is_array($partnerlevels)) { foreach($partnerlevels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['showpartnerlevels']) && in_array($level['id'], $item['showpartnerlevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部股东等级</span>

        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['showpartnerlevels']=='') { ?>
            <?php  if(empty( $item['notagent'])) { ?>全部股东等级<?php  } else { ?>禁止非股东浏览<?php  } ?>
            <?php  } else { ?>
            <?php  if($item['showpartnerlevels']!='' && is_array($item['showpartnerlevels']) && in_array('0', $item['showpartnerlevels'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($partnerlevels)) { foreach($partnerlevels as $level) { ?>
            <?php  if($item['showpartnerlevels']!='' && is_array($item['showpartnerlevels']) && in_array($level['id'], $item['showpartnerlevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">允许非股东发帖</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='notglobonuspost' value='0' <?php  if($item['notglobonuspost']==0) { ?>checked<?php  } ?> /> 允许
        </label>
        <label class='radio-inline'>
            <input type='radio' name='notglobonuspost' value='1' <?php  if($item['notglobonuspost']==1) { ?>checked<?php  } ?> /> 禁止
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['notglobonuspost'])) { ?>允许<?php  } else { ?>禁止<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">股东等级发帖权限</label>
    <div class="col-sm-9 col-xs-12 chks">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='postpartnerlevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['postpartnerlevels']!='' && is_array($item['postpartnerlevels'])  && in_array('0', $item['postpartnerlevels'])) { ?>selected<?php  } ?>>普通等级</option>
            <?php  if(is_array($partnerlevels)) { foreach($partnerlevels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['postpartnerlevels']) && in_array($level['id'], $item['postpartnerlevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部股东等级</span>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['postpartnerlevels']=='') { ?>
            <?php  if(empty( $item['notagentpost'])) { ?>全部股东等级<?php  } else { ?>禁止非股东浏览<?php  } ?>
            <?php  } else { ?>
            <?php  if($item['postpartnerlevels']!='' && is_array($item['postpartnerlevels']) && in_array('0', $item['postpartnerlevels'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <?php  if($item['postpartnerlevels']!='' && is_array($item['postpartnerlevels']) && in_array($level['id'], $item['postpartnerlevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>


    </div>
</div>

