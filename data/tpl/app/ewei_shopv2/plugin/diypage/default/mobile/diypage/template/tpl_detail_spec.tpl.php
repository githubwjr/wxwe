<?php defined('IN_IA') or exit('Access Denied');?><?php  if($goods['canbuy']) { ?>
    <?php  if($goods['type']!=4) { ?>
        <div class="fui-cell-group fui-cell-click" style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px; margin-bottom: <?php  echo $diyitem['style']['marginbottom'];?>px; background: <?php  echo $diyitem['style']['background'];?>">
            <div class="fui-cell">
                <div class="fui-cell-text option-selector" style="color: <?php  echo $diyitem['style']['textcolor'];?>">请选择<?php  if(empty($spec_titles)) { ?>数量<?php  } else { ?><?php  echo $spec_titles;?>等<?php  } ?></div>
                <div class="fui-cell-remark"></div>
            </div>
        </div>
    <?php  } ?>
<?php  } else { ?>
<div class="fui-cell-group fui-cell-click nobuy">
    <div class="fui-cell">
        <div class="fui-cell-text">
            <?php  if($goods['userbuy']==0) { ?>
            您已经超出最大<?php  echo $goods['usermaxbuy'];?>件购买量
            <?php  } else if($goods['levelbuy']==0) { ?>
            您当前会员等级没有购买权限
            <?php  } else if($goods['groupbuy']==0) { ?>
            您所在的用户组没有购买权限
            <?php  } else if($goods['timebuy'] ==-1) { ?>
            未到开始抢购时间!
            <?php  } else if($goods['timebuy'] ==1) { ?>
            抢购时间已经结束!
            <?php  } else if($goods['total'] <=0) { ?>
            商品已经售罄!
            <?php  } ?></div>
    </div>
</div>
<?php  } ?>
