@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-2">Welcome, {{ auth()->user()->name }}!</h1>
    <p class="text-muted">Here’s an overview of your store performance.</p>

    <!-- Stat Cards -->
    <div class="row g-4 mt-3">
        <!-- Total Users -->
        <div class="col-md-3">
            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                <div class="card text-white bg-primary shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="fs-2">{{ $totalUsers ?? 0 }}</p>
                    </div>
                </div>
            </a>
        </div>


<!-- Total Products -->
<div class="col-md-3">
    <a href="{{ route('admin.products') }}" class="text-decoration-none">
        <div class="card text-white bg-info shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <p class="fs-2">{{ $totalProducts ?? 0 }}</p>
            </div>
        </div>
    </a>
</div>


        <!-- Total Orders -->
        <div class="col-md-3">
            <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
                <div class="card text-white bg-warning shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="fs-2">{{ $totalOrders ?? 0 }}</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Revenue -->
        <div class="col-md-3">
            <div class="card text-white bg-danger shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Revenue</h5>
                    <p class="fs-2">${{ number_format($totalRevenue ?? 0, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="mt-5">
        <h3 class="mb-3">Sales Overview</h3>
        <div class="card p-3 shadow-sm">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <!-- Recent Orders Table -->
<!-- Recent Orders Table -->
<div class="mt-5">
    <h3 class="mb-3">Recent Orders</h3>
    <div class="table-responsive">
        <table class="table table-striped align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Items</th> <!-- New column for items -->
                </tr>
            </thead>
            <tbody>
              @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($order->status) }}</span></td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($order->items as $item)
                                <li>{{ $item->product->title ?? 'Product not found' }} — Qty: {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>


                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($salesLabels ?? []) !!},
            datasets: [{
                label: 'Sales',
                data: {!! json_encode($salesData ?? []) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
