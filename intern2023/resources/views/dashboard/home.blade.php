@extends ('adminLayout')

@section('title')
Tatweer Misr | Dashboard Admin
@endsection

@section('page-style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
@endsection

@section('content')
<div class="display-right-container">



    <div class="container d-flex justify-content-between mb-5">
        <h3 class="text-white">
            Dashboard
        </h3>

        <?php
            if($dashboards->count() <1){
                echo('
                     
            <a id="create" class="btn btn-danger d-flex justify-content-center align-items-center" href="http://127.0.0.1:8000/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/create">
                    
            <a id="create" class="btn btn-danger d-flex justify-content-center align-items-center" href="http://127.0.0.1:8000/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/create">
                Create View
            </a>
                ');
            }
        ?>

    </div>


    <table class="table table-dark container">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Code-Flip</th>
                <th scope="col">Update</th>
                <th scope="col">Created At</th>
            </tr>
        </thead>
        @foreach($dashboards as $dashboard)
        <tbody>
            <tr>
                <th scope="row">{{$dashboard->id}}</th>
                <th scope="row">{{$dashboard->title}}</th>
                <th scope="row">{{$dashboard->codeFlip}}</th>
                <th scope="row">
                    <a  href="{{ url("/admin/pdRkAAT+XxepOb8drasiSw==/dashboard/$dashboard->id/edit") }}">
                        <svg width="100" height="30"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
                            <path class="test" fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </th>
                <td>{{$dashboard->created_at}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection

@section("scripts")