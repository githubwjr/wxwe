<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
         border: none;
        border-top: 1px solid #efefef;
    }
</style>
<div class="page-header">
    当前位置：<span class="text-primary">兑换记录 </span>
</div>
<div class="page-content">
<form action="" method="get">
<div class="page-content" style="display: block;">
    <div class="main">
        <div class="page-toolbar m-b-sm m-t-sm">
                <input type="hidden" name="c" value="site">
                <input type="hidden" name="a" value="entry">
                <input type="hidden" name="m" value="ewei_shopv2">
                <input type="hidden" name="do" value="web">
                <input type="hidden" name="r" value="exchange.history">
                <input type="hidden" name="type" value="success">
                <div class="col-sm-6">
                    <div class="btn-group btn-group-sm">

                        <script type="text/javascript">
                            require(["daterangepicker"], function($){
                                $(function(){
                                    $(".daterange.daterange-time").each(function(){
                                        var elm = this;
                                        $(this).daterangepicker({
                                            startDate: $(elm).prev().prev().val(),
                                            endDate: $(elm).prev().val(),
                                            format: "YYYY-MM-DD HH:mm",
                                            timePicker: true,
                                            timePicker12Hour : false,
                                            timePickerIncrement: 1,
                                            minuteStep: 1
                                        }, function(start, end){
                                            $(elm).find(".date-title").html(start.toDateTimeStr() + " 至 " + end.toDateTimeStr());
                                            $(elm).prev().prev().val(start.toDateTimeStr());
                                            $(elm).prev().val(end.toDateTimeStr());
                                        });
                                    });
                                });
                            });
                        </script>

                        <input name="start" type="hidden" value="2016-10-01 00:00">
                        <input name="end" type="hidden" value="2016-10-01 00:00">
                        <button class="btn btn-default daterange daterange-time" type="button"><span class="date-title">2016-10-01 00:00 至 2016-10-01 00:00</span> <i class="fa fa-calendar"></i></button>
                    </div>
                </div>
                <div class="col-sm-6 pull-right">
                    <div class="input-group">
                        <div class="input-group-select">
                            <select name="kdtype" class="form-control  input-sm select-md" >
                                <option value="code">兑换编号</option>
                                <option value="goodstitle">商品名称</option>
                                <option value="openid">openid</option>
                                <option value="nickname">昵称</option>
                                <option value="group">兑换任务</option>
                            </select>
                        </div>
                        <div class="input-group-select">
                            <select name="group" class="form-control  input-sm select-md" >
                                <option value="all">全部分组</option>
                                <option value="goods">商品兑换</option>
                                <option value="balance">余额兑换</option>
                                <option value="red">红包兑换</option>
                                <option value="score">积分兑换</option>
                                <option value="coupon">优惠券兑换</option>
                                <option value="group">组合兑换</option>
                            </select>
                        </div>
                        <input type="text" class="form-control input-sm" name="keyword" value="" placeholder="请输入关键词">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" id="so"> 搜索</button>
                    </span>
                    </div>
                </div>
        </div>
        <div class="panel-default">
            <div class="panel-body table-responsive" style="padding:0;">
                <?php  if(count($record)>0) { ?>
                <form action="" method="post">
                    <table class="table table-hover ">
                        <thead class="navbar-inner">
                        <tr>
                            <th style="width:80px; text-align: center;">类型</th>
                            <th style="width:160px;text-align: center;">兑换码编号</th>
                            <th style="width:150px;text-align: center;">所属任务</th>
                            <th style="width:130px;text-align: center;">兑换时间</th>
                            <th style="width:80px;text-align: center;">昵称</th>
                            <th style="width:119px;text-align: center;">兑换详情</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center;">
                        <?php  if(is_array($record)) { foreach($record as $key => $value) { ?>
                        <tr>
                            <td><a class="label label-<?php  if($value['mode']==1) { ?>primary<?php  } else if($value['mode']==2) { ?>success<?php  } else if($value['mode']==3) { ?>danger<?php  } else if($value['mode']==4) { ?>warning<?php  } else if($value['mode']==5) { ?>default<?php  } else if($value['mode']==6) { ?>info<?php  } ?>"><?php  if($value['mode']==1) { ?>商品<?php  } else if($value['mode']==2) { ?>余额<?php  } else if($value['mode']==3) { ?>红包<?php  } else if($value['mode']==4) { ?>积分<?php  } else if($value['mode']==5) { ?>优惠券<?php  } else if($value['mode']==6) { ?>组合<?php  } ?></a></td>
                            <td><?php  echo $value['serial'];?></td>
                            <td><?php  echo $value['title'];?></td>
                            <td><?php  echo date('Y-m-d H:i',$value['time']);?></td>
                            <td><a href="<?php  echo webUrl('exchange/history',array('kdtype'=>nickname,'keyword'=>$value['nickname']));?>"><?php  echo $value['nickname'];?></a></td>
                            <td style="cursor: pointer"><a class="text-primary" data-toggle="ajaxModal" data-href="<?php  echo webUrl('exchange/history/detail',array('key'=>$value['key'],'id'=>$value['id']),1);?>">点击查看</a></td>
                        </tr>
                        <?php  } } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: right"><?php  echo $pager;?></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                <div style="text-align:right;width:100%;">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
    <?php  } else { ?>
    <div class="panel panel-default">
        <div class="panel-body empty-data">暂时没有任何兑换记录</div>
    </div>
    <?php  } ?>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
