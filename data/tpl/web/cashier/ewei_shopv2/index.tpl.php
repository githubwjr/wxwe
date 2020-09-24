<?php defined('IN_IA') or exit('Access Denied');?><?php  $no_left = true?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
html,body{
    overflow-x:hidden;
}
    .calculator {
        width: 350px;
        -webkit-user-select: none; /* Chrome all / Safari all */
        -moz-user-select: none; /* Firefox all */
        -ms-user-select: none; /* IE 10+ */
        -o-user-select: none;
        user-select: none;
        color: #333;
        float: left;
        margin-left:10px;
        margin-top:10px;
    }

    #navbar {
        margin-left: 1px;
        width: 100%;
    }

    .calculator tr {
        width: 350px
    }

    .calculator td {
        height: 70px;
        width: 70px;
        font-size: 20px;
        line-height: 70px;
        text-align: center;
        cursor: pointer;
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0);
        color: #666

    }

    .calculator td:active,
    .calculator td:hover {
        color: #333;
        font-weight: bold;
        background: #fff;
    }

    /*.calculator td:hover {*/
        /*background: #eee;*/
    /*}*/

    /*.calculator td:active {*/
        /*background: #ddd;*/
    /*}*/

    .show {
        height: 90px;
        line-height: 90px;
        font-size: 32px;
        text-align: left;
        padding: 0 10px;
        border: none;

        margin: 0;
        width: 100%;
        color: #fff;
        outline: none;
    }

    .show::-webkit-input-placeholder {
        color: #c7c7c7;
        opacity: .5;
    }

    .money_container {
        display: flex;
        border-bottom: 1px solid #eee;
    }

    .money_container .text {
        width: 80px;
        height: 90px;
        line-height: 90px;
        font-size: 32px;
        color: #fff;
        text-align: center;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .paytype {
        float: left;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px;
        margin-right:5px;
        border:1px solid transparent;;
    }

    .paytype.active,
    .paytype:hover {
        background:rgba(255,255,255,0.5);
        border:1px solid rgba(255,255,255,0.2)
    }

    #tip {
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 16px;
        color: #fff;
    }

    .row-container{
        text-align: center;width:90%;margin:auto;
        min-width:375px;
    }
</style>

<div class="container" style="margin-top:50px;">
<div class="row-container" >
    <div class="panel panel-default panel-class  ">

        <div class="panel-body">
            <div id="tip"></div>
            <div class="money_container">
                <div class="text">金额</div>
                <div class="show">0</div>
            </div>
            <div class="row">

                <table class="calculator col-sm-6">
                    <tr>
                        <td colspan="2" data-key="t">退格</td>
                        <td data-key="c">C</td>
                        <td data-key="÷">÷</td>
                    </tr>
                    <tr>
                        <td data-key="7">7</td>
                        <td data-key="8">8</td>
                        <td data-key="9">9</td>
                        <td data-key="×">×</td>
                    </tr>
                    <tr>
                        <td data-key="4">4</td>
                        <td data-key="5">5</td>
                        <td data-key="6">6</td>
                        <td data-key="-">-</td>
                    </tr>
                    <tr>
                        <td data-key="1">1</td>
                        <td data-key="2">2</td>
                        <td data-key="3">3</td>
                        <td data-key="+">+</td>
                    </tr>
                    <tr>
                        <td data-key="0">0</td>
                        <td data-key=".">.</td>
                        <td colspan="2" style="font-size: 40px" data-key="=">=</td>
                    </tr>
                </table>

                <div style="float:left;padding-top:10px;" class="col-sm-6">
                    <form action="" method="post" class="form-horizontal" style="padding-top: 10%">
                        <input type="hidden" value="0" name="data[money]"/>
                        <input type="hidden" value="-1" name="data[paytype]"/>

                        <div class="form-group">

                            <div class="col-sm-12">

                                <div class="paytype active" data-paytype="-1">
                                    <img src="../addons/ewei_shopv2/plugin/cashier/static/images/autopay.png"/>
                                </div>
                                <?php  if(!empty($_W['cashieruser']['wechat_status'])) { ?>
                                <div class="paytype" data-paytype="0">
                                    <img src="../addons/ewei_shopv2/plugin/cashier/static/images/wechatpay.png"/>
                                </div>
                                <?php  } ?>
                                <?php  if(!empty($_W['cashieruser']['alipay_status'])) { ?>
                                <div class="paytype" data-paytype="1">
                                    <img src="../addons/ewei_shopv2/plugin/cashier/static/images/alipay.png"/>
                                </div>
                                <?php  } ?>
                                <div class="paytype" data-paytype="3">
                                    <img src="../addons/ewei_shopv2/plugin/cashier/static/images/cash.png"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group" <?php  if(empty($userset['use_credit2'])) { ?>style="display:none"<?php  } ?>>
                            <div class="col-sm-12">
                                <div class="input-group">
                                <input type="tel" class="form-control" name="data[mobile]" value="" placeholder="请输入会员手机号"/>
                                    <div class="input-group-btn">
                                        <input type="button" value="查询" class="btn" id="check_member"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display:none">
                            <div class="col-sm-12">
                                <div class="form-control-static" style="color:white"><i class='fa fa-spinner fa-spin'></i> 正在查询...</div>
                            </div>
                        </div>

                        <div class="form-group"  style="display:none">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-addon">昵称</div>
                                    <input type="text" class="form-control" name="data[nickname]" value="" readonly/>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">账户余额</div>
                                    <input type="number" class="form-control" name="data[credit2]" value="0" step="0.01" readonly/>
                                    <div class="input-group-addon">  抵用金额</div>
                                    <input type="number" class="form-control" name="data[deduction]" value="0" step="0.01"/>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">还需支付</div>
                                    <input type="text" class="form-control" value="0" id="paymoney" readonly/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="qrcode">
                            <div class="col-sm-12">
                                <div class="input-group">

                                    <input type="text" class="form-control" name="data[auth_code]" value="" data-rule-required="true" placeholder="请扫描或输入微信或支付宝付款码"/>
                                    <div class="input-group-btn">
                                        <input type="submit" value="提交" class="btn"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="form-group" id="submit" style="display: none">
                    <div class="col-sm-12">
                        <input type="submit" value="提交" class="btn btn-block"/>
                    </div>
                </div>

                        <div class="form-group" id="ordre-status" style="display:none">
                            <div class="col-sm-12">
                                 <div class="form-control-static" style="color:white"><i class='fa fa-spinner fa-spin'></i> 正在刷新支付状态...</div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script>
    var price = 0.0;
    var change = 0;
    var operator = null;

    //计算对象
    var operateExp = {
        '+': function (num1, num2) {
            return num1 + num2;
        },
        '-': function (num1, num2) {
            return num1 - num2;
        },
        '*': function (num1, num2) {
            return num1 * num2;
        },
        '/': function (num1, num2) {
            return num2 === 0 ? 0 : num1 / num2;
        }
    }
    //计算函数
    var operateNum = function (num1, num2, op) {
        num1 = parseFloat(num1);
        num2 = parseFloat(num2);
        if (!op)return num1;
        if (!operateExp[op])return 0;
        return operateExp[op](num1, num2);
    }

    $(function () {
        //点击查询手机会员信息
        $("#check_member").on('click',function (e) {
            var $this = $(this);
            var $parents = $(this).parents(".form-group");
            var mobile = $parents.find(':input[name="data[mobile]"]').val();
            var $tishi = $parents.next();
            var $credit = $tishi.next();
            if (mobile == '' || mobile.length != 11){
                tip.msgbox.err('请输入正确的手机号!');
                return false;
            }
            $parents.next().show();
            $.getJSON("<?php  echo cashierUrl('index/query_member',array('cashierid'=>$_W['cashierid']))?>",{mobile:mobile},function (data) {
                $tishi.hide();
                $credit.hide();
                if (data.status == 0){
                    tip.msgbox.err('未查到该会员!');
                }else if (data.status == 1){
                    tip.prompt("请输入您的密码",function (value) {
                        $.post("<?php  echo cashierUrl('index/verify_password',array('cashierid'=>$_W['cashierid']))?>",{password:value,mobile:mobile},function (vdata) {
                            if (vdata.status==0){
                                tip.msgbox.err('密码错误!!!');
                            }else if (vdata.status==1){
                                show_member($credit,vdata);
                            }
                        },'json');
                    },true);
                }else if(data.status == 2){
                    tip.prompt("请设置您的密码",function (value) {
                        $.post("<?php  echo cashierUrl('index/set_password',array('cashierid'=>$_W['cashierid']))?>",{password:value,mobile:mobile},function (vdata) {
                            if (vdata.status==0){
                                tip.msgbox.err('设置失败!!!');
                            }else if (vdata.status==1){
                                show_member($credit,vdata);
                            }
                        },'json');
                    },true);
                }
            });
        });

        //表单提交
        $('form').submit(function (e) {
            e.preventDefault();
            $('input[type="submit"]').attr('disabled',true);
            var $this = $(this);
            var ordre_status = $('#ordre-status');

            ordre_status.show();
            $.post("<?php  echo cashierUrl('index')?>",$this.serialize(),function (data) {
                if(data.status == 0)
                {
                    window.nul = setInterval(function () {
                        $.getJSON("<?php  echo cashierUrl('index/orderquery')?>"+"&orderid="+data.result.message,function (order) {
                            if (order.status == 1){
                                ordre_status.hide();
                                tip.msgbox.suc('支付成功!');
                                clearInterval(window.nul);
                                setTimeout(function () {
                                    window.location.reload();
                                },3000);
                            }
                        })
                    },3000);
                }else if (data.status == 1){
                    ordre_status.hide();
                    tip.msgbox.suc('支付成功!');
                    setTimeout(function () {
                        window.location.reload();
                    },3000);
                }else if (data.status == -101){
                    ordre_status.hide();
                    tip.msgbox.err(data.result.message);
                    return false;
                }
            },'json')
        });

        //计算器部分
        $(".calculator").on("click", 'td', function (e) {

            var $this = $(this);
            var $show = $(".show");
            var $tip = $("#tip");
            var showPrice = parseFloat($show.html());
            var text = $this.text();
            var money = $(":input[name='data[money]']");
            switch (text) {
                case '退格':
                    if ($show.html() == '0') {
                        break;
                    }
                    if (parseFloat($show.html()) < 10 || change == 1) {
                        $show.html(0);
                        money.val(0);
                        price = 0.0;
                        change = 1;
                        break;
                    }
                    $show.html($show.html().substr(0, $show.html().length - 1));
                    money.val($show.html());
                    break;
                case 'C':
                    $show.html(0);
                    money.val(0);
                    price = 0.0;
                    change = 1;
                    break;
                case '+':
                    if (price != 0.0 && operator == '+' && change == 0) {
                        price = operateNum(price, showPrice, operator);
                        $show.html(price);
                    } else {
                        price = showPrice;
                    }

                    change = operator = '+';
                    $tip.html($show.html() + operator);
                    break;
                case '-':
                    if (price != 0.0 && operator == '-' && change == 0) {
                        price = operateNum(price, showPrice, operator);
                        $show.html(price);
                    } else {
                        price = showPrice;
                    }
                    change = operator = '-';
                    $tip.html($show.html() + operator);
                    break;
                case '×':
                    if (price != 0.0 && operator == '*' && change == 0) {
                        price = operateNum(price, showPrice, operator);
                        $show.html(price);
                    } else {
                        price = showPrice;
                    }
                    change = operator = '*';
                    $tip.html($show.html() + 'x');
                    break;
                case '÷':
                    if (price != 0.0 && operator == '/' && change == 0) {
                        price = operateNum(price, showPrice, operator);
                        $show.html(price);
                    } else {
                        price = showPrice;
                    }
                    change = operator = '/';
                    $tip.html($show.html() + '÷');

                    break;
                case '=':
                    if (operator === null) {
                        price = showPrice;
                    } else {
                        price = operateNum(price, showPrice, operator);
                    }
                    change = 1;
                    operator = null;
                    price = price.toFixed(2);
                    $show.html(price);
                    money.val(price);
                    $tip.html('');
                    break;
                default:

                    if (text == '.' && $show.html().indexOf('.') != -1 && change == 0) {
                        break;
                    }
                    if (change != 0 || $show.html() == '0') {
                        if (text == '.') {
                            $show.html('0' + text);
                        } else {
                            $show.html(text);
                        }
                        change = 0;
                    } else {
                        if ($show.html() == '0') {
                            $show.html('');
                        }
                        $show.html($show.html() + text);
                    }
                    money.val(parseFloat($show.html()).toFixed(2));
                    if ($tip.html() != '') {
                        $tip.html($tip.html() + text);
                    }
                    break;
            }
        });

        $('.paytype').click(function(){
            var obj = $(this) , paytype=obj.data('paytype');
            $('.paytype.active').removeClass('active');
            obj.addClass('active');
            $(":hidden[name='data[paytype]']").val( paytype );

            if(paytype==3){
                $("#qrcode").hide();
                $("#submit").show();
            }else{
                $("#qrcode").show();
                $("#submit").hide();
            }
        })
        $(window).off('keydown').keydown(function (k) {
            var $attr = $(k.target);
            if ($attr.attr('name') == "data[auth_code]" || $attr.attr('name') == "data[deduction]" || $attr.attr('name') == "data[mobile]" || $attr.attr('name') == "confirm") {
                //如果是手机号,则模拟点击
                if ($attr.attr('name') == "data[mobile]" && k.keyCode == '13'){
                    k.preventDefault();
                    $("#check_member").trigger('click');
                }
                return;
            }
            if (k.keyCode == '48' || k.keyCode == '96') {
                $('.calculator td[data-key=0]').trigger('click');
            }
            else if (k.keyCode == '49' || k.keyCode == '97') {
                $('.calculator td[data-key=1]').trigger('click');
            }
            else if (k.keyCode == '50' || k.keyCode == '98') {
                $('.calculator td[data-key=2]').trigger('click');
            }
            else if (k.keyCode == '51' || k.keyCode == '99') {
                $('.calculator td[data-key=3]').trigger('click');
            }
            else if (k.keyCode == '52' || k.keyCode == '100') {
                $('.calculator td[data-key=4]').trigger('click');
            }
            else if (k.keyCode == '53' || k.keyCode == '101') {
                $('.calculator td[data-key=5]').trigger('click');
            }
            else if (k.keyCode == '54' || k.keyCode == '102') {
                $('.calculator td[data-key=6]').trigger('click');
            }
            else if (k.keyCode == '55' || k.keyCode == '103') {
                $('.calculator td[data-key=7]').trigger('click');
            }
            else if (k.keyCode == '56' || k.keyCode == '104') {
                $('.calculator td[data-key=8]').trigger('click');
            }
            else if (k.keyCode == '57' || k.keyCode == '105') {
                $('.calculator td[data-key=9]').trigger('click');
            }
            else if (k.keyCode == '106') {
                $('.calculator td[data-key=×]').trigger('click');
            }
            else if (k.keyCode == '107') {
                $(".calculator td[data-key=\\+]").trigger('click');
            }
            else if (k.keyCode == '189' || k.keyCode == '109') {
                $('.calculator td[data-key=\\-]').trigger('click');
            }
            else if (k.keyCode == '190' || k.keyCode == '110') {
                $('.calculator td[data-key=\\.]').trigger('click');
            }
            else if (k.keyCode == '191' || k.keyCode == '111') {
                $('.calculator td[data-key=÷]').trigger('click');
            }
            else if (k.keyCode == '187' || k.keyCode == '13') {
                $('.calculator td[data-key=\\=]').trigger('click');
                $(':input[name="data[auth_code]"]').focus();
                k.preventDefault();
            }
            else if (k.keyCode == '8') {
                $('.calculator td[data-key=t]').trigger('click');
                k.preventDefault();
            }
            else if (k.keyCode == '46') {
                $('.calculator td[data-key=c]').trigger('click');
            }
        });

        $(":input[name='data[deduction]']").change(function () {
            var $this = $(this);
            var money = $(":input[name='data[money]']").val();
            var $prev = $this.parent().find(":input[name='data[credit2]']");
            if (parseFloat($this.val()) > parseFloat($prev.val())){
                $this.val($prev.val());
            }
            if (parseFloat($this.val()) > parseFloat(money)){
                $this.val(money);
            }
            $("#paymoney").val((parseFloat(money)-parseFloat($this.val())).toFixed(2));
        });
    });

    function show_member($credit,vdata) {
        $credit.find(":input[name='data[nickname]']").val(vdata.result.nickname);
        $credit.find(":input[name='data[credit2]']").val(vdata.result.credit2);
        var money = $(":input[name='data[money]']").val();
        var deduction = $credit.find(":input[name='data[deduction]']");
        if (parseFloat(vdata.result.credit2) > parseFloat(money)){
            deduction.val(money);
        }else{
            deduction.val(vdata.result.credit2);
        }
        $("#paymoney").val((parseFloat(money)-parseFloat(deduction.val())).toFixed(2));
        $credit.show();
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>