$(document).ready(function(){
    $('.iframe iframe').attr('width', '560');
    $('.iframe iframe').attr('height', '315');
    
    $(".comment-form").validate({
        
        rules:{
            author:{
                required:true,
                minlenght:4,
                maxlenght:16
            },
            text:{
                required:true,
                maxlenght:500
            },
            captcha2:{
                required:true,
                digits:true,
                maxlenght:5,
                minlenght:5
            }
        },
        messages:{
            author:{
                required:"Это поле обязательно для заполнения",
                minlenght:"Это минимум 4 символа",
                maxlenght:"Это максимум 16 символа"
            },
            text:{
                required:"Это поле обязательно для заполнения",
                maxlenght:"Это максимум 500 символа"
            },
            captcha2:{
                required:"Это поле обязательно для заполнения",
                minlenght:"Это минимум 5 символа",
                maxlenght:"Это максимум 5 символа",
                digits:"Только цифры"
            }
        }
    });
});

