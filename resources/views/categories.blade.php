<x-app-layout>
<div class="grid grid-flow-col">
@foreach ($categories as $categorie )

<a href="dashboard/categories/products{category_id}">{{$categorie->name}}<br></a>
    
@endforeach
</div>
</x-app-layout>
