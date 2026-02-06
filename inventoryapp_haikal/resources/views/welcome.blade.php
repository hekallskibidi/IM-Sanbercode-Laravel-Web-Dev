@extends('layouts.admin')

@section('title', 'Welcome')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="display-4">Selamat Datang, {{ $firstName ?? 'User' }} {{ $lastName ?? '' }}!</h1>
                    <hr>
                    <p><strong>Email:</strong> {{ $email ?? '-' }}</p>
                    <p><strong>Phone:</strong> {{ $phone ?? '-' }}</p>
                    <p><strong>Address:</strong> {{ $address ?? '-' }}</p>
                    <a href="/" class="btn btn-info mt-4">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection