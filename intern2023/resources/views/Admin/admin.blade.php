@extends ('layout')

@section('title')
Tatweer Misr | Admin
@endsection

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
@endsection

@section('content')

    <div class="container search-container">
        <form action="" id="sub" class="search-form">
            <input class="search-input" autocomplete="off" id="natIdPass" type="text" placeholder="National ID / Passport" name="serach" required>
            <button type="submit" disabled><img src="../image/search.png"></button>
        </form>
        <div>
            <button id="downloadXL" class="btn btn-success">Download Excel</button>
            <button id="downloadPDF" class="btn btn-danger">Download PDF</button>
        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById('downloadXL').addEventListener('click', function() {
        const data = [
            ['National / Passport ID', 'Name', 'Phone', 'Email', 'Code'],
        ];

        const visibleRows = document.querySelectorAll('tbody tr:not([style*="display: none"])');

        visibleRows.forEach(row => {
            const rowData = [];
            rowData.push(row.children[0].textContent.trim());
            rowData.push(row.children[1].textContent.trim());
            rowData.push(parseInt(row.children[2].textContent));
            rowData.push(row.children[3].textContent.trim());
            rowData.push(row.children[4].textContent.trim());

            data.push(rowData);
        });

        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');
        
        // Trigger file download
        XLSX.writeFile(workbook, 'exported_data.xlsx');
    });
    document.getElementById('downloadPDF').addEventListener('click', function() {
        const element = document.querySelector('table');

        // Set configuration options for html2pdf
        const options = {
            margin: 5,
            filename: 'table_data.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
        };

        // Create the pdf using html2pdf
        html2pdf().from(element).set(options).save();
    });
</script>
@endsection