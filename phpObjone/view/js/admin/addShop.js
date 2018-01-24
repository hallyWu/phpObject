$('#addSub').on('click',function(){
    var subdata = $('form').serialize();
    $.ajax({
        url:'./index.php?c=adminAction&a=addShops',
        data:subdata,
        dataType:'json',
        type:'post',
        success:function(res){
            if(res.code==1){
                alert('商品添加成功');
                window.location.reload();
            }else if(res.code==0){
                alert(res.msg);
            }
        },
        error:function(res){
            console.log('error...');
        }
    })
})