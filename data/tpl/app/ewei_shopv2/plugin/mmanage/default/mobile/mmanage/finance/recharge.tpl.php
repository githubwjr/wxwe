<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('mmanage/common', TEMPLATE_INCLUDEPATH)) : (include template('mmanage/common', TEMPLATE_INCLUDEPATH));?>

<div class='fui-page fui-page-current'>
    <div class="fui-header fui-header-success">
        <div class="fui-header-left">
            <a class="back btn-back"></a>
        </div>
        <div class="title">会员充值</div>
        <div class="fui-header-right"></div>
    </div>
    <div class='fui-content navbar'>

        <input type="hidden" id="mid" value="<?php  echo $member['id'];?>" />
        <input type="hidden" id="changetype" value="0" />
        <input type="hidden" id="type" value="<?php  echo $type;?>" />

        <?php if(cv('finance.recharge.credit1&finance.recharge.credit2')) { ?>
            <div class="fui-tab-o fui-tab-success" id="tab">
                <a <?php  if(empty($type)) { ?>class="active"<?php  } ?> data-type="0">余额</a>
                <a <?php  if(!empty($type)) { ?>class="active"<?php  } ?> data-type="1">积分</a>
            </div>
        <?php  } ?>

        <div class="fui-list-group">
            <div class="fui-list">
                <div class="fui-list-media external">
                    <img src="<?php  echo $member['avatar'];?>" class="round">
                </div>
                <div class="fui-list-inner">
                    <div class="title" id="nickname"><?php echo empty($member['nickname'])?"未更新":$member['nickname']?></div>
                    <div class="subtitle">
                        <span class="total half">当前余额: <?php  echo $member['credit2'];?></span>
                        <span class="total half">当前积分: <?php  echo $member['credit1'];?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="fui-cell-group">
            <div class="fui-cell check-param" data-action="changetype">
                <div class="fui-cell-label">更变类型</div>
                <div class="fui-cell-info">增加<span class="credit_text"><?php echo $type==1?"积分":"余额"?></span></div>
                <div class="fui-cell-remark"></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-label">充值数目</div>
                <div class="fui-cell-info">
                    <input type="number" placeholder="请输入充值数目" class="fui-input" id="num">
                </div>
            </div>
            <div class="fui-cell fui-cell-textarea">
                <div class="fui-cell-label " style="margin-top: 0;">备注说明</div>
                <div class="fui-cell-info">
                    <textarea rows="3" placeholder="请输入备注说明" id="remark"></textarea>
                </div>
            </div>
        </div>

        <?php if(cv('finance.recharge.credit1|finance.recharge.credit2')) { ?>
            <div class="btn btn-success indent" id="btn-submit">确认充值</div>
        <?php  } ?>

    </div>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('mmanage/_tpl/recharge_params', TEMPLATE_INCLUDEPATH)) : (include template('mmanage/_tpl/recharge_params', TEMPLATE_INCLUDEPATH));?>

    <script language="javascript">
        require(['../addons/ewei_shopv2/plugin/mmanage/static/js/recharge.js'],function(modal){
            modal.initRecharge();
        });
    </script>

</div>
<?php  $this->footerMenus(null, $texts)?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
