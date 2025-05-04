@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $device->name }}</h1>
    <p><strong>IP:</strong> {{ $device->ip_address }}</p>
    <p><strong>Status:</strong>
        @if ($device->status === 'online')
            <span class="text-green-600 font-semibold">● Online</span>
        @elseif ($device->status === 'offline')
            <span class="text-red-600 font-semibold">● Offline</span>
        @else
            <span class="text-gray-500">Unknown</span>
        @endif
    </p>
<td>
    <a href="{{ route('devices.show', $device) }}" class="text-blue-600 hover:underline">View</a>
</td>

    <div class="mt-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Recent Poll History</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b font-semibold">
                    <th class="text-left py-2">Status</th>
                    <th class="text-left py-2">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pollLogs as $log)
                <tr class="border-b">
                    <td class="py-1">
                        @if ($log->status === 'online')
                            <span class="text-green-600 font-semibold">Online</span>
                        @else
                            <span class="text-red-600 font-semibold">Offline</span>
                        @endif
                    </td>
                    <td class="py-1">{{ \Carbon\Carbon::parse($log->created_at)->toDayDateTimeString() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
