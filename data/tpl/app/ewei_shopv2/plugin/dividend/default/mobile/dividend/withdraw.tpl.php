<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $page_title;?>";</script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/dividend/template/mobile/default/static/css/common.css">
<div class="fui-page fui-page-current">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $this->set['texts']['dividend1']?></div>
        <div class="fui-header-right"></div>
    </div>
    <div class="fui-content footbar">
        <div class='topmsg'>
            <div class='money'><?php  echo number_format($member['dividend_total'],2)?></div>
            <div><?php  echo $this->set['texts']['dividend_total']?>(<?php  echo $this->set['texts']['yuan']?>)</div>
        </div>
        <div class='overflow mar-top'>
            <icon class='fl icon icon-ketixianyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_ok']?></span>
            <span class='gold fr'><?php  echo number_format($member['dividend_ok'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='overflow mar-top'>
            <icon class='fl icon icon-yishenqingyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_apply']?></span>
            <span class='moneyitem fr'><?php  echo number_format($member['dividend_apply'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='overflow'>
            <icon class='fl icon icon-daidakuanyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_check']?></span>
            <span class='moneyitem fr'><?php  echo number_format($member['dividend_check'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='overflow'>
            <icon class='fl icon icon-wuxiaoyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_fail']?></span>
            <span class='moneyitem fr'><?php  echo number_format($member['dividend_fail'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='overflow'>
            <icon class='fl icon icon-chenggongtixianyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_pay']?></span>
            <span class='moneyitem fr'><?php  echo number_format($member['dividend_pay'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='overflow mar-top'>
            <icon class='fl icon icon-daishouhuoyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_wait']?></span>
            <span class='moneyitem fr'><?php  echo number_format($member['dividend_wait'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='overflow'>
            <icon class='fl icon icon-weijiesuanyongjin'></icon>
            <span class='fl'><?php  echo $this->set['texts']['dividend_lock']?></span>
            <span class='moneyitem fr'><?php  echo number_format($member['dividend_lock'],2)?> <?php  echo $this->set['texts']['yuan']?></span>
        </div>
        <div class='tips mar-top'>
            <div>用户须知</div>
            <icon class='iconfont'></icon>
        </div>
        <div class='tipsitem'>
            <!--<div>卖家确认收货后，立即获得分销佣金</div>-->
            <!--<div><span>注意：</span>可用佣金满<span>1元</span>后才能申请提现</div>-->
            <?php  if($this->set['settledays']>0) { ?>
            买家确认收货（<span class='text-orange'><?php  echo $this->set['settledays']?>天</span> )后，
            <?php  echo $this->set['texts']['dividend']?>可<?php  echo $this->set['texts']['withdraw']?>。结算期内，买家退货，
            <?php  echo $this->set['texts']['dividend']?>将自动扣除。
            <?php  } else { ?>
            买家确认收货后，立即获得<?php  echo $this->set['texts']['dividend1']?>
            <?php  } ?>
            <?php  if($this->set['withdraw']>0) { ?><br/>注意：可用<?php  echo $this->set['texts']['dividend']?>满 <span class='text-orange'><?php  echo $this->set['withdraw']?><?php  echo $this->set['texts']['yuan']?></span> 后才能申请<?php  echo $this->set['texts']['withdraw']?><?php  } ?>
        </div>

        <a <?php  if($cansettle ) { ?>href="<?php  echo mobileUrl('dividend/apply')?>"<?php  } ?> class="withdrawbtn<?php  if(!$cansettle ) { ?> disabled<?php  } ?>">我要<?php  echo $this->set['texts']['withdraw']?></a

    </div>
    <!--<div class="share-footbar">-->
        <!--<a  href="http://lgt.clubmall.cn/app/index.php?i=35&c=entry&m=ewei_shopv2&do=mobile&r=dividend.index"  class='item '>-->
            <!--<i class="icon icon-dividendhome"></i>-->
            <!--<span class='text'>分红中心</span>-->
        <!--</a>-->
        <!--<a href="http://lgt.clubmall.cn/app/index.php?i=35&c=entry&m=ewei_shopv2&do=mobile&r=dividend.withdraw" class='item active'>-->
            <!--<i class="icon icon-fenxiaoyongjin1"></i>-->
            <!--<span class='text'>分红佣金</span>-->
        <!--</a>-->
        <!--<a href="http://lgt.clubmall.cn/app/index.php?i=35&c=entry&m=ewei_shopv2&do=mobile&r=dividend.order" class='item '>-->
            <!--<i class="icon icon-fenxiaodingdan1"></i>-->
            <!--<span class='text'>分红订单</span>-->
        <!--</a>-->
        <!--<a href="http://lgt.clubmall.cn/app/index.php?i=35&c=entry&m=ewei_shopv2&do=mobile&r=dividend.down" class='item'>-->
            <!--<i class="icon icon-wodetuandui2"></i>-->
            <!--<span class='text'>我的下线</span>-->
        <!--</a>-->
    <!--</div>-->
</div>
<div class="blank" style="display: none;width: 100%;height: 1.7rem;position: fixed;left: 0;right: 0;bottom: 0;background: #fff;"></div>

<script>
    $(function () {
        setTimeout(function () {
            var width = window.screen.width *  window.devicePixelRatio;
            var height = window.screen.height *  window.devicePixelRatio;
            var h = document.body.offsetHeight *  window.devicePixelRatio;
            //  微信版本6.6.7
            if(h == 1923){
                $(".withdrawbtn").css('bottom','0');
                $(".blank").css('display','none');
                return;
            }

            if(height==2436 && width==1125){
                $(".withdrawbtn").css('bottom','1.7rem');
                $(".blank").css('display','block');
            }
        },600)
    })
</script>
