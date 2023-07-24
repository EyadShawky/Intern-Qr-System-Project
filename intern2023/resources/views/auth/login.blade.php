@extends ('adminLayout')

@section('title')
Tatweer misr | Login
@endsection

@section('content')
@guest()
<form action="{{url('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="input-group mb-3 w-75 m-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">userName</span>
            </div>
            <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            @if($errors->has('email'))
            <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
            @endif
        </div>

        <div class="input-group mb-3 w-75 m-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            </div>
            <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            @if($errors->has('password'))
            <small class="form-text invalid-feedback">{{$errors->first('password')}}</small>
            @endif
        </div>


        <button type="submit" value="register" class="btn button-style  btn-outline-light w-25">
            Login
        </button>


    </div>
</form>
@endguest
@endsection