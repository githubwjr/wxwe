<?php defined('IN_IA') or exit('Access Denied');?><div class="alert alert-warning">
	<p>注意：</p>
	<p>1. 文章开启访问权限后将不在列表中显示，只能通过关键字或链接进入</p>
	<p>2. 无权访问的人将不会为分享者增加奖励</p>
	<p>3. 开启后请勾选有访问权限的等级</p>
</div>

<div class="form-group">
	<label class="col-lg control-label">访问权限</label>
	<div class="col-sm-9 col-xs-12">
		<label class="radio-inline"><input type="radio" name="article_visit" value="1" <?php  if(!empty($article['article_visit'])) { ?>checked="true"<?php  } ?>> 开启</label>
		<label class="radio-inline"><input type="radio" name="article_visit" value="0" <?php  if(empty($article['article_visit'])) { ?>checked="true"<?php  } ?>>关闭</label>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label">会员等级</label>
	<div class="col-sm-9 col-xs-12">
		<?php  if(is_array($levels['member'])) { foreach($levels['member'] as $level) { ?>
			<label class="checkbox-inline"><input type="checkbox" name="article_visit_level[member][]" value="<?php  echo $level['id'];?>" <?php if(in_array($level['id'], $article['article_visit_level']['member'] ? $article['article_visit_level']['member'] : array())) { ?>checked="checked"<?php  } ?>> <?php  echo $level['levelname'];?></label>
		<?php  } } ?>
	</div>
</div>


<?php  if(!empty($levels['commission'])) { ?>
<div class="form-group">
	<label class="col-lg control-label">分销商等级</label>
	<div class="col-sm-9 col-xs-12">
		<?php  if(is_array($levels['commission'])) { foreach($levels['commission'] as $level) { ?>
			<label class="checkbox-inline"><input type="checkbox" name="article_visit_level[commission][]" value="<?php  echo $level['id'];?>" <?php if(in_array($level['id'], $article['article_visit_level']['commission'] ? $article['article_visit_level']['commission'] : array())) { ?>checked="checked"<?php  } ?>> <?php  echo $level['levelname'];?></label>
		<?php  } } ?>
	</div>
</div>
<?php  } ?>

<div class="form-group">
	<label class="col-lg control-label">无权提示</label>
	<div class="col-sm-9 col-xs-12">
		<div class="input-group">
			<span class="input-group-addon">文字</span>
			<input class="form-control" value="<?php  echo $article['article_visit_tip']['text'];?>" name="article_visit_tip[text]" placeholder="" />
		</div>
		<div class="help-block">无权访问时的提示文字，例如：您的等级无权访问</div>
	</div>
</div>

<div class="form-group">
	<label class="col-lg control-label"></label>
	<div class="col-sm-9 col-xs-12">
		<div class="input-group">
			<span class="input-group-addon">链接</span>
			<input class="form-control" value="<?php  echo $article['article_visit_tip']['link'];?>" id="noperm" name="article_visit_tip[link]" placeholder="" />
			<span data-input="#noperm" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
		</div>
		<div class="help-block">无权访问时点击确认是跳转的链接，不填则跳转首页</div>
	</div>
</div>
