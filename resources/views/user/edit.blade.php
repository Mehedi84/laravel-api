@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">{{ __('User Data Update') }}</div>

                <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ url('users/') }}">
                @csrf
                    <div class="col-lg-12">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $results->name }}">
                        <input type="hidden" class="form-control" name="id" value="{{ $results->id }}">
                    </div>
                    <div class="col-lg-12">
                        <label for="name">Phone</label>
                        <input type="number" class="form-control" value="{{ $results->number }}" name="number">
                    </div>
                    <div class="col-lg-12">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $results->email }}">
                        </div>
                    <div class="col-lg-12">
                        <label for="name">Password</label>
                        <input type="text" class="form-control" name="password" value="{{ $results->password }}">
                    </div>
                    <div class="col-lg-12">
                            <label for="name">Roll</label>
                            <select name="roll" class="form-control">
                                <option value="">--Select User Roll--</option>
                                <option @if ($results->roll == "User") {{ 'selected' }} @endif>User</option>
                                <option @if ($results->roll == "Admin") {{ 'selected' }} @endif>Admin</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="name">Status</label>
                            <select name="roll" class="form-control">
                                <option value="">--Select User Roll--</option>
                                <option @if ($results->status == "1") {{ 'selected' }} @endif value="1">Active</option>
                                <option @if ($results->status == "0") {{ 'selected' }} @endif value="0">Deactive</option>
                            </select>
                        </div>
                        <div class="col-lg-12 py-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-info btn-sm m-auto">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      

</script>
@endsection
