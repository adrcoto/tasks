<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tasks</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">HKV</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Dashboard</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('images/kat.png')}}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('images/kat.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('images/kat.png')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}} - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {{--<a href="" class="btn btn-default btn-flat">Sign out</a>--}}
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('images/kat.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-table"></i> <span>Tasks</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> My tasks</a></li>
                    <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Tasks assigned to me</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tasks
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tasks</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form>
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg">
    </div>
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    //customize messages
    toastr.options = {
        'timeOut': 2000,
        'positionClass': 'toast-bottom-right',
        'preventDuplicates': true,
        'progressBar': true,
        'closeButton': true,
        'showMethod': 'slideDown',
        'showEasing': 'swing',
        'hideMethod': 'slideUp',
        'hideEasing': 'swing'
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //------------------------------------ ADD ---------------------------------------

    //show modal to add new task
    $(document).on('click', '.add-modal', function () {
        //hide messages
        $('.errorName').addClass('hidden');
        $('.errorDesc').addClass('hidden');

        //show modal
        $('.modal-title').text('Add new Task');
        $('#addModal').modal('show');
    }); //end show add task modal

    //saves the task entered
    $('.modal-footer').on('click', '.add', function () {
        $.ajax({
            type: 'POST',
            url: '/add-task',
            data: {
                'name': $('#name_add').val(),
                'description': $('#desc_add').val(),
                'status': 0,
                'user_id': '{{Auth::user()->id}}',
                'assign': '{{Auth::user()->id}}'
            },
            success: function (data) {
                $('.errorName').addClass('hidden');
                $('.errorDesc').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        $('#addModal').modal('show');
                        toastr.error('Validation error!', 'Add Task');
                        console.log(data.errors);
                    }, 500);

                    if (data.errors.name) {
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }
                    if (data.errors.description) {
                        $('.errorDesc').removeClass('hidden');
                        $('.errorDesc').text(data.errors.description);
                    }
                } else {
                    $('#name_add').val("");
                    $('#desc_add').val("");
                    toastr.success('Successfully added Task!', 'Add Task');
                    showData(true, data);
                } //ends else statement

            } //ends success function

        });//ends ajax call too add task

    });// ends save task


    //------------------------------------ DELETE ---------------------------------------

    //show modal to delete task
    $(document).on('click', '.delete-modal', function () {
        $('.modal-title').text('Delete');
        $('#deleteModal').modal('show');
        $id = $(this).val();
    }); //end show delete task modal

    //delete task
    $('.modal-footer').on('click', '.delete', function () {
        $.ajax({
            type: 'DELETE',
            url: 'delete-task/' + $id,
            data: {
                'id': $id
            },
            success: function (data) {
                toastr.success('Successfully deleted Task!', 'Delete Task');
                $('.item' + data.id).remove();
            }

        }); // ends ajax call for delete task

    }); // ends delete task;


    //------------------------------------ EDIT ---------------------------------------

    //show modal to edit selected task
    $(document).on('click', '.edit-modal', function () {
        //hide messages
        $('.errorName').addClass('hidden');
        $('.errorDesc').addClass('hidden');
        $('.errorStatus').addClass('hidden');
        $('.errorAssign').addClass('hidden');

        $('.modal-title').text('Edit Task');
        $('#id_edit').val($(this).data('id'));
        $('#name_edit').val($(this).data('name'));
        $('#desc_edit').val($(this).data('desc'));
        $('#status_edit').val($(this).data('status'));
        $('#assign_edit').val($(this).data('assign'));
        id = $(this).data('id');
        $('#editModal').modal('show');
    }); //end show edit task modal

    //edit task
    $('.modal-footer').on('click', '.edit', function () {
        $.ajax({
            type: 'PATCH',
            url: '/edit-task/' + id,
            data: {
                id: id,
                name: $('#name_edit').val(),
                description: $('#desc_edit').val(),
                status: $('#status_edit').val(),
                assign: $('#assign_edit').val()
            },
            success: function (data) {
                $('.errorName').addClass('hidden');
                $('.errorDesc').addClass('hidden');
                $('.errorStatus').addClass('hidden');
                $('.errorAssign').addClass('hidden');


                if ((data.errors)) {
                    setTimeout(function () {
                        $('#editModal').modal('show');
                        toastr.error('Validation error!', 'Edit Task');
                    }, 500);

                    if (data.errors.name) {
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }
                    if (data.errors.description) {
                        $('.errorDesc').removeClass('hidden');
                        $('.errorDesc').text(data.errors.description);
                    }

                    if (data.errors.status) {
                        $('.errorStatus').removeClass('hidden');
                        $('.errorStatus').text(data.errors.status);
                    }

                    if (data.errors.assign) {
                        $('.errorAssign').removeClass('hidden');
                        $('.errorAssign').text(data.errors.assign);
                    }
                } else {
                    toastr.success('Successfully updated Task!', 'Edit Task');
                    showData(false, data);
                } //ends else statement

            } //ends success function

        }); //ends ajax call for edit

    }); //ends edit task

});//ends document load

//sets color for progress bar
function setStyle(input) {
    cls = "";
    if (input > 3 && input <= 7)
        cls = 'progress-bar-warning';
    else if (input > 7 && input <= 10)
        cls = 'progress-bar-success';
    else
        cls = 'progress-bar-danger';

    return cls;
}

//if flag is true calls the buildTheItem function to append an item to the table
//if flag is false replace an item from the table
function showData(flag, data) {
    flag ? $('#taskTable').append(buildTheItem(data)) : $('.item' + data.id).replaceWith(buildTheItem(data));
}

function buildTheItem(data) {
    return ("<tr class='item" + data.id + "'>" +
        "<td>" + data.id + "</td>" +
        "<td>" + data.name + "</td>" +
        "<td>" + data.description + "</td>" +
        // "<td>" + data.status + "</td>" +
        "<td>" +
        "<div class='progress progress-xs progress-striped active'>" +
        "<div class='progress-bar " + setStyle(data.status) + "' style='width: " + data.status * 10 + "%;'>" +
        "</div>" +
        "</div>" +
        "<span class='badge " + setStyle(data.status) + "'>" + setText(data.status) + "</span>" +
        "</td>" +
        "<td>" + data.updated_at + "</td>" +
        "<td class='text-center wd'>" +
        "<button class='edit-modal btn btn-sm btn-success wd' data-id='" + data.id + "' data-name='" + data.name + "' data-desc='" + data.description + "' data-status='" + data.status + "' data-assign='" + data.assign + "'>" +
        "<span class='glyphicon glyphicon-pencil'></span>" +
        "</button>" +
        "</td>" +
        "<td class='text-center wd'>" +
        "<button class='delete-modal btn btn-sm btn-danger wd' value='" + data.id + "'>" +
        "<span class='glyphicon glyphicon-trash'></span>" +
        "</button>" +
        "</td>" +
        "</tr>");
}

//sets percenteges / text under progress bar
function setText(input) {
    return input == 10 ? "Finished" : input * 10 + "%";
}
</script>


</body>
</html>
