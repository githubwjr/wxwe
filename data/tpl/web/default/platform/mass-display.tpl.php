<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">
	素材定时群发
</div>
<ul class="we7-page-tab">
	<li <?php  if($_GPC['a'] == 'mass'  && $do == 'list') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo url('platform/mass/')?>" >素材定时群发</a>
	</li>
	<li <?php  if($_GPC['a'] == 'mass' && $do == 'send') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo url('platform/mass/send')?>">群发记录</a>
	</li>
</ul>
<div class="alert we7-page-alert">
	<p><i class="wi wi-info-sign"></i> 使用定时群发功能可设置<span class="text-danger">未来8天</span>的群发,使用该功能前请<span class="text-danger">先确保您的云服务可用</span><br></p>
	<p><i class="wi wi-info-sign"></i> <span class="color-dark">如果在提交定时群发提示:某天的群发同步到云服务失败,请<a href="<?php  echo url('platform/mass/send')?>" class="text-danger">手动同步</a>到云服务</span><br></p>
	<p><i class="wi wi-info-sign"></i> <span class="color-dark">使用该功能前,请将微信公众平台的<a href="<?php  echo url('platform/material/')?>" class="text-danger">素材同步到本系统</a></span><br></p>
	<p><i class="wi wi-info-sign"></i> <span class="color-dark">请注意：群发消息中若包含多条图文，只显示第一个</span></p>
</div>
<?php  if($cloud_error == 1) { ?>
<div class="alert alert-danger">
	<h4><i class="fa fa-info-circle"></i> <?php  echo $cloud['message'];?></h4>
</div>
<?php  } ?>
<div class="mass-list" id="mass-display" ng-controller="MassDisplay" ng-cloak>
	<ul>
		<li ng-repeat="dayinfo in days">
			<div class="mass-item active" ng-if="dayinfo.info">
				<div class="mass-item-time" ng-bind="dayinfo.day"></div>
				<div class="mass-content">
					<div class="mass-header" ng-class="{'news': dayinfo.info.msgtype == 'news', 'image' : dayinfo.info.msgtype == 'image', 'voice': dayinfo.info.msgtype == 'voice', 'video': dayinfo.info.msgtype == 'video'}" ng-bind="dayinfo.info.msgtype_zh"></div>
					<div class="mass-matter" ng-if="dayinfo.info.msgtype == 'news'" ng-style="{'background' : 'url(\''+dayinfo.info.media.items[0].thumb_url+'\') 100% 100% / contain no-repeat', 'background-position': 'center'}">
						<div class="mass-matter-title" ng-bind="dayinfo.info.media.items[0].title"></div>
					</div>
					<div class="mass-matter" ng-if="dayinfo.info.msgtype == 'image'" ng-style="{'background': 'url(\''+dayinfo.info.media.attach+'\') 100% 100% / contain no-repeat', 'background-position' : 'center'}">
					</div>
					<div class="mass-matter" ng-if="dayinfo.info.msgtype == 'voice'" ng-style="{'word-break' : 'break-all'}">
						<div class="audio-msg">
							<div class="icon audio-player-play" data-attach="{{dayinfo.info.media.attach}}"><span><i class="fa fa-play"></i></span></div>
							<div class="audio-content">
								<div class="audio-title" ng-bind="dayinfo.info.media.filename"></div>
								<div class="audio-date text-muted" ng-bind="'创建于：' + dayinfo.info.media.createtime_cn"></div>
							</div>
						</div>
					</div>
					<div class="mass-matter" ng-if="dayinfo.info.msgtype == 'video'" ng-style="{'word-break' : 'break-all'}">
						<div class="video-content">
							<h4 class="title text-muted" ng-bind="dayinfo.info.media.attach.tag.title"></h4>
							<div class="date text-muted" ng-bind="'创建于:' + dayinfo.info.media.createtime_cn"></div>
							<div class="video">
								<img src="../web/resource/images/banner-bg.png" alt="" width="100%" height="100%"/>
							</div>
							<div class="abstract text-muted" ng-bind="item.media.tag.description"></div>
						</div>
					</div>
					<div class="mass-footer">
						<a href="javascript:;" ng-click="toEdit($index)" data-toggle="tooltip" data-placement="bottom" title="编辑"><i class="wi wi-text"></i></a>
						<a href="javascript:;" ng-click="delMass(dayinfo.info.id, $index)" data-toggle="tooltip" data-placement="bottom" title="清空"><i class="wi wi-delete2"></i></a>
						<a href="javascript:;" ng-click="preview($index)" data-toggle="tooltip" data-placement="bottom" title="预览"><i class="wi wi-eye"></i></a>
					</div>
				</div>
			</div>
			<div class="mass-item" ng-if="!dayinfo.info">
				<div class="mass-item-time" ng-bind="dayinfo.day"></div>
				<div class="mass-content">
					<a class="mass-add" ng-click="toEdit($index)"></a>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- 预览 -->
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<form action="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">请输入接受人的微信号</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="wxname">微信号</label>
						<input type="text" class="form-control" id="wxname" name="wxname">
						<span class="help-block">微信号不能为空</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary btn-view">发送</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	angular.module('massApp').value('config', {
		days: <?php  echo json_encode($days)?>,
	});
	angular.bootstrap($('#mass-display'), ['massApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
