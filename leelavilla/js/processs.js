$(document).ready(function(){$("#config-table tr.row").click(function(){$("#enquire").modal("show")}),$('.country_code option[value="IN"]').attr("selected","selected"),$(".country_code option:selected").attr("selected",null),$(".country_code").on("change",function(e){var t=$(this).closest("form").attr("id"),a=$(this).children(":selected").attr("data-id");$(e.target).val(),$(e.target).find("option:selected").text(),$(e.target).attr("name"),$("#"+t+" .national_code").val(a)}),$(document).on({ajaxStart:function(){$(".loader").css("display","block")},ajaxStop:function(){$(".loader").css("display","none")}}),$.validator.addMethod("customemail",function(e,t){return/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e)},"You entered an invalid email address"),$.validator.addMethod("validatename",function(e,t){return/^[a-zA-Z ]*$/.test(e)},"You entered an invalid name"),$(".onsubmit").click(function(e){var t=$(this).closest("form").attr("id");$("#"+t).validate({rules:{name:{required:{depends:function(){return $(this).val($.trim($(this).val())),!0}},validatename:!0,minlength:3},email:{required:{depends:function(){return $(this).val($.trim($(this).val())),!0}},customemail:!0},mobile:{required:!0}},messages:{name:{required:"Please enter your name"},email:{required:"Please enter your email",email:"Email is invalid"},mobile:{required:"Please enter your mobile number"}},submitHandler:function(e){$("#"+t+" .onsubmit").attr("disabled",!0);var a=$("#"+t+" .email").val(),n=$("#"+t+" .name").val(),i=$("#"+t+" .mobile").val(),o=$("#"+t+" .comments").val(),r=$("#"+t+" .country_code").val(),l=$("#"+t+" .national_code").val(),d=$(".utm_source").val(),m=$(".utm_medium").val(),u=$(".utm_term").val(),c=$(".utm_content").val(),s=$(".utm_campaign").val(),v=$(".siteurl").val(),p=$(".projectname").val(),_=$(".project_id").val(),h=$(".city").val();return $("#"+t+" .errors").remove(),$.ajax({type:"POST",url:"send.php",dataType:"json",data:{name:n,email:a,country_code:r,mobile:i,isd:l,comments:o,site_url:v,project_name:p,projectid:_,utm_source:d,utm_medium:m,utm_term:u,utm_content:c,utm_campaign:s,city:h},success:function(e){"200"==e.code?e.valid&&($("#"+t)[0].reset(),window.location.href="https://"+window.location.host+"/thankyou.php"):($("#"+t+" .input-name").append(e.error_name),$("#"+t+" .input-email").append(e.error_email),$("#"+t+" .input-mobile").append(e.error_mobile),$("#"+t+" .onsubmit").attr("disabled",!1))}}),!1}})})});
