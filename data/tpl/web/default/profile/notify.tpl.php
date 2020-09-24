<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<div class="we7-page-title">
		参数设置
	</div>
	<ul class="we7-page-tab">
		
		<li>
			<a href="<?php  echo url('profile/payment')?>">支付参数</a>
		</li>
		<li>
			<a href="<?php  echo url('profile/tplnotice')?>">微信通知设置</a>
		</li>
		
		<li>
			<a href="<?php  echo url('profile/passport')?>">借用权限</a>
		</li>
		
		<li class="active">
			<a href="<?php  echo url('profile/notify')?>">邮件通知参数</a>
		</li>
		<li<?php  if($do == 'register') { ?> class="active"<?php  } ?>>
		<a href="<?php  echo url('profile/common/uc_setting')?>">uc站点整合</a>
		</li>
		<li>
		<a href="<?php  echo url('profile/common/upload_file')?>">上传js接口文件</a>
		</li>
	</ul>
<div id="js-profile-notify" ng-controller="emailCtrl">
	<div class="we7-form">
		<form action="" method="post">
		<div class="form-group">
			<label for="" class="control-label col-sm-2">SMTP服务器</label>
			<div class="form-controls col-sm-8 form-control-static">
				<input id='radio-1' type="radio" name="smtp[type]" ng-checked="type == '163'" value="163" ng-click="type = '163'"/>
				<label for="radio-1">网易邮箱服务器（建议使用）</label>
				<input id='radio-2' type="radio" name="smtp[type]" ng-checked="type == 'qq'" value="qq" ng-click="type = 'qq'"/>
				<label for="radio-2">qq邮箱服务器</label>
				<input id='radio-3' type="radio" name="smtp[type]" ng-checked="type == 'custom'" value="custom" ng-click="type = 'custom'"/>
				<label for="radio-3">自定义</label>
				<span class="help-block">SMTP服务器为发送邮件的服务器，系统内置了网易和qq的邮件服务器的信息，可直接使用。如果有特殊需要请自定义SMTP服务器</span>
			</div>
		</div>
		<div class="form-group" ng-show="type == 'custom'">
			<label for="" class="control-label col-sm-2">SMTP服务器地址</label>
			<div class="form-controls col-sm-8">
				<input type="text"  name="smtp[server]" value="<?php  echo $mail_setting['smtp']['server'];?>" style="width: 600px" class="form-control" placeholder="">
				<span class="help-block">指定SMTP服务器的地址 </span>
			</div>
		</div>
		<div class="form-group" ng-show="type == 'custom'">
			<label for="" class="control-label col-sm-2">SMTP服务器端口</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="smtp[port]" value="<?php  echo $mail_setting['smtp']['port'];?>" style="width: 600px" class="form-control" placeholder="">
				<span class="help-block">指定SMTP服务器的端口 </span>
			</div>
		</div>
		<div class="form-group" ng-show="type == 'custom'">
			<label for="" class="control-label col-sm-2">使用SSL加密</label>
			<div class="form-controls col-sm-8  form-control-static">
				<input id='radio-11' type="radio" name="smtp[authmode]" value="1" ng-checked="setting['smtp']['authmode'] == 1" />
				<label for="radio-11">是</label>
				<input id='radio-12' type="radio" name="smtp[authmode]" value="0" ng-checked="setting['smtp']['authmode'] == 0 || setting['smtp']['authmode'] == undefined"/>
				<label for="radio-12">否</label>
				<span class="help-block">开启此项后，连接将用SSL的形式，此项需要SMTP服务器支持</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">发送帐号用户名</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="username" value="<?php  echo $mail_setting['username'];?>" style="width: 600px" class="form-control" placeholder="">
				<span class="help-block">指定发送邮件的用户名，例如：test@163.com </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">smtp客户端授权密码</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="password" value="<?php  echo $mail_setting['password'];?>" style="width: 600px" class="form-control"  autocomplete="off" ng-focus="changeType($event)">
				<span class="help-block">指定发送邮件的密码，QQ邮箱此处为授权码，
				<a href="http://service.mail.qq.com/cgi-bin/help?subtype=1&amp;&amp;id=28&amp;&amp;no=1001256" target="_Blank" id="code">查看授权码获取方法</a>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">发件人名称</label>
			<div class="form-controls col-sm-8">
				<input type="text"  name="sender" value="<?php  echo $mail_setting['sender'];?>" style="width: 600px" class="form-control" placeholder="">
				<span class="help-block">指定发送邮件发信人名称 </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">邮件签名</label>
			<div class="form-controls col-sm-8">
				<textarea rows="5" name="signature" style="width: 600px" class="form-control" placeholder=""><?php  echo $mail_setting['signature'];?></textarea>
				<span class="help-block">指定邮件末尾添加的签名信息 </span>
			</div>
		</div>
		<input type="submit" name="submit" value="提交" class="btn btn-primary" />
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
		</form>
	</div>
</div>
<script>
	angular.module('profileApp').value('config', {
		'setting' : <?php  echo json_encode($mail_setting)?>
	});
	angular.bootstrap($('#js-profile-notify '), ['profileApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
