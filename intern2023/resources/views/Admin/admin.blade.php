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
            <button type="submit"><img src="../image/search.png"></button>
        </form>
    </div>

    <table class="table table-dark container">
    <thead>
    <tr>
        <th scope="col">National / Passport ID</th>
        <th scope="col">Code</th>
    </tr>
    </thead>
    @foreach($userCode as $user)
        <tbody>
        <tr>
            <th scope="row">{{$user->user_id}}</th>
            <th scope="row">{{$user->code}}</th>
        </tr>
        </tbody>
    @endforeach
</table>


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