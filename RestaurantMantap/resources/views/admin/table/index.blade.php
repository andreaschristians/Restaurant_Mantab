@extends('layouts.app')

@section('title','Table')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

<style>
    #box {
      position : relative;
      width: inherit;
      height: 400px;
      border: 1px solid #9229ac;
      margin: 20px;
    }

    #box div[id*="table"] {
      position : absolute;
      width : 130px;
      height : 80px;
      z-index: 9;
      background-color: #f1f1f1;
      vertical-align: middle;
      text-align: center;
      line-height: 53px;  
      font-size: 30;
      border: 1px solid #d3d3d3;
      padding: 10px;
      z-index: 10;
      color: #fff;
      border-radius: 10px;
    }
    
    #box div[id*="table"][id*="-edit"] {
        cursor: move;
    }
</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('table.create') }}" class="btn btn-primary">Add New</a>
                    <a id="edit-on" class="btn btn-info btn-sm" onclick="edit()"><i class="material-icons">mode_edit</i></a>
                    <a id="edit-off" class="btn btn-info btn-sm" onclick="edit()" style="display:none"><i class="material-icons">mode_edit</i></a>
                    <a id="edit-x" class="btn btn-info btn-sm" style="display:none; opacity: 0.2"><i class="material-icons">mode_edit</i></a>
                    
                    <a id="delete-on" class="btn btn-danger btn-sm" onclick="del()"><i class="material-icons">delete</i></a>
                    <a id="delete-off" class="btn btn-danger btn-sm" onclick="del()" style="display:none"><i class="material-icons">delete</i></a>
                    <a id="delete-x" class="btn btn-danger btn-sm" style="display:none; opacity: 0.2"><i class="material-icons">delete</i></a>
                    
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Tables</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <div id="box">
                                @foreach($tables as $key=>$table)
                                    <div id="table-{{ $table->number }}"> {{ $table->number }} </div>
 
                                    <div id="table-{{ $table->number }}-edit" onload="dragFunction('table-{{ $table->number }}')" style="display:none;"> {{ $table->number }} </div>

                                    <form id="delete-form-{{ $table->number }}" action="{{ route('table.destroy',$table->number) }}" style="display: none;" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div id="table-{{ $table->number }}-delete" style="display:none" onclick="if(confirm('Are you sure? You want to delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $table->number }}' ).submit();
                                        }else {
                                            event.preventDefault();
                                                }"> {{ $table->number }} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    
    <script src="http://code.jquery.com/jquery-1.5.2rc1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
        
        var tables = <?php echo json_encode($tables); ?>;
        
        //Draggable
        tables.forEach(function(table){
            var id = "table-" + table.number;
            $('#'+id+"-edit").draggable({
                containment: 'parent',
                stop: function(event, ui) {
                    var y = ui.position.left;
                    var x = ui.position.top;
                    
                    save(table.number, x, y)
                }
            });

            //table color
            if (table.status == "empty") {
                document.getElementById(id).style.background = "#2d9e2f";
                document.getElementById(id+"-edit").style.background = "#2d9e2f";
                document.getElementById(id+"-delete").style.background = "#2d9e2f";
            } else if (table.status == "reserved") {
                document.getElementById(id).style.background = "#8d8d8d";
                document.getElementById(id+"-edit").style.background = "#8d8d8d";
                document.getElementById(id+"-delete").style.background = "#8d8d8d";
            } else {
                document.getElementById(id).style.background = "#a60b00";
                document.getElementById(id+"-edit").style.background = "#a60b00";
                document.getElementById(id+"-delete").style.background = "#a60b00";
            }
            
            position(id, table.position_x, table.position_y);
            position((id+"-edit"), table.position_x, table.position_y);
            position((id+"-delete"), table.position_x, table.position_y);
        });
        
        //Table Position
        function position(elmnt, pos_x, pos_y){
            document.getElementById(elmnt).style.top = (pos_x+"px"); //y axis
            document.getElementById(elmnt).style.left = (pos_y+"px"); //x axis
        }
        
        //Edit button
        function edit() {
            var edit_on = document.getElementById("edit-on");
            var edit_off = document.getElementById("edit-off");
            
            var del_on = document.getElementById("delete-on");
            var del_x = document.getElementById("delete-x");
            
            if (edit_off.style.display === "none") {
                edit_on.style.display = "none";
                edit_off.style.display = "inline-block";
                
                del_on.style.display = "none";
                del_x.style.display = "inline-block";
                
                tables.forEach(function(table){
                    var id = document.getElementById("table-" + table.number);
                    var id_edit = document.getElementById("table-" + table.number + "-edit");
                    
                    id.style.display = "none";
                    id_edit.style.display = "inline-block";
                });
              } else {
                edit_off.style.display = "none";
                edit_on.style.display = "inline-block";
                
                del_x.style.display = "none";
                del_on.style.display = "inline-block";
                
                tables.forEach(function(table){
                    var id = document.getElementById("table-" + table.number);
                    var id_edit = document.getElementById("table-" + table.number + "-edit");
                    var id_delete = document.getElementById("table-" + table.number + "-delete");
                    
                    id_edit.style.display = "none";
                    id.style.display = "inline-block";
                    
                    id.style.left = id_edit.style.left;
                    id.style.top = id_edit.style.top;
                    id_delete.style.left = id_edit.style.left;
                    id_delete.style.top = id_edit.style.top;
                });
            }
        }
        
        //Delete button
        function del() {
            var del_on = document.getElementById("delete-on");
            var del_off = document.getElementById("delete-off");
            
            var edit_on = document.getElementById("edit-on");
            var edit_x = document.getElementById("edit-x");
            
            if (del_off.style.display === "none") {
                del_on.style.display = "none";
                del_off.style.display = "inline-block";
                
                edit_on.style.display = "none";
                edit_x.style.display = "inline-block";
                
                tables.forEach(function(table){
                    var id = document.getElementById("table-" + table.number);
                    var id_delete = document.getElementById("table-" + table.number + "-delete");
                    
                    id.style.display = "none";
                    id_delete.style.display = "inline-block";
                });
            } else {
                del_off.style.display = "none";
                del_on.style.display = "inline-block";
                
                edit_x.style.display = "none";
                edit_on.style.display = "inline-block";
                
                tables.forEach(function(table){
                    var id = document.getElementById("table-" + table.number);
                    var id_delete = document.getElementById("table-" + table.number + "-delete");
                    
                    id.style.display = "inline-block";
                    id_delete.style.display = "none";
                });
            }
        }
        
        function save(number, x, y) {
            var id = document.getElementById("table-" + number);
            var position_x = x;
            var position_y = y;
            
            $.ajax({
                url: "{{ route('table.update', 0) }}",
                type:'PUT',
                data: {number: number, position_x: position_x, position_y: position_y,  _token: '{{csrf_token()}}' },
                success: function(data) {
                    console.log('success');
                }
            });
        }
    </script>
@endpush