<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header" style="margin-bottom:0">
    <span class="pull-right">
        </span>
    当前位置：<span class="text-primary"><?php  if($id>0) { ?>编辑商品兑换任务<?php  } else { ?>添加商品兑换任务<?php  } ?></span>
</div>

<div class="page-content">
<div class="form-group" style="padding: 30px 10px 0"></div>
<?php  if(!empty($id)) { ?>
<ul id="myTab" class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab"><?php  if($id>0) { ?>编辑商品兑换<?php  } else { ?>添加商品兑换<?php  } ?></a></li>
    <li><a href="#message" data-toggle="tab">消息通知</a></li>
    <li><a href="#zhuangxiu" data-toggle="tab">页面设置</a></li>
</ul>
<?php  } ?>
<div id="myTabContent" class="tab-content">


    <div class="tab-pane fade in active" id="home">
        <form <?php  if($id>0) { ?>action="<?php  echo webUrl('exchange/score/edit',array('id'=>$id),true);?>"<?php  } else { ?>action="<?php  echo webUrl('exchange/score/add',array(),true);?>"<?php  } ?> method="post" class="form-horizontal form-validate"
            novalidate="novalidate" id="setform">
            <div class="form-group">
                <label class="col-lg control-label">兑换任务标题</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" placeholder="请输入标题" class="form-control" name="title"
                           value="<?php  echo $setting['title'];?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">兑换开始时间</label>
                <div class="col-sm-9 col-xs-12">
                    <?php  echo tpl_form_field_date('starttime',$setting['starttime'],true);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">兑换截止时间</label>
                <div class="col-sm-9 col-xs-12">
                    <?php  echo tpl_form_field_date('endtime',$setting['endtime'],true);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg control-label">兑换模式</label>
                <div class="col-sm-9 col-xs-12">
                    <label for="bdadd" class="radio-inline"><input type="radio" name="type" class="type" value="1" id="bdadd" onclick="$('#zhiding').show();$('#suiji').hide();" <?php  if($setting['type']!=2) { ?>checked<?php  } ?>> 指定积分兑换</label>
                    <label for="adadd" class="radio-inline"><input type="radio" name="type" class="type" value="2" id="adadd" onclick="$('#zhiding').hide();$('#suiji').show();" <?php  if($setting['type']==2) { ?>checked<?php  } ?>> 随机积分兑换</label>
                </div>
            </div>
            <div class="form-group" id="zhiding" <?php  if($setting['type']==2) { ?>style="display: none;"<?php  } ?>>
            <label class="col-lg control-label">指定面值</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group fixsingle-input-group">
                    <input type="text" class="form-control" name="value" value="<?php  echo $setting['score'];?>">
                    <span class="input-group-addon">积分</span>
                </div>
            </div>
    </div>
    <div class="form-group" id="suiji" <?php  if($setting['type']!=2) { ?>style="display: none"<?php  } ?>>
    <label class="col-lg control-label">随机面值</label>
    <div class="col-sm-9 col-xs-12">
        <div class="input-group fixmore-input-group">
            <input type="text" name="left_rand" id="marketprice" class="form-control"
                   value="<?php  echo $setting['score_left'];?>">
            <span class="input-group-addon">积分</span><span class="input-group-addon">至</span>
            <input type="text" name="right_rand" id="productprice" class="form-control"
                   value="<?php  echo $setting['score_right'];?>">
            <span class="input-group-addon">积分</span>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">兑换券类型</label>
    <div class="col-sm-9 col-xs-12">
        <label for="code0" class="radio-inline"><input type="radio" name="code_type" class="code_type" value="0" id="code0" <?php  if(empty($setting['code_type'])) { ?>checked<?php  } ?> <?php  if(!empty($id)) { ?>disabled="disabled"<?php  } ?>> 微信临时二维码</label>
        <label for="code1" class="radio-inline"><input type="radio" name="code_type" class="code_type" value="1" id="code1" <?php  if($setting['code_type']==1) { ?>checked<?php  } ?> <?php  if(!empty($id)) { ?>disabled="disabled"<?php  } ?>> 微信永久二维码</label>
        <label for="code2" class="radio-inline"><input type="radio" name="code_type" class="code_type" value="2" id="code2" <?php  if($setting['code_type']==2) { ?>checked<?php  } ?> <?php  if(!empty($id)) { ?>disabled="disabled"<?php  } ?>> 普通链接二维码</label>
        <label for="code3" class="radio-inline"><input type="radio" name="code_type" class="code_type" value="3" id="code3" <?php  if($setting['code_type']==3) { ?>checked<?php  } ?> <?php  if(!empty($id)) { ?>disabled="disabled"<?php  } ?>> 纯数字兑换码</label>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">一码多兑</label>
    <div class="col-sm-9  col-xs-12">
        <div class="input-group">
            <span class="input-group-addon">本组的每个兑换码可以兑换</span>
            <input type="text" name="repeat" class="form-control" value="<?php  echo $setting['repeat'];?>">
            <span class="input-group-addon">次（默认1次） 兑完指定次数后失效</span>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">用户扫码绑定</label>
    <div class="col-sm-9  col-xs-12">
        <label for="binding" class="checkbox-inline"><input type="checkbox" name="binding" id="binding" <?php  if($setting['binding'] == 1) { ?>checked<?php  } ?>> 开启扫码绑定</label>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9  col-xs-12">
        <input type="submit" value="保存" class="btn btn-primary">
    </div>
</div>
</form>
</div>


<div class="tab-pane fade" id="message">
    <form action="<?php  if($setting['code_type'] != 3) { ?><?php  echo webUrl('exchange/goods/setting',array('id'=>$id),1);?><?php  } else { ?><?php  echo webUrl('exchange/goods/addreply',array('id'=>$id),1);?><?php  } ?>" method="post"
          class="form-horizontal form-validate" novalidate="novalidate" id="setform">
        <div class="form-group">
            <label class="col-lg control-label">兑换入口链接</label>
            <div class="col-sm-9 col-xs-12">
                <a class="form-control-static"><?php  echo mobileUrl("exchange",array('codetype'=>1,'id'=>$id),1);?></a>
            </div>
        </div>
        <?php  if($setting['code_type'] != 3) { ?>
        <div class="form-group">
            <label class="col-lg control-label">推送消息类型</label>
            <div class="col-sm-9 col-xs-12">

                <label for="on" class="radio-inline">
                    <input type="radio" name="reply" class="type" value="0" id="on" onclick="$('#yulan').show();$('#wenzi').hide();" <?php  if($setting['reply_type'] == 0) { ?>checked<?php  } ?>>
                    图文消息
                </label>
                <label for="off" class="radio-inline"> <input type="radio" name="reply" class="type" value="1" id="off" onclick="$('#yulan').hide();$('#wenzi').show();" <?php  if($setting['reply_type'] == 1) { ?>checked<?php  } ?>>文字消息</label>
            </div>
        </div>
        <?php  } ?>
        <div id="wenzi" <?php  if($setting['reply_type'] == 0) { ?>style="display: none;"<?php  } ?>>
        <script>
            require(['jquery','util'], function($, util){
                $(function(){
                    $('#btn').click(function(){
                        util.emojiBrowser(function(emoji){
                            var text = '[U+'+emoji[0].text+']';
                            var content = $('#content').val()+text;
                            $('#content').val(content);

                        });
                    });
                });

                $(function(){
                    util.emotion($('#emotion'), $('#content'));
                });

                $(function () {
                    $('#link').click(function () {
                        var link='<a href="[兑换链接]">点击进入兑换中心</a>';
                        var content = $('#content').val()+link;
                        $('#content').val(content);
                    });
                });
            });
        </script>
        <div class="form-group">
            <label class="col-lg control-label">输入文字内容</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height: 150px;resize: none;" class="form-control" placeholder='支持<a href=""></a>标签' name="content" id="content"><?php  echo $setting['basic_content'];?></textarea>
                <div class="edit" style="width: 100%;height: 30px;border-bottom:1px solid #e5e6e7;border-left:1px solid #e5e6e7;border-right:1px solid #e5e6e7;">
                    <div style="width: 30px;height: 30px;float: left;margin-left: 20px">
                        <a href="javascript:" id="btn" title="插入emoji">
                            <img src="../addons/ewei_shopv2/plugin/exchange/static/img/emoji.png" width="18px" height="18px" style="margin-top: 7px;">
                        </a>
                    </div>
                    <div style="width: 30px;height: 30px;float: left;margin-left: 20px">
                        <a href="javascript:" id="emotion" title="插入表情">
                            <img src="../addons/ewei_shopv2/plugin/exchange/static/img/qq.png" width="18px" height="18px" style="margin-top: 7px;">
                        </a>
                    </div>
                    <div style="width: 30px;height: 30px;float: left;margin-left: 20px">
                        <a href="javascript:" id="link" title="插入链接">
                            <img src="../addons/ewei_shopv2/plugin/exchange/static/img/link.png" width="18px" height="18px" style="margin-top: 7px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <input type="submit" value="保存" class="btn btn-primary">
                <a class="btn btn-default" href="<?php  echo webUrl('exchange/score')?>">返回列表</a>
            </div>
        </div>
</div>
        <div id="yulan" <?php  if($setting['reply_type'] == 1) { ?>style="display: none;"<?php  } ?>>
            <div class="tab-pane" id="score">
                <div class="col-sm-4">
                    <div class="chatPanel form" style="width:300px;">
                        <div style="text-align: left; padding-bottom: 10px; display: block;">
                            <div class="btn"
                                 style="margin-right: 4px;max-width: 300px;text-align:left;width: 300px;height: 360px;border: 1px solid #cdcdcd;border-radius: 5px;">
                                        <span class="title"
                                              style="line-height: 1.2em;margin-top: 10px;display: block;max-width: 312px;text-align: left;"><h3
                                                style="color: #000;height: 17px" id="t">商品兑换</h3></span>
                                <span class="time"><?php  echo date('m月d日',time());?></span>
                                <div class="mediaImg" style="margin-top: 6px;width: 275px;height: 170px">
                                    <img id="balancepic" src="" width="100%" height="100%">
                                </div>
                                <div style="word-break: keep-all">
                                    <p id="balanceinfo">欢迎来到兑换中心，您的兑换码是：OE3ER13789JHOA0Q</p>
                                    <style>
                                        #svinfo, #balanceinfo {
                                            margin-top: 15px;
                                            clear: both; /* 清除左右浮动 */
                                            width: 100%; /* 必须定义宽度 */
                                            height: 40px;
                                            word-break: break-word; /* 文本行的任意字内断开 */
                                            word-wrap: break-word; /* IE */
                                            white-space: -moz-pre-wrap; /* Mozilla */
                                            white-space: -hp-pre-wrap; /* HP printers */
                                            white-space: -o-pre-wrap; /* Opera 7 */
                                            white-space: -pre-wrap; /* Opera 4-6 */
                                            white-space: pre; /* CSS2 */
                                            white-space: pre-wrap; /* CSS 2.1 */
                                            white-space: pre-line; /* CSS 3 (and 2.1 as well, actually) */
                                        }
                                    </style>
                                </div>
                                <div style="color: #000;">查看全文</div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7" style="margin-left: 30px">
                <?php  if($setting['code_type'] == 3) { ?>
                <div class="form-group">
                    <label class="col-lg control-label">触发关键字</label>
                    <div class="col-sm-9">
                        <input type="text" name="keyword" class="form-control" value="<?php  echo $setting['reply_keyword'];?>">
                        <br>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-lg control-label">消息标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="balancetitle" id="balancetitle" class="form-control"
                               value="<?php  echo $setting['title_reply'];?>">
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg control-label">消息图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image(balanceimg,$setting['img']);?>
                        <br>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(
                            $("#yulan").on('mouseover', function () {
                                var c = $('#balancecontent').val();
                                $("#balanceinfo").html(c);
                                var g = $(".img-responsive").attr('src');
                                $('#balancepic').attr('src', g);
                                var t = $("#balancetitle").val();
                                $('#t').html(t);
                            })
                    );
                    $(document).ready(
                            $("#yulan").on('keyup', function () {
                                var c = $('#balancecontent').val();
                                $("#balanceinfo").html(c);
                                var g = $(".img-responsive").attr('src');
                                $('#balancepic').attr('src', g);
                                var t = $("#balancetitle").val();
                                $('#t').html(t);
                            })
                    );
                    $(document).ready(function () {
                        var c = $('#balancecontent').val();
                        $("#balanceinfo").html(c);
                        var g = $(".img-responsive").attr('src');
                        $('#balancepic').attr('src', g);
                        var t = $("#balancetitle").val();
                        $('#t').html(t);
                    });
                </script>
                <div class="form-group">
                    <label class="col-lg control-label">消息内容</label>
                    <div class="col-sm-9 col-xs-12">
                                <textarea name="balancecontent" id="balancecontent" cols="30" rows="10"
                                          class="form-control" style="height: 6rem" id="balancecontent" maxlength="30"><?php  echo $setting['content'];?></textarea>
                    </div>
                </div>
                <?php  if($setting['code_type'] == 3) { ?>
                <div class="form-group">
                    <label class="col-lg control-label">开启回复</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" value="1" name="replystatus" <?php  if($setting['reply_status'] != 0) { ?>checked<?php  } ?>> 开启</label>
                        <label class="radio-inline"><input type="radio" value="0" name="replystatus" <?php  if($setting['reply_status'] == 0) { ?>checked<?php  } ?>> 关闭</label>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-lg control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="submit" value="保存" class="btn btn-primary">
                        <a class="btn btn-default" href="<?php  echo webUrl('exchange/score')?>">返回列表</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="tab-pane fade" id="zhuangxiu">
    <form action="<?php  echo webUrl('exchange/goods/banner',array('id'=>$id));?>" method="post" class="form-horizontal form-validate" novalidate="novalidate">
        <?php  if(p('diypage')) { ?>
        <div class="form-group">
            <label class="col-lg control-label">自定义模板</label>
            <div class="col-sm-9 col-xs-12">
                <select class="form-control valid" name="diypage" aria-invalid="false">
                    <option value="">请选择商品详情页自定义模板</option>
                    <?php  if(is_array($exchangePages)) { foreach($exchangePages as $exchangePage) { ?>
                    <option value="<?php  echo $exchangePage['id'];?>" <?php  if($setting['diypage']==$exchangePage['id']) { ?>selected="selected"<?php  } ?>><?php  echo $exchangePage['name'];?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>
        <?php  } ?>
        <div class="form-group">
            <label class="col-lg control-label">兑换幻灯片展示</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_multi_image2('banner', $banner);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">兑换规则设置</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_ueditor('rule',$setting['rule']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <input type="submit" value="保存" class="btn btn-primary">
                <a class="btn btn-default" href="<?php  echo webUrl('exchange/score')?>">返回列表</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
