@extends('layouts.app')
@include('viewuser')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@section('content')
<div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                    <table class="table table-bordered"> 
                        {{--  @foreach($usersview as $row)  --}}
                    <tr>
                      <td id="id"></td>
                      {{--  <td>{{$row->firstname}}</td>
                      <td>{{$row->filename}}</td>    --}}
                    </tr>
                    {{--  @endforeach  --}}
                    </table>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Participants</div>
                <div class="card-body">
                    @if (session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                
                <table class="table table-bordered"> 
                        @foreach($view_participants as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->firstname}}</td>
                    <td>{{$row->filename}}</td>
                    <td>
                        <a href="{{ URL::to('participant/show',$row->id) }}" id="user" class="user btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="{{ $row->id }}">View</a>
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

<script>
    $(document).ready(function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
let result = [];
    $('.user').on('click', function (e) {
        e.preventDefault();
        var typeID = $(this).data('id');
        //alert(typeID);
        //console.log(typeID);
      $.ajax({
          //console.log($(this).val());
          type:"GET",
          url: "{{URL('/participant/show')}}/"+typeID,
          success: function (data) {
            result = data
            //console.log(result)
          },
          fail: function () {
              // do something in case of failure
          }
      });
  });
});

  
</script>
