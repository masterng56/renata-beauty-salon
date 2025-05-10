// jQuery(document).ready(function($) {
//     $('.amts_accordion_header').on('click', function() {
//         console.log(this)
//         $(this).next('.amts_accordion_content').slideToggle();
//         $('.amts_accordion_content').not($(this).next()).slideUp();
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    var accordionHeaders = document.querySelectorAll('.amts_accordion_header, .subcategory_header');

    accordionHeaders.forEach(function(header) {
        header.addEventListener('click', function() {
            var content = header.nextElementSibling;

            if (content.style.display === 'block') {
                content.style.display = 'none';
            } else {
                // Закрываем все другие элементы
                var allContents = document.querySelectorAll('.amts_accordion_content, .sub_subcategory_content');
                allContents.forEach(function(otherContent) {
                    if (otherContent !== content) {
                        otherContent.style.display = 'none';
                    }
                });

                // Открываем текущий элемент
                content.style.display = 'block';
            }
        });
    });
});
