@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('content')

<!-- 
    <div class="body">
    <form>
<<<<<<< HEAD
        <div class="form-group-admin">
            <label class="label" for="natiIdPass">Natioanl ID / Passport</label>
            <input type="text" class="form-control" id="natiIdPass"placeholder="National ID / Pasport">
        </div>
        
        <button type="submit" class="btn-admin">Search</button>
=======
        <div class="form-group">
            <label for="from-group-inputs"></label>
            <input type="text" class="form-control" id="from-group-inputs" autocomplete="off" placeholder="National ID / Passport" required>
    
            <button id="sub" type="submit" class="btn-find">Find</button>
        </div>
>>>>>>> cf7185a8615838f4cfc06ca2079960ff7f235112
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
    


    <!-- <section>
        <form>
            <div class="form-all-admin">
            <div class="header-admin">
            <h1 class="admin-header"> Find client by ID</h1>
        </div>
        <div class="input-group admin">
                <div class="input-group-prepend">
                    <span class="" id="">National ID / Passport *</span>
                </div>

                <input type="text" class="form-control-admin" required>
                </div>
        
            <button type="submit" class="btn-submit-admin">Find</button>
            </div>
       
        </form>
    </section>
    -->

    <!-- <div class="container">
        <form action="">
            <input type="text" placeholder="National ID / Passport" required>
            <button type="submit">Serach</button>
        </form>
    </div> -->




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
@endsection