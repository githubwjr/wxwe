<?php defined('IN_IA') or exit('Access Denied');?><script type="text/html" id="tpl_board_post_list">
    <%each list as row%>
    <div class="fui-card fui-card-list fui-card-full post-card sns-card-list">

        <a class='fui-card-info'  data-nocache='true' href='<?php  echo mobileUrl('sns/post')?>&id=<%row.id%>'>
        <div class='image'>
            <img data-lazy='<%row.avatar%>'  />
        </div>
        <div class="text">
            <span class="title"><%row.nickname%></span>
            <span class="subtitle"><%row.createtime%></span>
        </div>
        </a>

        <a class="fui-card-content"  data-nocache='true' href="<?php  echo mobileUrl('sns/post')?>&id=<%row.id%>">
            <%if row.title%><b class="fui-card-content-title">
            <%if row.isbest==1 || row.isboardbest==1%><span class="fui-label fui-label-warning">精</span><%/if%>
            <%row.title%>
        </b><%/if%>
            <div class="sns-content-info">
                <div class="sns-content-info-sub">
                    <%=row.content%>
                </div>
            </div>
        </a>
        <i class="sns-card-show">全文</i>
        <%if row.images.length>0%>
        <a class="fui-card-images"  data-nocache='true' href="<?php  echo mobileUrl('sns/post')?>&id=<%row.id%>">
            <%if row.imagecount>row.images.length%>
            <div class="num"><i class="icon icon-pic"></i> <%=row.imagecount%></div>
            <%/if%>
            <%each row.images as img%>
            <img style="background-image:url('<%img%>');width:<%row.imagewidth%>" />
            <%/each%>
        </a>
        <%/if%>

        <div class='fui-card-btns'>
            <a data-nocache='true' href="<?php  echo mobileUrl('sns/post')?>&id=<%row.id%>"><i class="icon icon-comment"></i> (<%row.postcount%>)</a>
            <?php  if($this->islogin) { ?>
            <a href='javascript:;' class="like-good" data-isgood="1"  data-pid="<%row.id%>"><i class="icon icon-good"></i> (<span><%row.goodcount%></span>)</a>
            <?php  } else { ?>
            <a href='javascript:;'><i class="icon icon-good"></i> (<span><%row.goodcount%></span>)</a>
            <?php  } ?>
            <a data-nocache='true' href="<?php  echo mobileUrl('sns/post')?>&id=<%row.id%>"><span>投诉</span></a><!-- data-id="<%row.id%>" class="link-complain"-->


        </div>
    </div>
    <%/each%>

</script>

