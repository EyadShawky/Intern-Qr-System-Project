@extends ('layout')

@section('title')
Tatweer Misr | Admin
@endsection

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
@endsection

@section('content')

    <div class="container">
        <form action="" id="sub" class="search-form">
            <input class="search-input" id="natIdPass" type="text" placeholder="National ID / Passport" name="serach" required>
            <!-- <button type="submit"><img src="../image/search.png"></button> -->
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
            <tr class="table-row">
                <td scope="row">
                    <!-- <a href="{{ url('admin/pdRkAAT+XxepOb8drasiSw==/qr?id=' . $user['user_id']) }}"> -->
                        {{$user["user_id"]}}
                    <!-- </a> -->
                </td>
                <td scope="row">
                    <!-- <a href="{{ url('admin/pdRkAAT+XxepOb8drasiSw==/qr?id=' . $user['user_id']) }}"> -->
                        {{$user["code"]}}
                    <!-- </a> -->
                </td>
            </tr>
        </tbody>
    @endforeach
</table>


@endsection

@section("scripts")
<script>
    // let form = document.getElementById("sub");
    // form.addEventListener("submit", function(e){
    //     e.preventDefault();
    //     let id = document.getElementById("natIdPass").value;
    //     window.location.href = "/admin/pdRkAAT+XxepOb8drasiSw==/qr?id="+id;
    // })
</script>

<script>
    let search = document.getElementById("natIdPass");
    search.addEventListener("keyup", function(e){
        let tableRows = document.querySelectorAll("tbody tr");
        let filterValue = e.target.value.toLowerCase();
        
        tableRows.forEach(row => {
            let rowText = row.children[0].innerText.toLowerCase();
            if (rowText.includes(filterValue)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>
@endsection