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
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2>ID already Registered with <span id="popName"></span>.</h2>
        <h3>Your Number is <span id="popCode"></span>.</h3>
    </div>
</div>
<div class="container form-home">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
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
                            <div id="error-div" class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                <strong id="error-msg"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
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
                                    <select onchange='checkIfYes()' style="height: 61px;" class="form-control" id="defect" name="defect">
                                        <option value="" disabled selected>National ID / Passport?</option>
                                        <option id="id" value="id">National ID</option>
                                        <option id="pass" value="pass">Passport</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group" id="extraId" name="extraId" style="display: none">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">National ID *</span>
                                </div>
                                <input name="id" type="number" class="form-control" id="natId" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="14">
                            </div>
                            <div class="input-group" id="extra" name="extra" style="display: none">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Passport *</span>
                                </div>

                                <input name="id" type="text" class="form-control" id="passport" required disabled maxlength="9">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Telephone number *</span>
                                </div>

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
                                <button type="submit" onclick="validate()" class="btn-submit">Submit</button>
                            </div>
                    </form>
                </div>
            </section>

        </div>
        @foreach($dashboards as $dashboard)
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="container-img-admin">
                <img src="{{asset(($dashboard->img))}}" class="img-fluid" alt="Tatweer-Misr.jpg">
                <div class="textStyle">
                    <p> {{$dashboard->title}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>






    @endsection

    @section('scripts')
    









    <script>
        let logo = document.getElementById('logo');
        logo.src = "https://tatweermisr.com/images/logo-white.svg";
    </script>
    <script>
    function valid(){
        const selectElement = document.getElementById('defect');
        const selectedOption = selectElement.options[selectElement.selectedIndex].value;
        const natIdInput = document.getElementById('natId');
        const passportInput = document.getElementById('passport');
        const phoneInput = document.getElementsByName('Phone')[0];
        const errorMsgDiv = document.getElementById('error-div');
        const errorMsg = document.getElementById('error-msg');
        // Clear previous error message, if any
        errorMsg.textContent = '';
        errorMsgDiv.style.display = 'none';
        if (selectedOption === 'id' && natIdInput.value.length !== 14) {
            // Second option selected, but ID input length is not 14
            errorMsg.textContent = 'National ID should be 14 digits.';
            errorMsgDiv.style.display = 'block';
            return false;
        } else if (selectedOption === 'pass' && passportInput.value.length !== 9) {
            // Third option selected, but Passport input length is not 9
            errorMsg.textContent = 'Passport should be 9 characters.';
            errorMsgDiv.style.display = 'block';
            return false;
        } else if (phoneInput.value.length !== 11) {
            // Phone number should be at least 11 digits
            errorMsg.textContent = 'Phone number should be at least 11 digits.';
            errorMsgDiv.style.display = 'block';
            return false;
        }else{

            return true;
        }
    }
    
    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();
        if(!valid()) return;
        let id = document.getElementById('natId').value;
        let pass = document.getElementById('passport').value;
        var registeredID = <?php echo json_encode($userCodeDB->pluck('user_id')); ?>;
        let popName ="";
        let popCode ="";
        let userData = <?php echo $userDataDB?>;
        let userCode = <?php echo $userCodeDB?>;
        if(id){
            if (registeredID.includes(id)) {
                console.log(id);
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
                for (var i = 0; i < userData.length; i++) {
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

    function validate()
    {
    var ddl = document.getElementById("defect");
    // var selectedValue = ddl.options[ddl.selectedIndex].value;
    if (ddl.selectedIndex == 0)
    {
       alert("National ID / passport must be filled");
    }
    }
</script>
    @endsection