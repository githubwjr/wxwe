<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">话题积分</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="postcredit" class="form-control" value="<?php  echo $item['postcredit'];?>"/>
        <span class="help-block">删除话题，也扣除相应积分</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['postcredit'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">评论积分</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="replycredit" class="form-control" value="<?php  echo $item['replycredit'];?>"/>
        <span class="help-block">删除评论，也扣除相应积分</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['replycredit'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">设置版块精华积分</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="bestboardcredit" class="form-control" value="<?php  echo $item['bestboardcredit'];?>"/>
        <span class="help-block">取消版块精华，也扣除相应积分</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['bestboardcredit'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">设置全站精华积分</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="bestcredit" class="form-control" value="<?php  echo $item['bestcredit'];?>"/>
        <span class="help-block">取消全站精华，也扣除相应积分</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['bestcredit'];?></div>
        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-lg control-label">设置版块置顶积分</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="topboardcredit" class="form-control" value="<?php  echo $item['topboardcredit'];?>"/>
        <span class="help-block">取消版块置顶，也扣除相应积分</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['topboardcredit'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">设置全站置顶积分</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('sns.board' ,$item) ) { ?>
        <input type="text" name="topcredit" class="form-control" value="<?php  echo $item['topcredit'];?>"/>
        <span class="help-block">取消全站置顶，也扣除相应积分</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['topcredit'];?></div>
        <?php  } ?>
    </div>
</div>


<!--NDAwMDA5NzgyNw==-->