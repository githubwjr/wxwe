<?php defined('IN_IA') or exit('Access Denied');?><script language='javascript'>
    $(function(){
        load_datetimepicker();
        require(['jquery.ui'],function(){
            $('#type-items').sortable();
        })
    })

    function load_datetimepicker() {
        require(["datetimepicker"], function(){
            $(function(){
                $(".datetimepicker1").each(function(){
                    var option = {
                        lang : "zh",
                        step : "10",
                        timepicker : false,
                        closeOnDateSelect : true,
                        format : "Y-m-d"};
                    $(this).datetimepicker(option);
                });
            });
        });
    }

    function tp_change_default(knum){
        if ($("#tp_is_default"+knum).val() == 1) {
            $("#tp_default"+knum).css("display","inline");
        } else {
            $("#tp_default"+knum).hide();
        }
    }

    function tp_change_default_time(obj,ids){
        if (obj.value == 2) {
            $("#"+ids).css("display","inline");

        } else {
            $("#"+ids).hide();
        }
    }

    var kw = <?php  echo $kw?>;
    function addType() {
        var data_type = $("#data_type").val();
        $.ajax({
            url: "<?php  echo merchUrl('goods/diyform_tpl')?>&flag=1&kw="+kw+"&data_type="+data_type,
            cache: false
        }).done(function (html) {
            $("#type-items").append(html);
            if (data_type == 7 || data_type ==8){
                load_datetimepicker();
            }
        });
        kw++;
    }

    function removeType(obj) {
        $(obj).parent().parent().parent().parent().remove();
    }
</script>
