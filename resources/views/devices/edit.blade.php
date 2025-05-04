@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Device</h1>

    <form action="{{ route('devices.update', $device) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block">Device Name</label>
            <input type="text" name="name" value="{{ $device->name }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">IP Address</label>
            <input type="text" name="ip_address" value="{{ $device->ip_address }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Location</label>
            <input type="text" name="location" value="{{ $device->location }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block">SNMP Version</label>
            <input type="text" name="snmp_version" value="{{ $device->snmp_version }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block">Community</label>
            <input type="text" name="community" value="{{ $device->community }}" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
