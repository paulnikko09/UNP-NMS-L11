<!-- Reports View -->
@extends('layouts.app')

@section('content')
<h1>Reports</h1>
<ul>
    @foreach ($reports as $report)
        <li>{{ $report->title }} - {{ $report->generated_at }}</li>
    @endforeach
</ul>
@endsection
