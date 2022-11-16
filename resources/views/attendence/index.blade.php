@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Attendence </h3>
    <a href="/attendence/export-excel" class="btn btn-gradient-success btn-icon-text btn-md">
      <i class="mdi mdi-printer btn-icon-prepend"></i> Export </a>
</div>

<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @if ($message = session()->get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <form class="" method="GET" action="/attendence">
          @csrf
          <div class="row">
              <div class="form-group row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="form-control form-control-lg" aria-label="Default select example" required name="grup_id" id="grup_id">
                        <option>Pilih Grup</option>
                        @foreach ($grup as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_grup }}
                        </option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control form-control-lg" required id="starts_at" name="starts_at" placeholder="Start At" onfocus="(this.type='date')">
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control form-control-lg" required id="ends_at" placeholder="End At" name="ends_at" onfocus="(this.type='date')">
                </div>
                <div class="col-sm-3 col-form-label">
                  <button type="submit" class="btn btn-sm btn-gradient-primary ">Search</button>
                </div>
              </div>
          </div>
        </form>
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="attendence">
          <thead>
            <tr>
              <th> Group </th>
              <th> Date </th>
              <th> Check In </th>
              <th> Picture In </th>
              <th> Check Out </th>
              <th> Picture Out </th>
            </tr>
          </thead>
          <tbody>
            @if($attendence->count())
            @foreach ($attendence as $data)
            <tr>
                <td>{{ $data->nama_grup }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->check_in }}</td>
                <td><img src="{{ asset('storage/' . $data->picture_in) }}"
                  style="width:100px ; height:100px" alt=""></td>
                <td>{{ $data->check_out }}</td>
                <td><img src="{{ asset('storage/' . $data->picture_out) }}"
                  style="width:100px ; height:100px" alt=""></td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="6">Data Not Found</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-right mt-4">
        {!! $attendence->links() !!}
      </div>
    </div>
</div>
@endsection

@push('script')

{{-- <script src="{{ asset('/js/myjs.js') }}"></script> --}}
{{-- <script>
    $(document).ready(function () {
    $('#attendence').DataTable();
});
</script> --}}
@endpush