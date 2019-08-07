$(function(){
    $('.add-to-cart-btn').on('click',function(){
        var string = $(this).data('detail');
        var data = string.split("|");
        if(Cookies.get('cart')){
            var json = JSON.parse(Cookies.get('cart'));
            var boolean = true;
            for(var i = 0 ; i < json.length ; i++){
                if(json[i].pd_id == data[0]){
                    json[i].num ++;
                    boolean = false;
                }
            }
            if(boolean){
                var object = {};
                object.pd_id = data[0];
                object.pd_name = data[1];
                object.pd_type = data[2];
                object.pd_price = data[3];
                object.pd_image = data[4];
                object.pd_star = data[5];
                object.num = 1;
                json.push(object);
            }
            Cookies.set('cart',JSON.stringify(json), { path: '/homework' });
        }else{
            var cart = [];
            var object = {};
            object.pd_id = data[0];
            object.pd_name = data[1];
            object.pd_type = data[2];
            object.pd_price = data[3];
            object.pd_image = data[4];
            object.pd_star = data[5];
            object.num = 1;
            cart.push(object);
            Cookies.set('cart',JSON.stringify(cart), { path: '/homework' });
        }
        location.reload();
    })

    $('.btn_submit').on('click',function(){
        if(!$('.login_form input[name=ud_account]').val()){
            alert('plz enter account');
            return false;
        }
        if(!$('.login_form input[name=ud_password]').val()){
            alert('plz enter password');
            return false;
        }
        $('.login_form').submit();
    })
})