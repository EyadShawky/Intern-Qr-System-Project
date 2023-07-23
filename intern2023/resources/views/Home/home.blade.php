@extends ('layout')

@section('title')
Tatweer Misr | Form
@endsection

@section('page-style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
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






    @endsection

    @section('scripts')
    <script>
        let logo = document.getElementById('logo');
        logo.src = "https://tatweermisr.com/images/logo-white.svg";
    </script>
    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault();
            let id = document.getElementById('natId').value;
            let pass = document.getElementById('passport').value;
            if (id) {
                let qrcode = new QRCode("qrCode", "http://127.0.0.1:8000/qr?q=" + id);
                document.getElementById('qrCode').value = qrcode._el.childNodes[0].toDataURL();
                document.getElementById('form').submit();
            } else if (pass) {
                let qrcode = new QRCode("qrCode", "http://127.0.0.1:8000/qr?q=" + pass);
                document.getElementById('qrCode').value = qrcode._el.childNodes[0].toDataURL();
                document.getElementById('form').submit();
            }
        })
    </script>
    @endsection