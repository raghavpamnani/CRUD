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
                    {{--  <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->firstname}}</td>
                      <td>{{$row->filename}}</td>  
                    </tr>
                    @endforeach  --}}
                    </table>
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
</div>


