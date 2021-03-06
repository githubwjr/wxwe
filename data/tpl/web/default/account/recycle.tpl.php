<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">公众号管理</div>
<ul class="we7-page-tab">
	<li><a href="<?php  echo url('account/manage');?>">公众号列表</a></li>
	<?php  if($_W['role'] == ACCOUNT_MANAGE_NAME_OWNER || $_W['role'] == ACCOUNT_MANAGE_NAME_FOUNDER) { ?>
	<li class="active"><a href="<?php  echo url('account/recycle');?>">公众号回收站</a></li>
	<?php  } ?>
</ul>
<div class="clearfix we7-margin-bottom">
	<form action="" class="form-inline  pull-left" method="get">
		<input type="hidden" name="c" value="account">
		<input type="hidden" name="a" value="recycle">
		<div class="input-group form-group" style="width: 400px;">
			<input type="text" name="keyword" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="搜索关键字"/>
			<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
		</div>
	</form>
</div>                                                                                              
<table class="table we7-table table-hover vertical-middle table-manage" id="js-system-account-recycle" ng-controller="SystemAccountRecycle" ng-cloak>
	<col width="85px" />
	<col />
	<col width="208px" />
	<col width="100px"/>
	<col width="150px" />
	<tr>
		<th colspan="2" class="text-left">公众号</th>
		<th>有效期</th>
		<th>短信数(条)</th>
		<th class="text-right">操作</th>
	</tr>
	<tr class="color-gray" ng-repeat="list in del_accounts">
		<td class="text-left">
			<img ng-src="{{list.thumb}}" class="img-responsive">
		</td>
		<td class="text-left">
			<p class="color-dark" ng-bind="list.name"></p>
			<span class="color-gray" ng-if="list.level == 1">类型：普通订阅号</span>
			<span class="color-gray" ng-if="list.level == 2">类型：普通服务号</span>
			<span class="color-gray" ng-if="list.level == 3">类型：认证订阅号</span>
			<span class="color-gray" ng-if="list.level == 4">类型：认证服务号</span>
			<span class="color-red" ng-if="list.isconnect == 0" data-toggle="tooltip" data-placement="right" title="公众号接入状态显示“未接入”解决方案：进入微信公众平台，依次选择: 开发者中心 -> 修改配置，然后将对应公众号在平台的url和token复制到微信公众平台对应的选项，公众平台会自动进行检测"><i class="wi wi-error-sign"></i>未接入</span>
			<span class="color-green" ng-if="list.isconnect == 1"><i class="wi wi-right-sign"></i>已接入</span>
		</td>
		<td>
			<p ng-bind="list.setmeal.timelimit"></p>
		</td>
		<td><p ng-bind="list.sms"></p></td>
		<td class="vertical-middle">
			<div class="link-group">
				<a ng-href="{{links.postRecover}}&acid={{list.acid}}&uniacid={{list.uniacid}}">恢复</a>
				<a class="del" ng-href="{{links.postDel}}&acid={{list.acid}}&uniacid={{list.uniacid}}" onclick="if(!confirm('此为永久删除，删除后不可找回！确认吗？')) return false;">删除</a>
			</div>
		</td>
	</tr>
	<tr ng-if="!del_accounts">
		<td colspan="5" class="text-center">暂无数据</td>
	</tr>
</table>
<div class="text-right">
	<?php  echo $pager;?>
</div>
<script>
	$(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	angular.module('accountApp').value('config', {
		del_accounts: <?php echo !empty($del_accounts) ? json_encode($del_accounts) : 'null'?>,
		links: {
			postRecover: "<?php  echo url('account/recycle/recover')?>",
			postDel: "<?php  echo url('account/recycle/delete')?>",
		}
	});
	angular.bootstrap($('#js-system-account-recycle'), ['accountApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>