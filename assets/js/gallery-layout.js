// $(document).ready(function() {
//     var galleryBodyFirs = $('.wrapper + .gallery');
//     var count = $('.gallery').children().length;

//     if (count = 3) {
//         $('.wrapper + .gallery').addClass('three-gallery');
//         $('.image:eq(2)').addClass('three-img');
//         console.log(count);
//     }
//     if (count = 1) {
//         $('.gallery').addClass('one-img');
//     }

// });

// $(document).ready(function() {
//     $('.wrapper + .gallery').each(function(i, sect) {
//         var itemsInGallery = $(sect).children('.image');
//         var count = itemsInGallery.length;
//         if (count = 3) {
//             $('.gallery').addClass('three-gallery');
//             $('.image:eq(2)').addClass('three-img');
//             console.log(count)
//         }
//         // var count = $(".gallery").children().length;
//         // if (count = 1) {
//         //     $('.gallery').addClass('one-img');

//         // }
//     });
// });

$(document).ready(function() {

    if ($('.gallery:eq(0)').children().length = 3) {
        $('.gallery:eq(0)').addClass('three-img');
    }
    if ($('.gallery:eq(1)').children().length = 1) {
        $('.gallery:eq(1)').addClass('one-img');
    }
    if ($('.gallery:eq(3)').children().length = 1) {
        $('.gallery:eq(3)').addClass('one-img');
    }
    if ($('.gallery:eq(4)').children().length = 2) {
        $('.gallery:eq(4)').addClass('two-img');
    }
    if ($('.gallery:eq(5)').children().length = 1) {
        $('.gallery:eq(5)').addClass('one-img');
    }
    if ($('.gallery:eq(6)').children().length = 3) {
        $('.gallery:eq(6)').addClass('three-img');
    }
    if ($('.gallery:eq(7)').children().length = 1) {
        $('.gallery:eq(7)').addClass('one-img');

    }

});