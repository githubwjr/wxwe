<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">模板消息设置</span>

</div>
<div class="page-content">
    <form  class="form-horizontal form-validate" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-lg control-label must" >模板ID</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'><?php  echo $template['template_id'];?></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label must" >模板名称</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'><?php  echo $template['title'];?></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label must" >所属行业</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'><?php  echo $template['primary_industry'];?>/<?php  echo $template['deputy_industry'];?></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label must" >模板格式</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'>
                    <textarea  style="height: 150px;resize: none;" class="form-control"><?php  echo $template['content'];?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label must" >模板示例</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'>
                    <textarea  style="height: 150px;resize: none;" class="form-control"><?php  echo $template['example'];?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label" ></label>
            <div class="col-sm-9 col-xs-12">
                <a class="btn btn-default  btn-sm" href="<?php  echo webUrl('sysset.weixintemplate')?>">返回列表</a>
            </div>
        </div>

    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
