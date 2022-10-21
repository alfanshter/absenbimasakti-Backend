@extends('template.main')

@section('container')
<form action="/overtime-work" method="POST">
    @csrf
<div class="page-header">
    <h3 class="page-title"> Overtime Work </h3>
    <div>
        <a href="/overtime-work" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
        <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ref ID</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="ref_id" id="ref_id"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="nik" id="nik"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="name" id="name"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="department" id="department"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="position" id="position"required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Complete Task</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="complete" id="complete"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Overtime Date</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="o_date" id="o_date"required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Overtime Start At</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="o_start_date" id="o_start_date" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">To</span>
                                </div>
                                <input type="date" class="form-control" name="o_start_date_to" id="o_start_date_to" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Overtime Reason</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="o_reason" id="o_reason" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>




@endsection

@push('script')

@endpush