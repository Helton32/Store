
@extends('layouts.store')
@section('content')
<div class="flex flex-wrap gap-4 w-full">
  
  @forelse ( $favoris as $favori )
      
      <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <span aria-hidden="true" class="absolute inset-0"><p class="title , font-bold px-5">**-{{$favori->product->name}}-**<a href="{{route('favoris.remove',$favori)}}"><i class="ri-chat-delete-fill"></i></a></p></span>
              </div>
</div>
</div>

@empty
  <p class="title , font-bold px-5">Pas de produits favoris</p>
@endforelse
@endsection
