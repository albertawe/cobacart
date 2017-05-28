@extends('layouts.master')
 

@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($products as $product)
 
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="{{$product->imageurl}}" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$product->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product->description}}</p>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/addProduct/{{$product->id}}" class="btn btn-success btn-product"><span class="fa fa-shopping-cart"></span> Buy</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    @foreach($products->chunk(3) as $productchunk)

    <div class="row">
    @foreach($productchunk as $product)

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
      <div class="caption">
        <h3>{{ $product->title }}</h3>
        <p class="description">{{ $product->description }}</p>
        <div class="clearfix">
        <div class="pull-left price">{{ $product->price}}</div>
        <p><a href="{{route('product.addtocart',['id'=>$product->id])}}" class="btn btn-success pull-right" role="button">add to cart</a> 
        </p>
      </div>

    </div>

  </div>

</div>
 @endforeach
</div>

@endforeach

</div>

 
@endsection
 