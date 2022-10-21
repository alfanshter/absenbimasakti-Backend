@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Attendence </h3>
    <a href="/attendence/create" class="btn btn-gradient-primary btn-icon-text btn-md">
      <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>
</div>

<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @if ($message = session()->get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="attendence">
          <thead>
            <tr>
              <th> Username </th>
              <th> Date </th>
              <th> Check In </th>
              <th> Picture In </th>
              <th> Check Out </th>
              <th> Picture Out </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($attendence as $data)
            <tr>
                <td>{{ $data->username }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->check_in }}</td>
                <td><img src="{{ asset('storage/' . $data->picture_in) }}"
                  style="width:100px ; height:100px" alt=""></td>
                <td>{{ $data->check_out }}</td>
                <td><img src="{{ asset('storage/' . $data->picture_out) }}"
                  style="width:100px ; height:100px" alt=""></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- <div class="d-flex justify-content-right mt-4">
        {!! $attendence->links() !!}
      </div> --}}
    </div>
</div>
@endsection

@push('script')
{{-- <script src="{{ asset('/js/myjs.js') }}"></script> --}}
<script>
    $(document).ready(function () {
    $('#attendence').DataTable();
});
</script>
@endpush