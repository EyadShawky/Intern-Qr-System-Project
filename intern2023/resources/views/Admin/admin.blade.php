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
        <!-- <th scope="col"><button id="exportExcelBtn">Export to Excel</button></th>
        <th scope="col"><button id="exportPdfBtn">Export to PDF</button></th> -->
        
        

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

<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script> -->

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
<!-- 
<script>
  document.getElementById('exportExcelBtn').addEventListener('click', () => {
    // Get the table element
    const table = document.querySelector('.table');

    // Convert table data to a worksheet
    const worksheet = XLSX.utils.table_to_sheet(table);

    // Create a new workbook and add the worksheet
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Table Data');

    // Export the workbook to an Excel file
    XLSX.writeFile(workbook, 'table_data.xlsx');
  });
</script>

<script>
  document.getElementById('exportPdfBtn').addEventListener('click', () => {
    const table = document.querySelector('.table');

    // Create a new jsPDF instance
    const doc = new jsPDF();

    // Convert table data to a data array
    const tableData = [];
    const rows = table.querySelectorAll('tr');
    for (const row of rows) {
      const rowData = [];
      const cells = row.querySelectorAll('th, td');
      for (const cell of cells) {
        rowData.push(cell.textContent);
      }
      tableData.push(rowData);
    }

    // Set the table header
    const header = tableData.shift();

    // Set the column widths (you can adjust these values as needed)
    const columnWidths = [40, 70];

    // Generate the PDF
    doc.autoTable({
      head: [header],
      body: tableData,
      theme: 'grid',
      styles: { cellPadding: 0.5, fontSize: 10 },
      columnStyles: { 0: { cellWidth: columnWidths[0] }, 1: { cellWidth: columnWidths[1] } },
    });

    // Save the PDF file
    doc.save('table_data.pdf');
  });
</script> -->
@endsection