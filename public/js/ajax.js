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
