@extends ('adminLayout')

@section('title')
Tatweer Misr | Create Admin
@endsection

@section('page-style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
@endsection

@section('content')
<form action="{{url('/admin/pdRkAAT+XxepOb8drasiSw==/create-admin')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="container">
            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                </div>
                <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                </div>
                <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                </div>
                <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Password confirmed</span>
                </div>
                <input name="password_confirmation" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
                
           <input type="submit" value="Create Admin" class="btn button-style  btn-danger m-auto">
    </div>
</form>
@endsection