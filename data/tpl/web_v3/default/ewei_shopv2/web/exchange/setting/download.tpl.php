<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">文件管理 </span>
</div>
    <div class="page-content" style="display: block;">
        <div class="page-sub-toolbar">
            <span class="">
                <a class="btn btn-danger btn-sm"data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> 删除全部文件</a>
            </span>
        </div>
        <div class="alert alert-warning">
            <p>注意：</p>
            <p>谷歌浏览器和火狐浏览器不支持zip压缩包下载</p>
            <p>如果压缩包文件下载失败或损坏，请使用迅雷等下载工具下载</p>
            <p>也可以使用搜狗浏览器，360浏览器，QQ浏览器等符合国人使用习惯的浏览器下载</p>
        </div>
        <div class="main">
            <div class="panel-default">
                <div class="panel-body table-responsive" style="padding:0;">
                    <form action="" method="post">
                        <table class="table table-hover">
                            <thead class="navbar-inner">
                            <tr>
                                <th style="width:40px; text-align: center;">排序</th>
                                <th style="width:60px;text-align: center;">文件类型</th>
                                <th style="width:180px;text-align: center;">文件名</th>
                                <th style="width:80px;text-align: center;">文件大小</th>
                                <th style="width:150px;text-align: center;">生成时间</th>
                                <th style="width:80px;text-align: center;">操作</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php  $i = 1;?>
                            <?php  if(is_array($file)) { foreach($file as $key => $value) { ?>
                            <tr>
                                <td><?php  echo $i;?></td>
                                <td><?php  if($value['type']==0) { ?>文件夹<?php  } else if($value['type']==1) { ?>压缩包<?php  } else if($value['type']==2) { ?>文本文档<?php  } else if($value['type']==3) { ?>表格<?php  } ?></td>
                                <td><?php  echo $value['name'];?></td>
                                <td><?php  echo $value['size'];?>字节</td>
                                <td style="color: #1a7bb9;"><?php  echo date('Y-m-d H:i:s',$value['time']);?></td>
                                <td>
                                    <?php  if(!empty($value['type'])) { ?>
                                    <a href="../addons/ewei_shopv2/data/qrcode/<?php  echo $_W['uniacid'];?>/exchange/<?php  echo $value['name'];?>" class="btn btn-default btn-sm btn-op btn-operation" download="<?php  echo $value['name'];?>">
                                       <span data-toggle="tooltip" data-placement="top" title="" data-original-title="下载">
                                            <i class='icow icow-xiazai4'></i>
                                       </span>
                                    </a>
                                    <?php  } ?>
                                    <a data-toggle="ajaxRemove" href="<?php  echo webUrl('exchange/setting/filedel',array('fname'=>$value['name'],'ftype'=>$value['type']));?>" class="btn btn-default btn-sm btn-op btn-operation" data-confirm="确认删除<?php  echo $value['name'];?> 吗？">
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                                <i class='icow icow-shanchu1'></i>
                                           </span>
                                    </a>
                                </td>
                            </tr>
                            <?php  $i++;?>
                            <?php  } } ?>
                            </tbody>
                        </table>
                    </form>
                    <div style="text-align:right;width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 300px;">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 500px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 class="modal-title" id="myModalLabel">
                    确认删除
                </h3>
            </div>
            <div class="modal-body">
                    确认删除全部兑换码打包文件？删除后将无法下载过去的兑换码打包文件！
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消
                </button>
                <button type="button" class="btn btn-primary suredel">
                    确认删除
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.suredel').click(function () {
            $.ajax({
                url:"<?php  echo webUrl('exchange/setting/delall');?>",
                success:function () {
                    window.location.reload();
            }});
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
