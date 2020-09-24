<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">发帖强制关注</label>
    <div class="col-sm-9">
        <?php if( ce('goods' ,$item) ) { ?>
        <label class="radio-inline">
            <input type="radio" name="needpostfollow" value="1" <?php  if($item['needpostfollow'] == 1) { ?>checked="true"<?php  } ?>   /> 必须关注
        </label>
        <label class="radio-inline">
            <input type="radio" name="needpostfollow" value="0" <?php  if(empty($item['needpostfollow']) ) { ?>checked="true"<?php  } ?>  /> 不需关注
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['needpostfollow'])) { ?>不需关注<?php  } else { ?>必须关注<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">分享标题</label>
    <div class="col-sm-9 col-xs-12">
           <?php if( ce('goods' ,$item) ) { ?>
        <input type="text" name="share_title" id="share_title" class="form-control" value="<?php  echo $item['share_title'];?>" />
        <span class='help-block'>如果不填写，默认为版块名称</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['share_title'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">分享图标</label>
    <div class="col-sm-9 col-xs-12">
           <?php if( ce('goods' ,$item) ) { ?>
        <?php  echo tpl_form_field_image2('share_icon', $item['share_icon'])?>
        <span class='help-block'>如果不选择，默认为版块LOGO</span>
             <?php  } else { ?>
                            <?php  if(!empty($item['share_icon'])) { ?>
                            <a href='<?php  echo tomedia($item['share_icon'])?>' target='_blank'>
                            <img src="<?php  echo tomedia($item['share_icon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                            </a>
                            <?php  } ?>
                        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">分享描述</label>
    <div class="col-sm-9 col-xs-12">
             <?php if( ce('goods' ,$item) ) { ?>
        <textarea name="share_desc" class="form-control" rows="5"><?php  echo $item['share_desc'];?></textarea>
        <span class='help-block'>如果不填写，则默认使用版块描述</span>
             <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['share_desc'];?></div>
        <?php  } ?>
    </div>
</div>