@extends ('adminLayout')

@section('title')
Tatweer Misr | Login Admin
@endsection

@section('content')
@guest()
<form action="{{url('/admin/pdRkAAT+XxepOb8drasiSw==/login')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="input-group mb-3 w-75 m-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            @if($errors->has('email'))
             <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
            @endif
        </div>


        <div class="input-group mb-3 w-75 m-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            </div>
            <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <input type="submit" value="Login" class="btn button-style  btn-danger m-auto">
    </div>
</form>
@endguest
@endsection