@extends ('layout')

@section('title')
Home
@endsection

@section('content')



<section class="section-user">
    <div>
        <form id="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-all">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">First name</span>
                    </div>
                    <input name="Fname" type="text" class="form-control" required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Last name </span>
                    </div>
                    <input name="Lname" type="text" class="form-control" required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">

                        <span class="input-group-text" id="">National ID / Passport </span>
                        <select onchange='checkIfYes()' class="form-control" id="defect" name="defect">
                            <option value="" disabled selected>National ID / Passport?</option>
                            <option id="id" value="id">National ID</option>
                            <option id="pass" value="pass">Passport</option>
                        </select>
                    </div>
                </div>
                <div class="input-group" id="extraId" name="extraId" style="display: none">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">National ID </span>
                    </div>
                    <input name="id" type="number" class="form-control" id="    " required>
                </div>
                <div class="input-group" id="extra" name="extra" style="display: none">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Passport </span>
                    </div>

                    <input name="id" type="text" class="form-control" id="passport" required disabled>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Telephone number </span>
                    </div>

                    <input name="Phone" type="number" class="form-control" required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Email</span>
                    </div>

                    <input name="Email" type="email" class="form-control" required>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn-submit">Submit</button>
                </div>
        </form>
    </div>
</section>


@endsection

@section('scripts')
<script>
    let logo = document.getElementById('logo');
    logo.src = "https://tatweermisr.com/images/logo-white.svg";
</script>
@endsection