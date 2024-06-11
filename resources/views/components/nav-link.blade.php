@props(['type' => 'a'])

@switch($type)
@case('a')
@php
$attributes['href'] = $attributes->get('href') ?? '#';
$active = url()->current() === $attributes->get('href');
@endphp
<a {{ $attributes->class([
    '',
    'active' => $active
    ]) }}
    aria-current="{{ $active ? 'page' : 'false' }}">
    {{$slot}}
</a>
@break
@case('button')
<button {{ $attributes }}>
    {{$slot}}
</button>
@break
@endswitch