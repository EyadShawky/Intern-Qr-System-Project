@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section("styles")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('content')

    <div class="header">
        <h1> Find serial number </h1>
    </div>

    <form>
        <div class="form-group">
            <label for="from-group-inputs"></label>
            <input type="text" class="form-control" id="from-group-inputs" placeholder="National ID / Passport" autocomplete="off" required>
    
            <button id="sub" type="submit" class="btn-find">Find</button>
        </div>
    </form>

@endsection

@section("scripts")
<script>
    let form = document.getElementById("sub");
    form.addEventListener("click", function(e){
        e.preventDefault();
        let id = document.getElementById("from-group-inputs").value;
        window.location.href = "/admin/pdRkAAT+XxepOb8drasiSw==/qr?id="+id;
    })

</script>
<script>
  
</script>


    

@endsection