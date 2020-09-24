<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $page_title;?>";</script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/dividend/template/mobile/default/static/css/common.css">
<div class="fui-page fui-page-current">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">我的团队(<?php  echo $member['groupscount'];?>)</div>
        <div class="fui-header-right"></div>
    </div>
    <div class="fui-content footbar" style="background: #fff;">
        <div class="fui-list-group" id="container"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>

        <div class='content-empty' style='display:none;'>
            <!--<i class='icon icon-group'></i><br/>暂时没有任何数据-->
            <img src="<?php echo EWEI_SHOPV2_STATIC;?>images/nomeb.png" style="width: 6rem;margin-bottom: .5rem;"><br/><p style="color: #999;font-size: .75rem">暂时没有任何数据</p>
        </div>
    </div>
    <div class="share-footbar">
        <a  href="<?php  echo mobileUrl('dividend')?>"  class='item external'>
            <i class="icon icon-dividendhome"></i>
            <span class='text'><?php  echo $this->set['texts']['dividend']?>中心</span>
        </a>
        <a href="<?php  echo mobileUrl('dividend/withdraw')?>" class='item '>
            <i class="icon icon-fenxiaoyongjin1"></i>
            <span class='text'><?php  echo $this->set['texts']['dividend']?>佣金</span>
        </a>
        <a href="<?php  echo mobileUrl('dividend/order')?>" class='item '>
            <i class="icon icon-fenxiaodingdan1"></i>
            <span class='text'><?php  echo $this->set['texts']['dividend']?>订单</span>
        </a>
        <a href="#" class='item active'>
            <i class="icon icon-wodetuandui2"></i>
            <span class='text'>我的团队</span>
        </a>
    </div>
</div>

<script id='tpl_dividend_down_list' type='text/html'>
    <%each list as member%>
        <a  class='my-list'>
            <div class='my-list-media'>
                <img src='<% member.avatar %>' />
            </div>
            <div class='my-list-inner'>
                <div class='text'>
                    <div class='title'><% member.nickname %></div>
                    <div class='subtitle'>注册时间：<% member.createtime %></div>
                </div>
                <div class='nums'>
                    <div class='num'>+<% member.moneycount %></div>
                    <div class='num-order'><% member.ordercount %>个订单</div>
                </div>
            </div>
            <div class='my-list-remark noremark'></div>
        </a>
    <%/each%>
</script>

<script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/dividend/static/js/down.js'], function (modal) {
        modal.init({fromDetail: false});
    });
    $(function () {
        setTimeout(function () {
            var width = window.screen.width *  window.devicePixelRatio;
            var height = window.screen.height *  window.devicePixelRatio;
            var h = document.body.offsetHeight *  window.devicePixelRatio;
            //  微信版本6.6.7
            if(h == 1923){
                $(".share-footbar").removeClass('iphonex');
                $(".fui-content").removeClass('iphonex');
                return;
            }

            if(height==2436 && width==1125){
                $(".share-footbar").addClass('iphonex')
                $(".fui-content").addClass('iphonex')
            }
        },600)
    })
</script>