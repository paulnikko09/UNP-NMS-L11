<!-- Devices List View -->
@extends('layouts.app')

@section('content')
<h1>Devices</h1>
<table>
    <thead>
        <tr>
            <th>IP</th><th>Hostname</th><th>Status</th><th>Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($devices as $device)
        <tr>
            <td>{{ $device->ip_address }}</td>
            <td>{{ $device->hostname }}</td>
            <td>{{ $device->status }}</td>
            <td>{{ $device->type }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
