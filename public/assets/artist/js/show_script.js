
//show.blade.php-------------------------------------------------------------------like with ajax

// let likeText=document.getElementById("likeBtn").innerHTML;
if(document.getElementById("likeBtn").innerText == 'You like this post'){
    document.getElementById("likeBtn").innerHTML='<i class="fas fa-heart custom-like" style="color: red"></i>';
}
else if(document.getElementById("likeBtn").innerText == 'Like'){
    document.getElementById("likeBtn").innerHTML='<i class="fas fa-heart custom-like"></i>';
}
if(document.getElementById("dislikeBtn").innerText == 'You do not like this post'){
    document.getElementById("dislikeBtn").innerHTML='<i class="fas fa-heart-broken custom-dislike" style="color: red"></i>';
}
else if(document.getElementById("dislikeBtn").innerText == 'Dislike'){
    document.getElementById("dislikeBtn").innerHTML='<i class="fas fa-heart-broken custom-dislike"></i>';
}


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
            .done(function (response) {

                //change the page
                // event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You do not like this post' : 'Dislike';
                // if (isLike)
                // {
                //     if (event.target.innerHTML == '<i class="fas fa-heart custom-like"></i>'){
                //         // console.log('hi');
                //         // alert(event.target.innerHTML);
                //         event.target.innerHTML='<i class="fas fa-heart custom-like" style="color: red"></i>';
                //     }else{
                //         event.target.innerHTML='<i class="fas fa-heart custom-like"></i>';
                //     }
                // }else{
                //     if(event.target.innerText == 'Dislike'){
                //         event.target.innerText = 'You do not like this post';
                //     }else{
                //         event.target.innerText = 'Dislike';
                //     }
                // }



                // if (isLike) {
                //     event.target.nextElementSibling.innerText = 'Dislike';
                // } else {
                //     event.target.previousElementSibling.innerText = 'Like';
                // }

                //change the count
                // var like_count = response.like_count;   // num of likes
                // // var dislike_count = response.dislike_count;   // num of dislikes
                // $('.numberOfLikes').text(like_count);
                // // $('.numberOfDislikes').text(dislike_count);

            });//--done function end
});


