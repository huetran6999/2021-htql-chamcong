@extends('layout.index')
@section('content')
<div class="container">
    <form action="{{ route('enterprise.update', $enterprise->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$enterprise->id}}">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <div class="controls">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="e_name" value="{{$enterprise->e_name}}">
                        <span class="text-danger">@error('e_name'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="e_address" value="{{ $enterprise->e_address }}">
                        <span class="text-danger">@error('e_address'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" placeholder="Phone Number" name="e_phone" value="{{ $enterprise->e_phone }}">
                        <span class="text-danger">@error('e_phone'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                <input type="submit" value="Save" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                <a type="submit" value="Save" class="btn btn-primary text-white glow mb-1 mb-sm-0 mr-0 mr-sm-1" href="{{ route('enterprise.index')}}">Back to list<a>
            </div>
        </div>
    </form>
</div>
@endsection