<!-- Settings View -->
@extends('layouts.app')

@section('content')
<h1>Settings</h1>
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @foreach ($settings as $setting)
        <label>{{ $setting->key }}</label>
        <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}">
    @endforeach
    <button type="submit">Save</button>
</form>
@endsection
