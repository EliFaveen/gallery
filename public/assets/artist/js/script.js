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
let input, hashtagArray, container, t=0;

input = document.querySelector('#hashtags');
container = document.querySelector('.tag-container');
hashtagArray = [];

input.addEventListener('keyup', () => {
    if (event.which == 13 && input.value.length > 0) {
        var text = document.createTextNode(input.value);
        var myinput = document.createElement('input');
        //var mydiv = document.createElement('div');
        var p = document.createElement('p');

        //container.appendChild(mydiv);
       // mydiv.appendChild(myinput);
        container.appendChild(myinput);
        myinput.appendChild(text);
        myinput.classList.add('hashtag_input');

        container.appendChild(p);
        p.appendChild(text);
        p.classList.add('tag');

        p.setAttribute("id", 'tags' + t);

        myinput.setAttribute("type", "hidden");
        myinput.setAttribute('name', 'hashtags[]');
        myinput.setAttribute('id', 'tags_' + t);

        $('#tags_' + t).val(input.value);
        t++;

        input.value = '';


        //for p tags
        let deleteTags = document.querySelectorAll('.tag');
        // let deleteTags2 = document.querySelectorAll('.hashtag_input');

        for(let i = 0; i < deleteTags.length; i++) {
            deleteTags[i].addEventListener('click', () => {
                container.removeChild(deleteTags[i]);


            });

            // deleteTags2[i].addEventListener('click', () => {
            //     container.removeChild(deleteTags2[i]);
            //
            // });


            }
        //for input tags
        // let deleteTags2 = document.querySelectorAll('.hashtag_input');
        //
        // for(let j = 0; j < deleteTags2.length; j++) {
        //     deleteTags2[j].addEventListener('click', () => {
        //         container.removeChild(deleteTags2[j]);
        //
        //     });
        // }



    }
});
//-------------------------------------------------------------------except enter for texterea
$(document).on("keydown", ":input:not(textarea)", function(event) {
    return event.key != "Enter";
});
