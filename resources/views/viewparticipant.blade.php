@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Participants</div>
                <div class="card-body">
                    @if (session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_messagem') }}
                        </div>
                    @endif
                
                <table class="table table-bordered"> 
                        @foreach($view_participants as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->firstname}}</td>
                    <td>{{$row->filename}}</td>
                    <td>
                        <button type="button" class="btn btn-primary">View</button>
                        <button type="button" class="btn btn-success">Edit</button>
                        <a href="{{ URL::to('participant/delete',$row->id) }}" class="btn btn-danger">Delete</a>
                        <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                        <!-- <a href="{{action('ParticipantController@destroy',$row->id)}}" class="btn btn-danger">Delete</a> -->
                    </td>
                </tr>
                @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
