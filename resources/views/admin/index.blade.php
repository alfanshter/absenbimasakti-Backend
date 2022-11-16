@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Admin </h3>
    <a href="/admin/create" class="btn btn-gradient-primary btn-icon-text btn-md">
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
        <table class="table table-striped table-bordered" id="admin">
          <thead>
            <tr>
              <th> Action </th>
              <th> Name </th>
              <th> Username </th>
              <th> Email </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($admin as $data)
            <tr>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-gradient-info btn-outline-secondary btn-sm" href="/edit/admin/{{ $data->id }}">
                      <i class="mdi mdi-pencil-box"></i>
                  </a>
                  <form action="/delete/admin/{{$data->id}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-gradient-danger btn-outline-secondary btn-sm" onclick="return confirm('Apakah anda menyetujui ?')" >
                    <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
                  </div>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
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
    $('#admin').DataTable();
});
</script>
@endpush