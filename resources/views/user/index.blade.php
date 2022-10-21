@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> User </h3>
    <a href="/user/create" class="btn btn-gradient-primary btn-icon-text btn-md">
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
        <table class="table table-striped table-bordered" id="user">
          <thead>
            <tr>
              <th> Action </th>
              <th> Name </th>
              <th> Username </th>
              <th> Email </th>
              <th> Group Name </th>
              <th> Role </th>
              <th> Status </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $data)
            <tr>
                <td>
                  <a class="btn btn-gradient-info btn-rounded btn-sm" href="/edit/user/{{ $data->id }}">
                    <i class="mdi mdi-pencil-box"></i>
                </a>
                <form action="/delete/user/{{$data->id}}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-gradient-danger btn-rounded btn-sm" onclick="return confirm('Apakah anda menyetujui ?')" >
                  <i class="mdi mdi-delete"></i>
                  </button>
                </form>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->nama_grup }}</td>
                <td>{{ $data->role }}</td>
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
    $('#user').DataTable();
});
</script>
@endpush