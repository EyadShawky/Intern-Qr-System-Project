@extends ('layout')

@section('title')
Home
@endsection

@section('content')
<form class="container" action="{{url('/')}}" method="POST">
    @csrf

<<<<<<< HEAD
<section class="section-user">
    <div class ="">
        
        <form >

        
            <div class="form-all"> 
            
                <div class="header">
                    <h1 > Fill the following fields </h1>
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

                <div class="input-group"  id="extra" name="extra" style="display: none">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Passport *</span>
                </div>

                <input type="text" class="form-control"id="passport" name="passport" required disabled>
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

=======
    <div class="input-group mb-3 w-100 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">National ID</span>
        </div>
        <input name="id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">First and last name</span>
        </div>
        <input name="Fname" type="text" aria-label="First name" class="form-control">
        <input name="Lname" type="text" aria-label="Last name" class="form-control">
    </div>
    <div class="input-group mb-3 w-100 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
        </div>
        <input name="Phone" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>


    <div class="input-group mb-3 w-100 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
        </div>
        <input name="Email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <input type="submit" value="Submit" class="btn btn-outline-dark create-button w-100  mt-2 text-capitalize">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

</form>
@endsection
>>>>>>> cf7185a8615838f4cfc06ca2079960ff7f235112
