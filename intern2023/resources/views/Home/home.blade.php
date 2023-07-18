@extends ('layout')

@section('title')
Home
@endsection

@section('content')
<form class="container" action="{{url('/')}}" method="POST">
    @csrf

    <section class="section-user">
        <div class="">

            <form>


                <div class="form-all">

                    <div class="header">
                        <h1> Fill the following fields </h1>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">First name *</span>
                        </div>

                        <input type="text" class="form-control" required>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Last name *</span>
                        </div>

                        <input type="text" class="form-control" required>
                    </div>

                    <div class="input-group">

                        <div class="input-group-prepend">

                            <span class="input-group-text" id="">National ID / Passport *</span>
                            <select onchange='checkIfYes()' class="form-control" id="defect" name="defect">
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
                        <input type="number" class="form-control" id="natId" name="natId" required>
                    </div>

                    <div class="input-group" id="extra" name="extra" style="display: none">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Passport *</span>
                        </div>

                        <input type="text" class="form-control" id="passport" name="passport" required disabled>
                    </div>


                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Telephone number *</span>
                        </div>

                        <input type="number" class="form-control" required>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Email</span>
                        </div>

                        <input type="email" class="form-control">
                    </div>


                    <span class="note"> Please note that the fields followed by * are required</span>

                    <div class="form-group">

                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
            </form>
        </div>
    </section>


    @endsection