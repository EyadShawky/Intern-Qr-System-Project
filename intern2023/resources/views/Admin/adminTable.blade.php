@extends ('layout')

@section('title')
    Tatweer misr Admin
@endsection

@section('content')

    <div class="header">
        <h1> Find serial number </h1>
    </div>

    <form>
        <div class="form-group">
            <label for="from-group-inputs"></label>
            <input type="text" class="form-control" id="from-group-inputs" placeholder="National ID / Passport" required>
    
        <button type="submit" class="btn-find">Find</button>
    </form>
    <table class="table table-dark container">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Address</th>
        <th scope="col">Created At</th>
    </tr>
    </thead>
    @foreach($users as $user)
        <tbody>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <th scope="row">{{$user->name}}</th>
            <td><a href="{{ url("/admin/accounts/$user->id") }}">{{$user->email}}</a></td>
            <td scope="row">
                @if($user->role_id == 3)
                    <p>User</p>
                @elseif( $user->role_id == 1)
                    <p>Super Admin</p>
                @elseif($user->role_id == 2)
                <p>Admin</p>
                @endif
               </td>
            <td><a href="{{ url("/admin/accounts/$user->id") }}">{{$user->address}}</a></td>
            <td>{{$user->created_at}}</td>
        </tr>
        </tbody>
    @endforeach
</table>
@endsection