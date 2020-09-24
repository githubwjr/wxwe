<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='page-header'>
    当前位置：<span class="text-primary">投诉类别  <?php if(cv('sns.complain.category')) { ?><small>拖动可以排序</small><?php  } ?></span>
</div>
<div class="page-content">
  <form action="" method="post" class='form-validate'>
        <table class="table  table-responsive">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:60px;">ID</th>
                    <th>类别名称</th>
                    <th style="width:80px;"></th>
                    <th style="width: 45px;"></th>
                </tr>
            </thead>
            <tbody id='tbody-items'>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td>
                        <?php  echo $row['id'];?>
                      <input type="hidden" name="catid[]" value="<?php  echo $row['id'];?>" >
                    </td>

                    <td>
                        <?php if(cv('sns.complain.category')) { ?>
                           <input type="text" class="form-control" name="catname[]" value="<?php  echo $row['name'];?>" >
                        <?php  } else { ?>
                           <?php  echo $row['name'];?>
                        <?php  } ?>
                    </td>
						<td>
							<?php if(cv('sns.complain.category')) { ?>
						<input type="hidden" class="form-control" name="status[]" value="<?php  echo $row['status'];?>">
						<label class='checkbox-inline' onclick="$(this).prev(':hidden').val( $(this).find(':checkbox').get(0).checked?'1':'0' ); ">
							<input type='checkbox' <?php  if($row['status']==1) { ?>checked<?php  } ?>  /> 显示
						</label>
						<?php  } else { ?>
							<?php  if(!empty($row['status'])) { ?>显示<?php  } else { ?>隐藏<?php  } ?>
						<?php  } ?>
					</td>
                    <td>
                          <?php if(cv('sns.complain.category')) { ?>
                          	<a href="<?php  echo webUrl('sns/complain/catedel', array('id' => $row['id']))?>" data-toggle='ajaxRemove' class="btn btn-default btn-sm btn-op btn-operation" data-confirm="确认删除此分类?">
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">
                                    <i class="icow icow-shanchu1 "></i>
                                 </span>
                            </a>
                          <?php  } ?>
                    </td>

                </tr>
                <?php  } } ?>
                 </tbody>
                <tr>
                    <td colspan="4">
                          <?php if(cv('sns.complain.category')) { ?>
                            <input name="button" type="button" class="btn btn-default" value="添加类别" onclick='addCategory()'>
                            <input type="submit" class="btn btn-primary" value="保存类别">
                           <?php  } ?>
                    </td>
                </tr>


        </table>
        <?php  echo $pager;?>


</form>
</div>
<script>

     <?php if(cv('sns.complain.category.edit')) { ?>
    require(['jquery.ui'],function(){
        $('#tbody-items').sortable();
    })
    <?php  } ?>

    function addCategory(){
         var html ='<tr>';
         html+='<td><i class="fa fa-plus"></i></td>';
         html+='<td>';
         html+='<input type="hidden" class="form-control" name="catid[]" value=""><input type="text" class="form-control" name="catname[]" value="">';
         html+='</td>';
         html+='<td>';
         html+='</td>';

         html+='<td></td></tr>';;
         $('#tbody-items').append(html);
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
