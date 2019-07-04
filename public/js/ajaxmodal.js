$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();


    //display modal form for creating new pais *********************
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmPais').trigger("reset");
        $('#myModal').modal('show');
    });



    //display modal form for pais EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var pais_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: urledit,
            success: function (data) {
                console.log(data);
                $('#pais_id').val(data.id);
                $('#pais').val(data.pais);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new pais / update existing pais ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        var formData = {
            pais: $('#pais').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var pais_id = $('#pais_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + pais_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var pais = '<tr id="pais' + data.id + '"><td>' + data.id + '</td><td>' + data.pais + '</td>';
                pais += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                pais += ' <button class="btn btn-danger btn-delete delete-pais" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#paises-list').append(pais);
                }else{ //if user updated an existing record
                    $("#pais" + pais_id).replaceWith( pais );
                }
                $('#frmpaiss').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete pais and remove it from TABLE list ***************************
    $(document).on('click','.delete-pais',function(){
        var pais_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + pais_id,
            success: function (data) {
                console.log(data);
                $("#pais" + pais_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});