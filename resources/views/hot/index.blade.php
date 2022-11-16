@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Hot Work Premit </h3>
    <div>
      <a href="/hot-work-premit/create" class="btn btn-gradient-primary btn-icon-text btn-md">
        <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>
        <a href="/hot-work-premit/export-excel" class="btn btn-gradient-success btn-icon-text btn-md">
          <i class="mdi mdi-printer btn-icon-prepend"></i> Export </a>
    </div>
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
        <table class="table table-striped table-bordered" id="hot-work-premit">
          <thead>
            <tr>
              <th> Action </th>
              <th> Ref ID </th>
              <th> Job </th>
              <th> PTW No. </th>
              <th> Contractor </th>
              <th> Location </th>
              <th> User Created </th>
              <th> Created Date</th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($hot as $data)
            <tr>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-gradient-success btn-outline-secondary btn-sm" href="/hot-work-premit/export/{{ $data->id }}">
                      <i class="mdi mdi-printer"></i>
                    </a>
                    <a class="btn btn-gradient-info btn-outline-secondary btn-sm" href="/edit/hot-work-premit/{{ $data->id }}">
                      <i class="mdi mdi-pencil-box"></i>
                    </a>
                    <form action="/delete/hot-work-premit/{{$data->id}}" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-gradient-danger btn-outline-secondary btn-sm " onclick="return confirm('Apakah anda menyetujui ?')" >
                      <i class="mdi mdi-delete"></i>
                      </button>
                    </form>
                    </div>
                </td>
                <td>{{ $data->ref_id }}</td>
                <td>{{ $data->job }}</td>
                <td>{{ $data->attached_ptw_no }}</td>
                <td>{{ $data->contractor }}</td>
                <td>{{ $data->location }}</td>
                <td>{{ $data->user_created }}</td>
                <td>{{ $data->created_at }}</td>
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
    $('#hot-work-premit').DataTable();
});
</script>
@endpush