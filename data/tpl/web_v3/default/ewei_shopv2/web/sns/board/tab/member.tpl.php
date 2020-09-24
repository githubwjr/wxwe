<?php defined('IN_IA') or exit('Access Denied');?><div class="alert alert-primary">
    版主或社区超级管理员不受条件控制
</div>
<div class="form-group">
    <label class="col-lg control-label">商城会员等级浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks">

        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='showlevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['showlevels']!='' && is_array($item['showlevels'])  && in_array('0', $item['showlevels'])) { ?>selected<?php  } ?>>普通等级</option>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['showlevels']) && in_array($level['id'], $item['showlevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部会员等级</span>

        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['showlevels']=='') { ?>
            全部会员等级
            <?php  } else { ?>
            <?php  if($item['showlevels']!='' && is_array($item['showlevels']) && in_array('0', $item['showlevels'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <?php  if($item['showlevels']!='' && is_array($item['showlevels']) && in_array($level['id'], $item['showlevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">商城会员等级发帖权限</label>
    <div class="col-sm-9 col-xs-12 chks">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='postlevels[]' class='form-control select2' multiple=''>

            <option value="0"  <?php  if($item['postlevels']!='' && is_array($item['postlevels'])  && in_array('0', $item['postlevels'])) { ?>selected<?php  } ?>>普通等级</option>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['postlevels']) && in_array($level['id'], $item['postlevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部会员等级</span>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['postlevels']=='') { ?>
            全部会员等级
            <?php  } else { ?>
            <?php  if($item['postlevels']!='' && is_array($item['postlevels']) && in_array('0', $item['postlevels'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <?php  if($item['postlevels']!='' && is_array($item['postlevels']) && in_array($level['id'], $item['postlevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>


    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">商城会员组浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='showgroups[]' class='form-control select2' multiple=''>
            <option value="0" <?php  if($item['showgroups']!='' && is_array($item['showgroups']) && in_array('0',$item['showgroups'])) { ?>selected<?php  } ?>>无分组</option>
            <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
            <option value="<?php  echo $group['id'];?>" <?php  if(is_array($item['showgroups']) && in_array($group['id'], $item['showgroups'])) { ?>selected<?php  } ?>><?php  echo $group['groupname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部会员分组</span>

        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['showgroups']=='') { ?>
            全部会员等级
            <?php  } else { ?>
            <?php  if($item['showgroups']!='' && is_array($item['showgroups']) && in_array('0', $item['showgroups'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <?php  if($item['showgroups']!='' && is_array($item['showgroups']) && in_array($level['id'], $item['showgroups'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>

    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">商城会员组发帖权限</label>
    <div class="col-sm-9 col-xs-12 chks">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='postgroups[]' class='form-control select2' multiple=''>
            <option value="0" <?php  if($item['postgroups']!='' && is_array($item['postgroups']) && in_array('0',$item['postgroups'])) { ?>selected<?php  } ?>>无分组</option>
            <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
            <option value="<?php  echo $group['id'];?>" <?php  if(is_array($item['postgroups']) && in_array($group['id'], $item['postgroups'])) { ?>selected<?php  } ?>><?php  echo $group['groupname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部会员分组</span>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['postgroups']=='') { ?>
            全部会员等级
            <?php  } else { ?>
            <?php  if($item['postgroups']!='' && is_array($item['postgroups']) && in_array('0', $item['postgroups'])) { ?>
            <?php echo empty($shop['levelname'])?'普通等级':$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <?php  if($item['postgroups']!='' && is_array($item['postgroups']) && in_array($level['id'], $item['postgroups'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>

    </div>
</div>



<div class="form-group">
    <label class="col-lg control-label">社区会员等级浏览权限</label>
    <div class="col-sm-9 col-xs-12 chks">

        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='showsnslevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['showsnslevels']!='' && is_array($item['showsnslevels'])  && in_array('0', $item['showsnslevels'])) { ?>selected<?php  } ?>><?php echo empty($this->set['levelname'])?'社区粉丝':$this->set['levelname']?></option>
            <?php  if(is_array($snslevels)) { foreach($snslevels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['showsnslevels']) && in_array($level['id'], $item['showsnslevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部会员等级</span>

        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['showlevels']=='') { ?>
            全部会员等级
            <?php  } else { ?>
            <?php  if($item['showsnslevels']!='' && is_array($item['showsnslevels']) && in_array('0', $item['showsnslevels'])) { ?>
            <?php echo empty($shop['levelname'])?(empty($this->set['levelname'])?'社区粉丝':$this->set['levelname']):$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($snslevels)) { foreach($snslevels as $level) { ?>
            <?php  if($item['showlevels']!='' && is_array($item['showsnslevels']) && in_array($level['id'], $item['showsnslevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-lg control-label">社区会员等级发帖权限</label>
    <div class="col-sm-9 col-xs-12 chks">

        <?php if( ce('sns.board' ,$item) ) { ?>
        <select name='postsnslevels[]' class='form-control select2' multiple=''>
            <option value="0"  <?php  if($item['postsnslevels']!='' && is_array($item['postsnslevels'])  && in_array('0', $item['postsnslevels'])) { ?>selected<?php  } ?>><?php echo empty($this->set['levelname'])?'社区粉丝':$this->set['levelname']?></option>
            <?php  if(is_array($snslevels)) { foreach($snslevels as $level) { ?>
            <option value="<?php  echo $level['id'];?>" <?php  if(is_array($item['postsnslevels']) && in_array($level['id'], $item['postsnslevels'])) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <span class='help-block'>不设置默认全部会员等级</span>

        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if($item['showlevels']=='') { ?>
            全部会员等级
            <?php  } else { ?>
            <?php  if($item['postsnslevels']!='' && is_array($item['postsnslevels']) && in_array('0', $item['postsnslevels'])) { ?>
            <?php echo empty($shop['levelname'])?(empty($this->set['levelname'])?'社区粉丝':$this->set['levelname']):$shop['levelname']?>;
            <?php  } ?>
            <?php  if(is_array($snslevels)) { foreach($snslevels as $level) { ?>
            <?php  if($item['postsnslevels']!='' && is_array($item['postsnslevels']) && in_array($level['id'], $item['postsnslevels'])) { ?>
            <?php  echo $level['levelname'];?>;
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

        <?php  } ?>
    </div>
</div>
