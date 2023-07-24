@extends ('adminLayout')

@section('title')
Tatweer Misr | Dashboard Admin
@endsection

@section('page-style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
@endsection

@section('content')
<form action="{{url('/admin/pdRkAAT+XxepOb8drasiSw==/dashboard')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="container">
            <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                </div>
                <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>


            <div class="input-group mb-5 w-75 m-auto">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input name="img" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
                
           <input type="submit" value="Add Into Dashboard" class="btn button-style  btn-danger m-auto">
           

    </div>
</form>
@endsection