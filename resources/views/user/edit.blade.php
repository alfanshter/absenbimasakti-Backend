@extends('template.main')

@section('container')
<div class="page-header">
    <h3 class="page-title"> Edit User </h3>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="/update/user" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail3">Name</label>
                    <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Username</label>
                    <input type="text" value="{{ $user->username }}" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="recipient-name">Select Group</label>
                    <select class="form-control form-control-lg" aria-label="Default select example" name="grup_id" id="grup_id">
                        @foreach ($grup as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $user->grup_id ? 'selected' : '' }}>{{ $data->nama_grup }}
                        </option>
                        @endforeach
                    </select>
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