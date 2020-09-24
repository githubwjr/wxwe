<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .popover{z-index:10000;}
    .alert{margin-top:10px;}
</style>
<div style='max-height:500px;overflow:auto;min-width:850px;'>
    <table class="table">
        <thead>
        <tr>
            <td>应用名称</td>
            <th style="width:100px;text-align: center;">操作</th>
        </tr>
        </thead>
        <tbody class="ui-sortable">
        <?php  if(is_array($plugins)) { foreach($plugins as $row) { ?>
        <tr>
            <td>
                <?php  echo $row['title'];?>
            </td>
            <td style="text-align: center;">
                <a href="javascript:;" class="label label-primary" onclick='biz.selector.set(this, <?php  echo json_encode($row);?>)'>选择</a>
            </td>
        </tr>
        <?php  } } ?>
        <?php  if(count($plugins)<=0) { ?>
        <tr>
            <td colspan='4' align='center'>未找到应用</td>
        </tr>
        <?php  } ?>
        </tbody>
    </table>
    <div style="text-align:right;width:100%;">
        <?php  echo $pager;?>
    </div>
</div>
<script type="text/javascript">
    require(['bootstrap'], function ($) {
        $('[data-toggle="tooltip"]').tooltip({
            container: $(document.body)
        });
        $('[data-toggle="popover"]').popover({
            container: $(document.body)
        });
    });
    //分页函数
    var type = '';
    function select_page(url,pindex,obj) {
        if(pindex==''||pindex==0){
            return;
        }
        var keyword = $.trim($("#goodsid_input").val());
        $("#goodsid_input").html('<div class="tip">正在进行搜索...</div>');

        $.ajax({
            url:"<?php  echo webUrl('system/plugin/pluginmanage/query')?>",
            type:'get',
            data:{title:keyword,page:pindex,psize:8},
            async : false, //默认为true 异步
            success:function(data){
                $(".content").html(data);
            }
        });
    }

</script>
