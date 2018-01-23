//点击验证码
$('#changeCode').on("click",function(){
    $(this).children('img')[0].click();
})
$('#adminSub').on('click',function(){
    var formData =  $('form').serialize();
    $.ajax({
        url:"./index.php?c=Logreg&a=admin_loginAjax",
        type:"post",
        data:formData,
        success:function(res){
           if(res==1){
               alert('登入成功');
               window.location.href = "../../../index.php?adminMain$a=adminIndex";
           }else if(res==-1){
               alert('请检查账号密码邮箱是否正确');
           }else if(res==0){
               alert('验证码错误');
           }
        }
    })
})
