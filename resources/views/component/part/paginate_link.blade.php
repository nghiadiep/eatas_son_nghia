@php
$sParam = !isset($sort) || $sort == "desc" ? "asc": "desc";
@endphp
<a class="uk-display-block" href="{{$paginator->appends(['order' => $order, 'sort' => $sParam])->url($paginator->currentPage())}}">
   {{$label}}
</a>