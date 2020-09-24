<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .select2{
        margin:0;
        width:100%;
        height:34px;
        border-radius: 3px;
        border-color: rgb(229, 230, 231);
    }
    .select2 .select2-choice{
        height: 34px;
        line-height: 32px;
        border-radius: 3px;
        border-color: rgb(229, 230, 231);
    }
    .select2 .select2-choice .select2-arrow{
        background: #fff;
    }
    .form-group .radio-inline{
        padding-top: 0px;;
    }
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        border:none;
        vertical-align: middle;
    }
    .table > caption + thead > tr:first-child > td, .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > td, .table > thead:first-child > tr:first-child > th {
        border: none;
        font-weight: normal;
        color: #999;
    }
</style>
<div class="page-header">
    当前位置：<span class="text-primary">消息通知</span>
</div>
<div class="page-content">
<form action="" method="post" class="form-horizontal form-search form-validate" id="myform">
    <table class="table table-responsive">
        <thead>
        <th>砍价消息通知设置</th>
        <th class="">模板消息</th>
        <th class="w60 is_advanced"></th>
        </thead>
        <tbody>
        <tr>
            <td>砍价结果通知</td>
            <td>
                <select class="select2 is_advanced" name="data[bargain_message_template]">
                    <option value=''>[默认]默认砍价结果通知</option>
                    <?php  if(is_array($template_group['bargain_message'])) { foreach($template_group['bargain_message'] as $template_val) { ?>
                    <option value="<?php  echo $template_val['id'];?>" <?php  if($data['bargain_message_template'] == $template_val['id'] ) { ?>selected<?php  } ?>><?php  echo $template_val['title'];?></option>
                    <?php  } } ?>
                </select>
            </td>
            <td style="text-align: right;" class="is_advanced">
                <label class="notice-default">
                    <input type="hidden" name="data[bargain_message_close_advanced]" value="<?php  echo intval($data['bargain_message_close_advanced'])?>" />
                    <input class="js-switch small checkone" data-type="tpl-advanced"  data-tag="bargain_message"  type="checkbox" value="<?php  echo intval($data['bargain_message_close_advanced'])?>" <?php  if(empty($data['bargain_message_close_advanced'])) { ?>checked<?php  } ?>/>
                </label>
                <label style="display: none;">
                    <img src="../addons/ewei_shopv2/static/images/loading.gif" width="20" alt=""/>
                </label>
            </td>
        </tr>



        <tr>
            <td>砍到底价通知</td>
            <td>
                <select class="select2 is_advanced" name="data[bargain_fprice_template]">
                    <option value=''>[默认]默认砍到底价通知</option>
                    <?php  if(is_array($template_group['bargain_fprice'])) { foreach($template_group['bargain_fprice'] as $template_val) { ?>
                    <option value="<?php  echo $template_val['id'];?>" <?php  if($data['bargain_fprice_template'] == $template_val['id'] ) { ?>selected<?php  } ?>><?php  echo $template_val['title'];?></option>
                    <?php  } } ?>
                </select>
            </td>
            <td style="text-align: right;" class="is_advanced">
                <label class="notice-default">
                    <input type="hidden" name="data[bargain_fprice_close_advanced]" value="<?php  echo intval($data['bargain_fprice_close_advanced'])?>" />
                    <input class="js-switch small checkone" data-type="tpl-advanced"  data-tag="bargain_fprice"  type="checkbox" value="<?php  echo intval($data['bargain_fprice_close_advanced'])?>" <?php  if(empty($data['bargain_fprice_close_advanced'])) { ?>checked<?php  } ?>/>
                </label>
                <label style="display: none;">
                    <img src="../addons/ewei_shopv2/static/images/loading.gif" width="20" alt=""/>
                </label>
            </td>
        </tr>


        <tr>
            <td>
                <input type="submit" value="保存" class="btn btn-primary">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
            </td>
        </tr>
        </tbody>
    </table>

</form>
</div>
<script>
    $(function () {

        var sms =  <?php  if(!empty($opensms)) { ?>true<?php  } else { ?>false<?php  } ?>;

        $(".is_advanced").show();
        $(".w60").css('width', '70px');
        if (sms){
            $(".w200").css('width', '250px');
        }else{
            $(".w200").css('width', '550px');
            $(".colstd").attr('colspan',2);
        }


        $(".js-switch").not(".checkhi").click(function () {
            var next = $(this).next();
            if(next.hasClass('checked')){
                $(this).val("1").prev().val("0");
            }else{
                $(this).val("0").prev().val("1");
            }
        });

        $(".checkhi").click(function () {
            var trueval = $(this).prev().data('true');
            var falseval = $(this).prev().data('false');
            var next = $(this).next();
            if(next.hasClass('checked')){
                $(this).val("1").prev().val(trueval);
            }else{
                $(this).val("0").prev().val(falseval);
            }
        });

        $(".checkall").click(function () {
            var type = $(this).data('type');
            var val = $(this).val();
            if(val==0){
                $(this).closest(".table").find(".checkone[data-type='"+type+"']").attr("checked","false").val("1").next().removeClass("checked").prev().prev().val("1");
            }else{
                $(this).closest(".table").find(".checkone[data-type='"+type+"']").attr("checked","true").val("0").next().addClass("checked").prev().prev().val("0");
            }
        });

        $(".checkone").click(function () {
            var _this =$(this);
            var type = _this.data('type');
            var val = _this.val();

            var tag = _this.data('tag');
            var stop = _this.data('stop');

            if(stop==1)
            {
                return;
            }

            if(tag != '' && val==1) {
                $(this).data('stop', 1);
                $(this).parent().hide().next().show();

                var data = {
                    'tag': tag,
                    checked:val
                };
                $.ajax({
                    url: "<?php  echo webUrl('sysset/settemplateid')?>",
                    type:'get',
                    dataType:'json',
                    timeout : 3000, //超时时间设置，单位毫秒
                    data:data,
                    success:function(ret){
                        var _this = $(".checkone[data-tag='"+ret.result.tag+"']");
                        if (ret.result.status == '0') {
                            this.value=0;
                            _this.prev().val(1);
                            _this.next().removeClass('checked');

                            console.log(ret.result.messages);
                            alert(ret.result.messages);
                        }

                        $(_this).data('stop', 0);
                        $(_this).parent().show().next().hide();
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $(".table").each(function () {
                            var _this = $(this);
                            _this.find(".checkone[data-type='tpl-advanced']").each(function () {
                                $(this).data('stop', 0);
                                $(this).parent().show().next().hide();
                            });
                        });
                    }
                });
            }


            var type = $(this).data('type');
            var val = $(this).val();
            if(val==0){
                $(this).attr("checked","false").val("1").next().removeClass("checked");
                $(this).closest(".table").find(".checkall[data-type='"+type+"']").val("1").attr("checked","false").next().removeClass("checked");
            }else{
                $(this).attr("checked","true").val("0").next().addClass("checked");
                var all = true;
                $(this).closest(".table").find(".checkone[data-type='"+type+"']").each(function () {
                    var val = $(this).val();
                    if(val!='on' && val==1){
                        all = false;
                        return;
                    }
                });
                if(all){
                    $(this).closest(".table").find(".checkall[data-type='"+type+"']").val("0").attr("checked","true").next().addClass("checked");
                }
            }

        });

        $(".table").each(function () {
            var _this = $(this);
            var all_tpl_normal = true;
            var all_tpl_advanced = true;
            var all_sms = true;
            _this.find(".checkone[data-type='tpl-advanced']").each(function () {
                var val = $(this).val();
                if(val!='on' && val==1){
                    all_tpl_advanced = false;
                    return;
                }
            });
            _this.find(".checkone[data-type='sms']").each(function () {
                var val = $(this).val();
                if(val!='on' && val==1){
                    all_sms = false;
                    return;
                }
            });
            if(all_tpl_normal){
                _this.find(".checkall[data-type='tpl-normal']").val("0").attr("checked","true").next().addClass("checked");
            }
            if(all_tpl_advanced){
                _this.find(".checkall[data-type='tpl-advanced']").val("0").attr("checked","true").next().addClass("checked");
            }
            if(all_sms){
                _this.find(".checkall[data-type='sms']").val("0").attr("checked","true").next().addClass("checked");
            }
        });

    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--青岛易联互动网络科技有限公司-->