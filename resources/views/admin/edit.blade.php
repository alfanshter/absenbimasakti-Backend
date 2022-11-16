@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Edit Admin </h3>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="/update/admin" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $admin->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail3">Name</label>
                    <input type="text" value="{{ $admin->name }}" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Username</label>
                    <input type="text" value="{{ $admin->username }}" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="email" value="{{ $admin->email }}" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
                <a href="/admin" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush