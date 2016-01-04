$(document).ready(function(){

    $('.str').keyup(function(){
        $.get('/admin/catalog/default/translit/',{'str':$(this).val()},function(data){
            //alert(data);
            $('.url').val(data);
        });
    });

    $('.str').blur(function(){
        $.get('/admin/catalog/default/translit/',{'str':$(this).val()},function(data){
            //alert(data);
            $('.url').val(data);
        });
    });
});

