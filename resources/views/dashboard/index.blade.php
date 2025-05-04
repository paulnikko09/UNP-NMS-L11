@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Online Devices</h2>
            <p class="text-4xl">{{ $onlineDevicesCount }}</p>
        </div>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Offline Devices</h2>
            <p class="text-4xl">{{ $offlineDevices }}</p>
        </div>
    </div>

    {{-- Polling Trends Chart --}}
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Recent Polling Trends</h2>
        <div id="polling-chart" style="height: 350px;"></div>
    </div>

    {{-- Online Devices List --}}
    <div class="mt-6 bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Online Devices ({{ $onlineDevicesCount }})</h2>

        <table class="w-full text-sm text-left border">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">IP Address</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($onlineDevices as $device)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $device->id }}</td>
                        <td class="px-4 py-2">{{ $device->name }}</td>
                        <td class="px-4 py-2">{{ $device->ip_address }}</td>
                        <td class="px-4 py-2 text-green-600 font-semibold">Online</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">No online devices.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = echarts.init(document.getElementById('polling-chart'));
        chart.setOption({
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: @json($pollingTrends->pluck('date')),
                boundaryGap: false
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Polls',
                data: @json($pollingTrends->pluck('total')),
                type: 'line',
                areaStyle: {},
                smooth: true
            }]
        });
    });
</script>
@endpush
