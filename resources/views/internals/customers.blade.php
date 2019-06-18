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

            <div class="form-group">
                <label for="active">Status</label>
                <select name="active" id="active" class="form-control">
                    <option value="" disabled>Select customer status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="company_id">Company</label>
                <select name="company_id" id="company_id" class="form-control">
                    @foreach ($companies as $company )
                <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>{{$errors->first('email')}}</div>
            <div>{{$errors->first('name')}}</div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
            @csrf
        </form>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <h3>Active Customers</h3>
        <ul>
            @foreach ($activeCustomers as $active)
            <li> {{$active->name}} <span class="text-muted">({{$active->company->name}})</span> </li>
            @endforeach
        </ul>

    </div>
      <div class="col-6">
          <h3>Inactive Customers</h3>
        <ul>
            @foreach ($inactiveCustomers as $inactive)
            <li> {{$inactive->name}} <span class="text-muted">({{$inactive->company->name}})</span> </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-12">
    @foreach ($companies as $company)
        <h3>{{$company->name}}</h3>

    @foreach ($company->customers as $customer)
        <li>{{$customer->name}}</li>
    @endforeach
    @endforeach
    </div>
</div>


 @endsection
