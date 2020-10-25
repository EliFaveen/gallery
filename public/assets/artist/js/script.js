
//create.blade.php-----------------------------------------------------------------for hashtags this intrupt my like system Todo:lets seprate scripts
// let input, hashtagArray, container, t=0;
//
// input = document.querySelector('#hashtags');
// container = document.querySelector('.tag-container');
// hashtagArray = [];
//
// input.addEventListener('keyup', () => {
//     if (event.which == 13 && input.value.length > 0) {
//         var text = document.createTextNode(input.value);
//         var myinput = document.createElement('input');
//         //var mydiv = document.createElement('div');
//         var p = document.createElement('p');
//
//         //container.appendChild(mydiv);
//        // mydiv.appendChild(myinput);
//         container.appendChild(myinput);
//         myinput.appendChild(text);
//         myinput.classList.add('hashtag_input');
//
//         container.appendChild(p);
//         p.appendChild(text);
//         p.classList.add('tag');
//
//         p.setAttribute("id", 'tags' + t);
//
//         myinput.setAttribute("type", "hidden");
//         myinput.setAttribute('name', 'hashtags[]');
//         myinput.setAttribute('id', 'tags_' + t);
//
//         $('#tags_' + t).val(input.value);
//         t++;
//
//         input.value = '';
//
//
//         //for p tags
//         let deleteTags = document.querySelectorAll('.tag');
//         let deleteInput = document.querySelectorAll('.hashtag_input');
//
//
//         for(let i = 0; i < deleteTags.length; i++) {
//             deleteTags[i].addEventListener('click', () => {
//                 container.removeChild(deleteTags[i]);
//                 container.removeChild(deleteInput[i]);
//
//
//             });
//
//             }
//     }
// });
//create.blade.php-------------------------------------------------------------------except enter for texterea
// $(document).on("keydown", ":input:not(textarea)", function(event) {
//     return event.key != "Enter";
// });

//index.blade.php-------------------------------------------------------------------gallery for show posts
//show.blade.php-------------------------------------------------------------------like with ajax
//
// var postId = 0;
// $('.like').on('click', function(event) {
//     event.preventDefault();
//     postId = event.target.parentNode.parentNode.dataset['postid'];
//     var isLike = event.target.previousElementSibling == null;
//     $.ajax({
//         method: 'POST',
//         url: urlLike,
//         data: {isLike: isLike, postId: postId, _token: token}
//     })
//         .done(function() {
//             event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You do not like this post' : 'Dislike';
//             if (isLike) {
//                 event.target.nextElementSibling.innerText = 'Dislike';
//             } else {
//                 event.target.previousElementSibling.innerText = 'Like';
//             }
//         });
// });
var postId = 0;
$('.like').on('click' , function (event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid']; //problem //solved here <div class="card-body" data-postid="{{$post->id}}">
    // console.log(postId);
    var isLike = event.target.previousElementSibling == null ? true : false;
    //send the ajax request
        $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
            .done(function (){
                //change the page
                event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You do not like this post' : 'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }
            });
});
