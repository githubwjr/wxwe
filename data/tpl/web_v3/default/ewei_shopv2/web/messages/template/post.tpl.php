<?php defined('IN_IA') or exit('Access Denied');?><?php  $no_left=true?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .form-horizontal .form-group{margin-right: -50px;}
    .col-sm-8{padding-right: 0;}
	.tm .btn { margin-bottom:5px;}
</style>

<div class="page-header">
	

    当前位置：<span class="text-primary"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>消息模板 <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】<?php  } ?></small></span>
</div>

<div class="page-content">
    <div class="page-sub-toolbar">
        <span class=''>

		<?php if(cv('messages.template.add')) { ?>
                            <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('messages/template/add')?>">添加消息模板</a>
		<?php  } ?>

                <a class='btn btn-warning btn-sm' data-toggle='popover' href="javascript:;" data-placement='bottom' data-html='true'
                   data-content="如模板详情为: <br/><br/> {{first.DATA}}<br/>
                            订单金额：{{keyword1.DATA}}<br/>
商品详情：{{keyword2.DATA}}<br/>
收货信息：{{keyword3.DATA}}<br/>
{{remark.DATA}}<br/><br/>

<b>头部标题</b>：{{keyword1.DATA}}<br/>
<b>键名</b>：keyword1/keyword2 <br/><b>键值</b>： 您要设置的模板项的值<br/>
<b>尾部描述</b>：{{remark.DATA}}<br/>
">
                    <i class='fa fa-question-circle' style="color: #fff;"></i> 简易帮助
                </a>
	</span>
    </div>
<div class="row">
	<div class="col-sm-8">
	 <form <?php if( ce('messages.template' ,$list) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
                <input type="hidden" name="tp_id" value="<?php  echo $list['id'];?>" />
                <div class="form-group">
                    <label class="col-lg control-label must" >模板名称</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php if( ce('messages.template' ,$list) ) { ?>
                        <input type="text"  id="tp_title" name="tp_title" class="form-control" value="<?php  echo $list['title'];?>" placeholder="模版名称，例：新品上市通知群发（自定义）" data-rule-required='true' />
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $list['title'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg control-label must" >模板消息ID</label>
                    <div class="col-sm-8 col-xs-12">
                            <?php if( ce('messages.template' ,$list) ) { ?>
                        <input type="text"  id="tp_template_id" name="tp_template_id" class="form-control" value="<?php  echo $list['template_id'];?>" placeholder="模版消息ID，例：P8MxRKmW7wdejmZl14-swiGmsJVrFJiWYM7zKSPXq4I" data-rule-required='true' />
                             <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $list['template_id'];?></div>
                        <?php  } ?>
                    </div> 
                </div> 
                <div class="form-group">
                    <label class="col-lg control-label must" >头部标题</label>  
                    
                    <?php if( ce('messages.template' ,$list) ) { ?>
                    <div class="col-sm-8 title" style='padding-right:0' >
                            
                        <textarea name="tp_first" class="form-control" value="" data-rule-required='true' placeholder="{{first.DATA}}" rows="5"><?php  echo $list['first'];?></textarea>
                        <span class='help-block'>对填充模板 {{first.DATA}} 的值 </span>
                    </div>
                       <div class="col-sm-1" style='padding-left:0;' >
                        
						   <input type="color" name="firstcolor" value="<?php  echo $list['firstcolor'];?>" style="width:32px;height:32px;" />
                        
                    </div>
                       <?php  } else { ?>
                       <div class="col-sm-3">
                             <div class='form-control-static'><?php  echo $list['first'];?> 颜色: <?php  echo $list['firstcolor'];?></div>
                             </div>
                        <?php  } ?>
                        
                </div>
                  
                <?php  if(is_array($data)) { foreach($data as $list2) { ?>
                    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('messages/template/tpl', TEMPLATE_INCLUDEPATH)) : (include template('messages/template/tpl', TEMPLATE_INCLUDEPATH));?>
                <?php  } } ?>
                  <?php if( ce('messages.template' ,$list) ) { ?>
                <div id="type-items"></div>
                <div class="form-group">
                    <label class="col-lg control-label" ></label>
                    <div class="col-sm-8 col-xs-12">
                        <a class="btn btn-default btn-add-type" href="javascript:;" onclick="addType();"><i class="fa fa-plus" title=""></i> 增加一条键</a>
                        <span class='help-block'>
                        
                        </span>
                    </div>
                </div>
                <?php  } ?>
                
                <div class="form-group">
                    <label class="col-lg control-label" >尾部描述</label>
                       <?php if( ce('messages.template' ,$list) ) { ?>
                     <div class="col-sm-8 title" style='padding-right:0' >
                        <textarea name="tp_remark" class="form-control" placeholder="{{remark.DATA}}" rows="5"><?php  echo $list['remark'];?></textarea>
                      <span class='help-block'>填充模板 {{remark.DATA}} 的值</span>
                    </div>
                    <div class="col-sm-1" style='padding-left:0' >
                     
						    <input type="color" name="remarkcolor" value="<?php  echo $list['remarkcolor'];?>" style="width:32px;height:32px;" />
                        
                    </div>
                    
                        <?php  } else { ?>
                        <div class="col-sm-3">
                             <div class='form-control-static'><?php  echo $list['remark'];?> 颜色: <?php  echo $list['remarkcolor'];?></div>
                         </div>
                        <?php  } ?>
                        
                </div>
                <div class="form-group">
                    <label class="col-lg control-label" >消息链接</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php if( ce('messages.template' ,$list) ) { ?>
	                        <div class="input-group ">
								<input type="text" name="tp_url" class="form-control" value="<?php  echo $list['url'];?>" placeholder="" id="tpl_url" />
								<span data-input="#tpl_url" data-toggle="selectUrl" data-full="true" class="input-group-addon btn btn-default">选择链接</span>
							</div>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $list['url'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg control-label" >小程序链接</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php if( ce('messages.template' ,$list) ) { ?>
                        <label class="radio-inline coupon-radio">
                            <input type="radio" name="miniprogram" value="1" <?php  if($list['miniprogram'] == 1) { ?>checked="true"<?php  } ?>  onclick="$('.miniprogramshow').show();"/> 开启
                        </label>
                        <label class="radio-inline coupon-radio">
                            <input type="radio" name="miniprogram" value="0" <?php  if($list['miniprogram'] == 0) { ?>checked="true"<?php  } ?> onclick="$('.miniprogramshow').hide();" /> 关闭
                        </label>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $list['url'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group miniprogramshow" <?php  if(empty($list['miniprogram'])) { ?>style="display: none;"<?php  } ?>>
                    <label class="col-lg control-label" >小程序APPID</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php if( ce('messages.template' ,$list) ) { ?>
                        <input type="text"  id="appid" name="appid" class="form-control" value="<?php  echo $list['appid'];?>"  data-rule-required='true' />
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $list['appid'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group miniprogramshow" <?php  if(empty($list['miniprogram'])) { ?>style="display: none;"<?php  } ?>>
                    <label class="col-lg control-label" >小程序链接路径</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php if( ce('messages.template' ,$list) ) { ?>
                        <div class="input-group form-group">
                            <input type="text" name="pagepath" class="form-control" value="<?php  echo $list['pagepath'];?>" placeholder="" id="pagepath" />
                              <span data-input="#pagepath" data-toggle="selectUrl" data-platform="wxapp" class="input-group-addon btn btn-default">选择链接</span>

                        </div>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $list['pagepath'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group"></div>
                  <div class="form-group">
                    <label class="col-lg control-label" ></label>
                    <div class="col-sm-8 col-xs-12">
                        <?php if( ce('messages.template' ,$list) ) { ?>
                       <input type="submit"  value="提交" class="btn btn-primary"  />
	       
                        <?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('messages.template.add|messages.template.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                    </div>
                </div>
	 
</form>
		
	</div>
	<div class="col-sm-4">

        <div class="col-sm-4"  style="width:310px;margin-left:20px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span style="font-size: 15px">第一步：</span>添加我的模板
                </div>
                <div class="panel-body">
                    <input type="text" id="tempcode" class="form-control" placeholder="模板编号,例:TM00015" style="margin-bottom: 5px;"  value="" />
                    <a class="btn btn-default" href="javascript:;" onclick="addtempoption();"> 添加快速模板</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4"  style="width:310px;margin-left:20px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span style="font-size: 15px">第二步：</span>选择模板
                </div>
                <div class="panel-body">
                    <select id="selecttemplate"  class=" form-control" style="margin-bottom: 5px;">
                    </select>
                    <a class="btn btn-default" href="javascript:;"  onclick="selecttemp();"> 选择模板</a>
                    <a class="btn btn-default" href="javascript:;"  onclick="deltempoption();"> 删除模板</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4  shilidiv"  style="width:310px;margin-left:20px; display: none;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    模板展示:
                </div>
                <div class="panel-body">
                    <div id="shili" class="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4"  style="width:310px;margin-left:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    模板变量:
                </div>
                <div class="panel-body">
                    <a href='JavaScript:' class="btn btn-default btn-sm">商城名称</a>
                    <a href='JavaScript:' class="btn btn-default btn-sm">粉丝昵称</a>
                </div>

                <div class="panel-body">
                    点击变量后会自动插入选择的文本框的焦点位置，在发送给粉丝时系统会自动替换对应变量值
                    <div class="text text-danger">
                        注意：以上模板消息变量只适用于系统类通知，会员群发工具不适用
                    </div>
                </div>
            </div>
        </div>

	</div>
</div>
</div>
<script language='javascript'>

    var kw = 1;
    var temps;
    var contents;
    restempoption();

    function selecttemp()
    {
        var tid = $("#selecttemplate").val();
        var temp;

        for(var i=0;i<temps.length;i++){
            if(temps[i].template_id==tid)
            {
                temp =temps[i];
                break;
            }
        }

        if(temp==null)
        {
            return;
        }else
        {
            contents = temp.contents;

            if(contents[0]!='first'||contents[contents.length-1]!='remark')
            {
                alert("此模板不可用!");
                return;
            }
            $("#shili").html(temp.content);

            $(".shilidiv").show();

            $("#tp_title").val(temp.title);
            $("#tp_template_id").val(temp.template_id);

            $('.key_item').remove();

            setcontents(0);
        }
    }


    function setcontents(i){

        if(contents.length==i)
        {
            return;
        }
        if(contents[i]!='first'&&contents[i]!='remark')
        {
            var data = {
                tpkw: contents[i]
            };
            $.ajax({
                url: "<?php  echo webUrl('messages/template/tpl')?>",
                cache: false,
                data:data
            }).done(function (html) {
                $(".btn-add-type").button("reset");
                $("#type-items").append(html);
                i++
                setcontents(i);
            });
        }else
        {
            i++
            setcontents(i);
        }
    }



    function addtempoption() {
        var tempcode = $("#tempcode").val();
        var data = {
            templateidshort: tempcode
        };
        $.ajax({
            url: "<?php  echo webUrl('messages/template/gettemplateid')?>",
            data: data,
            cache: false
        }).done(function (result) {

            var  data= jQuery.parseJSON(result);

            if(data.status==1) {
                alert("加入成功");
                restempoption();
            }else
            {
                alert("失败");
                alert(data.result.message);
            }

        });
    }


    function deltempoption() {
        var tid = $("#selecttemplate").val();
        var data = {
            template_id: tid
        };
        $.ajax({
            url: "<?php  echo webUrl('messages/template/deltemplatebyid')?>",
            data: data,
            cache: false
        }).done(function (result) {

            var  data= jQuery.parseJSON(result);

            if(data.status==1) {
                alert("删除成功");
                restempoption();
            }else
            {
                alert("失败");
                alert(data.result.message);
            }

        });
    }

    function restempoption() {
        $.ajax({
            url: "<?php  echo webUrl('messages/template/gettemplatelist')?>",
            cache: false
        }).done(function (result) {

            var  data= jQuery.parseJSON(result);

            if(data.status==1)
            {
                $("#selecttemplate option").remove();

                temps =data.result.template_list;
                for(var i=0;i<temps.length;i++){

                    $("#selecttemplate").append("<option value='"+temps[i].template_id+"'>"+temps[i].title+"</option>");
                }
            }
        });
    }

    function addType() {
        $(".btn-add-type").button("loading");
        $.ajax({ 
            url: "<?php  echo webUrl('messages/template/tpl')?>&kw="+kw,
            cache: false
        }).done(function (html) {
            $(".btn-add-type").button("reset");
            $("#type-items").append(html);
        });
        kw++;
    }
 
    $('form').submit(function(){
        if($('.key_item').length<=0){
            tip.msgbox.err('请添加一条键!');
            $('form').attr('stop',1);
            return false;
        }

        var checkkw = true;
        $(":input[name='tp_kw[]']").each(function(){
            if ( $.trim( $(this).val() ) ==''){
                checkkw = false;
                tip.msgbox.err('请输入键名!');
                $(this).focus();
                $('form').attr('stop',1);
                return false;
            }
        });
        if( !checkkw){
            return false;
        }
        $('form').removeAttr('stop');
        return true;
    });



    $(function () {
        require(['jquery.caret'],function(){
            var jiaodian;
            $(document).on('focus', 'input,textarea',function () {
                jiaodian = this;
            });

            $("a[href='JavaScript:']").click(function () {
                if (jiaodian) {
                    $(jiaodian).insertAtCaret("["+this.innerText+"]" );
                }
            })

        })
    })
 
    </script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

