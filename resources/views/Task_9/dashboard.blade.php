@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Dashboard Overview</h3>

    <div class="row">
        <x-stat-card title="Total Users" :value="$usersCount" />
        <x-stat-card title="Total Orders" :value="$ordersCount" />
    </div>
    
@endsection