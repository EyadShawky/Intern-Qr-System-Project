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
            <input class="search-input" autocomplete="off" id="natIdPass" type="text" placeholder="National ID / Passport" name="serach" required>
            <button type="submit" disabled><img src="../image/search.png"></button>
        </form>
    </div>

    <table class="table table-dark container">
    <thead>
    <tr>
        <th scope="col">National / Passport ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Code</th>
        <th scope="col"><a href="{{ route('export.download', ['format' => 'excel']) }}" class="btn btn-success">Download as Excel</a></th> 
        <!-- <th scope="col"><a href="{{ route('export.download', ['format' => 'pdf']) }}" class="btn btn-danger">Download as PDF</a></th> -->
    </tr>
    </thead>
    <?php
    for ($i = 0; $i < count($userCode); $i++) {
        echo (
            '<tbody>
                <tr class="table-row">
                    <td scope="row">
                        '.$userCode[$i]["user_id"].'
                    </td>
                    <td scope="row">
                        '.$userData[$i]["Fname"].' '.$userData[$i]["Lname"].'
                    </td>
                    <td scope="row">
                        '.$userData[$i]["Phone"].'
                    </td>
                    <td scope="row">
                        '.$userData[$i]["Email"].'
                    </td>
                    <td scope="row">
                        '.$userCode[$i]["code"].'
                    </td>
                </tr>
            </tbody>'
        );
    }
    ?>
    <!-- @foreach($userCode as $user)
        <tbody>
            <tr class="table-row">
                <td scope="row">
                        {{$user["user_id"]}}
                </td>
                <td scope="row">
                        {{$user["code"]}}
                </td>
            </tr>
        </tbody>
    @endforeach -->

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