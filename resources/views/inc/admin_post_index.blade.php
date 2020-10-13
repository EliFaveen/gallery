{{--           posts           --}}

<div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
    <div class="bg-white tm-block h-100">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2 class="tm-block-title d-inline-block">Products</h2>

            </div>
            <div class="col-md-4 col-sm-12 text-right">
                <a href="add-product.html" class="btn btn-small btn-primary">Add New Product</a>
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
                        <td class="tm-product-name">{{$i++}}. {{$post->title}}</td>
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
            <div class="tm-table-actions-col-left">
                <button class="btn btn-danger">Delete Selected Items</button>
            </div>
            <div class="tm-table-actions-col-right">
                <span class="tm-pagination-label">Page</span>
                <nav aria-label="Page navigation" class="d-inline-block">
                    <ul class="pagination tm-pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <span class="tm-dots d-block">...</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
