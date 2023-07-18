@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('content')

    
<div class="container">
    <div class="header">
        <h1>Fill the following fields</h1>
    </div>

    <form class="form-all" onsubmit="generateQRCode(event)">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" placeholder="First Name *" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" placeholder="Last Name *" required>
        </div>
        <div class="form-group">
            <input type="checkbox" name="check1" onclick="dynInput(this);">
            <label for="idType1">National ID</label>
            <p id="insertinputs1"></p>
            <input type="checkbox" name="check2" onclick="dynInput(this);">
            <label for="idType2">Passport</label>
            <p id="insertinputs2"></p>
        </div>
        <div class="form-group">
            <label for="idValue">ID:</label>
            <input type="text" class="form-control" id="idValue" placeholder="ID">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="number" class="form-control" id="phoneNumber" placeholder="Phone Number *" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-submit">Submit</button>
        </div>
    </form>

    <div id="qrCodeContainer"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    function generateQRCode(event) {
        event.preventDefault();

        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var idType = "";
        var idValue = "";
        var email = document.getElementById("email").value;
        var phoneNumber = document.getElementById("phoneNumber").value;

        if (document.getElementsByName("check1")[0].checked) {
            idType = "National ID";
            idValue = document.getElementById("insertinputs1").innerText;
        } else if (document.getElementsByName("check2")[0].checked) {
            idType = "Passport";
            idValue = document.getElementById("idValue").value;
        }

        var data = "First Name: " + firstName + "\n" +
            "Last Name: " + lastName + "\n" +
            "ID Type: " + idType + "\n" +
            "ID Value: " + idValue + "\n" +
            "Email: " + email + "\n" +
            "Phone Number: " + phoneNumber;

        var url = "res.html?" + "data=" + encodeURIComponent(data);
        window.open(url, "_blank");

        document.getElementById("firstName").value = "";
        document.getElementById("lastName").value = "";
        document.getElementsByName("check1")[0].checked = false;
        document.getElementsByName("check2")[0].checked = false;
        document.getElementById("idValue").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phoneNumber").value = "";
    }
</script>

@endsection