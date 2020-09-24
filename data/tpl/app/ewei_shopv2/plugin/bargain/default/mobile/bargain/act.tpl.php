<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/bargain/static/css/bargain.css">
<script>document.title = "我发起的砍价"; </script>
<div class="fui-page-group bargain">
    <div class="fui-page fui-page-current">
        <?php  if(is_h5app()) { ?>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back"></a>
            </div>
            <div class="title">我发起的砍价</div>
            <div class="fui-header-right"></div>
        </div>
        <?php  } ?>
        <div class="fui-content navbar">
            <div id="recommand">
                <?php  if(!empty($goods)) { ?>
                <div class="fui-goods-group border">
                    <?php  if(is_array($goods)) { foreach($goods as $key => $value) { ?>
                    <a class="fui-goods-item" data-goodsid="8" href="<?php  echo mobileUrl('bargain/bargain',array('id'=>$value[0]['actor_id'],));?>" data-nocache="true">
                        <div class="image" data-lazyloaded="true"  style="background-image: url(<?php  $tt = json_decode($value[0]['images'],true);echo tomedia($tt['0']);?>);"></div>
                        <div class="detail goods_list_detail">
                            <div class="name"><?php  echo $value[0]['title'];?></div>
                            <?php  if($value[0]['type'] == 0) { ?>
                                <?php  if($value[0]['label_swi'] == 2) { ?>
                                 <div class='status'>已结束</div>
                                <?php  } ?>
                                <?php  if($value[0]['label_swi'] == 1) { ?>
                                <div class='status'>已超时</div>
                                <?php  } ?>
                                <?php  if($value[0]['label_swi'] == 3) { ?>
                                <div class='status danger'>已到底价</div>
                                <?php  } ?>
                                <?php  if($value[0]['label_swi'] == 0) { ?>
                                <div class='status success'>进行中</div>
                                <?php  } ?>
                            <div class="price">
                                <?php  if($value[0]['label_swi'] == 0) { ?>
                                <div class='text original'>原价：￥<?php  echo $value[0]['now_price'];?></div>
                                <?php  } ?>
                            </div>
                            <div class='currentPrice'>
                                当前价:￥<?php  echo $value[0]['now_price'];?>
                                <text class='floorPrice'></text>
                            </div>
                            <?php  } ?>
                            <?php  if($value[0]['type'] == 1) { ?>
                                <?php  if($value[0]['label_swi'] == 2) { ?>
                                <div class='status'>已结束</div>
                                <?php  } ?>
                                <?php  if($value[0]['label_swi'] == 1) { ?>
                                <div class='status'>已超时</div>
                                <?php  } ?>
                                <?php  if($value[0]['label_swi'] == 3) { ?>
                                <div class='status danger'>已到底价</div>
                                <?php  } ?>
                                <?php  if($value[0]['label_swi'] == 0) { ?>
                                <div class='status success'>进行中</div>
                                <?php  } ?>
                                <div class="price">
                                    <?php  if($value[0]['label_swi'] == 0) { ?>
                                        <div class="text">底价：￥<?php  echo $value[0]['end_price'];?></div>
                                    <?php  } ?>
                                </div>
                                <div class='currentPrice'>
                                    当前价:￥<?php  echo $value[0]['now_price'];?>
                                    <text class='floorPrice'></text>
                                </div>
                            <?php  } ?>
                        </div>
                        <div class='fui-goods-remark icon icon-jiantou-copy'></div>
                    </a>
                    <?php  } } ?>
                </div>
                <?php  } else { ?>
                <div class='empty'>
                    <div>暂无砍价中商品</div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</div>

<div class="fui-navbar footer-nav bordert" style="z-index:10;padding:0;position:absolute">

    <a href="<?php  echo mobileUrl();?>" class="nav-item external" data-nocache="true">
        <span class="icon icon-home"></span>
        <span class="label">商城首页</span>
    </a>

    <a href="<?php  echo mobileUrl('bargain');?>" class="nav-item external" data-nocache="true">
        <span class="icon icon-all"></span>
        <span class="label">全部砍价</span>
    </a>
    <a href="<?php  echo mobileUrl('bargain/act');?>" class="nav-item active external" id="menucart" data-nocache="true">
        <span class="icon icon-all1"></span>
        <span class="label">砍价中</span>
    </a>
    <a href="<?php  echo mobileUrl('bargain/purchase');?>" class="nav-item external" data-nocache="true">
        <span class="icon icon-money"></span>
        <span class="label">已购买</span>
    </a>
</div>

<span style="display:none"></span>


<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>