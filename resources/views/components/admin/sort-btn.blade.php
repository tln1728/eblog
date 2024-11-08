@props(['route', 'sort'])

@php
    $dir = request('direction') === 'asc' ? 'desc' : 'asc';
    $urhhh = request('sort') == $sort;
@endphp

<a href="{{ route($route,[
    'sort'      => $sort,
    'direction' => $dir,
]) }}">
<span class="{{ $dir == 'asc'  && $urhhh ? 'text-primary' : 'text-dark' }}">↓</span>
<span class="{{ $dir == 'desc' && $urhhh ? 'text-primary' : 'text-dark' }}">↑</span>
</a>