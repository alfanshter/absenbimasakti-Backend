@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Overtime Work </h3>
    <div>
      <a href="/overtime-work/create" class="btn btn-gradient-primary btn-icon-text btn-md">
        <i class="mdi mdi-plus-box btn-icon-prepend"></i> Add </a>
        <a href="/overtime-work/export-excel" class="btn btn-gradient-success btn-icon-text btn-md">
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
        <table class="table table-striped table-bordered" id="overtime-work">
          <thead>
            <tr>
              <th> Action </th>
              <th> Ref ID </th>
              <th> NIK </th>
              <th> Name </th>
              <th> Department </th>
              <th> Position </th>
              <th> Complete Tesk </th>
              <th> Overtime Date </th>
              <th> Starting At </th>
              <th> User Created </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($overtime as $data)
            <tr>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-gradient-success btn-outline-secondary btn-sm" href="/overtime-work/export/{{ $data->id }}">
                      <i class="mdi mdi-printer"></i>
                    </a>
                    <a class="btn btn-gradient-info btn-outline-secondary btn-sm" href="/edit/overtime-work/{{ $data->id }}">
                      <i class="mdi mdi-pencil-box"></i>
                    </a>
                    <form action="/delete/overtime-work/{{$data->id}}" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-gradient-danger btn-outline-secondary btn-sm" onclick="return confirm('Apakah anda menyetujui ?')" >
                      <i class="mdi mdi-delete"></i>
                      </button>
                    </form>
                  </div>
                </td>
                <td>{{ $data->ref_id }}</td>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->department }}</td>
                <td>{{ $data->position }}</td>
                <td>{{ $data->complete }}</td>
                <td>{{ $data->o_date }}</td>
                <td>{{ $data->o_start_date }}</td>
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
    $('#overtime-work').DataTable();
});
</script>
@endpush