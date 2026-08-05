

// Loader Function ===============================
// var loader = false;

// setTimeout(function(){
//     loader = true;
// }, 3500);

// window.onload = function(){
//     if(loader){
//         $('#loader').fadeOut();
//         $('body').css({'overflow' : ''});
//         // console.log('After Loading');
//     }else{
//         setTimeout(function(){
//             $('#loader').fadeOut();
//             $('body').css({'overflow' : ''});
//             // console.log('Complete Timing');
//         }, 3500);
//     }
// };


// Padding-Top on Top-Sec Element Function ==========================

var header_Height = $('header').outerHeight();

$('.top-sec').css({'padding-top' : `${header_Height + 20}px`});


// Height 100% on Top-Sec > Child Function ==========================
var top_Sec_Height = $('.top-sec').outerHeight();
$('.top-sec').css({'height' : `${top_Sec_Height}px`});


// Mobile Services Accordion ==========================
$(document).on('click', '.services-toggle', function(){
    var $li = $(this).closest('.has-dropdown-mobile');
    $li.toggleClass('open');
});

// Open Side-Menu Function ==========================

var sideMenu_btn = $('.side_menu_btn');
var sideMenu = $('.side-menu-area');
var sideMenu_overlay = $('.side-menu-area .overlay');
var sideMenu_close = $('.side-menu-area .close-btn button');

$(sideMenu_btn).click(function(){
    $(sideMenu).addClass('active');
    $('body').css({'overflow' : 'hidden'});
});

$(sideMenu_overlay).click(function(){
    $(sideMenu).removeClass('active');
    $('body').css({'overflow' : ''});
});

$(sideMenu_close).click(function(){
    $(sideMenu).removeClass('active');
    $('body').css({'overflow' : ''});
});



// Scroll-Btn Function ==========================

$('[data-window-scroll]').click(function(){
    var val = $(this).attr('data-window-scroll');
    var scroll = parseInt($(window).scrollTop()) + parseInt(val);
    console.log(scroll);
    window.scrollTo(0,scroll);
});



// Inquiry-Form Function ==========================

var inquiry_form_btn = $('.inquiry-form-btn');
var inquiry_form_sec = $('.inquiry-form-sec');
var inquiry_form_close = $('.inquiry-form-sec .close-btn button');
var inquiry_form_overlay = $('.inquiry-form-sec .overlay');

$(inquiry_form_btn).click(function(){
    $(inquiry_form_sec).addClass('active');
    $('body').css({'overflow' : 'hidden'});
});

$(inquiry_form_overlay).click(function(){
    $(inquiry_form_sec).removeClass('active');
    $('body').css({'overflow' : ''});
});

$(inquiry_form_close).click(function(){
    $(inquiry_form_sec).removeClass('active');
    $('body').css({'overflow' : ''});
});




//  Float-Slider Function ==========================

$('.float-slider .inner-box').each(function(){
    var e = $(this);

    var img_container = $(e).find('.img-container');

    var img_inner_box = $(e);
    var img_box = $(e).find('.img-box');

    var img_inner_box_width = img_inner_box.outerWidth();
    var img_box_width = img_box.outerWidth();

    if(img_inner_box_width > img_box_width){
        var clone_times = Math.floor(img_inner_box_width / img_box_width);

        for(var i = 0; i < clone_times; i++){
            img_container.append(img_box.clone());
            console.log(i);
        }
    }

    var clone = img_container.clone();
    clone = $(clone).addClass('clone');
    $(e).append(clone);

});




//  Choose-File Function ==========================

$('form .file-box label input[type=file]').each(function(){
    var e = $(this);
    var ele_lable = $(e).parent('label');
    var ele_span = $(ele_lable).find('span');
    var ele_p = $(ele_lable).find('p');

    var ele_lable_pr = parseInt($(ele_lable).css('padding-right'));
    var ele_span_width = parseInt($(ele_span).outerWidth());

    $(ele_lable).css({'padding-right' : `${ele_lable_pr + ele_span_width}px`});

    $(ele_p).text($(ele_p).data('placeholder'));

    $(e).change(function(){
        var ele_p = $(this).next('p');
        
        var fileName = $(this.files).map(function(){
            return this.name;
        }).get();

        fileName = fileName.join(', ');

        if (this.files.length > 0) {
            $(ele_p).addClass('selected');
            $(ele_p).text(fileName);
        } else {
            $(ele_p).removeClass('selected');
            $(ele_p).text($(ele_p).data('placeholder'));
        }

    });
});