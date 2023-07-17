@extends ('layout')

@section('title')
    Tatweer misr
@endsection

@section('content')

    
    <div class ="">
        <div class="header">
            <h1 > Fill the following fields </h1>
        </div>

        <form class="form-all">
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="text" class="form-control" id="from-group-inputs" placeholder="First Name *" required>
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="text" class="form-control" id="from-group-inputs" placeholder="Last Name *" required>
            </div>
            <div class="form-group">
                <!-- <input type="checkbox">
                <label for="from-group-inputs">National ID</label> -->
                <input type="checkbox" name="check1" onclick="dynInput(this);">
                <label for="from-group-inputs">National ID</label>
                <p id="insertinputs"></p>
                <input type="checkbox" name="check2" onclick="dynInput(this);">
                <label for="from-group-inputs">Passport</label>
                <p id="insertinputs"></p>
                <!-- <input type="number" class="form-control" id="from-group-inputs" placeholder="National ID *" required> -->
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="number" class="form-control" id="from-group-inputs" placeholder="Passport *" required>
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="email" class="form-control" id="from-group-inputs" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="from-group-inputs"></label>
                <input type="number" class="form-control" id="from-group-inputs" placeholder="Phone Number *" required>
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn-submit">Submit</button>
            </div>
            
        </form> 
    </div>
    

@endsection