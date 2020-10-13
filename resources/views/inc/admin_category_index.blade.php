{{--           categories           --}}

<div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
    <div class="bg-white tm-block h-100">
        <h2 class="tm-block-title d-inline-block">Art Categories</h2>
        <table class="table table-hover table-striped mt-3">
            <tbody>
            @php($i=1)
            @foreach($categories as $category)
            <tr>
                <td>{{$i++}}. {{$category->title}}</td>
                <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12">
                {{$categories->links()}}
            </div>
        </div>

        <a href="{{route('admin.category.create')}}" class="btn btn-primary tm-table-mt">Add New Category</a>
    </div>

</div>
