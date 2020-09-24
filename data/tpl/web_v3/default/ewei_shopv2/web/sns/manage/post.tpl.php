<?php defined('IN_IA') or exit('Access Denied');?><form action="" <?php if( ce('sns.manage' ,$item) ) { ?>action="" method="post"<?php  } ?>  class="form-horizontal form-validate" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
<input type="hidden" name="r" value="sns.manage.<?php  if(empty($item['id'])) { ?>add<?php  } else { ?>edit<?php  } ?>" />
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>版主</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-sm-2 control-label must">版块</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('sns.manage' ,$item) ) { ?>
                    <select name="bid" class="select2 form-control" data-rule-required="true" style="width:390px;">
                        <option value="">--请选择版块--</option>
                        <?php  if(is_array($boards)) { foreach($boards as $b) { ?>
                        <option value="<?php  echo $b['id'];?>" <?php  if($b['id']==$item['bid']) { ?>selected<?php  } ?>><?php  echo $b['title'];?></option>
                        <?php  } } ?>
                    </select>
                    <?php  } else { ?>
                        <?php  if(is_array($boards)) { foreach($boards as $b) { ?>
                            <?php  if($b['id']==$item['bid']) { ?><?php  echo $b['title'];?><?php  } ?>
                        <?php  } } ?>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label must">选择会员</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('sns.manage' ,$item) ) { ?>
                    <?php  echo tpl_selector('openid',array('key'=>'openid','text'=>'nickname', 'required'=>true, 'thumb'=>'avatar','placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择会员', 'items'=>$member,'url'=>webUrl('member/query') ))?>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $member['nickname'];?> / <?php  echo $member['realname'];?> / <?php  echo $member['mobile'];?></div>
                    <?php  } ?>
                </div>
            </div>
            </div>

        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">提交</button>
            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
        </div>    </div>
    </div>
    </form>

<script lang="javascript">
    $('form').submit(function(){
        if( $('select[name=bid]').isEmpty()){
            $('form').attr('stop',1);
            tip.msgbox.err('请选择版块!');
            return false;
        }
        $('form').removeAttr('stop');
        return true;
    })
</script>

