<?php defined('IN_IA') or exit('Access Denied');?><div class="fui-cell-group fui-shop-group">
    <a class='fui-list' href="<?php  echo $shopdetail['btnurl2'];?>">
        <div class="fui-list-media <?php  echo $diyitem['params']['logostyle'];?>">
            <img data-lazy="<?php  echo tomedia($shopdetail['logo'])?>" />
        </div>
        <div class='fui-list-inner'>
            <div class='title' style="color: <?php  echo $diyitem['style']['shopnamecolor'];?>;"><?php  echo $shopdetail['shopname'];?></div>
            <div class='subtitle' style="color: <?php  echo $diyitem['style']['shopdesccolor'];?>;"><?php  echo $shopdetail['description'];?></div>
        </div>
        <div class="fui-list-angle">
            <span class="btn btn-default-o external goshop"  style="border-color: <?php  echo $diyitem['style']['rightnavcolor'];?>; color: <?php  echo $diyitem['style']['rightnavcolor'];?>;"><?php  if(!empty($shopdetail['btntext2'])) { ?><?php  echo $shopdetail['btntext2'];?><?php  } else { ?>进店逛逛<?php  } ?></span>
        </div>
    </a>
</div>
