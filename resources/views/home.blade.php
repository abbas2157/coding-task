@extends('layout.app')
@section('title')
<title>Home | My Task</title>
@stop
@section('content')
<!-- Product -->
<div class="p-t-40 mt-5">
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 mt-5">
					Product Overview
				</h3>
			</div>
            @if ($errors->has('success'))
                <div class="alert alert-success mt-3">{{ $errors->first('success') }}</div>
            @endif
            @if ($errors->has('error'))
                <div class="alert alert-danger mt-3">{{ $errors->first('error') }}</div>
            @endif
			<div class="row isotope-grid">
                @if($products->isNotEmpty())
                    @foreach ($products as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <div class="block2">
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $item->title ?? '' }}
                                        </a>
                                        <span class="stext-105 cl3">
                                            ${{ $item->price ?? '0' }}
                                        </span>
                                        @auth
                                            <form action="{{ route('add_to_cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->id ?? 0 }}">
                                                <div class="form-group">
                                                    <select name="quantity" id="quantity" required>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-info" type="submit">Add to Cart</button>
                                            </form>
                                            
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                @else
                    <p>No Item Found</p>
                @endif
			</div>
		</div>
	</section>
</div>
@stop