@props(['disabled' => false])

<!-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50']) !!}> -->

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full mb-2 rounded-lg bg-gray-200']) !!}>
