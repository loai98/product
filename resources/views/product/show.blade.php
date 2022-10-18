@extends('layout.app')


@section('content')
    <div class="product-landing">

    <div class="header-wrapper my-5">
        <div class="page-title ">
            <h1>{{ $product->name }}</h1>
        </div>
        <div class="date">
            <small>{{ $product->created_at }}</small>
        </div>
    </div>
        @if ($product->image)
            <div class="image-wrapper">
                <img src='/storage/images/{{ $product->image }}' width="100%">
            </div>
        @endif
        <div class="content-wrapper">
            <div class="body">
                <p>{!! $product->description !!}</p>
            </div>

        </div>
    </div>
@endsection
