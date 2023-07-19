@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('content')

<!-- 
    <div class="body">
    <form>
        <div class="form-group">
            <label for="from-group-inputs"></label>
            <input type="text" class="form-control" id="from-group-inputs" autocomplete="off" placeholder="National ID / Passport" required>
    
            <button id="sub" type="submit" class="btn-find">Find</button>
        </div>
    </form>
    </div> -->

   



    <div class="body">
        
        
        <div class="container">
            
        <form class="form-admin">

            <div class="header">
                <h1>Search for a user</h1>
            </div>
            <div class="form-group">
                <div class="form-group-admin">
                    <label class="label" for="natIdPass">Natioanl ID / Passport</label>
                    <input class="input-admin" type="email" class="" id="natIdPass" placeholder="Natioanl ID / Passport *" required>
                    
                </div>
            
                <button type="submit" class="btn-admin ">search</button>
            </div>
            
        </form>
        </div>
        
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