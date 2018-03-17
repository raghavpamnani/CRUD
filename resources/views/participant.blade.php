@extends('layouts.app')
<style>
        .col-sm-8 
        {
            display: inline-block;
        }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Participant</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('Success'))
                        <div class="alert alert-success">
                            {{ session('Success') }}
                        </div>
                    @endif
                    @if(count($errors)>0)
							@foreach($errors->all() as $error)
								<div class="alert alert-warning" >{{ $error }}</div>
							@endforeach
					@endif

                    <form class="form-horizontal" action="{{ URL::to('/participant/store') }}" method="POST"  enctype="multipart/form-data" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="firstname">Name:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="filename">Image:</label>
                          <div class="col-sm-8"> 
                            <input type="file" class="form-control" id="filename" name="filename">
                          </div>
                        </div>
                        <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
