@extends ('adminLayout')

@section('title')
Tatweer Misr | Login Admin
@endsection

@section('page-style')
<style>
    .error-message span {
        margin: 15px auto;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-weight: bold;
        font-size: large;
        padding: 10px;
        width: fit-content;
        height: 50px;
        background-color: #fe7777;
        color: white;
        border-radius: 12px;
    }

    .input-group-text{
        min-width: 100px;
        width: fit-content;
    }
    .form-control:focus{
        width: 49%;
    }
    .container{
        display: flex;
        flex-direction: column;
    }
    .button-style{
        position: static;
    }
</style>
@endsection

@section('content')
@guest()
<div class="error-message">
    @if ($errors->has('loginError'))
        <span>{{ $errors->first('loginError') }}</span>
    @endif
</div>
<form action="{{url('/admin/pdRkAAT+XxepOb8drasiSw==/login')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="input-group mb-3 w-75 m-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input required name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 w-75 m-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            </div>
            <input required name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <input type="submit" value="Login" class="btn button-style  btn-danger m-auto">
    </div>
</form>
@endguest
@endsection