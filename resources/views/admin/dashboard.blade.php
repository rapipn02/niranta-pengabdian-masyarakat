@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Message -->
    <div class="welcome-card">
        <h2>Welcome, {{ auth()->user()->name ?? 'Admin' }}!</h2>
        <p>You are logged in as: {{ auth()->user()->email }}</p>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <!-- Website Views Stats -->
        <div class="stat-card">
            <div class="stat-icon views">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M1 12S5 4 12 4S23 12 23 12S19 20 12 20S1 12 1 12Z" stroke="currentColor" stroke-width="2"/>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Views</h3>
                <div class="stat-numbers">
                    <span class="total">{{ number_format($totalViews ?? 0) }}</span>
                    <span class="active">{{ number_format($todayViews ?? 0) }} today</span>
                </div>
            </div>
            <a href="{{ route('admin.statistics') }}" class="stat-link">View Details</a>
        </div>

        <!-- Products Stats -->
        <div class="stat-card">
            <div class="stat-icon products">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 7L12 3L4 7L12 11L20 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 12L12 16L20 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 17L12 21L20 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Products</h3>
                <div class="stat-numbers">
                    <span class="total">{{ $totalProducts ?? 0 }}</span>
                    <span class="active">products</span>
                </div>
            </div>
            <a href="{{ route('admin.products') }}" class="stat-link">Manage Products</a>
        </div>

        <!-- Recipes Stats -->
        <div class="stat-card">
            <div class="stat-icon recipes">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M19 7L5 7C3.89543 7 3 7.89543 3 9L3 18C3 19.1046 3.89543 20 5 20L19 20C20.1046 20 21 19.1046 21 18L21 9C21 7.89543 20.1046 7 19 7Z" stroke="currentColor" stroke-width="2"/>
                    <path d="M8 7V4C8 3.44772 8.44772 3 9 3L15 3C15.5523 3 16 3.44772 16 4V7" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Recipes</h3>
                <div class="stat-numbers">
                    <span class="total">{{ $totalRecipes ?? 0 }}</span>
                    <span class="active">recipes</span>
                </div>
            </div>
            <a href="{{ route('admin.recipes') }}" class="stat-link">Manage Recipes</a>
        </div>

        <!-- Blogs Stats -->
        <div class="stat-card">
            <div class="stat-icon blogs">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.89 22 5.99 22H18C19.1 22 20 21.1 20 20V8L14 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 2V8H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 13H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 17H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 9H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Blogs</h3>
                <div class="stat-numbers">
                    <span class="total">{{ $totalBlogs ?? 0 }}</span>
                    <span class="active">blogs</span>
                </div>
            </div>
            <a href="{{ route('admin.blogs') }}" class="stat-link">Manage Blogs</a>
        </div>
    </div>

    <!-- Weekly Views Chart -->
    @if(isset($dailyViews) && $dailyViews->count() > 0)
    <div class="chart-section">
        <h3>Views This Week</h3>
        <div class="chart-container">
            <canvas id="viewsChart" width="400" height="200"></canvas>
        </div>
    </div>
    @endif

    <!-- Popular Pages -->
    @if(isset($popularPages) && $popularPages->count() > 0)
    <div class="popular-pages">
        <h3>Popular Pages</h3>
        <div class="pages-list">
            @foreach($popularPages as $page)
            <div class="page-item">
                <div class="page-info">
                    <span class="page-title">{{ $page->page_title ?: 'Unknown Page' }}</span>
                    <span class="page-url">{{ $page->page_url }}</span>
                </div>
                <div class="page-views">
                    <span class="views-count">{{ number_format($page->views_count) }}</span>
                    <span class="views-label">views</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h3>Quick Actions</h3>
        <div class="actions-grid">
            <a href="{{ route('admin.products.create') }}" class="action-btn products">
                <span>+</span>
                Add Product
            </a>
            <a href="{{ route('admin.recipes.create') }}" class="action-btn recipes">
                <span>+</span>
                Add Recipe
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="action-btn blogs">
                <span>+</span>
                Add Blog
            </a>
        </div>
    </div>
</div>

<style>
.dashboard-container {
    padding: 20px;
}

.welcome-card {
    background: linear-gradient(135deg, #482500 0%, #8B4513 100%);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(72, 37, 0, 0.3);
}

.welcome-card h2 {
    margin: 0 0 10px 0;
    font-size: 28px;
    font-weight: 600;
}

.welcome-card p {
    margin: 0;
    opacity: 0.9;
    font-size: 16px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.stat-icon.views { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.stat-icon.products { background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); }
.stat-icon.recipes { background: linear-gradient(135deg, #F7971E 0%, #FFD200 100%); }
.stat-icon.blogs { background: linear-gradient(135deg, #FF6B6B 0%, #FF8E53 100%); }

.stat-content h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.stat-numbers {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.stat-numbers .total {
    font-size: 32px;
    font-weight: 700;
    color: #482500;
}

.stat-numbers .active {
    font-size: 14px;
    color: #666;
}

.stat-link {
    color: #482500;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    transition: color 0.3s ease;
}

.stat-link:hover {
    color: #8B4513;
}

.quick-actions h3 {
    margin: 0 0 20px 0;
    font-size: 22px;
    font-weight: 600;
    color: #333;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 15px 20px;
    border-radius: 10px;
    text-decoration: none;
    color: white;
    font-weight: 500;
    transition: all 0.3s ease;
}

.action-btn.products { background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); }
.action-btn.recipes { background: linear-gradient(135deg, #F7971E 0%, #FFD200 100%); }
.action-btn.blogs { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.action-btn span {
    font-size: 20px;
    font-weight: 700;
}

/* Chart Section */
.chart-section {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.chart-section h3 {
    margin: 0 0 20px 0;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}

.chart-container {
    position: relative;
    height: 300px;
    width: 100%;
}

/* Popular Pages */
.popular-pages {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.popular-pages h3 {
    margin: 0 0 20px 0;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}

.pages-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.page-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.page-item:hover {
    background: #e9ecef;
}

.page-info {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.page-title {
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

.page-url {
    font-size: 12px;
    color: #666;
    word-break: break-all;
}

.page-views {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 2px;
}

.views-count {
    font-size: 18px;
    font-weight: 700;
    color: #482500;
}

.views-label {
    font-size: 12px;
    color: #666;
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .actions-grid {
        grid-template-columns: 1fr;
    }
    
    .page-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .page-views {
        align-items: flex-start;
    }
}
</style>

@if(isset($dailyViews) && $dailyViews->count() > 0)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('viewsChart');
    if (ctx) {
        const chartData = @json($dailyViews);
        
        const labels = chartData.map(item => {
            const date = new Date(item.date);
            return date.toLocaleDateString('id-ID', { 
                month: 'short', 
                day: 'numeric' 
            });
        });
        
        const data = chartData.map(item => item.views);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Views',
                    data: data,
                    borderColor: '#482500',
                    backgroundColor: 'rgba(72, 37, 0, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#482500',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6
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
});
</script>
@endif
@endsection
