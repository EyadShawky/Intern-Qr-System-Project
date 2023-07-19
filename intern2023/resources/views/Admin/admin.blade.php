@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
@endsection

@section('content')

    <div class="container">
        <form action="" id="sub" class="search-form">
            <input class="search-input" id="natIdPass" type="text" placeholder="National ID / Passport" name="serach" required>
            <button type="submit"><img src="../image/download__2_-removebg-preview.png"></button>
        </form>
    </div>
    

@endsection

@section("scripts")
<script>
    let form = document.getElementById("sub");
    form.addEventListener("click", function(e){
        e.preventDefault();
        let id = document.getElementById("natIdPass").value;
        window.location.href = "/admin/pdRkAAT+XxepOb8drasiSw==/qr?id="+id;
    })

</script>
@endsection