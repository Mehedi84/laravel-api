@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                <button type="button" class="btn btn-primary btn-sm" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button>
                </div>
                

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

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Password</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employs as $employ)
                        <tr>
                        <th scope="row">{{ $employ->id }}</th>
                        <td>{{ $employ->name }}</td>
                        <td>{{ $employ->email }}</td>
                        <td>{{ $employ->number }}</td>
                        <td>{{ $employ->password }}</td>
                        <td>{{ $employ->roll }}</td>
                        <td>{{  ($employ->status==1) ? 'Active' : 'Deactive'; }}</td>
                        <td>
                        <a href="{{ url('users/') }}/{{ $employ->id.'/edit' }}" type="button" class="btn btn-primary btn-sm">Edit</a>

                        <form method="POST" action="{{ url('users') }}/{{ encrypt($employ->id) }}">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                       </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User <span id="actionData">Create</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('users') }}">
      @csrf
        <div class="col-lg-12">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-lg-12">
            <label for="name">Phone</label>
            <input type="number" class="form-control" name="number">
        </div>
      <div class="col-lg-12">
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
      <div class="col-lg-12">
            <label for="name">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
      <div class="col-lg-12">
            <label for="name">Roll</label>
            <select name="roll" class="form-control">
                <option value="">--Select User Roll--</option>
                <option >User</option>
                <option >Admin</option>
            </select>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </from>
    </div>
  </div>
</div>
<script>
function userEditData(id ,name, email, phone, pass, roll, status) {
  $('#exampleModal').modal('show');
  $("#actionData").text(email);
}
</script>
@endsection
