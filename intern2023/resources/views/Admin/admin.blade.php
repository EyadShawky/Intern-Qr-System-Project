@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('content')

    <div class="container">
        <form action="" class="search-form">
            <input class="search-input" type="text" placeholder="National ID / Passport" name="serach" required>
            <button type="submit"><img src="../image/search.png"></button>
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