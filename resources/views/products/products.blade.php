@extends('layouts.store')

@section('content')
    
    <ul class="flex flex-1 gap-4 w-full">
    @foreach ( $categories as $category )
    <li class="bg-slate-300 p-1 rounded-{10-px} ">
        <a href="{{route('product.category',$category->id)}}">{{$category->name}}</a>    
    </li> 
    @endforeach    
    </ul>
<x-product-card :products="$products" />


{{$products->links()}}
@endsection
