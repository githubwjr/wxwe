<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>


<div class="panel panel-default panel-class" style="padding:10px;margin-top:20px;">
    <div class="panel-heading">
        收银台订单
    </div>
    <div class="panel-body" >
        <form action="./cashier.php" method="get" class="form-horizontal" role="form" id="form1">
            <input type="hidden" name="i" value="<?php  echo $_GPC['i'];?>" />
            <input type="hidden" name="r" value="order" />
            <div class='row  m-b-sm m-t-sm moresearch' style='overflow: hidden;'>
                <div class="page-toolbar row m-b-sm m-t-sm ">
                    <div class="col-sm-5">

                        <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh' style='float:left;'><i class='fa fa-refresh'></i></button>

                        <?php  echo tpl_daterange('time', array('sm'=>true, 'placeholder'=>'支付时间'),true);?>
                    </div>


                    <div class="col-sm-5 pull-right">

                        <select name='operatorid'  class='form-control  input-sm select-sm'   style="width:120px;"  >

                            <option value=''>选择操作员</option>
                            <?php  if(is_array($operator)) { foreach($operator as $op) { ?>
                            <option value='<?php  echo $op["id"];?>' <?php  if($_GPC['operatorid']===(string)$op["id"]) { ?>selected<?php  } ?>><?php  echo $op["title"];?></option>
                            <?php  } } ?>

                        </select>

                        <select name='paytype'  class='form-control  input-sm select-sm'   style="width:120px;"  >

                            <option value=''>支付方式</option>
                            <?php  if(is_array(CashierModel::$paytype)) { foreach(CashierModel::$paytype as $kpay => $pay) { ?>
                            <option value='<?php  echo $kpay;?>' <?php  if($_GPC['paytype']===(string)$kpay) { ?>selected<?php  } ?>><?php  echo $pay;?></option>
                            <?php  } } ?>
                        </select>

                        <select name='status'  class='form-control  input-sm select-sm'   style="width:120px;"  >

                            <option value=''>付款状态</option>
                            <option value='0' <?php  if($_GPC['status']=='0') { ?>selected<?php  } ?>>未支付</option>
                            <option value='1' <?php  if($_GPC['status']=='1') { ?>selected<?php  } ?>>已支付</option>

                        </select>

                        <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm" disabled> 流水金额</button>
                                                </span>
                            <input type="text" class="form-control input-sm" value="<?php  echo $total_money;?>元" placeholder="" disabled/>
                            <span class="input-group-btn">
                                                    <button class="btn btn-sm" type="submit"> 查询</button>
                                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-hover no-margins">
            <thead>
            <tr>
                <th class="col-sm-1">状态</th>
                <th class="col-sm-2">订单号</th>
                <th class="col-sm-1">日期</th>
                <th class="col-sm-1">操作员</th>
                <th class="col-sm-1">支付方式</th>
                <th class="col-sm-1">金额</th>
                <th class="col-sm-1">商品金额<br/>商城商品</th>
                <th class="col-sm-1">随机减<br/>满额减</th>
                <th class="col-sm-1">余额抵扣<br/>固定折扣</th>
                <th class="col-sm-1">优惠券减免<br/>赠送积分</th>
                <th class="col-sm-1">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $key => $value) { ?>
            <tr data-status="<?php  echo $value['status'];?>">
                <td id="<?php  echo $value['id'];?>"><?php  if($value['status'] == '1') { ?><span class="label label-primary">已支付</span><?php  } else if($value['status'] == '-1') { ?><span class="label label-warning">已退款</span><?php  } else { ?><span class="label label-default">未支付</span><?php  } ?></td>
                <td ><?php  echo $value['logno'];?></td>
                <td><?php  echo date('Y-m-d H:i',$value['createtime'])?></td>
                <td><?php  if(empty($value['operatorid'])) { ?>管理员<?php  } else { ?><?php echo isset($operator[$value['operatorid']]) ? $operator[$value['operatorid']]['title'] : ''?><?php  } ?></td>
                <td><?php  echo CashierModel::$paytype[$value['paytype']]?></td>
                <td><?php  echo $value['money'] + $value['deduction']?></td>
                <td>
                    <span <?php  if(floatval($value['goodsprice'])>0) { ?>class="text-white label label-primary"<?php  } ?>><?php  echo $value['goodsprice'];?></span>
                    <br/>
                    <span <?php  if(floatval($value['orderprice'])>0) { ?>class="text-white label label-primary"<?php  } ?>><?php  echo $value['orderprice'];?></span>
                </td>
                <td>
                    <span <?php  if(floatval($value['randommoney'])>0) { ?>class="text-white label label-danger"<?php  } ?>><?php  echo $value['randommoney'];?></span>
                    <br/>
                    <span <?php  if(floatval($value['enough'])>0) { ?>class="text-white label label-danger"<?php  } ?>><?php  echo $value['enough'];?></span>
                </td>
                <td>
                    <span <?php  if(floatval($value['deduction'])>0) { ?>class="text-white label label-danger"<?php  } ?>><?php  echo $value['deduction'];?></span>
                    <br/>
                    <span <?php  if(floatval($value['discountmoney'])>0) { ?>class="text-white label label-danger"<?php  } ?>><?php  echo $value['discountmoney'];?></span>
                </td>
                <td>
                    <span <?php  if(floatval($value['usecouponprice'])>0) { ?>class="text-white label label-danger"<?php  } ?>><?php  echo $value['usecouponprice'];?></span>
                    <br/>
                    <span <?php  if(floatval($value['present_credit1'])>0) { ?>class="text-white label label-danger"<?php  } ?>><?php  echo $value['present_credit1'];?></span>
                </td>
                <td>
                    <?php  if($value['status'] == 1 && ($value['money'] + $value['deduction'])>0) { ?>
                    <button class="btn btn-sm refund" type="submit" data-toggle='ajaxPost' data-confirm="确认退款?" data-href="<?php  echo cashierUrl('order/refund',array('id'=>$value['id']))?>"> 退款</button>
                    <?php  } ?>
                    <?php  if($value['status'] == -1) { ?>
                    <span> 退款人<br><?php  if(!empty($operator[$value['refunduser']]['title'])) { ?><?php  echo $operator[$value['refunduser']]['title'];?><?php  } else { ?>管理员<?php  } ?></span>
                    <?php  } ?>
                </td>
            </tr>
            <?php  } } ?>
            <tr><td colspan="9"><?php  echo $pager;?></td></tr>
            </tbody>
        </table>
    </div>

</div>
<script>
    $(function () {
        $("table tbody tr").each(function (index,item) {
            var $itme = $(item);
            var td = $itme.find('td').eq(0);
            if ($.trim(td.text()) == '已支付' || $itme.data('status') == -1){
                return;
            }
            var id = td.attr('id');
            if (typeof id != 'undefined'){
                $.getJSON("<?php  echo cashierUrl('index/orderquery')?>"+"&orderid="+id,function (order) {
                    if (order.status == 1){
                        td.html('<span class="label label-primary">已支付</span>');
                    }
                })
            }
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
