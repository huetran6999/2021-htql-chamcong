@extends('layout.index')
@section('content')
<div class="container">
    <form action="{{ route('department.store')}}" method="post">
        @csrf
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <div class="controls">
                        <label>Enterprise</label>
                        <select class="form-control" name="e_id">
                            @foreach ($enterprises as $ent)
                            <option value="{{$ent->id}}">{{ $ent->e_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('e_id'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="d_name">
                        <span class="text-danger">@error('d_name'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" placeholder="Phone Number" name="d_phone">
                        <span class="text-danger">@error('d_phone'){{$message}}@enderror</span>
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