@extends('admin.layouts.app')

@section('title', 'Statistics')
@section('page-title', 'Website Statistics')

@section('content')
<div class="statistics-container">
    
    <!-- Summary Cards -->
    <div class="stats-summary">
        <div class="summary-card">
            <div class="summary-icon total">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <path d="M1 12S5 4 12 4S23 12 23 12S19 20 12 20S1 12 1 12Z" stroke="currentColor" stroke-width="2"/>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="summary-content">
                <h3>Total Views</h3>
                <div class="summary-number">{{ number_format($totalViews ?? 0) }}</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon today">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                    <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2"/>
                    <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2"/>
                    <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="summary-content">
                <h3>Today</h3>
                <div class="summary-number">{{ number_format($todayViews ?? 0) }}</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon week">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <path d="M21 10H3M21 6H3M21 14H3M21 18H3" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="summary-content">
                <h3>This Week</h3>
                <div class="summary-number">{{ number_format($weekViews ?? 0) }}</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon month">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                    <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2"/>
                    <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2"/>
                    <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="summary-content">
                <h3>This Month</h3>
                <div class="summary-number">{{ number_format($monthViews ?? 0) }}</div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-section">
        <!-- Daily Views Chart -->
        @if(isset($dailyViews) && $dailyViews->count() > 0)
        <div class="chart-card">
            <h3>Daily Views (Last 30 Days)</h3>
            <div class="chart-container">
                <canvas id="dailyChart" width="400" height="200"></canvas>
            </div>
        </div>
        @endif

        <!-- Monthly Views Chart -->
        @if(isset($monthlyViews) && $monthlyViews->count() > 0)
        <div class="chart-card">
            <h3>Monthly Views ({{ date('Y') }})</h3>
            <div class="chart-container">
                <canvas id="monthlyChart" width="400" height="200"></canvas>
            </div>
        </div>
        @endif
    </div>

    <!-- Popular Pages -->
    @if(isset($popularPages) && $popularPages->count() > 0)
    <div class="popular-pages-detailed">
        <h3>Most Popular Pages</h3>
        <div class="pages-table">
            <table class="data-table">
                <thead class="table-header">
                    <tr>
                        <th>Rank</th>
                        <th>Page Title</th>
                        <th>URL</th>
                        <th>Views</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($popularPages as $index => $page)
                    <tr>
                        <td class="rank-cell">
                            <span class="rank-badge rank-{{ $index + 1 <= 3 ? $index + 1 : 'other' }}">
                                {{ $index + 1 }}
                            </span>
                        </td>
                        <td class="page-title-cell">{{ $page->page_title ?: 'Unknown Page' }}</td>
                        <td class="page-url-cell">
                            <a href="{{ $page->page_url }}" target="_blank" class="url-link">
                                {{ Str::limit($page->page_url, 50) }}
                            </a>
                        </td>
                        <td class="views-cell">{{ number_format($page->views_count) }}</td>
                        <td class="percentage-cell">
                            {{ $totalViews > 0 ? number_format(($page->views_count / $totalViews) * 100, 1) : 0 }}%
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>

<style>
.statistics-container {
    padding: 20px;
}

/* Summary Cards */
.stats-summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.summary-card {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.summary-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.summary-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.summary-icon.total { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.summary-icon.today { background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); }
.summary-icon.week { background: linear-gradient(135deg, #F7971E 0%, #FFD200 100%); }
.summary-icon.month { background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); }

.summary-content h3 {
    margin: 0 0 8px 0;
    font-size: 16px;
    color: #666;
    font-weight: 500;
}

.summary-number {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin: 0;
}

/* Charts Section */
.charts-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 40px;
}

.chart-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.chart-card h3 {
    margin: 0 0 25px 0;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}

.chart-container {
    position: relative;
    height: 300px;
    width: 100%;
}

/* Popular Pages Detailed */
.popular-pages-detailed {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.popular-pages-detailed h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    font-weight: 600;
    color: #333;
}

.pages-table {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.table-header th {
    padding: 15px;
    text-align: left;
    font-size: 14px;
    font-weight: 600;
    color: #666;
    border-bottom: 2px solid #f1f1f1;
    background: #f8f9fa;
}

.data-table tbody tr {
    border-bottom: 1px solid #f1f1f1;
    transition: background-color 0.3s ease;
}

.data-table tbody tr:hover {
    background-color: #f8f9fa;
}

.data-table td {
    padding: 15px;
    font-size: 14px;
}

.rank-cell {
    text-align: center;
}

.rank-badge {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    font-weight: 600;
    color: white;
    font-size: 12px;
}

.rank-badge.rank-1 { background: #FFD700; }
.rank-badge.rank-2 { background: #C0C0C0; }
.rank-badge.rank-3 { background: #CD7F32; }
.rank-badge.rank-other { background: #666; }

.page-title-cell {
    font-weight: 600;
    color: #333;
}

.page-url-cell {
    color: #666;
    font-size: 13px;
}

.url-link {
    color: #482500;
    text-decoration: none;
}

.url-link:hover {
    text-decoration: underline;
}

.views-cell {
    font-weight: 600;
    color: #482500;
}

.percentage-cell {
    color: #666;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .charts-section {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .stats-summary {
        grid-template-columns: 1fr;
    }
    
    .summary-card {
        padding: 20px;
    }
    
    .summary-number {
        font-size: 28px;
    }
    
    .chart-card {
        padding: 20px;
    }
    
    .popular-pages-detailed {
        padding: 20px;
    }
}
</style>

@if(isset($dailyViews) && $dailyViews->count() > 0)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Daily Views Chart
    const dailyCtx = document.getElementById('dailyChart');
    if (dailyCtx) {
        const dailyData = @json($dailyViews);
        
        const dailyLabels = dailyData.map(item => {
            const date = new Date(item.date);
            return date.toLocaleDateString('id-ID', { 
                month: 'short', 
                day: 'numeric' 
            });
        });
        
        const dailyValues = dailyData.map(item => item.views);
        
        new Chart(dailyCtx, {
            type: 'line',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Daily Views',
                    data: dailyValues,
                    borderColor: '#482500',
                    backgroundColor: 'rgba(72, 37, 0, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#482500',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: '#666'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: '#666'
                        }
                    }
                }
            }
        });
    }
    
    // Monthly Views Chart
    @if(isset($monthlyViews) && $monthlyViews->count() > 0)
    const monthlyCtx = document.getElementById('monthlyChart');
    if (monthlyCtx) {
        const monthlyData = @json($monthlyViews);
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        const monthlyLabels = monthNames;
        const monthlyValues = new Array(12).fill(0);
        
        monthlyData.forEach(item => {
            monthlyValues[item.month - 1] = item.views;
        });
        
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Monthly Views',
                    data: monthlyValues,
                    backgroundColor: 'rgba(72, 37, 0, 0.8)',
                    borderColor: '#482500',
                    borderWidth: 1,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: '#666'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#666'
                        }
                    }
                }
            }
        });
    }
    @endif
});
</script>
@endif
@endsection
