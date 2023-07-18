@extends ('layout')

@section('title')
Home
@endsection

@section('content')
<form class="container"  action="{{url('/')}}" method="POST">
                @csrf
            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input name="id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">locations</span>
                </div>
                <input name="Fname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">locations</span>
                </div>
                <input name="Lname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <span class="input-group-text">number</span>
                </div>
                <input name="Phone" type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
            </div>

            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <span class="input-group-text">number_of_employess</span>
                </div>
                <input name="Email" type="email" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
            </div>

            <input type="submit" value="store" class="btn btn-danger create-button  mt-2 text-capitalize">
            </form>
@endsection