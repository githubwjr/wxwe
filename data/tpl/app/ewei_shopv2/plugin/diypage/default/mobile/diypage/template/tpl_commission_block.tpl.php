<?php defined('IN_IA') or exit('Access Denied');?><div class="userblock" style="background: <?php  echo $diyitem['style']['background'];?>;">
    <div class="line total new" style="background: <?php  echo $diyitem['style']['background'];?>;">
        <div class="num" style="color: <?php  echo $diyitem['style']['pricecolor'];?>;"><?php  echo $diyitem['params']['successwithdraw'];?></div>
        <div class="title" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['params']['textsuccesswithdraw'];?>(<?php  echo $diyitem['params']['textyaun'];?>)</div>
    </div>
    <div class="line usable new" style="background: <?php  echo $diyitem['style']['background'];?>;">
        <div class="text">
            <div class="num" style="color: <?php  echo $diyitem['style']['pricecolor'];?>;"><?php  echo $diyitem['params']['canwithdraw'];?></div>
            <div class="title" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['params']['textcanwithdraw'];?>(<?php  echo $diyitem['params']['textyaun'];?>)</div>
        </div>

        <?php  if($diyitem['params']['cansettle']) { ?>
        <a class="btn btn-warning external" href="<?php  echo mobileUrl('commission/withdraw')?>" style="background: <?php  echo $diyitem['style']['btncolor'];?>;"><span style="line-height: 1;">
            <?php  echo $diyitem['params']['textcommission'];?><?php  echo $diyitem['params']['textwithdraw'];?></span></a>
        <?php  } else { ?>
            <div class="btn btn-warning disabled" onclick="FoxUI.toast.show('满 <?php  echo $diyitem['params']['withdraw'];?> <?php  echo $diyitem['params']['textyaun'];?>才能提现!')"><span style="line-height: 1;"><?php  echo $diyitem['params']['textcommission'];?><?php  echo $diyitem['params']['textwithdraw'];?></span></div>
        <?php  } ?>
    </div>
</div>