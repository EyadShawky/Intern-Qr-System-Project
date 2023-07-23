@extends ('layout')

@section('title')
Tatweer Misr | Form
@endsection

@section('page-style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<style>
        /* Styling for the pop-up */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            border-radius: 20px;
        }
        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            text-align: center;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

<div class="container form-home">
    <div class="row">
        <div class="col">
            <section class="">
                <div>
                    <form id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-all">
                            @error('id')
                            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">First name *</span>
                                </div>
                                <input name="Fname" type="text" class="form-control" required>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Last name *</span>
                                </div>
                                <input name="Lname" type="text" class="form-control" required>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">

                                    <span class="input-group-text" id="">National ID / Passport </span>
                                    <select onchange='checkIfYes()' class="forms-control" id="defect" name="defect">
                                        <option value="" disabled selected>National ID / Passport?</option>
                                        <option id="id" value="id">National ID</option>
                                        <option id="pass" value="pass">Passport</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group" id="extraId" name="extraId" style="display: none">

<section class="section-user">
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>ID already Registered with <span id="popName"></span>.</h2>
            <h3>Your Number is <span id="popCode"></span>.</h3>
        </div>
    </div>
    <div>
        <form id="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-all">
                @error('id')
                <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">First name *</span>
                    </div>
                    <input name="Fname" type="text" class="form-control" required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Last name *</span>
                    </div>
                    <input name="Lname" type="text" class="form-control" required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">

                        <span class="input-group-text" id="">National ID/Passport *</span>
                        <select onchange='checkIfYes()' style="height: 60px;" class="form-control" id="defect" name="defect">
                            <option value="" disabled selected>National ID / Passport?</option>
                            <option id="id" value="id">National ID</option>
                            <option id="pass" value="pass">Passport</option>
                        </select>
                    </div>
                </div>
                <div class="input-group" id="extraId" name="extraId" style="display: none">

                                <input name="Phone" type="number" class="form-control" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="11">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Email *</span>
                                </div>

                                <input name="Email" type="email" class="form-control" required>
                                <input name="qrCode" type="text" class="form-control" hidden id="qrCode">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-submit">Submit</button>
                            </div>
                    </form>
                </div>
            </section>

        </div>
        <div class="col">
            <div class="container-img-admin">
                <img src="image/Tatweer-Misr.jpg" class="img-fluid" alt="Tatweer-Misr.jpg">
                <div class="textStyle">
                    <p> Tatweer Misr</p>
                </div>
            </div>
        </div>
    </div>




@section('scripts')
<!-- <script>
    let logo = document.getElementById('logo');
    logo.src = "https://tatweermisr.com/images/logo-white.svg";
</script> -->
<script>
    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();
        let id = document.getElementById('natId').value;
        let pass = document.getElementById('passport').value;

        var registeredID = <?php echo json_encode($userCodeDB->pluck('user_id')); ?>;
        let popName ="";
        let popCode ="";
        let userData = <?php echo $userDataDB?>;
        let userCode = <?php echo $userCodeDB?>;
        if(id){
            if (registeredID.includes(id)) {
                for (var i = 0; i < userData.length; i++) {
                    if (userData[i].id == id) {
                        popName = userData[i].Fname;
                        break;
                    }
                }
                for (var i = 0; i < userCode.length; i++) {
                    if (userCode[i].user_id == id) {
                        popCode = userCode[i].code;
                        break;
                    }
                }
                openPopup(popName, popCode);
            }else{
                let qrcode = new QRCode("qrCode", "http://127.0.0.1:8000/qr?q="+id);
                document.getElementById('qrCode').value = qrcode._el.childNodes[0].toDataURL();
                document.getElementById('form').submit();
            }
        }else if(pass){
            if (registeredID.includes(pass)) {
                for (var i = 0; i < userCode.length; i++) {
                    if (userCode[i].user_id == pass) {
                        popName = userData[i].Fname;
                        break;
                    }
                }
                for (var i = 0; i < userCode.length; i++) {
                    if (userCode[i].user_id == pass) {
                        popCode = userCode[i].code;
                        break;
                    }
                }
                openPopup(popName, popCode);
            }else{
                let qrcode = new QRCode("qrCode", "http://127.0.0.1:8000/qr?q="+pass);
                document.getElementById('qrCode').value = qrcode._el.childNodes[0].toDataURL();
                document.getElementById('form').submit();
            }
        }

    })
    function openPopup(name, code) {
        document.getElementById("popName").textContent = name;
        document.getElementById("popCode").textContent = code;
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
@endsection
