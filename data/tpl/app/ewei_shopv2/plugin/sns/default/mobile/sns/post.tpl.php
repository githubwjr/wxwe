<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/sns/template/mobile/default/images/common.css"/>
<style>
    .fui-cell.complain-image{display: block;}
</style>
<div id="sns-board-post-page" class='fui-page fui-page-current sns-post-detail-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">话题</div>
        <div class="fui-header-right">&nbsp;</div>
    </div>
    <div class="fui-content navbar">

        <div class="fui-list-group" style="margin-top:0;">
            <a class="fui-list" href="<?php  echo mobileUrl('sns/user',array('id'=>$member['id']))?>" data-nocache="true">
                <div class="fui-list-media post-detail-avatar">
                    <img data-lazy="<?php  echo tomedia($post['avatar'])?>" class="round">
                </div>
                <div class="fui-list-inner">
                    <div class="subtitle"><?php  echo $post['nickname'];?>
                    <span class="level-label fui-label fui-label-default level-label" style="background:<?php  echo $level['bg'];?>;color:<?php  echo $level['color'];?>"><?php  echo $level['levelname'];?></span>
                        <?php  if($isManager) { ?>
                        <span class="level-label fui-label fui-label-danger level-label">版主</span>
                        <?php  } ?>

                    </div>
                    <div class="text text-remark"><?php  echo $member['sns_sign'];?></div>
                </div>
                <div class="fui-list-angle">
                    <div class="angle"></div>
                </div>
            </a>
        </div>

        <div class="fui-article">
            <div class="fui-article-title">
                <span id="bestspan" class="fui-label fui-label-warning" <?php  if(!$post['isbest'] && !$post['isboardbest']) { ?>style='display:none;'<?php  } ?>>精</span>
                <?php  echo $post['title'];?>
            </div>
            <div class="fui-article-subtitle">
                <?php  echo date('Y-m-d H:i',$post['createtime'])?> <a class="board-label external" href="<?php  echo mobileUrl('sns/board',array('id'=>$board['id']))?>" ><?php  echo $board['title'];?></a>
            </div>
            <div class="fui-article-content  content content-images">
                <?php  echo $post['content'];?><br/>
                <?php  if(!empty($images)) { ?>
                <br/>
                <?php  if(is_array($images)) { foreach($images as $img) { ?>
                <img data-lazy="<?php  echo tomedia($img)?>" />
                <?php  } } ?>
                <?php  } ?>
            </div>

            <?php  if($this->islogin) { ?>

            <div class="fui-article-subtitle func">
                <?php  if(!$isSuperManager) { ?>
                <span class="pull-right">
                    <i class="icon icon-browse"></i> <?php  echo number_format($post['views'],0)?>
                </span>
                <?php  } ?>
                <?php  if($isManager || $isSuperManager) { ?>


                <a href="javascript:;" class="link" id="btnDelete" ><i class="icon icon-delete"></i> 删除</a>

                <?php  if(!$post['checked']) { ?>
                <a href="javascript:;" class="link" id="btnCheck" ><i class="icon icon-check"></i> 审核通过&nbsp;</a>
                <?php  } ?>
                <a href="javascript:;" class="link" id="btnBest" isbest="<?php  echo $post['isboardbest'];?>" ><i class="icon icon-creditlevel"></i> <span class="bestdiv"><?php  if(!$post['isboardbest']) { ?>设置精华<?php  } else { ?>取消精华<?php  } ?></span>&nbsp;</a>
                <a href="javascript:;" class="link" id="btnTop" istop="<?php  echo $post['isboardtop'];?>" ><i class="icon icon-top"></i> <span class="topdiv"><?php  if(!$post['isboardtop']) { ?>设置置顶<?php  } else { ?>取消置顶<?php  } ?></span>&nbsp;</a>
                <?php  } ?>
            </div>
            <?php  if($isSuperManager) { ?>
            <div class="fui-article-subtitle ">
                 <span class="pull-right">
                    <i class="icon icon-browse"></i> <?php  echo number_format($post['views'],0)?>
                </span>
                <a href="javascript:;" class="link" id="btnBestAll" isbest="<?php  echo $post['isbest'];?>" ><i class="icon icon-creditlevel"></i> <span class="bestdiv"><?php  if(!$post['isbest']) { ?>设置全站精华<?php  } else { ?>取消全站精华<?php  } ?></span>&nbsp;</a>
                <a href="javascript:;" class="link" id="btnTopAll" istop="<?php  echo $post['istop'];?>" ><i class="icon icon-top"></i> <span class="topdiv"><?php  if(!$post['istop']) { ?>设置全站置顶<?php  } else { ?>取消全站置顶<?php  } ?></span>&nbsp;</a>
            </div>
            <?php  } ?>
            <?php  } else { ?>
            <div class="fui-article-subtitle func">
                <span class="pull-right">
                    <i class="icon icon-browse"></i> <?php  echo number_format($post['views'],0)?>
                </span>
            </div>
            <?php  } ?>


        </div>

        <div class="fui-cell-group">
            <div class="fui-cell-title"><i class="icon icon-comment"></i> 全部评论</div>

            <p class='text-center text-cancel empty' ><i class="icon icon-commentfill" style="font-size:4rem;color:#ccc;"></i> <br/>暂时没有任何评论</p>
            <div class='fui-list-group reply-list-group' style='margin-top:0;display: none'></div>
            <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>


        </div>

    </div>
    <div class="fui-navbar">
        <?php  if($this->islogin) { ?>
        <a class="nav-item" href="#" <?php  if($canpost) { ?>id="btnReply"<?php  } ?>>
            <i class="icon icon-comment"></i> <span id="commentdiv"><?php  if($replycount>0) { ?><?php  echo number_format($replycount,0)?><?php  } else { ?>评论<?php  } ?></span>
        </a>
        <a class="nav-item" href="#"<?php  if($canpost) { ?> id="btnGood"<?php  } ?>>
            <i class="icon icon-appreciate<?php  if($isgood>0) { ?>fill<?php  } ?>" isgood="<?php  echo $isgood;?>"></i> <span class="zandiv"><?php  if($goodcount>0) { ?><?php  echo number_format($goodcount,0)?><?php  } else { ?>赞<?php  } ?></span></span>
        </a>
        <?php  } else { ?>
        <a class="nav-item external" href="<?php  echo $loginurl;?>">
            <i class="icon icon-comment"></i> <span><?php  if($replycount>0) { ?><?php  echo number_format($replycount,0)?><?php  } else { ?>评论<?php  } ?></span>
        </a>
        <a class="nav-item external"  href="<?php  echo $loginurl;?>">
            <i class="icon icon-appreciate<?php  if($isgood>0) { ?>fill<?php  } ?>" isgood="<?php  echo $isgood;?>"></i> <?php  if($goodcount>0) { ?><?php  echo number_format($goodcount,0)?><?php  } else { ?>赞<?php  } ?></span>
        </a>
        <?php  } ?>
        <a class="nav-item" id="btnComplain" data-id="<?php  echo $post['id'];?>" href="javascript:void(0);">
            <i class="icon icon-warning"></i> <span>投诉</span>
        </a>
    </div>
    <script type="text/html" id="tpl_post_reply_list">
        <%each list as row%>
        <div class="fui-list external reply-list"
              data-pid ="<%row.id%>"
              data-nickname="<%row.nickname%>">
            <a class="fui-list-media reply-avatar" href="<?php  echo mobileUrl('sns/user')?>&id=<%row.member.id%>" data-nocache="true">
                <img data-lazy="<%row.avatar%>" class="round">
            </a>
            <div class="fui-list-inner">
                <div class="text click">
                    <span class="pull-right"><%row.createtime%></span>
                    <%row.nickname%>
                    <span class="level-label fui-label fui-label-default level-label" style="background:<%row.level.bg%>;color:<%row.level.color%>"><%row.level.levelname%></span>

                    <%if row.isAuthor%>
                    <span class="level-label fui-label fui-label-warning level-label">楼主</span>
                    <%/if%>

                    <%if row.isManager%>
                    <span class="level-label fui-label fui-label-danger level-label">版主</span>
                    <%/if%>



                </div>
                <div class="text text-reply  click"><%=row.content%></div>

                <%if row.images.length>0%>
                <div class="text images">
                    <div class="fui-card-images" >
                        <%each row.images as img%>
                        <img data-lazy="<%img%>" style="background-image:url('');width:<%row.imagewidth%>" />
                        <%/each%>
                    </div>
                </div>
                <%/if%>
                <%if row.parent%>
                <div class="text text-parent">
                    <span class="org">@<%row.parent.nickname%></span>: <%=row.parent.content%>
                </div>
                <%/if%>

                <div class="text text-time">
                    <?php  if($this->islogin) { ?>
                    <span class="pull-right">
                        <a href="javascript:;" class="link link-reply" ><i class="icon icon-comment"></i> 回复&nbsp;&nbsp;</a>
                        <a href="javascript:;" class="link link-good" isgood="<%row.isgood%>" ><i class="icon icon-appreciate<%if row.isgood>0%>fill<%/if%>"></i>
                            <span class="zandiv"><%if row.goodcount>0%><%row.goodcount%><%else%>赞<%/if%></span>&nbsp;&nbsp;</a>
                        <a class="link link-complain-list" data-id="<%row.id%>" href="javascript:void(0);">
                            <i class="icon icon-warning"></i> <span>投诉</span>
                        </a>

                    <?php  if($isManager || $isSuperManager) { ?>
                    <%if row.checked!=1%>
                        <a href="javascript:;" class="link link-check " ><i class="icon icon-check"></i> 审核&nbsp;&nbsp;</a>
                    <%/if%>
                        <a href="javascript:;" class="link link-delete" ><i class="icon icon-delete"></i> 删除</a>
                    <?php  } ?>
                        </span>
                    <?php  } ?>

                    <%row.createtime%>
                </div>
            </div>
        </div>
        <%/each%>
    </script>
</div>

<div id="sns-board-reply-page" class='fui-page sns-board-reply-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back">取消</a>
        </div>
        <div class="title">回复话题</div>
        <div class="fui-header-right"></div>
    </div>
    <div class="fui-content">
        <div class="fui-cell-group" style="margin-top:0;">
            <div class="fui-cell">
                <div class="fui-cell-info">
                    <textarea placeholder="内容 10-1000个字" rows="8" id="content"></textarea>
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
            <div class='fui-cell post-image'>
                <div class='fui-cell-info'>
                    <ul class="fui-images fui-images-md"></ul>
                    <div class="fui-uploader fui-uploader-md"
                         data-max="10"
                         data-count="0">
                        <input type="file" name='imgFile[]' id='imgFile<?php  echo $g['id'];?>' multiple="" accept="image/*" >
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        <a href="javascript:void(0);" class="btn btn-sns-submit" id="btnSend">提交</a>
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
                         data-max="10"
                         data-count="0">
                        <input type="file" name='complainimg[]' id='complainimg<?php  echo $g['id'];?>' multiple="" accept="image/*" >
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        <a href="javascript:void(0);" class="btn btn-sns-submit" id="btnCompSend">提交</a>
    </div>
</div>
<!--投诉end-->
<script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/sns/static/js/post.js'], function (modal) {
        modal.init({ bid: <?php  echo $board['id'];?>,pid: <?php  echo $post['id'];?> });
    });
    $("#content").focus(function(){
        $(".reply-footer").css("bottom","12.5rem")
    }).blur(function(){
        $(".reply-footer").css("bottom","0rem")
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
