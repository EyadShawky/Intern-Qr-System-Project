@extends ('layout')

@section('title')
    Tatweer Misr Admin
@endsection

@section('content')

    <div class="header">
        <h1> Find serial number </h1>
    </div>

    <form>
        <div class="form-group">
            <label for="from-group-inputs"></label>
            <input type="text" class="form-control" id="from-group-inputs" placeholder="National ID / Passport" required>
    
        <button type="submit" class="btn-find">Find</button>
    </form>


    

@endsection