<!-- Alerts View -->
@extends('layouts.app')

@section('content')
<h1>Alerts</h1>
<ul>
    @foreach ($alerts as $alert)
        <li>{{ $alert->message }} - {{ $alert->severity }} - {{ $alert->triggered_at }}</li>
    @endforeach
</ul>
@endsection
