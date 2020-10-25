
// create.blade.php-----------------------------------------------------------------for hashtags this intrupt my like system Todo:lets seprate scripts
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
        let deleteInput = document.querySelectorAll('.hashtag_input');


        for(let i = 0; i < deleteTags.length; i++) {
            deleteTags[i].addEventListener('click', () => {
                container.removeChild(deleteTags[i]);
                container.removeChild(deleteInput[i]);


            });

            }
    }
});
//create.blade.php-------------------------------------------------------------------except enter for texterea
$(document).on("keydown", ":input:not(textarea)", function(event) {
    return event.key != "Enter";
});
