@extends ('adminLayout')

@section('title')
    login
@endsection

@section('content')
    @guest()
    <div class="container postision-register">

        <div class="row">

            <div class="col-sm-6">
                <form action="{{url('login')}}" method="post" class="container continer-log">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control acc-style w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @if($errors->has('email'))
                            <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control acc-style w-50" id="exampleInputPassword1">
                        @if($errors->has('password'))
                            <small class="form-text invalid-feedback">{{$errors->first('password')}}</small>
                        @endif
                    </div>
                    <div >
                        <button type="submit" value="register" class="btn btn-info-login mt-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endguest
@endsection
