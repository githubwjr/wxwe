<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "砍价商品详情"; </script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/bargain/static/css/iconfont.css">
<!--<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/static/fonts/iconfont.css">-->
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/bargain/static/css/style.css">
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/bargain/static/css/bargain.css">
<script language="javascript" type="text/javascript">
    var interval = 1000;
    function ShowCountDown(year,month,day,hour,minute,second,status,divname)
    {
        var now = new Date();
        var endDate = new Date(year, month-1, day,hour,minute,second);
        var leftTime=endDate.getTime()-now.getTime();
        var leftsecond = parseInt(leftTime/1000);
        //var day1=parseInt(leftsecond/(24*60*60*6));
        var day1=Math.floor(leftsecond/(60*60*24));
        var hour=Math.floor((leftsecond-day1*24*60*60)/3600);
        var minute=Math.floor((leftsecond-day1*24*60*60-hour*3600)/60);
        var second=Math.floor(leftsecond-day1*24*60*60-hour*3600-minute*60);
        var cc = document.getElementById(divname);
        if (status == 0) {
            cc.innerHTML = "未开始";
            return;
        }else if(status == 1){
            cc.innerHTML = "已结束";
            return;
        }else{
            cc.innerHTML = "剩余:"+day1+"天"+hour+"小时"+minute+"分"+second+"秒";
        }
    }
    window.setInterval(function(){ShowCountDown(<?php  echo $year;?>,<?php  echo $month;?>,<?php  echo $day;?>,<?php  echo $hour;?>,<?php  echo $minute;?>,<?php  echo $second;?>,<?php  echo $status;?>,'divdown2');}, interval);
</script>
<script  language='javascript'>
    function getHeight (obj){
        var w = obj.width;
        var h = obj.height;
        console.error('h:'+ h +'     w:'+w)

        var height = ((750*h) / w) / 40 + 'rem';
        $('.fui-swipe').css('height', height );
        $('.fui-swipe .fui-swipe-wrapper .fui-swipe-item img').css('height', height);
    }
</script>
<div class='fui-page-group'>
    <div class='fui-page fui-page-current'>
        <?php  if(is_h5app()) { ?>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back"></a>
            </div>
            <div class="title">砍价商品详情</div>
            <div class="fui-header-right"></div>
        </div>
        <?php  } ?>
        <div class='fui-content'>
            <div class='fui-swipe' data-speed='5000' data-gap ='2' style="height: 0">
                <div class='fui-swipe-wrapper'>
                    <?php  if(is_array($res['images'])) { foreach($res['images'] as $index => $key) { ?>
                    <div class="fui-swipe-item">
                        <?php  if($index == "0" ) { ?>
                        <img src="<?php  echo tomedia($key)?>" onload='getHeight(this)'/>
                        <?php  } else { ?>
                        <img src="<?php  echo tomedia($key)?>"/>
                        <?php  } ?>
                    </div>
                    <?php  } } ?>
                </div>
            </div>
            <div class="swipe-info" style="color: <?php  echo $res['custom']['countdown_color'];?>;">
                <font style="font-size: 20px;float: left;"><?php  echo $res['custom']['countdown'];?></font> <font id="divdown2"></font>
            </div>
            <div class="lynn_goods_head">
                <div class="fui-cell-group fui-detail-group" style='margin-top:0'>
                    <div class="fui-cell">
                        <div class="fui-cell-text name">
                            <text selectable="true"><?php  echo $res['title'];?></text>
                        </div>
                        <a href="<?php  echo mobileUrl('bargain/rule',array('id'=>$id))?>"   data-nocache="true" class="fui-cell-remark rule" style="margin-left: 60rpx;">
                            <i style="font-size:0.9rem;color: #fd5555;" class="icon icon-renwu"></i>
                            <div style="font-size: 0.5rem;cloor: #666;margin-top:-0.25rem;">规则</div>
                        </a>
                    </div>
                    <p class="subtitle"><?php  echo $res['title2'];?></p>
                    <div class="fui-cell price">
                        <?php  if($res['type']==1) { ?>
                        <div class="fui-list-inner">
                            <text style='display:inline-block;line-height:1.2rem'>底价</text>
                            <text class='miniprice' selectable="true">￥<?php  echo $res['end_price'];?></text>
                            <text class='original_price'>￥<?php  echo $res['start_price'];?></text>
                        </div>
                        <?php  } ?>
                        <?php  if($res['type']==0) { ?>
                        <div class="fui-list-inner">
                            <text class='miniprice' selectable="true" style="color:<?php  echo $res['custom']['cutmore_color'];?>"><?php  echo $res['custom']['cutmore'];?></text>
                            <text class='original_price'>￥<?php  echo $res['start_price'];?></text>
                        </div>
                        <?php  } ?>
                    </div>
                    <div class="fui-cell">
                        <div class="fui-cell-text number">
                            已有<?php  echo $res['act_times'];?>人参与砍价
                        </div>
                    </div>
                </div>
                <div class="lynn-goods-head-user">
                    <div class='detail-rule'>
                        <div class='detail-rule-top'>
                            砍价流程
                        </div>
                        <div class='detail-rule-bottom'>
                            <div class='step active'>
                                <div class='num'>1</div>
                                <div class='text'>选择心仪商品</div>
                            </div>
                            <div class='step'>
                                <div class='num'>2</div>
                                <div class='text'>邀请好友砍价</div>
                            </div>
                            <div class='step'>
                                <div class='num'>3</div>
                                <div class='text'>砍到底价后支付</div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-info content content-images">
                        <div class="detail-info-title"><span>图文详情</span></div>
                        <div class="detail-info-content">
                            <?php  echo htmlspecialchars_decode($res['content']);?>
                        </div>
                        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
                    </div>
                </div>
                <div style="height:2.5rem;"></div>
            </div>
        </div>
        <div class="fui-navbar footer-nav bordert" style="z-index:10;padding:0;">
            <a href="<?php  echo mobileurl(bargain);?>" class="nav-item home-btn" data-nocache="true">
                <span class="icon icon-home1"></span>
                <span class="label">首页</span>
            </a>
            <a href="<?php  echo mobileurl('bargain/act');?>" class="nav-item home-btn">
                <span class="icon icon-my1"></span>
                <span class="label">个人</span>
            </a>
            <a href="<?php  echo mobileUrl('order/create',array('id'=>$res['goods_id']));?>" class="nav-item lynn-bargain-a lynn-bargain-now-a" data-nocache="true"><span>原价购买</span></a>
            <?php  if($swi==0) { ?>
            <a <?php  if(!$act_swi['id']) { ?>href="<?php  echo mobileurl('bargain/join',array('goods'=>$res['id']));?>"<?php  } else { ?>onclick="FoxUI.confirm('您已经发起过一次本商品的砍价活动,是否立即查看？','砍价提示',callback)"<?php  } ?> class="nav-item lynn-bargain-a lynn-bargain-share-a external"><span style="border: 1px solid <?php  echo $res['custom']['btn_color'];?>;background-color: <?php  echo $res['custom']['btn_color'];?>" data-nocache="true">立即砍价</span></a><?php  } ?>
            <?php  if($swi==1) { ?><a class="nav-item lynn-bargain-a lynn-bargain-now-a"><span style="color: #ccc">尚未开始</span></a><?php  } ?>
            <?php  if($swi==2) { ?><a href="" class="nav-item lynn-bargain-a lynn-bargain-now-a"><span style="color: #ccc">已经结束</span></a><?php  } ?>
            <?php  if($swi==3) { ?><a href="" class="nav-item lynn-bargain-a lynn-bargain-now-a"><span style="color: #ccc">库存不足</span></a><?php  } ?>
        </div>
    </div>
    <script>

        function callback() {
            window.location.href = "<?php  echo mobileUrl('bargain/bargain',array('id'=>$act_swi['id']))?>";
        }
    </script>



    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>