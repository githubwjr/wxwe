<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('cashier/manage/_header_base', TEMPLATE_INCLUDEPATH)) : (include template('cashier/manage/_header_base', TEMPLATE_INCLUDEPATH));?>

<style type="text/css">
    html{height: 100%;}

    .bg {
        background-image:url('../addons/ewei_shopv2/plugin/cashier/static/images/bg.jpg');
    }

    body.signin {
        background: #efefef;
        height: auto;

        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        color:#fff;
    }

    .signin .signhead {
        width: 750px;
        text-align: center;
    }
    .signinpanel {
        width: 750px;
        margin: 10% auto 0 auto;
    }
    .signinpanel .signin-info   {
        padding: 0;
        margin-top:5px;
    }
    .signinpanel .signin-info img {
        width:400px;height:260px;
    }
    .signinpanel .form-control {
        display: block;
        margin-top: 15px;
        color: #333;
    }

    .signinpanel .btn {
        margin-top: 15px;
    }

    .signinpanel form {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255,255,255,.3);
        -moz-box-shadow: 0 3px 0 rgba(12, 12, 12, 0.03);
        -webkit-box-shadow: 0 3px 0 rgba(12, 12, 12, 0.03);
        box-shadow: 0 3px 0 rgba(12, 12, 12, 0.03);
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        padding: 30px;
    }

    .signup-footer{border-top: solid 1px rgba(255,255,255,.3);margin:20px 0;padding-top: 15px;}

    @media screen and (max-width: 768px) {
        .signinpanel{
            margin: 0 auto;
            width: 420px!important;
            padding: 20px;
        }
        .signinpanel form {
            margin-top: 20px;
        }
        .signup-footer {
            margin-bottom: 10px;
        }
        .signinpanel .form-control {
            margin-bottom: 10px;
        }
        .signup-footer .pull-left,
        .signup-footer .pull-right {
            float: none !important;
            text-align: center;
        }
        .signinpanel .signin-info ul {
            display: none;
        }
    }
    @media screen and (max-width: 320px) {
        .signinpanel{
            margin:0 20px;
            width:auto;
        }
    }

    .btn {
        border:1px solid rgba(255,255,255,0.2);
        background:rgba(255,255,255,0.4);
        color:#fff;
    }
    .btn:hover,.panel .btn:focus {
        border:1px solid rgba(255,255,255,0.3);
        background:rgba(255,255,255,0.7);
        color:#fff;
        outline: 0;
    }
    .btn:active {
        border:1px solid rgba(255,255,255,0.4);
        background:rgba(255,255,255,0.7);
        color:#fff;
        outline: 0;
    }


</style>

<body class="signin">
<div class="bg" <?php  if(!empty($set['bg'])) { ?>style="background-image: url('<?php  echo tomedia($set['bg'])?>')"<?php  } ?>></div>
<div class="signinpanel">
    <div class="row">

        <div class="col-sm-12">

            <form method="post">
                <h4 class="no-margins">收银台登录</h4>
                <p class="m-t-md">登录到收银台管理后台</p>
                <input type="text" class="form-control" placeholder="用户名" name="username"/>
                <input type="password" class="form-control m-b" placeholder="密码" name="password"/>
                <div class="form-group">
                        <label class='radio-inline'>
                            <input type='radio' name='is_operator' value='0' checked/> 管理员
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='is_operator' value='1' /> 操作员
                        </label>
                </div>
                <p class="help-block text-danger" id="tip" style="display:none;"></p>
                <button type="submit" id="btn-login" class="btn btn-block">登录</button>
                <!--<button type="button" id="qrlogin" class="btn btn-warning btn-block">扫码登录</button>-->
            </form>
            <div  style="display: none">
                <p class="text-center">
                    扫码登录<br><br>
                    <img src="http://127.0.0.1/test/hplus/img/qr_code.png" width="100%" style="max-width:200px;">
                    <button type="button" id="login" class="btn btn-warning btn-block">返回</button>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<script language='javascript'>
            $('form').submit(function (e) {
                e.preventDefault();
                if ($(":input[name=username]").isEmpty()) {
                    $('#tip').html('请输入用户名!').show();
                    $(":input[name=username]").focus();
                    return false;
                } else{
                    $('#tip').hide();
                }
                if ($(":input[name=password]").isEmpty()) {
                    $('#tip').html('请输入密码!').show();
                    $(":input[name=pwd]").focus();
                    return false;
                } else{
                    $('#tip').hide();
                }
                $('#btn-login').attr('disabled',true).html('正在登录...');
                $.ajax({
                    url: "<?php  echo $submitUrl;?>",
                    type:'post',
                    data: {username: $(":input[name=username]").val() ,password: $(":input[name=password]").val() ,is_operator:$(":input[name=is_operator]:checked").val()},
                    dataType:'json',
                    cache:false,
                    success:function(ret){
                        if(ret.status==1){
                             location.href = ret.result.url;
                             return;
                        }
                        $('#btn-login').removeAttr('disabled').html('登录');
                        $(":input[name=password]").select();
                        $('#tip').html(ret.result.message).show();
                    }
                })
            })
</script>
<script language="javascript">myrequire(['web/init'],function(){});</script>
<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
<?php  if(!empty($copyright) && !empty($copyright['copyright'])) { ?>
<div class="signup-footer" style='width:750px;margin:auto;margin-top:10px;'>
    <div><?php  echo $copyright['copyright'];?></div>
</div>
<?php  } ?>
</body>
</html>