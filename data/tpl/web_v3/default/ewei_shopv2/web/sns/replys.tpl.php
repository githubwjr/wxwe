<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .inner:hover{
        border:1px solid #00aeff !important;
    }
    .inner{
        width:100%;
        border:1px solid #e5e5e5 !important;
    }
    .inner td{
        padding:10px 8px 20px;
       border-top:none;
       border-left: 1px solid #efefef;
      vertical-align: top;
    }
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        text-align: center;
        border:none;
    }
    .fans{
        line-height: 25px;
        display: inline-block;
        width:150px;
        overflow: hidden;
        text-overflow:ellipsis;
        white-space: nowrap;
    }
</style>
<div class="page-header">
    当前位置：<span class="text-primary">评论管理</span>
</div>
<div class="page-content">
<?php  if(!empty($board) && !empty($post)) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right aops">

              <a class='<?php  if($post['deleted']==1) { ?>text-default<?php  } else { ?>text-danger<?php  } ?>'
                <?php if(cv('sns.posts.delete')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['deleted'];?>'
                data-switch-value0='0|正常|text-danger|<?php  echo webUrl('sns/posts/delete',array('deleted'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|已删除|text-default|<?php  echo webUrl('sns/posts/delete',array('deleted'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
                <?php  if($post['deleted']==1) { ?>已删除<?php  } else { ?>正常<?php  } ?>
            </a>

            <a class='<?php  if($post['checked']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['checked'];?>'
                data-switch-value0='0|待审核|text-default|<?php  echo webUrl('sns/posts/check',array('checked'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|已审核|text-danger|<?php  echo webUrl('sns/posts/check',array('checked'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
                <?php  if($post['checked']==1) { ?>已审核<?php  } else { ?>待审核<?php  } ?>
            </a>

            <a class='<?php  if($post['isboardbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['isboardbest'];?>'
                data-switch-value0='0|版块精华|text-default|<?php  echo webUrl('sns/posts/best',array('best'=>1,'all'=>0, 'id'=>$post['id']))?>'
                data-switch-value1='1|版块精华|text-danger|<?php  echo webUrl('sns/posts/best',array('best'=>0,'all'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
               版块精华
            </a>

            <a class='<?php  if($post['isbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['isbest'];?>'
                data-switch-value0='0|全站精华|text-default|<?php  echo webUrl('sns/posts/best',array('best'=>1,'all'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|全站精华|text-danger|<?php  echo webUrl('sns/posts/best',array('best'=>0,'all'=>1,'id'=>$post['id']))?>'
                <?php  } ?>>
                全站精华
            </a>


            <a class='<?php  if($post['isboardbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['isboardbest'];?>'
                data-switch-value0='0|版块置顶|text-default|<?php  echo webUrl('sns/posts/best',array('top'=>1,'all'=>0, 'id'=>$post['id']))?>'
                data-switch-value1='1|版块置顶|text-danger|<?php  echo webUrl('sns/posts/best',array('top'=>0,'all'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
                版块置顶
            </a>

            <a class='<?php  if($post['istop']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['istop'];?>'
                data-switch-value0='0|全站置顶|text-default|<?php  echo webUrl('sns/posts/top',array('top'=>1,'all'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|全站置顶|text-danger|<?php  echo webUrl('sns/posts/top',array('top'=>0,'all'=>1,'id'=>$post['id']))?>'
                <?php  } ?>>
                全站置顶
            </a>
            
        </span>
        版块: <?php  echo $board['title'];?>
    </div>
    <div class="panel-body">

        <div class="row">
        <div class="col-sm-4" style="line-height:22px;">
           <div class="pull-left ">
               <?php if(cv('member.list.view')) { ?>
               <a href="<?php  echo webUrl('member/list/detail',array('id' => $member['id']));?>" title='会员信息' target='_blank'>
                   <img class="radius50" src="<?php  echo $post['avatar'];?>" style="border:1px solid #ccc;width:60px;height:60px; padding:1px;float: left;" onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'"/>
                   <span style="float: left;margin-left: 10px">
                       <span class="fans"><?php  echo $post['nickname'];?></span></br>
                       <span class="label label-default" style="background:<?php  echo $level['bg'];?>;color:<?php  echo $level['color'];?>"><?php  echo $level['levelname'];?></span>
                   </span>
               </a>
               <?php  } else { ?>
               <img  class="radius50" src="<?php  echo $post['avatar'];?>" style="border:1px solid #ccc;width:80px;height:80px; padding:1px;float: left;"onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'" /><br />
               <div style="float: left">
                   <span><?php  echo $post['nickname'];?></span>
                   <span class="label label-default" style="background:<?php  echo $level['bg'];?>;color:<?php  echo $level['color'];?>"><?php  echo $level['levelname'];?></span>
               </div>
               <?php  } ?>
           </div>

           <div class="pull-right" style="margin-right: 20px">
               <?php  if($isManager) { ?>
               <span class="label label-warning">版主</span><br/>
               <?php  } ?>
               积分: <?php  echo $member['sns_credit'];?>
               <br/>话题: <?php  echo $member['postcount'];?>
               <br/>评论: <?php  echo $member['replycount'];?>

           </div>

        </div>

            <div class="col-sm-8" style="border-left: 1px solid #efefef;padding-left: 30px">
                <h3><?php  echo $post['title'];?> <h4 style="padding:0;line-height: 18px;font-weight: normal;"><br/>发布时间: <?php  echo date('Y-m-d H:i:s',$post['createtime'])?></h4></h3><br/>
                <?php  echo htmlspecialchars_decode($post['content'])?>
                <?php  if(count($post['images'])>0) { ?>
                <br/>
<?php  if(is_array($post['images'])) { foreach($post['images'] as $img) { ?>
                <a href="<?php  echo tomedia($img)?>" target="_blank"><img src="<?php  echo tomedia($img)?>" style="width:60px;border:1px solid #ccc;padding:1px;margin:2px;" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/></a>
                <?php  } } ?>
                <?php  } ?>

            </div>

        </div>
    </div>

</div>
<?php  } ?>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="sns.replys" />
    <input type="hidden" name="id"  value="<?php  echo $pid;?>" />
    <div class="page-toolbar">
        <div class="col-sm-4">
            <span class=''>
                <a class='btn btn-default btn-sm' href="<?php  echo referer()?>">返回</a>
            </span>

        </div>


        <div class="col-sm-6 pull-right">
            <div class="input-group">
                <div class="input-group-select">
                    <select name="checked" class='form-control'>
                        <option value="" <?php  if($_GPC['checked'] == '') { ?> selected<?php  } ?>>审核</option>
                        <option value="1" <?php  if($_GPC['checked'] == '1') { ?> selected<?php  } ?>>通过</option>
                        <option value="0" <?php  if($_GPC['checked']== '0') { ?> selected<?php  } ?>>不通过</option>
                    </select>
                </div>
                <div class="input-group-select">
                    <select name="deleted" class='form-control'>
                        <option value="" <?php  if($_GPC['deleted'] == '') { ?> selected<?php  } ?>>状态</option>
                        <option value="0" <?php  if($_GPC['deleted'] == '0') { ?> selected<?php  } ?>>正常</option>
                        <option value="1" <?php  if($_GPC['deleted']== '1') { ?> selected<?php  } ?>>删除</option>
                    </select>
                </div>
                <input type="text" class=" form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="会员信息/话题标题"> <span class="input-group-btn">
                    		
                    <button class="btn btn-primary" type="submit"> 搜索</button> </span>
            </div>
        </div>

    </div>
</form>

<form action="" method="post">
    <?php  if(count($list)>0) { ?>
    <div class="page-table-header">
        <input type="checkbox">
        <div class="btn-group">
            <?php if(cv('sns.board.delete')) { ?>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/posts/delete',array('deleted'=>1))?>">
                <i class='icow icow-huifu1'></i> 恢复
            </button>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/posts/delete',array('deleted'=>0))?>">
                <i class='icow icow-shanchu1'></i> 删除
            </button>
            <?php  } ?>

            <?php if(cv('sns.board.edit')) { ?>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/posts/check',array('checked'=>1))?>">
                <i class='icow icow-shenhetongguo'></i> 审核通过
            </button>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/posts/check',array('checked'=>0))?>">
                <i class='icow icow-yiquxiao'></i> 取消审核
            </button>
            <?php  } ?>
        </div>
    </div>
    <table class="table table-responsive" >
        <thead class="navbar-inner">
        <tr style="background: #f7f7f7">
            <th style="width:33px;"></th>

            <th style="width: 300px;"></th>
            <th style="padding-left: 30px"></th>
            <th style="width: 200px;">内容</th>
            <th>回复时间</th>
            <th>状态</th>
             <th style="width: 145px;">操作</th>
        </tr>
        <tr></tr>
        </thead>
        <!--<tbody>-->
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
       <tbody  >
           <tr>
               <td colspan="7" style="padding-left: 0">
                   <table class="inner">
                       <tr>
                           <!--<td style="overflow-x: hidden; vertical-align: top;width:25px;border-left: none">-->
                           <!--</td>-->
                           <td style="overflow-x: hidden; border: none;width: 300px">
                               <input type='checkbox'   value="<?php  echo $row['id'];?>" style="float: left;margin-right: 5px"/>
                               <?php if(cv('member.list.view')) { ?>
                               <a href="<?php  echo webUrl('member/list/detail',array('id' => $row['member']['id']));?>" title='会员信息' style="display: flex;align-items: center" target='_blank'>
                                   <img src="<?php  echo $row['avatar'];?>" style="border:1px solid #ccc;width:60px;height:60px; padding:1px" onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'"/>
                                   <div style="margin-left: 10px;height: 60px;text-align: left">
                                       <span style=""><?php  echo $row['nickname'];?></span></br>
                                       <div class="label label-default" style="background:<?php  echo $row['level']['bg'];?>;color:<?php  echo $row['level']['color'];?>;margin-top: 20px"><?php  echo $row['level']['levelname'];?></div>
                                   </div>
                               </a>
                               <?php  } else { ?>
                               <img src="<?php  echo $row['avatar'];?>" style="border:1px solid #ccc;width:60px;height:60px; padding:1px" />
                               <div>
                                   <span style="line-height: 30px;vertical-align: top"><?php  echo $row['nickname'];?></span></br>
                                   <div class="label label-default" style="background:<?php  echo $row['level']['bg'];?>;color:<?php  echo $row['level']['color'];?>;margin-top: 20px"><?php  echo $row['level']['levelname'];?></div>
                               </div>
                               <?php  } ?>

                               <?php  if($row['isAuthor']) { ?>
                               <br/><span class="label label-primary">楼主</span>
                               <?php  } ?>
                               <?php  if($row['isManager']) { ?>
                               <br/><span class="label label-warning">版主</span>
                               <?php  } ?>
                           </td>
                           <td style="text-align: left;padding-left: 30px;">
                                积分: <?php  echo $row['member']['sns_credit'];?>
                               <br/>话题: <?php  echo $row['member']['postcount'];?>
                               <br/>评论: <?php  echo $row['member']['replycount'];?>
                           </td>
                           <td class='full' style="overflow-x: hidden; width: 200px;">
                               <?php  if(!empty($row['parent'])) { ?>
                               回复:<?php  echo $row['parent']['nickname'];?><br/>
                               <?php  } ?>
                               <?php  echo $row['content'];?>
                               <?php  if(count($row['images'])>0) { ?>
                               <br/>
                               <?php  if(is_array($row['images'])) { foreach($row['images'] as $img) { ?>
                               <a href="<?php  echo tomedia($img)?>" target="_blank"><img src="<?php  echo tomedia($img)?>" style="width:50px;border:1px solid #ccc;padding:1px;margin:2px;" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/></a>
                               <?php  } } ?>
                               <?php  } ?>
                           </td>
                           <td  style="overflow-x: hidden;">
                               <?php  echo date('Y-m-d', $row['createtime'])?><br/>
                               <?php  echo date('H:i', $row['createtime'])?>
                           </td>
                           <td  style="overflow-x: hidden;">

                               <span class='label <?php  if($row['deleted']==1) { ?>label-default<?php  } else { ?>label-primary<?php  } ?>'
                               <?php if(cv('sns.posts.delete')) { ?>
                               data-toggle='ajaxSwitch'
                               data-switch-value='<?php  echo $row['deleted'];?>'
                               data-switch-value0='0|正常|label  label-success|<?php  echo webUrl('sns/posts/delete',array('deleted'=>1,'id'=>$row['id']))?>'
                               data-switch-value1='1|已删除|label label-default|<?php  echo webUrl('sns/posts/delete',array('deleted'=>0,'id'=>$row['id']))?>'
                               <?php  } ?>>
                               <?php  if($row['deleted']==1) { ?>已删除<?php  } else { ?>正常<?php  } ?>
                               </span>
                               <br/>
                               <span class='label <?php  if($row['checked']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
                               <?php if(cv('sns.posts.edit')) { ?>
                               data-toggle='ajaxSwitch'
                               data-switch-value='<?php  echo $row['checked'];?>'
                               data-switch-value0='0|待审核|label label-default|<?php  echo webUrl('sns/posts/check',array('checked'=>1,'id'=>$row['id']))?>'
                               data-switch-value1='1|已审核|label label-success|<?php  echo webUrl('sns/posts/check',array('checked'=>0,'id'=>$row['id']))?>'
                               <?php  } ?>>
                               <?php  if($row['checked']==1) { ?>已审核<?php  } else { ?>待审核<?php  } ?>
                               </span>
                           </td>
                           <td style="width:10%">
                               <?php if(cv('sns.posts.delete')) { ?>
                               <a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/posts/delete1', array('id' => $row['id']))?>"class="btn btn-default btn-sm btn-op btn-operation" data-confirm='确认要彻底删除此帖子吗?'>
                                    <span data-toggle="tooltip" data-placement="top" data-original-title="彻底删除">
                                        <i class='icow icow-shanchu1'></i>
                                    </span>
                               </a>
                               <?php  } ?>
                           </td>
                       </tr>
                       <?php  if(!empty($row['subject'])) { ?>
                       <tr style="border-top:1px solid #efefef">

                           <td colspan="6" style="padding: 20px;text-align: left;border: none;">
                               <div class="row">
                                   <a href="<?php  echo webUrl('sns/replys',array('id'=>$row['pid']))?>" target="_blank">
                                       <div style="width: 50px; float: left;"><img src="<?php  echo tomedia($row['subject']['thumb'])?>" style="width:50px;border:1px solid #ccc;padding:1px;margin:2px;" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/></div>
                                       <div class="col-sm-11" style="padding-top: 2px">
                                           <h4><?php  echo $row['subject']['title'];?></h4>
                                           <p style="margin-top: 13px">  版块: <?php  echo $row['subject']['boardtitle'];?></p>
                                       </div>
                                   </a>
                               </div>
                           </td>

                       </tr>
                       <?php  } ?>
                   </table>
               </td>
           </tr>
       </tbody>
        <tr></tr>
        <?php  } } ?>
        <!--</tbody>-->
        <tfoot>
            <tr>
                <td><input type="checkbox"></td>
                <td colspan="2" style="text-align: left">
                    <div class="btn-group">
                        <?php if(cv('sns.board.delete')) { ?>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/posts/delete',array('deleted'=>1))?>">
                            <i class='icow icow-huifu1'></i> 恢复
                        </button>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/posts/delete',array('deleted'=>0))?>">
                            <i class='icow icow-shanchu1'></i> 删除
                        </button>
                        <?php  } ?>

                        <?php if(cv('sns.board.edit')) { ?>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/posts/check',array('checked'=>1))?>">
                            <i class='icow icow-shenhetongguo'></i> 审核通过
                        </button>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/posts/check',array('checked'=>0))?>">
                            <i class='icow icow-yiquxiao'></i> 取消审核
                        </button>
                        <?php  } ?>
                    </div>
                </td>
                <td colspan="4" style="text-align: right"> <?php  echo $pager;?></td>
            </tr>
        </tfoot>
    </table>
    <?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有任何版块!
        </div>
    </div>
    <?php  } ?>

</form>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
