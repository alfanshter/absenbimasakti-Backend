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


      <form action="{{url('job-safety-analysis/export_all')}}" id="form2" method="get">
        @csrf
      </form>

      <form action="{{url('job-safety-analysis/export_excel')}}" id="form3" method="get">
        @csrf
      </form>

      <div class="row">
        <div class="form-group row">
          <div class="col-sm-2  col-form-label">
            <div class="dropdown">
              <button class="btn btn-sm btn-gradient-primary  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                Export
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><button type="submit" class="dropdown-item active" form="form2">Pdf</button></li>
                <li><button type="submit" class="dropdown-item" form="form3">Excel</button></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
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
                  <a class="btn btn-gradient-success btn-outline-secondary btn-sm" href="/job-safety-analysis/export/{{ $data->id }}">
                    <i class="mdi mdi-printer"></i>
                  </a>
                  <a class="btn btn-gradient-info btn-outline-secondary btn-sm" href="/edit/job-safety-analysis/{{ $data->id }}">
                    <i class="mdi mdi-pencil-box"></i>
                  </a>
                  <form action="/delete/job-safety-analysis/{{$data->id}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
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
    $(document).ready(function() {
      $('#job').DataTable();
    });
  </script>
  @endpush