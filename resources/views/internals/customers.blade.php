@extends('layout')

@section('title', 'Customer List')


@section('content')

<div class="row">
    <div class="col-12">
        <h1>Customers</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="customers" method="POST" class="pb-5 ">
            <label for="name">Name</label>
            <div class="form-group pb-2">
                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">

            </div>

            <label for="email">Email</label>
            <div class="form-group">
                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
            </div>
            <div>{{$errors->first('email')}}</div>
            <div>{{$errors->first('name')}}</div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
            @csrf
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <ul>
            @foreach ($customoors as $customer)
            <li> {{$customer->name}} <span class="text-muted">({{$customer->email}})</span> </li>
            @endforeach
        </ul>
        @endsection
    </div>
</div>
