@extends('layout.master')

@section('content')
  @if(isset($product))
    <h1>Redaguoti produktą</h1>
  @else
    <h1 class="mt-3 mb-3">Forma naujo produkto sukūrimui</h1>
  @endif


    @if(isset($product))
    <form method="POST" action={{ route('update.product', $product->id) }} >
    @else
    <form method="POST" action={{ route('store.product') }} >
    @endif
     {{ csrf_field() }}


  <div class="form-group">
    <label for="title">Title</label>
      @if(isset($product))
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $product->title }}"   placeholder="Enter title">
      @else
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"   placeholder="Enter title">
      @endif
    @if($errors->has('title'))
      <div class="invalid-feedback">
          {{ $errors->first('title') }}
      </div>
    @endif
  </div>


   <div class="form-group">
    <label for="image_url">Image link</label>
    @if(isset($product))
    <input type="text" class="form-control {{ $errors->has('image_url') ? ' is-invalid' : '' }}" name="image_url" value="{{ $product->image_url }}" placeholder="Enter image link">
    @else
    <input type="text" class="form-control {{ $errors->has('image_url') ? ' is-invalid' : '' }}" name="image_url" value="{{ old('image_url') }}" placeholder="Enter image link">
    @endif
    @if($errors->has('image_url'))
      <div class="invalid-feedback">
          {{ $errors->first('image_url') }}
      </div>
    @endif
  </div>


     <div class="form-group">
    <label for="description">Description</label>

    @if(isset($product))
    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="8"  placeholder="Enter description">{{ $product->description }}</textarea>
    @else
    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="3"  placeholder="Enter description">{{ old('description') }}</textarea>
    @endif

    @if($errors->has('description'))
      <div class="invalid-feedback">
          {{ $errors->first('description') }}
      </div>
    @endif
  </div>


     <div class="form-group">
    <label for="price">Price</label>
    @if(isset($product))
    <input type="text" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $product->price }}" placeholder="Enter price">
    @else
    <input type="text" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" placeholder="Enter price">
    @endif
    @if($errors->has('price'))
      <div class="invalid-feedback">
          {{ $errors->first('price') }}
      </div>
    @endif
  </div>


  <div class="form-group">
    <label for="quantity">Quantity</label>
    @if(isset($product))
    <input type="text" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ $product->quantity }}"  placeholder="Enter quantity">
    @else
    <input type="text" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}"  placeholder="Enter quantity">
    @endif

    @if($errors->has('quantity'))
      <div class="invalid-feedback">
          {{ $errors->first('quantity') }}
      </div>
    @endif

  </div>


   <div class="form-group">


  <label for="category_id">Category</label>
  @if(isset($product))
    <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
        <option value="">--SELECT--</option>
      @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
      @endforeach
    </select>
  @else
    <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
        <option value="">--SELECT--</option>
      @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
      @endforeach
    </select>
  @endif
  @if($errors->has('category_id'))
      <div class="invalid-feedback">
          {{ $errors->first('category_id') }}
      </div>
    @endif

  </div>

   <div class="form-group">
   <label for="category_id">Manufacturer</label>
      @if(isset($product))
    <select name="manufacturer_id" class="form-control {{ $errors->has('manufacturer_id') ? ' is-invalid' : '' }}">
        <option value="">--SELECT--</option>
      @foreach($manufacturers as $manufacturer)
        <option value="{{$manufacturer->id}}">{{$manufacturer->title}}</option>
      @endforeach
    </select>
    @else
    <select name="manufacturer_id" class="form-control {{ $errors->has('manufacturer_id') ? ' is-invalid' : '' }}">
        <option value="">--SELECT--</option>
      @foreach($manufacturers as $manufacturer)
        <option value="{{$manufacturer->id}}">{{$manufacturer->title}}</option>
      @endforeach
    </select>
    @endif
    @if($errors->has('manufacturer_id'))
      <div class="invalid-feedback">
          {{ $errors->first('manufacturer_id') }}
      </div>
    @endif
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection