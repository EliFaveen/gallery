
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
            .done(function () {

                //change the page
                event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You do not like this post' : 'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';
                } else {
                    event.target.previousElementSibling.innerText = 'Like';
                }

                //---------------------------------------------------------nazgol test
                //     event.target.innerText = isLike ? $(".heart").html("<i class=\"fas fa-heart custom-like\"></i>") ? $(".heart").html("<i class=\"fas fa-heart custom-like\" style='color: red'></i>") : $(".heart").html("<i class=\"fas fa-heart custom-like\"></i>") : $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\"></i>") ? $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" style='color: red'></i>") : $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\"></i>");
                //     if (isLike) {
                //
                //
                //          $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\"></i>");
                //     } else {
                //          $(".heart").html("<i class=\"fas fa-heart custom-like\"></i>");
                //     }


                // ---------------------------------------------------------my test
            //     $(".heart").click(function() {
            //         if ($(".heart").html() == "<i class=\"fas fa-heart custom-like\" ></i>") {
            //             $(".heart").html("<i class=\"fas fa-heart custom-like\" style='color: red'></i>");
            //
            //         }
            //         if ($(".heart").html("<i class=\"fas fa-heart custom-like\" style='color: red'></i>")) {
            //             $(".heart").html("<i class=\"fas fa-heart custom-like\" ></i>");
            //
            //         }
            //     });
            //     $(".broken-heart").click(function() {
            //         if ($(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" ></i>")) {
            //             $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" style='color: red'></i>");
            //         }
            //         if ($(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" style='color: red'></i>")) {
            //             $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" ></i>");
            //         }
            //     });
            //
            //    ----------------------------------------------------my-test-3
            //     alert(event.target.innerHTML)

            //     event.target.innerText = isLike;
            //
            //     if(isLike)
            //     {
            //         //like
            //         if($(".heart").html("<i class=\"fas fa-heart custom-like\"></i>")){
            //             // event.target.innerHTML = '<i class="fas fa-heart custom-like" style="color: red"></i>';
            //             // $(".heart").html("<i class=\"fas fa-heart custom-like\" style=\"color: red\"></i>");
            //             event.target.html("<i class=\"fas fa-heart custom-like\" style=\"color: red\"></i>");
            //         }else{
            //             // event.target.innerHTML = '<i class="fas fa-heart custom-like"></i>';
            //             // $(".heart").html("<i class=\"fas fa-heart custom-like\"></i>");
            //             event.target.html("<i class=\"fas fa-heart custom-like\"></i>");
            //         }
            //
            //     }else{
            //         //dislike
            //         if($(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\"></i>")){
            //             // event.target.innerHTML = '<i class="fas fa-heart-broken custom-dislike" style="color: red"></i>';
            //             // $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" style=\"color: red\"></i>");
            //             event.target.html("<i class=\"fas fa-heart-broken custom-dislike\" style=\"color: red\"></i>");
            //         }else{
            //             // event.target.innerHTML = '<i class="fas fa-heart-broken custom-dislike"></i>';
            //             // $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\"></i>");
            //             event.target.html("<i class=\"fas fa-heart-broken custom-dislike\"></i>");
            //         }
            //     }
            //     if (isLike) {
            //         // $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\"></i>");
            //         // event.target.nextElementSibling.innerHTML = '<i class="fas fa-heart-broken custom-dislike"></i>';
            //         event.target.html("<i class=\"fas fa-heart-broken custom-dislike\"></i>");
            //     } else {
            //         // $(".heart").html("<i class=\"fas fa-heart custom-like\"></i>");
            //         // event.target.previousElementSibling.innerHTML = '<i class="fas fa-heart custom-like"></i>';
            //         event.target.html("<i class=\"fas fa-heart custom-like\"></i>");
            //     }
            //    ------------------------------------------test 4
            //     event.target.innerText = isLike ? event.target.innerHTML == heart_html ? heart_html="<i class=\"fas fa-heart custom-like\" style=\"color: red\"></i>" : heart_html : event.target.innerText == 'Dislike' ? 'You do not like this post' : 'Dislike';
            //     if (isLike) {
            //         event.target.nextElementSibling.innerText = 'Dislike';
            //     } else {
            //         event.target.previousElementSibling.innerText = 'Like';
            //     }

            });//--done function end
});
//--------------------------------------------------------------------------------my-test
// if($(".heart").val("you like this post")){
//     $(".heart").html("<i class=\"fas fa-heart custom-like\" style='color: red'></i>");
//
// }
// if($(".heart").val("Like")){
//     $(".heart").html("<i class=\"fas fa-heart custom-like\" ></i>");
//
// }
// if($(".broken-heart").val("you don't like this post")) {
//     $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" style='color: red'></i>");
// }
// if($(".broken-heart").val("Dislike")) {
//     $(".broken-heart").html("<i class=\"fas fa-heart-broken custom-dislike\" ></i>");
// }
//    ----------------------------------------------------my-test-3
// function myFunction1() {
//     // var heart_html = document.getElementById("heart-id").innerHTML;
//     if (document.getElementById("heart-id").innerHTML == "<i class=\"fas fa-heart custom-like\" style=\"color: red\"></i>"){
//         document.getElementById("heart-id").innerHTML ="<i class=\"fas fa-heart custom-like\"></i>";
//     }else{
//         document.getElementById("heart-id").innerHTML = "<i class=\"fas fa-heart custom-like\" style=\"color: red\"></i>";
//     }
//
//     // var heart_html_red = document.getElementById("heart-id").innerHTML = "<i class=\"fas fa-heart custom-like\" style=\"color: red\"></i>";
//     // var heart_html = document.getElementById("heart-id").innerHTML ="<i class=\"fas fa-heart custom-like\"></i>";;
//     //
//     // alert( $(".heart").html());
// }
// function myFunction2() {
//     var broken_heart_html = document.getElementById("broken-heart-id").innerHTML;
//     // alert(broken_heart_html);
// }
//
