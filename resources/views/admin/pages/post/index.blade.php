@extends('admin.layouts.index_layout_category')
{{--/admin/post/index--}}
@section('content')

    {{--           posts           --}}

    <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <h2 class="tm-block-title d-inline-block">Posts</h2>

                </div>
                {{--       TODO: add search instead         --}}
                <div class="col-md-4 col-sm-12 text-right">
                    <a href="add-product.html" class="btn btn-small btn-primary">Search for Post</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Post Title</th>
                        <th scope="col" class="text-center">UserName</th>
                        <th scope="col" class="text-center">Popularity</th>
                        <th scope="col">Created at</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($posts as $post)
                        <tr>

                            <th scope="row">
                                <input type="checkbox" aria-label="Checkbox">
                            </th>
                            <td class="tm-product-name">{{$i++}}. {{Str::limit($post->title, $limit = 15, $end = '...') }}</td>
                            <td class="text-center">@some_username</td>
                            <td class="text-center">+255</td>
                            <td>{{$post->created_at}}</td>
                            <td><i class="fas fa-trash-alt tm-trash-icon"></i></td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="tm-table-mt tm-table-actions-row">
                {{--       TODO: add soft delete(disable) instead         --}}
                <div class="tm-table-actions-col-left">
                    <button class="btn btn-danger">Disable Selected Posts</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
