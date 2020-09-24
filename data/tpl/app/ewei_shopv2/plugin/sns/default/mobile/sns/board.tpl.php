<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/sns/template/mobile/default/images/common.css"/>
<style type="text/css">
    .sns-content-info{max-height:4rem;line-height: 1rem;overflow: hidden;}
    .sns-card-show{padding:0 0.5rem 0.5rem;height:1.5rem;display: block;font-style: normal;color:#0290be;font-size:0.7rem;}
</style>
<div class='fui-page fui-page-current  fui-page-current sns-board-page'>

    <?php  if(is_h5app()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  if(empty($this->merch_user)) { ?><?php  echo $_W['shopset']['shop']['name'];?><?php  } else { ?><?php  echo $this->merch_user['merchname']?><?php  } ?></div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } ?>

    <div class="fui-content navbar">
        <div class="fui-shopsign">
            <div class="store">
                <img class="storeimg"
                     data-lazy="<?php echo empty($board['banner'])?(empty($this->set['banner'])?'../addons/ewei_shopv2/plugin/sns/static/images/banner.png':tomedia($this->set['banner'])):tomedia($board['banner'])?>"/>
                <div class="fui-list-group" style="margin:5px;">
                    <div class="fui-list">
                        <div class="fui-list-media">
                            <img data-lazy="<?php  echo tomedia($board['logo'])?>">
                        </div>
                        <div class="fui-list-inner">
                            <div class="title"><?php  echo $board['title'];?></div>
                            <div class="text" style="color:#fff;">话题 <?php  echo number_format($postcount,0)?> 关注 <?php  echo number_format($followcount,0)?></div>
                        </div>
                        <div class="fui-list-media follow">

                            <?php  if($this->islogin) { ?>
                            <span class="btn <?php  if(!$isfollow) { ?>btn-warning<?php  } else { ?>btn-default<?php  } ?> btn-sm" id="btnFollow">
                                <?php  if($isfollow) { ?>
                                <i class="icon icon-check"></i> 已关注
                                <?php  } else { ?>
                                <i class="icon icon-add"></i> 关注
                                <?php  } ?>
                            </span>
                            <?php  } else { ?>
                            <a class="btn btn-default btn-sm" href="<?php  echo $loginurl;?>">
                                <i class="icon icon-person2"></i> 未登录
                            </a>
                            <?php  } ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="menu">
                <a class="item on" href="javascript:void(0);">
                    <p class="text"><i class="icon icon-home"></i> 首页</p>
                </a>
                <a class="item external" href="<?php  echo mobileUrl('sns/board/best',array('id'=>$id))?>">
                    <p class="text"><i class="icon icon-creditlevel"></i> 精华区</p>
                </a>
                <a class="item external"  href="<?php  echo mobileUrl('sns/board/relate',array('id'=>$id))?>">
                    <p class="text"><i class="icon icon-box"></i> 相关版块</p>
                </a>
            </div>

            <?php  if(count($tops)>0) { ?>
            <div class="fui-cell-group sns-top-group" style="margin-top:0">
                <?php  if(is_array($tops)) { foreach($tops as $row) { ?>
                <a class="fui-cell" href="<?php  echo mobileUrl('sns/post',array('id'=>$row['id']))?>" data-nocache="true">
                    <div class="fui-cell-info">
                        <div class="fui-label <?php  if($row['istop']) { ?>fui-label-warning<?php  } else { ?>fui-label-primary<?php  } ?>">置顶</div>
                        <?php  echo $row['title'];?>
                    </div>
                    <div class="fui-cell-remark"></div>
                </a>
                <?php  } } ?>

            </div>
            <?php  } ?>

        </div>
        <div class="container"></div>
        <div class="board-list-empty" style="display:none;color:#999;font-size:.75rem;margin:.5rem;text-align: center;"><i class="icon icon-comment" style="font-size:4rem;color:#ccc;"></i> <br/>暂时没有任何话题</div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
    </div>
    <?php  if($this->islogin) { ?>
        <?php  if(is_weixin() && !$isafollow && $board['needpostfollow']) { ?>
           <a class="btn btn-primary btn-add-post" href="javascript:;" id="btnNeedFollow" data-followurl="<?php  echo $followurl;?>"><i class="icon icon-edit2"></i></a>
        <?php  } else { ?>
            <?php  if($canpost) { ?>
                <a class="btn btn-primary btn-add-post" href="#sns-board-post-page"><i class="icon icon-edit2"></i></a>
           <?php  } ?>
        <?php  } ?>
    <?php  } else { ?>
    <a class="btn btn-primary btn-add-post external" href="<?php  echo $loginurl;?>"><i class="icon icon-edit2"></i></a>
    <?php  } ?>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sns/board/board_item', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/board_item', TEMPLATE_INCLUDEPATH));?>

<div id="sns-board-post-page" class='fui-page sns-board-post-page'>
    <script type="text/javascript">
        $(function () {
            $(".btn-add-post").off('click').on('click',function () {
                $(".fui-cell-info .post-input").val('');
                $(".fui-cell-info .icon-pic").empty();
            })
        })
    </script>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back">取消</a>
        </div>
        <div class="title">发表话题</div>
        <div class="fui-header-right"></div>
    </div>
    <div class="fui-content navbar">

        <div class="fui-cell-group" style="margin-top:0;">

            <div class="fui-cell">
                <div class="fui-cell-info">
                    <input type="text" class="fui-input post-input" placeholder="标题 3-25个字" id="title" minlength="3" maxlength="25"/>
                </div>
            </div>

            <div class="fui-cell">
                <div class="fui-cell-info">
                    <textarea placeholder="内容 10-1000个字" class="post-input" rows="8" id="content" minlength="10" maxlength="1000"></textarea>
                </div>
            </div>
            <div class="fui-cell reply-func-cell">
                <div class="fui-cell-info post-func">
                    <i class="icon icon-emoji"></i>  <i class="icon icon-pic"></i>
                </div>
            </div>

            <div class="post-face">
                <?php  for($i=1;$i<=75;$i++) {?>
                <div class="item" data-face="<?php  echo $i;?>"><img src="../addons/ewei_shopv2/plugin/sns/static/images/face/<?php  echo $i;?>.gif" /></div>
                <?php  } ?>
            </div>

            <?php  if(empty($board['noimage'])) { ?>
            <div class='fui-cell post-image' id="cell-images">
                <div class='fui-cell-info'>
                    <ul class="fui-images fui-images-md"></ul>
                    <div class="fui-uploader fui-uploader-md"
                         data-max="<?php  if($set['imagesnum']==0) { ?>5<?php  } else if($set['imagesnum'] > 0) { ?><?php  echo $set['imagesnum'];?><?php  } ?>"
                         data-count="0">
                        <input type="file" multiple="multiple" aria-multiselectable="true" name="imgFile[]"  id="imgFile<?php  echo $g['id'];?>" accept="image/*"  >
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        <a href="javascript:void(0);" id="btnSend" class="btn btn-sns-submit">发表</a>
    </div>

</div>
<!--投诉start-->
<div id="sns-board-complain-page" class='fui-page sns-board-reply-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back">取消</a>
        </div>
        <div class="title">投诉</div>
        <div class="fui-header-right"></div>
    </div>
    <div class="fui-content navbar">
        <div class="fui-cell-group" style="margin-top:0;">
            <div class="complain-title">
                我要投诉的是<span id="post_member"></span>的<span class="complain-type-span"></span>
            </div>
            <input type="hidden" id="complain_type" name="complain_type" value="">
            <div class="complain-type">
                <p>请您选择投诉类别：</p>
                <?php  if(is_array($catelist)) { foreach($catelist as $item) { ?>
                <span class="fui-lg-1 fui-md-2 fui-sm-3 fui-xs-4"><a href="javascript:void(0);" data-type="<?php  echo $item['id'];?>"><?php  echo $item['name'];?></a></span>
                <?php  } } ?>
                <span class="fui-lg-1 fui-md-2 fui-sm-3 fui-xs-4"><a href="javascript:void(0);" data-type="-1">其他</a></span>
                <div style="clear:both;"></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-info">
                    <textarea placeholder="内容 10-1000个字" rows="8" id="complain_text"></textarea>
                </div>
            </div>
            <div class="fui-cell reply-func-cell">
                <div class="fui-cell-info post-func">
                    <i class="icon icon-pic" id="complain-pic"></i>
                </div>
            </div>

            <?php  if(empty($board['noimage'])) { ?>
            <div class='fui-cell complain-image'>
                <div class='fui-cell-info'>
                    <ul class="fui-images fui-images-md"></ul>
                    <div class="fui-uploader fui-uploader-md"
                         data-max="<?php  if($set['imagesnum']==0) { ?>5<?php  } else if($set['imagesnum'] > 0) { ?><?php  echo $set['imagesnum'];?><?php  } ?>"
                         data-count="0">
                        <input type="file" name='complainimg[]' id='complainimg<?php  echo $g['id'];?>' multiple="" accept="image/*" >
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        <a href="javascript:void(0);" id="btnCompSend" class="btn btn-sns-submit">提交</a>
    </div>
</div>
<!--投诉end-->

<script language='javascript'>
    function isIphoneX(){
        return /iphone/gi.test(navigator.userAgent) && (screen.height == 812 && screen.width == 375)
    }
    $(function(){
        if( isIphoneX() ) {
            $('.btn-add-post').css('bottom', '4.25rem');
        }
    });
    require(['../addons/ewei_shopv2/plugin/sns/static/js/board.js'], function (modal) {
        modal.init({
            bid: <?php  echo $board['id'];?>
            ,followtip: "<?php  echo $followtip;?>"
            ,page:<?php  echo intval($_GPC['page'])?>
    });
    });
</script>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
