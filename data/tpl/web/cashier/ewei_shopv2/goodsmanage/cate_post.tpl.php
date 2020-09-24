<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-default panel-class" style="margin-top: 20px;">
	<div class="panel-heading">添加/修改 商品分类</div>
	<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />

	<div class="form-group">
		<label class="col-sm-2 control-label">排序</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="displayorder" id="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
			<span class='help-block'>数字越大，排名越靠前,如果为空，默认排序方式为创建时间</span>
		</div>
	</div>

	 <div class="form-group">
		<label class="col-sm-2 control-label must">分类名称</label>
		<div class="col-sm-9 col-xs-12 ">
			<input type="text" id='catename' name="catename" class="form-control" value="<?php  echo $item['catename'];?>" data-rule-required="true" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-9 col-xs-12">
			<label class='radio-inline'>
				<input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 是
			</label>
			<label class='radio-inline'>
				<input type='radio' name='status' value='0' <?php  if(empty($item['status'])) { ?>checked<?php  } ?> /> 否
			</label>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<input type="submit" value="提交" class="btn btn-primary"  />
		</div>
	</div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>