@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a>

        <?php
           // dd($data);
        ?>
        <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col">Contact</th>
                <th scope="col">Address1</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $user)
            <tr>
                <td scope="row">{{$key}}</td>
                <td scope="col">{{$user['company']}}</td>
                <td scope="col">{{$user['contact']}}</td>
                <td scope="col">{{$user['addressline1']}}</td>
                <td scope="col">{{$user['city']}}</td>
                <td scope="col">{{$user['country']}}</td>
            </tr> 
        @endforeach       
        </tbody>
        </table>
        
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection