$('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    center:true,
    autoplay:true,
    autoplayTimeout:4000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:7
        }
    }
})
//create.blade.php-----------------------------------------------------------------for hashtags
let input, hashtagArray, container, t;

input = document.querySelector('#hashtags');
container = document.querySelector('.tag-container');
hashtagArray = [];

input.addEventListener('keyup', () => {
    if (event.which == 13 && input.value.length > 0) {
        var text = document.createTextNode(input.value);
        var p = document.createElement('p');
        container.appendChild(p);
        p.appendChild(text);
        p.classList.add('tag');
        input.value = '';

        let deleteTags = document.querySelectorAll('.tag');

        for(let i = 0; i < deleteTags.length; i++) {
            deleteTags[i].addEventListener('click', () => {
                container.removeChild(deleteTags[i]);
            });
        }
    }
});
//-------------------------------------------------------------------except enter for texterea
$(document).on("keydown", ":input:not(textarea)", function(event) {
    return event.key != "Enter";
});
