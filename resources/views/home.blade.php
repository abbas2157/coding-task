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
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>
            @if ($errors->has('success'))
                <div class="text-success text-left mt-3">{{ $errors->first('success') }}</div>
            @endif
            @if ($errors->has('error'))
                <div class="text-danger text-left mt-3">{{ $errors->first('error') }}</div>
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
                                            <a href="{{ route('add_to_cart',$item->id) }}">Add to Cart</a>
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

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>
</div>
@stop