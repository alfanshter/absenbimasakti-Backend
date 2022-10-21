@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Job Safety Analysis </h3>
    <a href="/job-safety-analysis/create" class="btn btn-gradient-primary btn-icon-text btn-md">
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
        <table class="table table-striped table-bordered" id="job">
          <thead>
            <tr>
              <th> Action </th>
              <th> Ref ID </th>
              <th> Job Title </th>
              <th> Team Work </th>
              <th> Work Location </th>
              <th> User Created </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($job as $data)
            <tr>
                <td>
                  <div class="btn-group">
                  <form action="/delete/job-safety-analysis/{{$data->id}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')" >
                    <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
                  <a class="btn btn-gradient-info btn-outline-secondary btn-sm" href="/edit/job-safety-analysis/{{ $data->id }}">
                    <i class="mdi mdi-pencil-box"></i>
                  </a>
                  </div>
                </td>
                <td>{{ $data->ref_id }}</td>
                <td>{{ $data->job_title }}</td>
                <td>{{ $data->team_work }}</td>
                <td>{{ $data->work_location }}</td>
                <td>{{ $data->user_created }}</td>
                <td>{{ $data->status }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@push('script')
{{-- <script src="{{ asset('/js/myjs.js') }}"></script> --}}
<script>
    $(document).ready(function () {
    $('#job').DataTable();
});
</script>
@endpush