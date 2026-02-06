@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">Register Account</h4>
            <form action="/welcome" method="POST">
                @csrf
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
            </form>
        </div>
    </div>
@endsection