<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "奖品说明"; </script>

<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/lottery/static/style/lotteryreward.css?<?php  echo time();?>" />

<div class='fui-page  fui-page-current'>

    <div class="fui-content">

        <div class="lottery-head">
            <img src="../addons/ewei_shopv2/plugin/lottery/static/images/lottery_banner.png" style="height: 10rem;width: 100%;">
        </div>
        <div class="lottery-title"><span class="title-left">奖品说明</span></div>
        <div class="lottery-content">
            <?php  if(!empty($reward)) { ?>
            <?php  if(is_array($reward)) { foreach($reward as $rank => $value) { ?>
            <?php  if(!empty($value['reward'])) { ?>
            <?php  if(!empty($value['reward']['credit'])) { ?>
            <p class="reward-item">
                <span class="item-left"><?php  echo $value['title'];?></span>
                <span class="item-center">积分</span><span class="item-right"><?php  echo $value['reward']['credit'];?></span>
            </p>
            <?php  } else if(!empty($value['reward']['bribery'])) { ?>
            <p class="reward-item">
                <span class="item-left"><?php  echo $value['title'];?></span>
                <span class="item-center">红包</span>
                <span class="item-right"><?php  echo $value['reward']['bribery']['num'];?>元</span>
            </p>
            <?php  } else if(!empty($value['reward']['money'])) { ?>
            <p class="reward-item"><span class="item-left"><?php  echo $value['title'];?></span>
                <span class="item-center"><?php  if($value['reward']['money']['type']==0) { ?>余额<?php  } else { ?>微信<?php  } ?>奖金</span>
                <span class="item-right"><?php  echo $value['reward']['money']['num'];?>元</span>
            </p>
            <?php  } else if(!empty($value['reward']['goods'])) { ?>
                <?php  if(is_array($value['reward']['goods'])) { foreach($value['reward']['goods'] as $key => $val) { ?>
                <p class="reward-item"><span class="item-left"><?php  echo $value['title'];?></span>
                    <span class="item-center">特惠商品</span>
                    <span class="item-right"><?php  echo $value['reward']['goods'][$key]['title'];?></span>
                </p>
                <?php  } } ?>
            <?php  } else if(!empty($value['reward']['coupon'])) { ?>
            <p class="reward-item">
                <span class="item-left"><?php  echo $value['title'];?></span>
                <?php  if(is_array($value['reward']['coupon'])) { foreach($value['reward']['coupon'] as $key => $val) { ?>
                    <?php  if(!empty($value['reward']['coupon'][$key]['couponname'])) { ?>
                    <span class="item-center"><?php  echo $value['reward']['coupon'][$key]['couponname'];?></span>
                    <span class="item-right">&nbsp;&nbsp;<?php  echo $value['reward']['coupon'][$key]['couponnum'];?>张</span>
                    <?php  } ?>
                <?php  } } ?>
            </p>
            <?php  } ?>
            <?php  } else { ?>
            <p class="reward-item"><span class="item-left"><?php  echo $value['title'];?></span><span class="item-center">无奖励</span><span class="item-right"></span></p>
            <?php  } ?>
            <?php  } } ?>
            <?php  } ?>
        </div>

    </div>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>


<!--weichengtech-->