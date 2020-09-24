<?php defined('IN_IA') or exit('Access Denied');?><?php  if($buyshow==1 && !empty($goods['buycontent'])) { ?>
<div class="fui-cell-group" style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px; margin-bottom: <?php  echo $diyitem['style']['marginbottom'];?>px; background: <?php  echo $diyitem['style']['background'];?>;">
    <div class="fui-cell">
        <div class="content-block"><?php  echo $goods['buycontent'];?></div>
    </div>
</div>
<?php  } ?>
