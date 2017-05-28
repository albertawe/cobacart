@extends('layouts.master')


@section('content')
@if(Session::has('cart'))
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<ul class="list-group">
				@foreach($products as $product)
					<li class="list-group-item">
						<span class="badge">{{$product['qty']}}</span>
						<Strong>{{$product['item']['title']}}</Strong>
						<span class="label label-success">{{$product['price']}}</span>
						<div class="btn-group">
						<a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}" class="btn btn-success" role="button">-</a>
						<a href="{{ route('product.increaseByOne', ['id' => $product['item']['id']]) }}" class="btn btn-success" role="button">+</a>
						<a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}" class="btn btn-success pull-right" role="button">x</a>
						{{--  <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
						<ul class="dropdown-menu">
                                        <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                                        <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
                       	</ul> --}}
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<strong>Total: {{$totalPrice}}</strong>
		</div>
	</div>
	<HR>
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			 <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
		</div>
	</div>
	@else
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<h1>no items in cart!!</h1>
		</div>
	</div>
	@endif
@endsection