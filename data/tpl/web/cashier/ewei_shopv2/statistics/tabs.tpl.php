<?php defined('IN_IA') or exit('Access Denied');?><div class="inner">
    <div class="menu-header">收银台统计</div>
    <ul>
        <li>
            <a href="<?php  echo cashierUrl('order')?>">
                <i class="icon icon-order"></i>
                <span class="text">订单统计</span>
            </a>
        </li>
        <li class="active">
            <a href="<?php  echo cashierUrl('statistics')?>">
                <i class="icon icon-rank"></i>
                <span class="text">收银统计</span>
            </a>
        </li>
    </ul>
</div>
