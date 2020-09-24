<?php defined('IN_IA') or exit('Access Denied');?><div class="modal-dialog" style="width: 800px">
<span action="<?php  echo webUrl('exchange/goods/optionset',array('id'=>$id,'gtype'=>$gtype,'groupid'=>$groupid));?>" method="post" class="form-horizontal form-validate" novalidate="novalidate" id="setform">
<div class="modal-content">
    <div class="modal-header">
        <button data-dismiss="modal" class="close hasoption-close" type="button">×</button>
        <h4 class="modal-title">设置</h4>
    </div>
    <div class="modal-body">
        <table class="table optionset" style="width:100%;">
            <thead>
            <tr>
                <th style="">规格名称</th>
                <th style="width:80px;">原价</th>
                <th style="width:80px;">
                    <div style="padding-bottom:10px;text-align:center;">库存</div>
                </th>
                <th style="width:80px;">
                    <div style="padding-bottom:10px;text-align:center;">运费</div>
                </th>
                <th style="width:50px;text-align: right;"><?php  if($gtype == 1) { ?>全选 <input type="checkbox"><?php  } ?></th>
            </tr>
            </thead>
            <tbody id="param-items" class="ui-sortable">
            <?php  if(is_array($res)) { foreach($res as $k => $v) { ?>
            <tr class="multi-product-item option-item">
                <td><?php  echo $v['title'];?></td>
                <td>¥<?php  echo $v['marketprice'];?></td>
                <td style="text-align:center;">
                    <?php  if($gtype==1) { ?><a href="javascript:;" data-toggle="ajaxEdit" data-href="<?php  echo webUrl('exchange/goods/stock',array('optionid'=>$v['id']));?>"><?php  echo $v['exchange_stock'];?></a><?php  } else { ?><a href="javascript:;" data-toggle="ajaxEdit" data-href="<?php  echo webUrl('exchange/goods/stock',array('goodsid'=>$v['id']));?>"><?php  echo $v['exchange_stock'];?></a><?php  } ?>
                </td>
                <td style="text-align:center;">
                    <?php  if($gtype==1) { ?><a href="javascript:;" data-toggle="ajaxEdit" data-href="<?php  echo webUrl('exchange/goods/postage',array('optionid'=>$v['id']));?>"><?php  echo $v['exchange_postage'];?></a><?php  } else { ?><a href="javascript:;" data-toggle="ajaxEdit" data-href="<?php  echo webUrl('exchange/goods/postage',array('goodsid'=>$v['id']));?>"><?php  echo $v['exchange_postage'];?></a><?php  } ?>
                </td>
                <td style="text-align: right;"><input type="checkbox" name="checkbox[]" value="<?php  echo $v['id'];?>" <?php  if($gtype!=1) { ?>disabled="disabled" checked<?php  } else { ?><?php  if(in_array($v['id'],$select)) { ?>checked<?php  } ?><?php  } ?>></td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="optionset_submit" data-dismiss="modal">保存选择</button>
        <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
    </div>
</div></span>
</div>
<?php  if($gtype == 1) { ?>
<script>
    $(document).ready(function () {
        var arr = new Array();
        var val = '';
        var dataid='';
        var exi = 0;
        var hrefsub = '';
        $("#optionset_submit").click(function () {

            //删除所有input:hidden
            var leng = $("tr[data-id='<?php  echo $id;?>']").find("input").length;
            for (var i = 0;i<Number(leng);i++){
                $("tr[data-id='<?php  echo $id;?>']").find("input")[0].remove();
            }
            //添加input:hidden
            $('.optionset').find(':checkbox').each(function(){
                if ($(this).is(':checked') && $(this).val()>0) {
                    dataid = $(this).val();
                    hrefsub = hrefsub +'_'+ dataid;
                    val = '<?php  echo $id;?>'+'_'+$(this).val();
                    exi = $("input[value="+val+"]").length;
                    if(exi <1){
                        $('tr[data-id="<?php  echo $id;?>"]').append('<input type="hidden" name="has_checkbox[]" value="'+val+'" data="<?php  echo $id;?>">');
                    }
                }
            });

            var href = "<?php  echo webUrl('exchange.goods.optionset',array('gtype'=>1,'groupid'=>$groupid,'id'=>$id),1);?>";

            href = href + '&selected=' + hrefsub;
            $("tr[data-id='<?php  echo $id;?>']").find("a[data-toggle='ajaxModal']").attr("href",href);

        });
    });
</script>
<?php  } ?>
