
//show.blade.php-------------------------------------------------------------------like with ajax


// if(document.getElementById("likeBtn").innerText == 'You like this post'){
//     document.getElementById("likeBtn").innerHTML='<i class="fas fa-heart custom-like" style="color: red"></i>';
// }
// else if(document.getElementById("likeBtn").innerText == 'Like'){
//     document.getElementById("likeBtn").innerHTML='<i class="fas fa-heart custom-like"></i>';
// }
// if(document.getElementById("dislikeBtn").innerText == 'You do not like this post'){
//     document.getElementById("dislikeBtn").innerHTML='<i class="fas fa-heart-broken custom-dislike" style="color: red"></i>';
// }
// else if(document.getElementById("dislikeBtn").innerText == 'Dislike'){
//     document.getElementById("dislikeBtn").innerHTML='<i class="fas fa-heart-broken custom-dislike"></i>';
// }

//-------------------------------------------------------------------------------like compelete
// var postId = 0;
// $('.like').on('click' , function (event){
//     event.preventDefault();
//     postId = event.target.parentNode.parentNode.dataset['postid']; //problem //solved here <div class="card-body" data-postid="{{$post->id}}">
//     // console.log(postId);
//     var isLike = event.target.previousElementSibling == null ? true : false;
//     //send the ajax request
//         $.ajax({
//         method: 'POST',
//         url: urlLike,
//         data: {isLike: isLike, postId: postId, _token: token}
//     })
//             .done(function (response) {
//
//
//             });//--done function end
// });


//------------------------------------------------------------------------------like again
$('.like').on('click' , function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
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
                // event.target.innerHTML = isLike ? event.target.innerHTML == '<i class="fas fa-heart custom-like "></i>' ? '<i class="fas fa-heart custom-like " style="color: red"></i>' : '<i class="fas fa-heart custom-like "></i>' : event.target.innerText == '<i class="fas fa-heart-broken custom-dislike "></i>' ? '<i class="fas fa-heart-broken custom-dislike " style="color: red"></i>' : '<i class="fas fa-heart-broken custom-dislike "></i>';
                // if (isLike) {
                //     event.target.nextElementSibling.innerHTML = '<i class="fas fa-heart-broken custom-dislike "></i>';
                // } else {
                //     event.target.previousElementSibling.innerHTML = '<i class="fas fa-heart custom-like "></i>';
                // }

            });
    if($(this).hasClass("active")){
        $(this).removeClass("active")
    }
    else{
        $(".like").removeClass("active");
        $(this).addClass("active")
    }


});
