  $(document).ready(function () {
	//Add the pais
	$("#addPais").validate({
		 rules: {
				txtNombre: "required"
			},
			messages: {
				required: "Es requerido el campo"
			},

		 submitHandler: function(form) {
		  var form_action = $("#addPais").attr("action");
		  $.ajax({
			  data: $('#addPais').serialize(),
			  url: form_action,
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				  var pais = '<tr id="'+data.id+'">';
				  pais += '<td>' + data.id + '</td>';
				  pais += '<td>' + data.pais + '</td>';
				  pais += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
				  pais += '</tr>';
				  $('#paisTable tbody').prepend(pais);
				  $('#addPais')[0].reset();
				  $('#addModal').modal('hide');
				  location.reload();
			  },
			  error: function (data) {
			  }
		  });
		}
	});


    //When click edit pais
    $('body').on('click', '.btnEdit', function () {
      var id = $(this).attr('data-id');
      $.get('paises/' + id +'/edit', function (data) {
          $('#updateModal').modal('show');
          $('#updatePais #hdnPaisId').val(data.id);
          $('#updatePais #txtNombre').val(data.pais);
      })
   });
    // Update the pais
	$("#updatePais").validate({
		 rules: {
				txtNombre: "required",

			},
			messages: {
				required: "Es requerido el campo"
			},

		 submitHandler: function(form) {
		  var form_action = $("#updatePais").attr("action");
		  $.ajax({
			  data: $('#updatePais').serialize(),
			  url: form_action,
			  type: "PUT",
			  dataType: 'json',
			  success: function (data) {
				  var pais = '<td>' + data.id + '</td>';
				  pais += '<td>' + data.pais + '</td>';
				  pais += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
				  $('#paisTable tbody #'+ data.id).html(pais);
				  $('#updatePais')[0].reset();
				  $('#updateModal').modal('hide');
				  location.reload();
			  },
			  error: function (data) {
			  }
		  });
		}
	});
	$('body').on('click', '.btnDelete', function () {
	      var pais_id = $(this).attr('data-id');
	      $.get('pais/' + pais_id +'/delete', function (data) {
	          $('#paisTable tbody #'+ pais_id).remove();
	      })
	   });

	$("#pais-table").DataTable({
      "language": {
	        "sProcessing":     "Procesando...",
	        "sLengthMenu":     "Mostrar _MENU_ registros",
	        "sZeroRecords":    "No se encontraron resultados",
	        "sEmptyTable":     "Ningún dato disponible en esta tabla",
	        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	        "sInfoPostFix":    "",
	        "sSearch":         "Buscar:",
	        "sUrl":            "",
	        "sInfoThousands":  ",",
	        "sLoadingRecords": "Cargando...",
	        "oPaginate": {
	            "sFirst":    "Primero",
	            "sLast":     "Último",
	            "sNext":     "Siguiente",
	            "sPrevious": "Anterior"
	        },
	        "oAria": {
	            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	        		}
       }
    });

});