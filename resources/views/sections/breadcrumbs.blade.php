<ol class="breadcrumb">
  <li><a href="{{ route('shop') }}">Главная</a></li>
  <li><a href="#">{{ $bc_category->name }}</a></li>
  <li><a href="#">{{ $bc_subcategory->name }}</a></li>
  <li class="active">{{ $product->name }}</li>
</ol>