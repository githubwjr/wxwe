<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "已下单的砍价"; </script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/bargain/static/css/bargain.css">
<div class="fui-page-group bargain"><div class="fui-page fui-page-current">
    <?php  if(is_h5app()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">已下单的砍价</div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } ?>

    <div class="fui-content navbar">
        <?php  if(!empty($goods)) { ?>
        <div id="recommand">
            <div class="fui-goods-group border">
                <?php  if(is_array($goods)) { foreach($goods as $key => $value) { ?>
                <!--<div class="fui-goods-item" data-goodsid="8">-->
                    <!--<a href="<?php  echo mobileUrl('bargain/bargain',array('id'=>$value[0]['actor_id'],));?>" data-nocache="true" class="external">-->
                        <!--<div class="image" data-lazyloaded="true" style="background-image: url(<?php  $tt = json_decode($value[0]['images'],true);echo tomedia($tt['0']);?>);"></div>-->
                    <!--</a>-->
                    <!--<div class="detail">-->
                        <!--<a href="<?php  echo mobileUrl('bargain/bargain',array('id'=>$value[0]['actor_id'],));?>" data-nocache="true" class="external">-->
                            <!--<div class="name" style="height: 2rem;"><?php  echo $value[0]['title'];?></div>-->
                        <!--</a>-->
                        <!--<div class="price" style="">-->
                            <!--<span class="text">成交价￥<?php  echo $value[0]['now_price'];?></span>-->
                            <!--<a href="<?php  echo mobileUrl('order/detail',array('id'=>$value[0]['order'],));?>" type="button" class="btn btn-primary" style="line-height:1.2;height: 1.4em;">查看订单</a>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <a class="fui-goods-item" data-goodsid="8" href="<?php  echo mobileUrl('bargain/bargain',array('id'=>$value[0]['actor_id'],));?>" data-nocache="true">
                    <div class="image" data-lazyloaded="true" style="background-image: url(<?php  $tt = json_decode($value[0]['images'],true);echo tomedia($tt['0']);?>);"></div>
                    <div class="detail goods_list_detail">
                        <div class="name"><?php  echo $value[0]['title'];?></div>
                        <div class="price">
                        </div>
                        <div class='currentPrice'>
                            成交价￥<?php  echo $value[0]['now_price'];?>
                        </div>
                    </div>
                    <div class='fui-goods-remark icon icon-jiantou-copy'></div>
                </a>
                <?php  } } ?>
            </div>
        </div>
        <?php  } else { ?>
        <div class='empty'>
            <div>暂无已购买商品</div>
        </div>
        <?php  } ?>
    </div>
</div></div>

<div class="fui-navbar footer-nav bordert" style="z-index:10;padding:0;position:absolute">
    <a href="<?php  echo mobileUrl();?>" class="nav-item external" data-nocache="true">
        <span class="icon icon-home"></span>
        <span class="label">商城首页</span>
    </a>
    <a href="<?php  echo mobileUrl('bargain');?>" class="nav-item external" data-nocache="true">
        <span class="icon icon-all"></span>
        <span class="label">全部砍价</span>
    </a>
    <a href="<?php  echo mobileUrl('bargain/act');?>" class="nav-item external" id="menucart" data-nocache="true">
        <span class="icon icon-all1"></span>
        <span class="label">砍价中</span>
    </a>
    <a href="<?php  echo mobileUrl('bargain/purchase');?>" class="nav-item active external" data-nocache="true">
        <span class="icon icon-money"></span>
        <span class="label">已购买</span>
    </a>
</div>
<span style="display:none"></span>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
