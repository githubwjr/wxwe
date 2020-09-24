<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">专题管理</span>
 </div>

<div class="page-content">
<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r" value="seckill.task" />
    <div class="page-toolbar m-b-sm m-t-sm">
        <div class="col-sm-4">
            <span class=''>
                <?php if(cv('seckill.task.add')) { ?>
                    <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('seckill/task/add')?>"><i class='fa fa-plus'></i> 添加秒杀</a>
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
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"> 搜索</button>
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
            <?php if(cv('seckill.task.edit')) { ?>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('seckill/task/enabled',array('enabled'=>1))?>">
                <i class='icow icow-qiyong'></i> 启用
            </button>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('seckill/task/enabled',array('enabled'=>0))?>">
                <i class='icow icow-jinyong'></i> 禁用
            </button>
            <?php  } ?>
            <?php if(cv('seckill.task.delete')) { ?>
            <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('seckill/task/delete')?>">
                <i class='icow icow-shanchu1'></i> 删除
            </button>
            <?php  } ?>
        </div>
    </div>
    <table class="table table-responsive table-hover" >
        <thead class="navbar-inner">
        <tr>
            <th style="width:25px;"></th>
            <th>专题名称</th>
            <th>会场数</th>
            <th>启用</th>
            <th>创建时间</th>
            <th style="width: 115px;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
            <td>
                <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
            </td>
            <td>
                <?php  if($row['usedDate']) { ?>
                <span class="label label-primary"><?php  echo $row['usedDate'];?></span>

                <?php  if($row['usedDate']==date('Y-m-d')) { ?>
                <span class="label label-danger">当前秒杀</span>
                <?php  } ?>
                <br/>
                <?php  } ?>


                <span class="text text-danger">[<?php  echo $category[$row['cateid']]['name'];?>]</span><?php  echo $row['title'];?></td>
            <td>
                <?php  echo $row['roomcount'];?>
            </td>
            <td>
                <span class='label <?php  if($row['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                <?php if(cv('seckill.task.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['enabled'];?>'
                data-switch-value0='0|禁用|label label-default|<?php  echo webUrl('seckill/task/enabled',array('enabled'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|启用|label label-primary|<?php  echo webUrl('seckill/task/enabled',array('enabled'=>0,'id'=>$row['id']))?>'
                style="cursor: pointer;"
                <?php  } ?>>
                <?php  if($row['enabled']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></span>
            </td>
            <td>
                <?php  echo date('Y-m-d',$row['createtime'])?><br/><?php  echo date('H:i:s',$row['createtime'])?>
            </td>
            <td style="text-align:left;">
                <?php if(cv('seckill.task.view|seckill.task.edit')) { ?>
                <a href="<?php  echo webUrl('seckill/task/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm btn-op btn-operation">
                     <span data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php if(cv('seckill.task.edit')) { ?>编辑<?php  } else { ?>查看<?php  } ?>">
                        <?php if(cv('seckill.task.edit')) { ?>
                        <i class="icow icow-bianji2"></i>
                        <?php  } else { ?>
                        <i class="icow icow-chakan-copy"></i>
                        <?php  } ?>
                     </span>
                </a>
                <?php  } ?>
                <?php if(cv('seckill.room')) { ?>
                <a href="<?php  echo webUrl('seckill/room', array('taskid' => $row['id']))?>" class="btn btn-default btn-sm  btn-op btn-operation">
                     <span data-toggle="tooltip" data-placement="top" title="" data-original-title="会场管理">
                        <i class="icow icow-huichang"></i>
                     </span>
                </a>
                <?php  } ?>
                <?php if(cv('seckill.goods')) { ?>
                <a href="<?php  echo webUrl('seckill/goods', array('taskid' => $row['id']))?>" class="btn btn-default btn-sm btn-op btn-operation">
                     <span data-toggle="tooltip" data-placement="top" title="" data-original-title="商品统计">
                        <i class="icow icow-goods"></i>
                     </span>
                </a>
                <?php  } ?>
                <?php if(cv('seckill.task.delete')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('seckill/task/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm btn-op btn-operation" data-confirm='确认要删除此秒杀吗?'>
                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                        <i class="icow icow-shanchu1"></i>
                     </span>
                </a>
                <?php  } ?>

            </td>
        </tr>
        <?php  } } ?>
        </tbody>
        <tfoot>
            <tr>
                <td><input type="checkbox"></td>
                <td colspan="2">
                    <div class="btn-group">
                        <?php if(cv('seckill.task.edit')) { ?>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('seckill/task/enabled',array('enabled'=>1))?>">
                            <i class='icow icow-qiyong'></i> 启用
                        </button>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('seckill/task/enabled',array('enabled'=>0))?>">
                            <i class='icow icow-jinyong'></i> 禁用
                        </button>
                        <?php  } ?>
                        <?php if(cv('seckill.task.delete')) { ?>
                        <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('seckill/task/delete')?>">
                            <i class='icow icow-shanchu1'></i> 删除
                        </button>
                        <?php  } ?>
                    </div>
                </td>
                <td colspan="3" class="text-right"><?php  echo $pager;?></td>
            </tr>
        </tfoot>
    </table>
    <?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有任何秒杀!
        </div>
    </div>
    <?php  } ?>

</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
