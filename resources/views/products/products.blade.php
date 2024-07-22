@extends('layouts.store')

@section('content')
    
    <ul class=" pt-10  px-3 flex flex-1 gap-4 s">
    @foreach ( $categories as $category )
    <li class="bg-slate-300 p-5 rounded-full ">
        <a href="{{route('product.category',$category->id)}}">{{$category->name}}</a>    
    </li> 
    @endforeach    
    </ul>
<x-product-card :products="$products" />


{{$products->links()}}
@endsection
