@extends ('layout')

@section('title')
Home
@endsection

@section('content')
<form class="container" action="{{url('/')}}" method="POST">
    @csrf

    <div class="input-group mb-3 w-100 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">National ID</span>
        </div>
        <input name="id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">First and last name</span>
        </div>
        <input name="Fname" type="text" aria-label="First name" class="form-control">
        <input name="Lname" type="text" aria-label="Last name" class="form-control">
    </div>
    <div class="input-group mb-3 w-100 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
        </div>
        <input name="Phone" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>


    <div class="input-group mb-3 w-100 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
        </div>
        <input name="Email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <input type="submit" value="Submit" class="btn btn-outline-dark create-button w-100  mt-2 text-capitalize">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

</form>
@endsection