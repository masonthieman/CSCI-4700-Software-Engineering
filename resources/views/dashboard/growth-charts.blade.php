@extends("base.master")
@section("body")
  <div class="container bg-white">
    <div class="row">
      <div class="col-12">
        <h1 class="page-heading text-center">Dashboard</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h4 class="text-center">Last 30 days</h4>
        <div class="chart-container" style="position: relative; width:100%;">
          <canvas id="dashboard-chart-daily"></canvas>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-12 form-group">
        <h4 class="text-center">Last 6 months</h4>
        <div class="chart-container" style="position: relative; width:100%;">
          <canvas id="dashboard-chart-monthly"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection
@push("scripts")
 <script>
    $(document).ready(function() {
      dashboard.init({!! json_encode($data) !!});
    });
  </script>
@endpush
