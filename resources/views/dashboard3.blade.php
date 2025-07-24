@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Production Summary</h5>
            </div>
            <div class="card-body">
                <canvas id="productionChart" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Machine Status</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Machine</th>
                                <th>Status</th>
                                <th>Last Maintenance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Machine 1</td>
                                <td><span class="badge bg-success">Running</span></td>
                                <td>2023-07-15</td>
                            </tr>
                            <tr>
                                <td>Machine 2</td>
                                <td><span class="badge bg-warning">Maintenance</span></td>
                                <td>2023-07-20</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Production Chart
    const ctx = document.getElementById('productionChart').getContext('2d');
    const productionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Production Output',
                data: [1200, 1900, 1500, 2000, 1800, 2100],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
@endsection
