@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Attendence </h3>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            @if ($message = session()->get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <form action="/print_attendence" id="form2" method="post">
                @csrf
                <input type="hidden" name="starts_at" value="{{$starts_at}}">
                <input type="hidden" name="ends_at" value="{{$ends_at}}">
            </form>
            <form class="" method="POST" action="/attendence/filter">
                @csrf
                <div class="row">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-lg" required id="starts_at" name="starts_at" placeholder="Start At" onfocus="(this.type='date')">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-lg" required id="ends_at" placeholder="End At" name="ends_at" onfocus="(this.type='date')">
                        </div>
                        <div class="col-sm-1 col-form-label">
                            <button type="submit" class="btn btn-sm btn-gradient-primary ">Search</button>
                        </div>
                        <div class="col-sm-1 ml-2 col-form-label">
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
                            @foreach ($attendence as $data)
                            <tr>
                                <td>{{ $data->nama_grup }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->check_in }}</td>
                                <td><img src="{{ asset('storage/' . $data->picture_in) }}" style="width:100px ; height:100px" alt=""></td>
                                <td>{{ $data->check_out }}</td>
                                <td><img src="{{ asset('storage/' . $data->picture_out) }}" style="width:100px ; height:100px" alt=""></td>
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

    <script src="{{ asset('/js/myjs.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#attendence').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    @endpush