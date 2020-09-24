<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">关联设置</div>
<table class="table we7-table table-hover vertical-middle">
	<col width="180px" />
	<col width="140px"/>
	<col width="140px" />
	<tr>
		<th class="text-left">关联设置</th>
		<th class="text-left">公众号</th>
		<th class="text-right">操作</th>
	</tr>
	<?php  if(!empty($version_info['modules'])) { ?>
	<?php  if(is_array($version_info['modules'])) { foreach($version_info['modules'] as $module) { ?>
	<tr>
		<td class="text-left">
			<img src="<?php  echo $module['logo'];?>" style="width:50px;height:50px;">
			<?php  echo $module['title'];?>
		</td>
		<td class="text-left">
			<?php  if(!empty($module['account'])) { ?>
				<img src="<?php  echo tomedia('headimg_'.$module['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" style="width:50px;height:50px;">
				<span><?php  echo $module['account']['name'];?></span>
			<?php  } else { ?>
				<span>暂无</span>
			<?php  } ?>
		</td>
		<td>
			<div class="link-group">
				<?php  if(!empty($module['account'])) { ?>
					<a href="javascript:;" data-module="<?php  echo $module['name'];?>" class="js-select-link-account">修改</a>
					<a href="<?php  echo url('wxapp/version/module_unlink_uniacid', array('version_id' => $version_info['id']))?>">删除</a>
				<?php  } else { ?>
					<a href="javascript:;" data-module="<?php  echo $module['name'];?>" class="js-select-link-account">添加</a>
				<?php  } ?>
			</div>
		</td>
	</tr>
	<?php  } } ?>
	<?php  } ?>
</table>
<div class="modal fade" id="show-account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog we7-modal-dialog" style="width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">选择公众号(点击选择)</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body we7-padding">
					<div class="row js-show-account-content">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.js-select-link-account').click(function(){
		var modulename = $(this).data('module');
		$.getJSON('./index.php?c=wxapp&a=version&do=search_link_account&module_name='+$(this).data('module'), function(data){
			if (data.message.message) {
				for (i in data.message.message) {
					var html =  '<div class="col-sm-2 text-center we7-margin-bottom">'+
								'	<a href="javascript:;" class="js-select-uniacid" data-module="'+modulename+'" data-uniacid="'+data.message.message[i].uniacid+'">'+
								'		<img src="" alt="" style="width:50px;height:50px;">'+
								'		<p class="text-over">'+data.message.message[i].name+'</p>'+
								'	</a>'+
								'</div>';
					$('.js-show-account-content').append(html);
				}
			}
			$('.js-select-uniacid').click(function(){
				$.post('./index.php?c=wxapp&a=version&do=module_link_uniacid&module_name='+modulename, {
					'submit' : 'yes', 
					'token' : '<?php  echo $_W['token'];?>', 
					'module_name' : modulename,
					'uniacid' : $(this).data('uniacid'),
					'version_id' : '<?php  echo $version_id;?>',
				}, function(data){
					if (data.message.errno == 0) {
						util.message('关联成功', 'refresh', 'success')
					} else {
						util.message(data.message.message);
					}
				}, 'json');
			});
			$('#show-account').modal();
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>