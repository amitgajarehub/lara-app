<div class="container pt-5">
	<div class="row slider">
		@foreach($products as $product)
		<div class="col-md-12">
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="{{asset('products/'.$product->image)}}" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">{{$product->name}}</h5>
			    <p class="card-text price"><b>&#x20B9</b> {{$product->price}}</p>
			    <a href="#" class="btn btn-primary">Add To Cart</a>
			    <span class="float-right mr-4"><i class="fas fa-heart fa-lg"></i></span>
			  </div>
			</div>
		</div>
		@endforeach
	</div>
</div>


	

