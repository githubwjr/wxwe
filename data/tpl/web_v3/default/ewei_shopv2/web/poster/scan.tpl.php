<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">
    当前位置：<span class="text-primary"> 扫描记录 </span>
</div>
<div class="page-content">
    <form action="./index.php" method="get" class="form-horizontal table-search"  role="form">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r"  value="poster.scan" />
        <input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>" />
        <div class="page-toolbar m-b-sm m-t-sm">
            <div class="col-sm-5">
                <div class='input-group input-group-sm'   >
                    <?php  echo tpl_daterange('time', array('placeholder'=>'扫描时间'),true);?>
                </div>
            </div>
            <div class="col-sm-6 pull-right">
                <div class="input-group">
                    <div class="input-group-select">
                        <select name='searchfield'  class='form-control '   >
                            <option value='rec' <?php  if($_GPC['searchfield']=='rec') { ?>selected<?php  } ?>>推荐人</option>
                            <option value='sub' <?php  if($_GPC['searchfield']=='sub') { ?>selected<?php  } ?>>扫码人</option>
                        </select>
                    </div>
                    <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="昵称/姓名/手机号"> <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"> 搜索</button> </span>
                </div>
            </div>
        </div>
    </form>


    <form action="" method="post" >

        <?php  if(count($list)>0) { ?>

        <table class="table table-responsive">
            <thead>
            <tr>
                <th>推荐人</th>
                <th></th>
                <th class="text-center">扫码人</th>
                <th></th>
                <th class="text-center">扫码时间</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>
                <td><img class="radius50" src='<?php  echo tomedia($row['avatar'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'"/> <?php  echo $row['nickname'];?>
                </td>
                <td><?php  echo $row['realname'];?><br /><?php  echo $row['mobile'];?></td>
                <td  class="text-center"><img class="radius50" src='<?php  echo tomedia($row['avatar1'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'"/> <?php  echo $row['nickname1'];?>
                </td>
                <td> <?php  echo $row['realname1'];?><br /><?php  echo $row['mobile1'];?></td>
                <td  class="text-center"><?php  echo date('Y-m-d H:i',$row['scantime'])?></td>
            </tr>
            <?php  } } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><?php  echo $pager;?></td>
            </tr>
            </tfoot>
        </table>
        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何扫描记录!
            </div>
        </div>

        <?php  } ?>
    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

