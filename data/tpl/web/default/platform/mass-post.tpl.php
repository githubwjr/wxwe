<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="">
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo url('platform/mass/')?>"><i class="wi wi-back-circle"></i> </a>
		<li><a href="<?php  echo url('platform/mass/')?>">素材定时群发</a></li>
		<li><a href="<?php  echo url('platform/mass/post', array('day' => $_GPC['day']))?>">编辑</a></li>
	</ol>
	<div class="we7-form" id="js-mass-post" ng-controller="MassPost" ng-cloak>
		<form action="" method="post" ng-submit="checkSubmit($event)">
			<input type="hidden" name="day" value="<?php  echo $_GPC['day'];?>">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<div class="form-group">
				<label class="control-label col-sm-2">群发对象</label>
				<div class="form-controls col-sm-8">
					<input type="hidden" name="group" value="">
					<select class="we7-select mass-group">
						<option ng-repeat="group in groups" ng-selected="group.name == massdata.groupname" ng-bind="group.name" ng-value="group.id"></option>
					</select>
					<span class="help-block"> 根据条件对群发对象进行筛选</span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">发送时间</label>
				<div class="form-controls col-sm-8">
					<div class="input-group clockpicker">
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<input type="text" readonly name="clock" ng-model="clock" class="form-control">
					</div>
					<span class="help-block text-danger">特别注意:发送时间不能小于当前时间.不要超过晚上11点</span>
				</div>
			</div>
			<?php  echo module_build_form('core', $massdata['id'], array('news'=> false, 'image'=> false,'voice'=> false,'video'=> false))?>
			<input type="submit" name="submit" value="发布" class="btn btn-primary btn-submit"/>
		</form>
	</div>
</div>
<script>
require(['underscore', 'clockpicker'], function() {
	angular.module('massApp').value('config', {
		massdata: <?php  echo json_encode($massdata)?>,
		groups: <?php  echo json_encode($groups)?>,
		day: <?php  echo json_encode($_GPC['day'])?>
	});
	angular.bootstrap($('#js-mass-post'), ['massApp']);
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>