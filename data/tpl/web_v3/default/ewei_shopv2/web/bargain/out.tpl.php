<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">已下架</span>
</div>
<div class="page-content">
    <form action="" method="post" class="form-horizontal form-search" role="form">
        <?php if(cv('bargain.warehouse')) { ?>
        <span class=''>
            <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('bargain/warehouse');?>"><i class='fa fa-plus'></i> 添加商品</a>
        </span>
        <?php  } ?>
        <div class="input-group pull-right col-md-6">
            <input type="text" class="input-sm form-control" name="search"  value="<?php  echo $_GPC['search'];?>" placeholder="商品名称" > <span class="input-group-btn">
            <button class="btn btn-sm btn-primary" type="submit" style="float: left"> 搜索</button> </span>
        </div>
    </form>
    <br>
    <form action="./index.php" method="get" class="form-horizontal form-search" role="form">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r"  value="goods" />
        <input type="hidden" name="goodsfrom" value="sale" />
    </form>
    <?php  if(count($onSell)>0) { ?>
    <table class="table table-hover table-responsive">
        <thead class="navbar-inner">
        <tr>
            <th style="width:60px;">商品</th>
            <th  style="width:180px;">&nbsp;</th>
            <th style="width:80px;" >标价</th>
            <th style="width:80px;" >底价</th>
            <th style="width:80px;" >库存</th>
            <th style="width:150px;" >状态</th>
            <th style="">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($onSell)) { foreach($onSell as $key => $value) { ?>
        <tr>
            <td>
                <img src="<?php  echo tomedia($value['thumb']);?>" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;"  onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'"/>
            </td>
            <td class='full' style="overflow-x: hidden">
                <br/>
                <a><?php  echo $value['title'];?></a>
            </td>
            <td>
                <a><?php  echo $value['marketprice'];?></a>
            </td>

            <td>
                <a><?php  echo $value['end_price'];?></a>
            </td>
            <td>
                <a><?php  echo $value['total'];?></a>
            </td>
            <td><font color="#ff1c17">对应商品已下架</font></td>

            <td  style="overflow:visible;position:relative">
                <?php if(cv('bargain.act')) { ?><a  class='btn btn-default btn-sm' data-toggle="ajaxRemove" href="<?php  echo webUrl('bargain/recover',array('goods'=>$value['goods_id']));?>" data-confirm='对应商品将重新上架，你确认要这么做吗？'><i class='fa fa-hand-o-up'></i> 上架</a><?php  } ?>
                <?php if(cv('bargain.react')) { ?><a  class='btn btn-default btn-sm' href="<?php  echo webUrl('bargain/react',array('actid'=>$value['id']));?>" title="编辑"><i class='fa fa-edit'></i> 编辑</a><?php  } ?>
                <?php if(cv('bargain.huishou')) { ?><a  class='btn btn-default btn-sm' data-toggle="ajaxRemove" href="<?php  echo webUrl('bargain/huishou',array('id'=>$value['id']));?>" data-confirm='确认删除此商品？'><i class='fa fa-trash'></i> 删除</a><?php  } ?>

            </td>
        </tr>
        <?php  } } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right"><?php  echo $pager;?></td>
            </tr>
        </tfoot>
    </table>
    <?php  } else { ?>
    <div class="panel panel-default">
        <div class="panel-body empty-data">暂时没有任何商品!</div>
    </div>
    <?php  } ?>
</div>
<script language="javascript">myrequire(['web/init'],function(){
    if($('.form-validate').length<=0) {  $('#page-loading').remove(); }
});</script>
<div id="page-loading" style="position: fixed;width:100%;height:100%;background:rgba(255,255,255,0.8);left:0;top:0;z-index:9999">
    <div class="sk-spinner sk-spinner-double-bounce" style="position:fixed;top:50%;left:50%;width:40px;height:40px;margin-left:-20px;margin-top:-20px;">
        <div class="sk-double-bounce1"></div>
        <div class="sk-double-bounce2"></div>
    </div>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>