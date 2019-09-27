@extends('layouts.appLearning')

@push('links')
{{-- <link rel="stylesheet" href="{{ asset('node_modules/camohub-jquery-sortable-lists-aafc780/jquery-sortable-lists.min.js')}}"> --}}
@endpush


@section('index')
Singha
    <ul id="items">
        @php

        @endphp
        @for ($i = 1; $i < 50; $i++)
    <li data-id="{{$i}}" >item {{$i}}</li>

        @endfor

    </ul>
@endsection

@push('js')
<script>
    var el = document.getElementById('items');
var sortable = Sortable.create(el,{
    onUpdate: function(/**Event*/evt) {
		evt.newIndex // most likely why this event is used is to get the dragging element's current index
		console.log(evt.newIndex);
        var order = sortable.toArray();
        console.log(order);
    }
});


</script>

@endpush
