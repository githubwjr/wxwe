<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary">多商户概述</span>
</div>
<div class="page-content">
      <div class='page-toolbar'>
        <?php if(cv('merch.user.add')) { ?>
        	<a class='btn btn-primary btn-sm' href="<?php  echo webUrl('merch/user/add')?>"><i class='fa fa-plus'></i> 添加商户</a>
        <?php  } ?>
    </div>
    <div class="row">
    <div class="col-sm-4">
            <div class=" flex border summary">
                <div class="flex1 flex column">入驻申请中</div>
                <div class="flex1 flex column text-primary reg0 num">--</div>
            </div>
    </div>
        <div class="col-sm-4">
            <div class=" flex border summary">
                <div class="flex1 flex column">入驻申请驳回</div>
                <div class="flex1 flex column text-danger reg_1 num">--</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" flex border summary">
                <div class="flex1 flex column">待入驻商户</div>
                <div class="flex1 flex column text-primary user0 num">--</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" flex border summary">
                <div class="flex1 flex column">入驻中商户</div>
                <div class="flex1 flex column text-success user1 num">--</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" flex border summary">
                <div class="flex1 flex column">暂停中商户</div>
                <div class="flex1 flex column text-warning user2 font-bold num">--</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" flex border summary">
                <div class="flex1 flex column">即将到期商户</div>
                <div class="flex1 flex column text-danger user3 font-bold num">--</div>
            </div>
        </div>

    <div class="col-md-6 col-sm-6">
        <div class="summary_box float-e-margins" style="border: 1px solid #e7eaec">
            <div class="summary_title">
                <span class="text-default title_inner">总订单统计</span>
            </div>
            <div class="summary flex">
                <div class="flex1 flex column" style="border-right: 1px solid #efefef">
                    订单数
                    <h2 class="no-margins totalcount">--</h2>
                </div >
                <div class="flex1 flex column">
                    订单金额
                    <h2 class="no-margins text-danger">yen <span class="totalmoney">--</span></h2>
                </div>

            </div>
        </div>
    </div>
        <div class="col-md-6 col-sm-6">
            <div class="summary_box float-e-margins" style="border: 1px solid #e7eaec">
                <div class="summary_title">
                    <span class="text-default title_inner">已完成订单统计</span>
                </div>
                <div class="summary flex">
                    <div class="flex1 flex column"  style="border-right: 1px solid #efefef">
                        订单数
                        <h2 class="no-margins tcount">--</h2>
                    </div >
                    <div class="flex1 flex column">
                        订单金额
                        <h2 class="no-margins text-danger">yen <span class="tmoney">--</span></h2>
                    </div>

                </div>
            </div>
        </div>
</div>
</div>
<script>

    $(function(){
        $.ajax({
            type: "GET",
            url: "<?php  echo webUrl('merch/index/ajaxuser')?>",
            dataType: "json",
            success: function (data) {
                var json = data.result;
                $(".reg0").text(json.reg0);
                $(".reg_1").text(json.reg_1);
                $(".user0").text(json.user0);
                $(".user1").text(json.user1);
                $(".user2").text(json.user2);
                $(".user3").text(json.user3);
                $(".totalmoney").text(json.totalmoney);
                $(".totalcount").text(json.totalcount);
                $(".tmoney").text(json.tmoney);
                $(".tcount").text(json.tcount);
            }
        });
    });


</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
