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
    </tr>
    </thead>
    @foreach($users as $user)
        <tbody>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <th scope="row">{{$user->name}}</th>
        </tr>
        </tbody>
    @endforeach
</table>
@endsection