@if (count($products) > 0)
    @foreach ($products as $product)
        <article class="card-wrapper text-center col-lg-3 col-md-6 col-12">
            <div product-id={{ $product->id }} id="deleteItem" class="delete-btn"><i class="fa fa-times"
                    aria-hidden="true"></i>
            </div>
            <div class="card-header">
                <a href='products/{{ $product->id }}'>

                    <img src='/storage/images/{{ $product->image }}' width="100%">
                </a>
            </div>
            <div class="card-body">
                <a class="title" href='products/{{ $product->id }}'>
                    <h1 class="title my-3">
                        {{ $product->name }}
                    </h1>
                </a>
                @php
                    $tripDescription = \Illuminate\Support\Str::limit($product->description, 100, $end = '...');
                @endphp
                <div class=description>{!! $tripDescription !!}
                </div>
            </div>
            <div class="card-footer"><a item-id={{ $product->id }} id="show_edit_dialog" href="#"
                    class="my-3 btn btn-primary">Edit</a></div>
        </article>
    @endforeach
@else
    <div class="empty text-center">No Content</div>
@endif