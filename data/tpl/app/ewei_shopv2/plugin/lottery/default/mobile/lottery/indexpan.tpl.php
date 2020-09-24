<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $lottery['lottery_title'];?>"; </script>

<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/lottery/static/style/mobilepan.css?<?php  echo time();?>" />

<div class='fui-page  fui-page-current'>

    <div class="fui-content lottery-content">
        <?php  if(!empty($lottery) ) { ?>
        <div class="lottery-title">
            <marquee direction=left scrollamount=6 style="color: #ffffff;background: #000000;opacity: 0.7;">
                <?php  if(!empty($log)) { ?>

                <?php  if(is_array($log)) { foreach($log as $key => $value) { ?>
                <?php  if(!empty($value['lottery_data'])) { ?>
                <?php  $value['lottery_data']=unserialize($value['lottery_data'])?>
                <?php  if(isset($value['lottery_data']['credit'])) { ?>
                <?php  $reward_name='积分';?>
                <?php  } else if(isset($value['lottery_data']['money'])) { ?>
                <?php  $reward_name='奖金';?>
                <?php  } else if(isset($value['lottery_data']['bribery'])) { ?>
                <?php  $reward_name='红包';?>
                <?php  } else if(isset($value['lottery_data']['goods'])) { ?>
                <?php  $reward_name='特惠商品';?>
                <?php  } else if(isset($value['lottery_data']['coupon'])) { ?>
                <?php  $reward_name='优惠券';?>
                <?php  } ?>
                <?php  echo $value['nickname'];?>[抽到<?php  echo $reward_name;?>,时间:<?php  echo date('Y-m-d',$value['addtime']);?>]
                <?php  } ?>
                <?php  } } ?>

                <?php  } else { ?>
                暂无中奖记录...
                <?php  } ?>
            </marquee>
        </div>

        <style>
            .lottery-content{
                background: url("<?php  echo $lottery['lottery_banner'];?>");
                background-size: 100% 100%;
            }
        </style>
        <div class="lottery" >
            <div class="wheel"  style="overflow: hidden; padding: 0; width: 16.4rem; height: 16.4rem">
                <ul class="wheel-light">
                    <li><i></i><i></i><i></i><i></i></li>
                    <li><i></i><i></i><i></i><i></i></li>
                    <li><i></i><i></i><i></i><i></i></li>
                    <li><i></i><i></i><i></i><i></i></li>
                    <li><i></i><i></i><i></i><i></i></li>
                    <li><i></i><i></i><i></i><i></i></li>
                </ul>
                <div style="height: auto; margin: 1.2rem; overflow: hidden;border-radius: 14rem;">
                <ul id="wheel" class="wheel-list" style="position: relative; z-index: 0;  overflow: hidden; ">

                </ul>
                </div>
                <div id="pointer" class="wheel-pointer" ><i>GO</i></div>
            </div>
        </div>
        <div class="lottery_footer">
            <img class="lottery_memberhead" src="<?php  echo $member['avatar'];?>">
            <p>剩余抽奖次数:<span style="color: #ff3f4b" id="left_changes"><?php  echo intval($has_changes);?></span>次</p>
            <div class="lottery_row">
                <div class="lottery_col_6">
                    <a class="btn btn-danger" href="<?php  echo mobileUrl('lottery/index/lottery_reward',array('id'=>$lottery['lottery_id']),true);?>" style="width: 6rem;">奖励说明</a>
                </div>
                <div class="lottery_col_6">
                    <a class="btn btn-primary" href="<?php  echo mobileUrl('lottery/index/myreward',array(),true);?>" style="background-color: #13afbe;border-color: #13afbe;">我的中奖记录</a>
                </div>
            </div>
        </div>
        <?php  } else { ?>
            <p class="text-white text-center" style="font-size: 2.5rem;margin-top: 15rem">无活动</p>
        <?php  } ?>
    </div>

</div>
<div style="display: none" id="lottery_data">
    <?php  if(!empty($reward)) { ?>
    <?php  if(is_array($reward)) { foreach($reward as $rank => $value) { ?>
    <?php  if(!empty($value)) { ?>
    <div class="panel <?php  if($count==1) { ?> panel-primary <?php  } else { ?> panel-default <?php  } ?> " data-rank="<?php  echo $rank;?>" data-title="<?php  echo $value['title'];?>" data-icon="<?php  echo $value['icon'];?>" data-probability="<?php  echo $value['probability'];?>" onclick="rankclick(this);" >

    </div>
    <?php  } ?>
    <?php  } } ?>
    <?php  } ?>
</div>

<div id="model" style="display: none;">
    <div class="task-model">
        <div class="task-model-content" ><h4 id="model-title"></h4></div>
        <div class="task-model-footer task-btn-close">好的</div>
    </div>
</div>

<div id="failmodel" style="display: none;">
    <div class="task-model">
        <div class="task-model-faile-content" ><h4 id="model-failtitle"></h4></div>
        <div class="task-model-footer task-btn-close">好的，我知道了</div>
    </div>
</div>

<script type="text/javascript">
    <?php  if(!empty($lottery) ) { ?>
    function buildpan() {
        $('#wheel').empty();
        $('#lottery_data .panel').each(function () {
            var obj = $(this);
            var li_div = '<li class="jssuper"><i ></i><div class="prize"><h3>'+obj.data('title')+'</h3><div class="icon"><img src="'+obj.data('icon')+'"></div></div></li>';
            $('#wheel').append(li_div);
            var pn = $('#wheel').find('li').length;			// 块数
            if(pn<4){
                pn=4;
            }
            var pa = 360/pn;								// 每块角度
            for(var i=0; i<pn; i++){
                $('#wheel').find('li').eq(i).css('transform', 'rotate(' + pa*i + 'deg)').find('i').css('transform', 'rotate('+ (pa/2) + 'deg) skewY(' + (90-pa) + 'deg)')
            }
        });
    }
    function tabInfo(obj) {
        var tab_id = $(obj).data('value');
        if(tab_id=='rewardinfo'){
            $('#lotteryinfo').hide();
            $('#myreward').hide();
            $('a[data-value="lotteryinfo"]').removeClass('active');
            $('a[data-value="myreward"]').removeClass('active');
            $(obj).addClass('active');
            $('#rewardinfo').show();
        }
        if(tab_id=='lotteryinfo'){
            $('#rewardinfo').hide();
            $('#myreward').hide();
            $('a[data-value="rewardinfo"]').removeClass('active');
            $('a[data-value="myreward"]').removeClass('active');
            $(obj).addClass('active');
            $('#lotteryinfo').show();
        }
        if(tab_id=='myreward'){
            $('#rewardinfo').hide();
            $('#lotteryinfo').hide();
            $('a[data-value="rewardinfo"]').removeClass('active');
            $('a[data-value="lotteryinfo"]').removeClass('active');
            $(obj).addClass('active');
            $('#myreward').show();
        }
    }
    $(document).ready(function () {
        var changes = <?php  echo intval($has_changes);?>;
        buildpan();
        <?php  if(empty($_W['openid'])) { ?>
        require(['../addons/ewei_shopv2/plugin/lottery/static/js/indexpan.js'],function(modal){modal.init({is_login:0,id:<?php  echo $lottery['lottery_id'];?>});});
        <?php  } else { ?>
        var click=false;
        var runcount = 1;
        $('#pointer').on('click', function(){

            if(click){
                return false;
            }
            if(changes<=0){
                $('#model-failtitle').html('<?php  echo $lottery['lottery_cannot'];?>');
                taskget = new FoxUIModal({
                    content: $('#failmodel').html(),
                    extraClass: 'picker-modal',
                    maskClick: function () {
                        taskget.close()
                    }
                });
                taskget.container.find('.task-btn-close').click(function () {
                    taskget.close()
                });
                taskget.show();
                return ;
            }
            changes = changes - 1;
            $('#left_changes').html(changes);
            var reward = {};
            $.post('<?php  echo mobileUrl("lottery/index/getreward");?>',{lottery:<?php  echo $lottery['lottery_id'];?>},function (data) {
                if(data.status==1){
                    reward = data;
                    var num = data.id;
                    var pn = $('#wheel').find('li').length;
                    var pa = 360/pn;
                    $('#wheel').css('transform','rotate(' + (3600*runcount-num*pa) + 'deg)');
                    runcount++;
                    click=true;


                    setTimeout(function () {
                        if(reward.is_reward){
                            //领取成功
                            $.post('<?php  echo mobileUrl("lottery/index/reward");?>',{reward:parseInt(reward.id),lottery:<?php  echo $lottery['lottery_id'];?>},function (data) {
                                if(data.status==1){
                                    //领取成功
                                    $('#model-title').html(data.info);
                                    taskget = new FoxUIModal({
                                        content: $('#model').html(),
                                        extraClass: 'picker-modal',
                                        maskClick: function () {
                                            taskget.close();
                                        }
                                    });
                                    taskget.container.find('.task-btn-close').unbind('click').bind('click',function () {
                                        taskget.close();
                                    });
                                    taskget.show();
                                    click=false;
                                }else{
                                    //领取失败model-fail-title
                                    $('#model-failtitle').html(data.info);
                                    taskget = new FoxUIModal({
                                        content: $('#failmodel').html(),
                                        extraClass: 'picker-modal',
                                        maskClick: function () {
                                            taskget.close()
                                        }
                                    });
                                    taskget.container.find('.task-btn-close').click(function () {
                                        taskget.close()
                                    });
                                    taskget.show();
                                }
                            },'json');
                        }else{
                            //无奖励
                            $('#model-failtitle').html(reward.info);
                            taskget = new FoxUIModal({
                                content: $('#failmodel').html(),
                                extraClass: 'picker-modal',
                                maskClick: function () {
                                    taskget.close()
                                }
                            });
                            taskget.container.find('.task-btn-close').unbind('click').bind('click',function () {
                                taskget.close()
                            });
                            taskget.show();
                        }
                        click=false;

                    },6000);

                }else{
                    $('#model-failtitle').html(data.info);
                    taskget = new FoxUIModal({
                        content: $('#failmodel').html(),
                        extraClass: 'picker-modal',
                        maskClick: function () {
                            taskget.close()
                        }
                    });
                    taskget.container.find('.task-btn-close').unbind('click').bind('click',function () {
                        taskget.close()
                    });
                    taskget.show();
                    click=false;
                }
            },'json');

        });
        <?php  } ?>

    })
    <?php  } ?>
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>


<!--weichengtech-->