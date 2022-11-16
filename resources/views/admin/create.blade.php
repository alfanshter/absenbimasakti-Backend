@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Add Admin </h3>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="/admin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail3">Name</label>
                    <input type="text" class="form-control" required id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Username</label>
                    <input type="text" class="form-control" required id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Password</label>
                    <input type="password" class="form-control" required id="password" name="password">
                </div>
                <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-md">Save</button>
                <a href="/user" class="btn btn-gradient-danger btn-icon-text btn-md">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush