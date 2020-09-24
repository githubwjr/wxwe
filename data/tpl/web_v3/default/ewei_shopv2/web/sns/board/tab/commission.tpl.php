<?php defined('IN_IA') or exit('Access Denied');?><div class="alert alert-primary">
    版主或社区超级管理员不受条件控制
</div>
<div class="form-group">
    <label class="col-lg control-label">允许非分销商浏览</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='notagent' value='0' <?php  if($item['notagent']==0) { ?>checked<?php  } ?> /> 允许
        </label>
        <label class='radio-inline'>
            <input type='radio' name='notagent' value='1' <?php  if($item['notagent']==1) { ?>checked<?php  } ?> /> 禁止
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['notagent'])) { ?>允许<?php  } else { ?>禁止<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">分销商等级浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks">

        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='showagentlevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['showagentlevels']!='' && is_array($item['showagentlevels'])  && in_array('0', $item['showagentlevels'])) { ?>selected<?php  } ?>>普通等级</option>
            <?php  if(is_array($agentlevels)) { foreach($agentlevels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['showagentlevels']) && in_array($level['id'], $item['showagentlevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部分销商等级</span>

        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['showagentlevels']=='') { ?>
            <?php  if(empty( $item['notagent'])) { ?>全部分销商等级<?php  } else { ?>禁止非分销商浏览<?php  } ?>
            <?php  } else { ?>
            <?php  if($item['showagentlevels']!='' && is_array($item['showagentlevels']) && in_array('0', $item['showagentlevels'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($agentlevels)) { foreach($agentlevels as $level) { ?>
            <?php  if($item['showagentlevels']!='' && is_array($item['showagentlevels']) && in_array($level['id'], $item['showagentlevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">允许非分销商发帖</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <label class='radio-inline'>
            <input type='radio' name='notagentpost' value='0' <?php  if($item['notagentpost']==0) { ?>checked<?php  } ?> /> 允许
        </label>
        <label class='radio-inline'>
            <input type='radio' name='notagentpost' value='1' <?php  if($item['notagentpost']==1) { ?>checked<?php  } ?> /> 禁止
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['notagentpost'])) { ?>允许<?php  } else { ?>禁止<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">分销商等级发帖权限</label>
    <div class="col-sm-9 col-xs-12 chks">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='postagentlevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['postagentlevels']!='' && is_array($item['postagentlevels'])  && in_array('0', $item['postagentlevels'])) { ?>selected<?php  } ?>>普通等级</option>
            <?php  if(is_array($agentlevels)) { foreach($agentlevels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['postagentlevels']) && in_array($level['id'], $item['postagentlevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部分销商等级</span>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['postagentlevels']=='') { ?>
            <?php  if(empty( $item['notagentpost'])) { ?>全部分销商等级<?php  } else { ?>禁止非分销商浏览<?php  } ?>
            <?php  } else { ?>
            <?php  if($item['postagentlevels']!='' && is_array($item['postagentlevels']) && in_array('0', $item['postagentlevels'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <?php  if($item['postagentlevels']!='' && is_array($item['postagentlevels']) && in_array($level['id'], $item['postagentlevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>


    </div>
</div>

