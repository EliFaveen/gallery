
//show.blade.php-------------------------------------------------------------------like with ajax

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
                event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You do not like this post' : 'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }

                //change the count
                var like_count = response.like_count;   // num of likes
                // var dislike_count = response.dislike_count;   // num of dislikes
                $('.numberOfLikes').text(like_count);
                // $('.numberOfDislikes').text(dislike_count);

            });//--done function end
});
