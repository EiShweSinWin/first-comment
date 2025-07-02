@extends('layouts.app')

@section('content')

<!-- Stat Cards -->
<div class="grid grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <p class="text-sm text-gray-500">Income</p>
        <p class="text-2xl font-bold text-green-900">1780K</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <p class="text-sm text-gray-500">Order Count</p>
        <p class="text-2xl font-bold text-green-900">200</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <p class="text-sm text-gray-500">Profit</p>
        <p class="text-2xl font-bold text-green-900">1900K</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <p class="text-sm text-gray-500">Sign Up</p>
        <p class="text-2xl font-bold text-green-900">500</p>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-2 gap-4 mt-6">
    <!-- Order Count Line Chart -->
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold text-green-900 mb-2">Order Count</h2>
		<canvas id="orderChart" height="150"></canvas>
    </div>

    <!-- Devices Pie Chart -->
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold text-green-900 mb-2">Devices</h2>
		<canvas id="deviceChart" height="100px" width="10px"></canvas>
        <div class="flex justify-around mt-4 text-sm text-green-900">
            <span>Desktop</span>
            <span>Tablet</span>
            <span>Mobile</span>
        </div>
    </div>
</div>

<!-- Income & Expenses and Browser Visits -->
<div class="grid grid-cols-2 gap-4 mt-6">
    <!-- Income & Expenses Bar Chart -->
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold text-green-900 mb-2">Income & Expenses</h2>
		<canvas id="incomeExpenseChart" height="150" ></canvas>
    </div>

    <!-- Browser Visits Table -->
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-bold text-green-900 mb-2">Browser Visits</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-600 text-sm">
                        <th class="py-2">Browser</th>
                        <th class="py-2">Visits</th>
                        <th class="py-2">%</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="py-2">Chrome</td>
                        <td class="py-2">2,345</td>
                        <td class="py-2">80%</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2">Firefox</td>
                        <td class="py-2">2,345</td>
                        <td class="py-2">80%</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2">Safari</td>
                        <td class="py-2">2,345</td>
                        <td class="py-2">80%</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2">Edge</td>
                        <td class="py-2">2,345</td>
                        <td class="py-2">80%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const orderChartCtx = document.getElementById('orderChart').getContext('2d');
    new Chart(orderChartCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Orders',
                data: [500, 700, 600, 800, 900, 1200, 700],
                borderColor: '#3B82F6',
                fill: false,
                tension: 0.4
            }]
        },
        options: {
            responsive: true
        }
    });

    const deviceChartCtx = document.getElementById('deviceChart').getContext('2d');
    new Chart(deviceChartCtx, {
        type: 'pie',
        data: {
            labels: ['Desktop', 'Tablet', 'Mobile'],
            datasets: [{
                data: [500, 500, 800],
                backgroundColor: ['#4F46E5', '#34D399', '#F472B6']
            }]
        },
        options: {
            responsive: true
        }
    });

    const incomeExpenseChartCtx = document.getElementById('incomeExpenseChart').getContext('2d');
    new Chart(incomeExpenseChartCtx, {
        type: 'bar',
        data: {
            labels: [1,2,3,4,5,6,7,8,9],
            datasets: [
                {
                    label: 'Income',
                    data: [200000, 250000, 180000, 190000, 220000, 170000, 200000, 190000, 240000],
                    backgroundColor: '#3B82F6'
                },
                {
                    label: 'Expenses',
                    data: [120000, 150000, 100000, 110000, 130000, 90000, 120000, 110000, 140000],
                    backgroundColor: '#60A5FA'
                }
            ]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection
