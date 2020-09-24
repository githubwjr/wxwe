<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">会场管理 <small><?php  if(!empty($task)) { ?>所属专题: [<?php  echo $task['id'];?>]-<?php  echo $task['title'];?><?php  } ?></small></span>
 </div>

<div class="page-content">
    <?php  if(!empty($task)) { ?>
    <div class="alert alert-primary">
        相同时间段，同一种商品只能存在一次秒杀
    </div>
    <?php  } ?>
    <form action="./index.php" method="get" class="form-horizontal form-search" role="form">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r" value="seckill.room" />
        <input type="hidden" name="taskid" value="<?php  echo $_GPC['taskid'];?>" />
        <div class="page-toolbar m-b-sm m-t-sm">
            <div class="col-sm-4">
                <span class=''>
                    <?php  if(!empty($task)) { ?>
                    <?php if(cv('seckill.room.add')) { ?>
                        <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('seckill/room/add',array('taskid'=>$task['id']))?>"><i class='fa fa-plus'></i> 添加会场</a>
                    <?php  } ?>
                    <?php  } ?>
                </span>
            </div>

            <div class="col-sm-6 pull-right">
                <div class="input-group">
                    <div class="input-group-select">
                        <select name="enabled" class='form-control'>
                            <option value="" <?php  if($_GPC['enabled'] == '') { ?> selected<?php  } ?>>状态</option>
                            <option value="1" <?php  if($_GPC['enabled']== '1') { ?> selected<?php  } ?>>启用</option>
                            <option value="0" <?php  if($_GPC['enabled'] == '0') { ?> selected<?php  } ?>>禁用</option>
                        </select>
                    </div>
                    <input type="text" class=" form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="专题名称/会场名称">
                    <span class="input-group-btn">
                        <button class="btn  btn-primary" type="submit"> 搜索</button>
                    </span>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="post">
        <?php  if(count($list)>0) { ?>
        <div class="page-table-header">
            <input type="checkbox">
            <div class="btn-group">
                <?php if(cv('seckill.room.edit')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('seckill/room/enabled',array('enabled'=>1))?>">
                    <i class='icow icow-qiyong'></i> 启用
                </button>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('seckill/room/enabled',array('enabled'=>0))?>">
                    <i class='icow icow-jinyong'></i> 禁用
                </button>
                <?php  } ?>
                <?php if(cv('seckill.room.delete')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('seckill/room/delete')?>">
                    <i class='icow icow-shanchu1'></i> 删除
                </button>
                <?php  } ?>
            </div>
        </div>
        <table class="table table-responsive table-hover" >
            <thead class="navbar-inner">
                <tr>
                    <th style="width:25px;"></th>
                    <th style='width:50px'>顺序</th>
                    <th>会场名称</th>
                    <th >时间段</th>
                    <th>创建时间</th>
                    <th style='width:60px'>启用</th>
                    <th style="width: 95px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td>
                        <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
                    </td>
                    <td>
                        <?php if(cv('seckill.room.edit')) { ?>
                        <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('seckill/room/displayorder',array('id'=>$row['id']))?>" ><?php  echo $row['displayorder'];?></a>
                        <?php  } else { ?>
                        <?php  echo $row['displayorder'];?>
                        <?php  } ?>
                    </td>
                    <td>

                        <?php  if(empty($task)) { ?>
                            <span class="label label-primary">所属专题: <?php  echo $row['task_title'];?></span>
                          <br/>
                        <?php  } ?>
                        <?php  echo $row['title'];?></td>
                    <td>
                           <?php  if(count($row['times'])<=0) { ?>
                               无时间段数据
                           <?php  } else { ?>
     <select class="form-control">
                               <?php  if(is_array($row['times'])) { foreach($row['times'] as $time) { ?>
                      <option><?php  echo $time['time'];?>点: <?php  echo $time['goodscount'];?>个商品</option>
                            <?php  } } ?>
     </select>
                        <?php  } ?>
                    </td>
                    <td>
                        <?php  echo date('Y-m-d',$row['createtime'])?><br/><?php  echo date('H:i:s',$row['createtime'])?>
                    </td>
                    <td>
                        <span class='label <?php  if($row['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                              <?php if(cv('seckill.room.edit')) { ?>
                                  data-toggle='ajaxSwitch'
                                  data-switch-value='<?php  echo $row['enabled'];?>'
                                  data-switch-value0='0|禁用|label label-default|<?php  echo webUrl('seckill/room/enabled',array('enabled'=>1,'id'=>$row['id']))?>'
                                  data-switch-value1='1|启用|label label-primary|<?php  echo webUrl('seckill/room/enabled',array('enabled'=>0,'id'=>$row['id']))?>'
                                  style="cursor: pointer;"
                              <?php  } ?>>
                              <?php  if($row['enabled']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></span>
                        </td>

                        <td style="text-align:left;">
                            <?php if(cv('seckill.room.view|seckill.room.edit')) { ?>
                                <a href="<?php  echo webUrl('seckill/room/edit', array('id' => $row['id'],'taskid'=>$row['taskid']))?>" class="btn btn-default btn-sm btn-op btn-operation">
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php if(cv('seckill.room.edit')) { ?>编辑<?php  } else { ?>查看<?php  } ?>">
                                       <?php if(cv('seckill.room.edit')) { ?>
                                        <i class="icow icow-bianji2"></i>
                                        <?php  } else { ?>
                                        <i class="icow icow-chakan-copy"></i>
                                        <?php  } ?>
                                     </span>
                                </a>
                            <?php  } ?>
                            <?php if(cv('seckill.room.delete')) { ?>
                                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('seckill/room/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm btn-op btn-operation" data-confirm='确认要删除此会场吗?'>
                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                        <i class="icow icow-shanchu1"></i>
                                     </span>
                                </a>
                            <?php  } ?>

                            <a href="<?php  echo webUrl('seckill/goods', array('roomid' => $row['id']))?>" class="btn btn-default btn-sm btn-op btn-operation">
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="商品统计">
                                    <i class="icow icow-goods"></i>
                                 </span>
                            </a>

                        </td>

                    </tr>
                    <?php  } } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td colspan="3">
                            <div class="btn-group">
                                <?php if(cv('seckill.room.edit')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('seckill/room/enabled',array('enabled'=>1))?>">
                                    <i class='icow icow-qiyong'></i> 启用
                                </button>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('seckill/room/enabled',array('enabled'=>0))?>">
                                    <i class='icow icow-jinyong'></i> 禁用
                                </button>
                                <?php  } ?>
                                <?php if(cv('seckill.room.delete')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('seckill/room/delete')?>">
                                    <i class='icow icow-shanchu1'></i> 删除
                                </button>
                                <?php  } ?>
                            </div>
                        </td>
                        <td colspan="3" class="text-right"> <?php  echo $pager;?></td>
                    </tr>
                </tfoot>
            </table>
            <?php  } else { ?>
            <div class='panel panel-default'>
                <div class='panel-body' style='text-align: center;padding:30px;'>
                    暂时没有任何会场!
                </div>
            </div>
            <?php  } ?>

        </form>
</div>
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
