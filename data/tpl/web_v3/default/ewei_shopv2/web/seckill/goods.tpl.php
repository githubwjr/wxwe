<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">商品查看 <small>
    <?php  if(!empty($task)) { ?>所属专题: <?php  echo $task['id'];?>-<?php  echo $task['title'];?><?php  } ?>
    <?php  if(!empty($room)) { ?>会场: <?php  echo $room['id'];?>-<?php  echo $room['title'];?><?php  } ?></small></span>
</div>
<div class="page-content">
    <form action="./index.php" method="get" class="form-horizontal form-search" role="form">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r" value="seckill.goods" />
        <input type="hidden" name="taskid" value="<?php  echo $_GPC['taskid'];?>" />
        <input type="hidden" name="roomid" value="<?php  echo $_GPC['roomid'];?>" />
        <div class="page-toolbar row m-b-sm m-t-sm">
            <div class="col-sm-4">
            </div>

            <div class="col-sm-6 pull-right">
                <div class="input-group">
                    <div class="input-group-select">
                        <select name="time" class='form-control'>
                            <option value="" <?php  if($_GPC['time'] === '') { ?> selected<?php  } ?>>时间段</option>
                            <?php  if(is_array($alltimes)) { foreach($alltimes as $i) { ?>
                            <option value="<?php  echo $i;?>" <?php  if($_GPC['time']=== $i) { ?>selected<?php  } ?>><?php  echo $i;?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                    <input type="text" class=" form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="专题名称/会场名称/商品名称">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"> 搜索</button>
                    </span>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="post">
        <?php  if(count($list)>0) { ?>
        <table class="table table-responsive table-hover" >
            <thead class="navbar-inner">
            <tr>
                <th style="width: 50px;">商品</th>
                <th  style="">&nbsp;</th>

                <th style="" >秒杀价格</th>
                <th style="" >已付款/未付款/库存</th>
                <th style="width: 45px;">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>

            <tr>
                <td style="vertical-align: top">
                    <img src="<?php  echo tomedia($row['thumb'])?>" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'" />
                </td>
                <td class='full' style="overflow-x: hidden">

                    <?php  echo $row['title'];?><br/>
                    <a href="<?php  echo webUrl('seckill/task/edit',array('id'=>$row['taskid']))?>" target="_blank"><span class="label label-primary"><?php  echo $row['tasktitle'];?></span></a>
                    <a href="<?php  echo webUrl('seckill/room/edit',array('id'=>$row['roomid'],'taskid'=>$row['taskid']))?>" target="_blank"><span class="label label-warning"><?php  echo $row['roomtitle'];?></span></a>
                    <span class="label label-danger"><?php  echo $row['time'];?>点</span>
                </td>

                <td><span class="text text-danger" style="font-size:14px">&yen; <?php  echo $row['price'];?></span><br />
                    <span style="text-decoration: line-through;color:#666;">&yen;<?php  echo $row['marketprice'];?></span></td>
                <td><?php  echo $row['count']-$row['notpay']?>&nbsp;/&nbsp;<?php  echo $row['notpay'];?>&nbsp;/&nbsp;<?php  echo $row['total'];?> </td>

                <td  style="overflow:visible;position:relative">
                    <?php if(cv('seckill.goods.delete')) { ?>
                    <a  class='btn btn-default btn-sm btn-op btn-operation' data-toggle='ajaxRemove' href="<?php  echo webUrl('seckill/goods/delete', array('id' => $row['id']))?>" data-confirm='确认取消此时间段该商品的秒杀？<br/><small>如果有多规格，所有规格将全部取消</small>'>
                        <span data-toggle="tooltip" data-placement="top" title="" data-original-title="取消">
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
                    <td class="text-right" colspan="5"><?php  echo $pager;?></td>
                </tr>
            </tfoot>
        </table>

        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何商品!
            </div>
        </div>
        <?php  } ?>

    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
