@extends('layout.master')

@section('content')
	<div class="col-md-12 text-center">
        <h1>Produktų sąrašas</h1>
    </div>
    <div class="col-md-12 text-center">
        <a class=" mb-3 mt-3 btn btn-lg btn-block btn-outline-success" href="{{ route('create.product') }}">Sukurti naują produktą</a>
    </div>
	<div class="row">
	@foreach($products as $product)
		<div class=" mb-3 col-sm-6 col-md-4">
        	<div class="img-thumbnail">
                <img class="rounded" src="{{$product->image_url}}" title="{{$product->title}}" alt="{{$product->title}}" style="width:100%">
                <div class="caption">
                    <h2>{{$product->title}}</h2>
                    <p>{{str_limit($product->description, 200)}}</p>
                    <p>Kaina: {{$product->price}} Euros Kiekis: {{$product->quantity}} vnt.</p>
                    <p><b>Kategorija: </b> {{$product->category->title}}</p>
                    <p><b>Gamintojas: </b>{{$product->manufacturer->title}}</p>
                    <a class="btn btn-primary btn-block" href="{{ route('single.product', $product->id) }}">Peržiūrėti</a>
                </div>
            </div>
        </div>

    @endforeach
	</div>
@endsection