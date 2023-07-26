@extends ('adminLayout')

@section('title')
Tatweer Misr | Form Data
@endsection

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
@endsection

@section('content')
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>

    <div class="container search-container">
        <form action="" id="sub" class="search-form">
            <input class="search-input" autocomplete="off" id="natIdPass" type="text" placeholder="National ID / Passport" name="serach" required>
            <button type="submit" disabled><img src="../image/search.png"></button>
        </form>
        <div>
        <button id="exportPdfBtn"  class="btn btn-danger">Download PDF</button>
            <button id="exportExcelBtn" class="btn btn-outline-success">Download Excel</button>
        </div>
    </div>
    <div class="cont-tb">
    <table class="table table-dark container">
    <thead>
    <tr>
        <th scope="col">National / Passport ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Code</th>
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
</div>

@endsection

@section("scripts")


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


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

<script>
  document.getElementById('exportExcelBtn').addEventListener('click', () => {

    const table = document.querySelector('.table');
    const worksheet = XLSX.utils.table_to_sheet(table);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Table Data');
    XLSX.writeFile(workbook, 'table_data.xlsx');
  });
</script>

<script>
  document.getElementById('exportPdfBtn').addEventListener('click', () => {

    const table = document.querySelector('.table');
    window.jsPDF = window.jspdf.jsPDF;
    const doc = new jsPDF();
    const tableData = [];
    const rows = table.querySelectorAll('tbody tr');
    for (const row of rows) {
      if (row.style.display !== 'none') { 
        const rowData = [];
        const cells = row.querySelectorAll('td');
        for (const cell of cells) {
          rowData.push(cell.textContent.trim());
        }
        tableData.push(rowData);
      }
    }
    const header = ['National / Passport ID', 'Name', 'Phone', 'Email', 'Code'];
    const columnWidths = [40, 40, 40, 40, 40];

    doc.autoTable({
      head: [header],
      body: tableData,
      theme: 'grid',
      styles: { cellPadding: 1, fontSize: 10 },
      columnStyles: {
        0: { cellWidth: columnWidths[0] },
        1: { cellWidth: columnWidths[1] },
        2: { cellWidth: columnWidths[2] },
        3: { cellWidth: columnWidths[3] },
        4: { cellWidth: columnWidths[4] },
      },
    });
    doc.save('table_data.pdf');
  });
</script>

@endsection