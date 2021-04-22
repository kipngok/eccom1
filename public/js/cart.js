 $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Add an item
    $(".addToCart").click(function(e){
        e.preventDefault();
        var form = this.form;
    $.ajax({
        type: 'post',
        url: '/cartAjax/'+$('#id', form).val(),
        data:$(form).serialize(),
        success: function(datay){
            $datay = $(datay); 
            $('.hm-minicart').fadeOut().empty().html($datay).fadeIn();
            $('.minicart').show();
            $("html, body").animate({
 					scrollTop: 0
    		}, 1000); 
        },
    });
});



$(document).on("click", ".removeFromCart", function(e){
        e.preventDefault();
        var form = this.form;
    $.ajax({
        type: 'post',
        url: '/removeAjax',
        data:$(form).serialize(),
        success: function(datay){
            $datay = $(datay); 
            $('.hm-minicart').fadeOut().empty().html($datay).fadeIn();
            $('.minicart').show();
            $("html, body").animate({
                    scrollTop: 0
            }, 1000); 
        },
    });
});

});



$(document).on("click", "#cartButton", function(){
    $('.minicart').toggle();
});

$(document).ready(function(){
    getCart();
});

function getCart(){
        $.ajax({
                url: '/cartGet/',
                type: "GET", 
                success: function(data){
                    $data = $(data); 
                    $('.hm-minicart').html($data).fadeIn(); 
                    getTotals();  
                }
            });
    }



//Large Cart Page
$(document).on("click", ".plus", function(e){
        e.preventDefault();
        var form = this.form;
        var i=$('.qty', form).val();
        i++;
        $('.qty', form).val(i);
    $.ajax({
        type: 'post',
        url: '/updateAjaxPage',
        data:$(form).serialize(),
        success: function(datay){
            $datay = $(datay); 
            $('#cart').fadeOut().empty().html($datay).fadeIn();
            getCart();
        },
    });
});

$(document).on("click", ".minus", function(e){
        e.preventDefault();
        var form = this.form;
        var i=$('.qty', form).val();
        i--;
        if(i<1){
            i=1;
        }
        $('.qty', form).val(i);
    $.ajax({
        type: 'post',
        url: '/updateAjaxPage',
        data:$(form).serialize(),
        success: function(datay){
            $datay = $(datay); 
            $('#cart').fadeOut().empty().html($datay).fadeIn();
            getCart();
        },
    });
});



$(document).on("click", ".removeFromCartPage", function(e){
        e.preventDefault();
        var form = this.form;
    $.ajax({
        type: 'post',
        url: '/removeAjaxPage',
        data:$(form).serialize(),
        success: function(datay){
            $datay = $(datay); 
            $('#cart').fadeOut().empty().html($datay).fadeIn();
            getCart();
        },
    });
});


$(document).on("change", ".qty", function(e){
        e.preventDefault();
        var form = this.form;
    $.ajax({
        type: 'post',
        url: '/updateAjaxPage',
        data:$(form).serialize(),
        success: function(datay){
            $datay = $(datay); 
            $('#cart').fadeOut().empty().html($datay).fadeIn();
            getCart();
        },
    });
});



//Coupon Code Check

$(document).on("click", ".coupon", function(e){
        e.preventDefault();
        var form = this.form;
    $.ajax({
        type: 'post',
        url: '/couponCheck',
        data:$(form).serialize(),
        success: function(datay){
            $('#couponMessage').fadeOut().empty().html(datay['message']).fadeIn();
            getTotals();
        },
    });
});


function getCartPage(){
        $.ajax({
                url: '/cartGetPage/',
                type: "GET", 
                success: function(data){
                    $data = $(data);
                    $('#cart').html($data).fadeIn();   
                }
            });
    }

function getTotals(){
    $.ajax({
                url: '/getTotals/',
                type: "GET", 
                success: function(data){
                    $data = $(data);
                    $('#total').html($data).fadeIn();   
                }
            });
}