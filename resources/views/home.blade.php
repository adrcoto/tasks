@extends('layouts.base')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{Auth::user()->name}}'s Tasks</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
            <table id="taskTable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="idCol">#</th>
                    <th>Name</th>
                    <th>Description</th>
                    {{--<th>Status</th>--}}
                    <th class="progressCol">Progress</th>
                    <th class="updateCol">Last updated</th>
                    <th colspan="2" class="text-center actions">
                        <button class="add-modal btn btn-sm btn-primary">New Task</button>
                    </th>
                </tr>
                {{ csrf_field() }}
                </thead>
                <tbody>
                <?php $cls = "";?>
                @foreach($tasks as $task)
                    <?php
                    if ($task->status > 3 && $task->status <= 7)
                        $cls = "progress-bar-warning";
                    else if ($task->status > 7 && $task->status <= 10)
                        $cls = "progress-bar-success";
                    else
                        $cls = "progress-bar-danger"; ?>
                    <tr class="item{{$task->id}}">
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>{{$task->description}}</td>
                        {{--<td>{{$task->status}}</td>--}}
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar {{$cls}}" style="width: {{$task->status * 10}}%">
                                </div>
                            </div>
                            <span
                                class="badge {{$cls}}">{{$task->status == 10 ? "Finished" : $task->status * 10 . "%"}}</span>
                        </td>
                        <td>{{$task->updated_at}}</td>
                        <td class="text-center wd">
                            <button class="edit-modal btn btn-sm btn-success wd"
                                    data-id="{{$task->id}}"
                                    data-name="{{$task->name}}" data-desc="{{$task->description}}"
                                    data-status="{{$task->status}}" data-assign="{{$task->assign}}"><span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </td>
                        <td class="text-center wd">
                            <button class="delete-modal btn btn-sm btn-danger wd"
                                    value="{{$task->id}}"><span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#"><span style="vertical-align: inherit;">«</span></a></li>
                <li><a href="#"><span style="vertical-align: inherit;">1</span></a></li>
                <li><a href="#"><span style="vertical-align: inherit;">2</span></a></li>
                <li><a href="#"><span style="vertical-align: inherit;">3</span></a></li>
                <li><a href="#"><span style="vertical-align: inherit;">»</span></a></li>
            </ul>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->





    <!-- Add modal -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="desc" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name_add" name="name_add">
                            <div class="errorName text-center alert alert-danger hidden" role="alert"></div>
                        </div>

                        <div class="form-group">
                            <label for="desc" class="col-form-label">Description</label>
                            <textarea class="form-control" id="desc_add" name="desc_add"></textarea>
                            <div class="errorDesc text-center alert alert-danger hidden" role="alert"></div>
                        </div>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add" data-dismiss="modal">Add task</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------------------------- -->

    <!-- Modal form to edit a form -->
    <div class="container">
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="id" class="col-form-label">ID:</label>
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>

                            <div class="form-group">
                                <label class="control-form-label" for="name_add">Name:</label>
                                <input type="text" name="name_edit" class="form-control" id="name_edit" autofocus>
                                <div class="errorName text-center alert alert-danger hidden" role="alert"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-form-label" for="desc_edit">Description:</label>
                                <textarea class="form-control" name="desc_edit" id="desc_edit"
                                          rows="3"></textarea>
                                <div class="errorDesc text-center alert alert-danger hidden" role="alert"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-form-label" for="name_add">Status:</label>
                                <input type="text" name="name_edit" class="form-control" id="status_edit" autofocus>
                                <div class="errorStatus text-center alert alert-danger hidden" role="alert"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-form-label" for="assign_edit">Assigned for:</label>
                                <input type="text" name="assign_edit" class="form-control" id="assign_edit" autofocus>
                                <div class="errorAssign text-center alert alert-danger hidden" role="alert"></div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success edit" data-dismiss="modal">Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ______________________________________________________________________________________________________________ -->

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete selected task?</h3>
                    <br/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">Delete task</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
