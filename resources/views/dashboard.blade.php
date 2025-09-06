





@extends('layouts.app')

@section('content')
<div class="row">
  <div class="card border-0 rounded-4 mb-4 dashboard-card stat-card">
    <div class="card-body p-4">
      <div class="d-flex align-items-center">
        <div class="icon-circle me-4">
          <i class="bi bi-grid-fill"></i>
        </div>
        <div>
          <h4 class="fw-bold mb-1 stat-title">Welcome to Dashboard</h4>
          <p class="text-muted mb-0">Overview of your workforce and task management</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-4">

  <div class="col-md-6 col-lg-3">
    <div class="card border-0 rounded-4 h-100 dashboard-card stat-card">
      <div class="card-body p-4 d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="stat-label text-uppercase fw-bold" style="color: #ff8f00;">Employees</div>
          <div class="icon-circle">
            <i class="bi bi-people-fill"></i>
          </div>
        </div>
        <div class="mt-auto">
          <h2 class="stat-value mb-1">{{ number_format($employeeCount ?? 0) }}</h2>
          <div class="stat-trend orange pill">
            <i class="bi bi-graph-up-arrow"></i>
            Total workforce
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="card border-0 rounded-4 h-100 dashboard-card stat-card">
      <div class="card-body p-4 d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="stat-label text-uppercase fw-bold" style="color: #1a73e8;">Tasks</div>
          <div class="icon-circle accent-blue">
            <i class="bi bi-clipboard-data-fill"></i>
          </div>
        </div>
        <div class="mt-auto">
          <h2 class="stat-value mb-1">{{ number_format($taskCount ?? 0) }}</h2>
          <div class="stat-trend blue pill">
            <i class="bi bi-list-check"></i>
            Total Tasks
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="card border-0 rounded-4 h-100 dashboard-card stat-card">
      <div class="card-body p-4 d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="stat-label text-uppercase fw-bold" style="color: #34a853;">Completed</div>
          <div class="icon-circle accent-green">
            <i class="bi bi-check-circle-fill"></i>
          </div>
        </div>
        <div class="mt-auto">
          <h2 class="stat-value mb-1">{{ number_format($completedTaskCount ?? 0) }}</h2>
          <div class="stat-trend positive pill">
            <i class="bi bi-check-all"></i>
            Finished tasks
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="card border-0 rounded-4 h-100 dashboard-card stat-card">
      <div class="card-body p-4 d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="stat-label text-uppercase fw-bold" style="color: #fbbc04;">Pending</div>
          <div class="icon-circle accent-warning">
            <i class="bi bi-hourglass-split"></i>
          </div>
        </div>
        <div class="mt-auto">
          <h2 class="stat-value mb-1">{{ number_format($pendingTaskCount ?? 0) }}</h2>
          <div class="stat-trend warning pill">
            <i class="bi bi-clock-history"></i>
            In progress
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<style>
.stat-title {
    color: #2c2c2c;
    font-size: 1.5rem;
}
.dashboard-card {
    transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
    border: 1px solid rgba(0,0,0,0.05);
    position: relative;
    overflow: hidden;
}
.dashboard-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: #ff8f00;
    opacity: 0;
    transition: opacity .3s ease;
}
.dashboard-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    border-color: rgba(0,0,0,0);
}
.dashboard-card:hover::before {
    opacity: 1;
}
.icon-circle {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ff8f00;
    color: white;
    position: relative;
    box-shadow: 0 4px 15px rgba(255, 143, 0, 0.2);
    transition: all .3s ease;
}
.icon-circle::after {
    content: '';
    position: absolute;
    inset: -1px;
    border-radius: inherit;
    background: linear-gradient(145deg, rgba(255,255,255,0.2), rgba(255,255,255,0));
    z-index: 0;
}
.icon-circle i {
    font-size: 1.4rem;
    position: relative;
    z-index: 1;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
}
.icon-circle.accent-blue {
    background: linear-gradient(145deg, #1a73e8, #1557b0);
    box-shadow: 0 4px 15px rgba(26, 115, 232, 0.2);
}
.icon-circle.accent-green {
    background: linear-gradient(145deg, #34a853, #2d8745);
    box-shadow: 0 4px 15px rgba(52, 168, 83, 0.2);
}
.icon-circle.accent-warning {
    background: linear-gradient(145deg, #fbbc04, #e6a102);
    box-shadow: 0 4px 15px rgba(251, 188, 4, 0.2);
}
.stat-value {
    font-size: 32px;
    font-weight: 800;
    background: linear-gradient(145deg, #2c2c2c, #1a1a1a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1;
    margin-bottom: 0.5rem;
}
.stat-label {
    font-size: 0.85rem;
    color: #666;
    letter-spacing: 0.7px;
    position: relative;
    padding-bottom: 4px;
}
.stat-label::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 24px;
    height: 2px;
    background: currentColor;
    opacity: 0.3;
}
.stat-trend {
    font-size: 0.875rem;
    color: #666;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
    font-weight: 500;
}
.stat-trend.pill {
    background: rgba(0, 0, 0, 0.04);
    padding: 8px 16px;
    border-radius: 20px;
    transition: all 0.3s ease;
}
.stat-trend.pill:hover {
    background: rgba(0, 0, 0, 0.08);
    transform: translateX(4px);
}
.stat-trend.positive {
    color: #34a853;
}
.stat-trend.positive.pill {
    background: rgba(52, 168, 83, 0.1);
}
.stat-trend.positive.pill:hover {
    background: rgba(52, 168, 83, 0.15);
}
.stat-trend.warning {
    color: #fbbc04;
}
.stat-trend.warning.pill {
    background: rgba(251, 188, 4, 0.1);
}
.stat-trend.warning.pill:hover {
    background: rgba(251, 188, 4, 0.15);
}
.stat-trend.orange {
    color: #ff8f00;
}
.stat-trend.orange.pill {
    background: rgba(255, 143, 0, 0.1);
}
.stat-trend.orange.pill:hover {
    background: rgba(255, 143, 0, 0.15);
}
.stat-trend.blue {
    color: #1a73e8;
}
.stat-trend.blue.pill {
    background: rgba(26, 115, 232, 0.1);
}
.stat-trend.blue.pill:hover {
    background: rgba(26, 115, 232, 0.15);
}
.text-orange {
    color: #ff8f00;
}
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
.dashboard-card:hover .icon-circle {
    transform: scale(1.1);
    animation: pulse 2s infinite;
}
</style>
@endsection














