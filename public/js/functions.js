$(document).ready(function () {
    $("#intro .chosen").chosen({disable_search_threshold: 10,width: "240px"});
    $(".regforms .chosen").chosen({disable_search_threshold: 10});
    $('.questions .question').click(function () {
        $(this).parent().toggleClass('opened');
        $(this).parent().find('.answer').slideToggle();
    });
    $('form[name="choose_type"]').on('submit',function (e) {
        e.preventDefault();
        let email = $(this).find('input[name="email"]').val();
        let pw = $(this).find('input[name="password"]').val();
        let type = $(this).find('input[name="type"]:checked').val();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            dataType: 'html',
            success:function (data) {
                if(data=='true'){
                    $('.logreg').hide();
                    $('.regforms .'+type+'').fadeIn();
                    $('.regforms input[name="email"]').each(function () {
                        $(this).val(email);
                    });
                    $('.regforms input[name="password"]').each(function () {
                        $(this).val(pw);
                    })
                    $('.regforms input[name="password_confirmation"]').each(function () {
                        $(this).val(pw);
                    })
                }else{
                    $('.inuse').show();
                }
            }
        })
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(input).parent().find('.avatar').css('background-image', 'url("'+e.target.result+'")');
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $('input[name="photo"]').change(function () {
        readURL(this);
    });

    $('[name="categories[]"]').change(function(){
        $('#search').submit()
    })


})
