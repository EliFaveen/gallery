<div class="card-body flex-card-body">
    <div class="heart-fa-parent">
        {{$post->likes->where('like',1)->count()}}
        <i class="fa fa-heart heart-fa-child"></i>

    </div>
    <h5 class="card-title">{{Str::limit($post->title, $limit = 20, $end = '...') }}</h5>
    <div class="heart-fa-parent">
        {{$post->likes->where('like',0)->count()}}
        <i class="fa fa-heart-broken heart-fa-child"></i>

    </div>
</div>
