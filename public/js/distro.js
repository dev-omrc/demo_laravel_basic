$(document).ready(function(){
    updateData();
});

$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

function updateData(){
    var url = document.location.origin + '/distro/list';

    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $('#table-data').empty().html(data);
        }
    });
}

function deleteDistro(distro){
    var url = document.location.origin + '/distro/delete/'+distro;
    var distroData= document.location.origin + '/distro/show/'+distro;
    $.ajax({
        type: 'GET',
        url: distroData,
        success: function(data){
            if(confirm("¿Desea eliminar la distro "+ data.name)){
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function(data){
                        toastr.error(data.message);
                        updateData();
                    }
                });
            }

        }
    });
}

function getDistroData(distro){
    var url = document.location.origin + '/distro/show/'+distro;
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $('#edit-id').val(data.id);
            $('#edit-name').val(data.name);
            console.log(data);
            if (data.image_path != null){
                $('#edit-current-img').attr('src',document.location.origin+'/storage/'+data.image_path);
            } else{
                $('#edit-current-img').attr('src',document.location.origin+'/storage/images/no_image.png');
            }
            $('#edit-distro-modal').modal('show');
        }
    });
}

$("form").submit(function(e){
    e.preventDefault();
});

$(".btn-create").click(function(e){
    e.preventDefault();

    var url = document.location.origin + '/distro/create';
    var name = $('#create-name').val();
    var data = new FormData($('#formcreate'));
    data.append('name', name);

    if ($('#create-image').prop('files')[0]){
        var file_data = $('#create-image').prop('files')[0];
        data.append('image', file_data);
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success:function (data) {
            updateData();
            toastr.success(data.message);
            $('#create-distro-modal').modal('hide')
            $('#create-name').val('');
            $('#create-image').val('');
            $('.create-error').hide();
        },
        error: function (error) {
            $('.create-error').empty();
            $('.create-error').show();
            $.each(error.responseJSON.errors, function(key, value){
                $('.create-error').append('<p>'+value+'</p>');
            });
        }
    });
});


$(".btn-edit").click(function(e){
    e.preventDefault();

    var url = document.location.origin + '/distro/update';
    var formData = new FormData($('#formedit'));
    var name = $('#edit-name').val();
    var id = $('#edit-id').val();
    formData.append('name', name);
    formData.append('id', id);


    if ($('#edit-image').prop('files')[0]){
        var file_data = $('#edit-image').prop('files')[0];
        formData.append('image', file_data);
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function (data) {
            updateData();
            toastr.success(data.message);
            $('#edit-distro-modal').modal('hide')
            $('#edit-name').val('');
            $('#edit-image').val('');
            $('.edit-error').hide();
        },
        error: function (error) {
            $('.edit-error').show();
            $.each(error.responseJSON.errors, function(key, value){
                $('.edit-error').append('<p>'+value+'</p>');
            });
        }
    });
});