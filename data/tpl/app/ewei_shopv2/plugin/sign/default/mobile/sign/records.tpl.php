<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class='fui-page fui-page-current'>
    <div class="fui-header">
        <div class="fui-header-left">
            <?php  if(!$_SESSION['sign_xcx_isminiprogram']) { ?>
            <a class="back"></a>
            <?php  } ?>
        </div>
        <div class="title">详细记录</div>
        <div class="fui-header-right">
            <?php  if(!$_SESSION['sign_xcx_isminiprogram']) { ?>
            <a href="<?php  echo mobileUrl()?>" class="external">
                <i class="icon icon-home"></i>
            </a>
            <?php  } ?>
        </div>
    </div>
    <div class='fui-content navbar'>
        <div class="content-empty" style="display: none; margin: 0; padding: 0; position: relative;">
            <i class="icon icon-information"></i>
            <center style="color: #888">未找到<?php  echo $set['textcredit'];?>记录~</center>
        </div>
        <div class="fui-list-group noborder nomargin container" style="display: none;"></div>
    </div>

    <script type="text/html" id="record_tpl">
        <%each list as item%>
        <div class="fui-list">
            <div class="fui-list-inner">
                <div class="text" style="font-size: 0.8rem"><%=item.log%></div>
                <div class="text">
                    <%if item.type==0%><span class="fui-label fui-label-success">日常<?php  echo $set['textsign'];?></span><%/if%>
                    <%if item.type==1%><span class="fui-label fui-label-warning">连续<?php  echo $set['textsign'];?>奖励</span><%/if%>
                    <%if item.type==2%><span class="fui-label fui-label-primary">总<?php  echo $set['textsign'];?>奖励</span><%/if%>
                    <%item.date%>
                </div>
            </div>
            <div class="fui-list-angle text-danger" style="color: <?php  echo $set['maincolor'];?>;">+<%item.credit%></div>
        </div>
        <%/each%>
    </script>


    <script language='javascript'>
        require(['../addons/ewei_shopv2/plugin/sign/static/js/records.js'], function (modal) {modal.init();});
    </script>
</div>
<?php  $this->footerMenus(null, false, $texts)?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--weichengtech-->