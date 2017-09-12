@extends('layout.master')

@section('content')
	<div class="col-md-12 text-center">
        <h1>{{$product->title}}</h1>
    </div>
    <div class="col-md-12 text-center">
    </div>
	<div class="row justify-content-md-center">
		<div class="col-md-6">
        	<div class="img-thumbnail">
                <img src="{{$product->image_url}}" title="{{$product->title}}" alt="{{$product->title}}" style="width:100%">
                <div class="caption">
                    <p>{{str_limit($product->description, 200)}}</p>
                    <p>Kaina: {{$product->price}} Euros Kiekis: {{$product->quantity}} vnt.</p>
                    <p><b>Kategorija: </b> {{$product->category_id}}</p>
                    <p><b>Gamintojas: </b>{{$product->manufacturer_id}}</p>
                    <a class="btn btn-warning btn-block" href="{{ route('edit.product', $product->id) }}">Edit</a>
                    <form method="GET" action="{{ route('delete.product', $product->id) }}">
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>

                </div>
            </div>
        </div>

	</div>
@endsection