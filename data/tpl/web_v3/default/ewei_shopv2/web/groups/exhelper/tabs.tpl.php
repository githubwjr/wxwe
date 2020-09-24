<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs" id="myTab" style="margin-bottom: 10px">
    <li <?php  if($_GPC['tab']=='printset' || empty($_GPC['tab'])) { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper',array('tab'=>'printset'))?>">打印机设置</a></li>
    <li <?php  if($_GPC['tab']=='short') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper/short',array('tab'=>'short'))?>">商品简称设置</a></li>
    <li <?php  if($_GPC['tab']=='express') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper/express',array('tab'=>'express'))?>">快递单</a></li>
    <li <?php  if($_GPC['tab']=='invoice') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper/invoice',array('tab'=>'invoice'))?>">发货单</a></li>
    <li <?php  if($_GPC['tab']=='sender') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper/sender',array('tab'=>'sender'))?>">发件人信息</a></li>
    <li <?php  if($_GPC['tab']=='single') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper/single',array('tab'=>'single'))?>">单个打印</a></li>
    <li <?php  if($_GPC['tab']=='batch') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('groups/exhelper/batch',array('tab'=>'batch'))?>">批量打印</a></li>
</ul>
