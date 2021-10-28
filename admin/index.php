<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sodaec.com</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body style="background-color: #0000001a;">

	 <div class="container mt-3" style="background-color: white; border-radius: 2rem; padding-top: 1rem; padding-bottom: 2rem;">
	 	<form id="formulario1">
		 	<div class="row">
		 		<div class="col-12 text-center mt-3 mb-3" style="font-weight:bold; font-size:50px; text-transform: uppercase;">
		 			SODAEC
		 		</div>

		 		<div class="col-12 text-center mt-3 mb-3" style="font-weight:bold; font-size:20px; text-transform: uppercase;">
		 			Datos de Ingreso
		 		</div>

		 		<div class="col-12">&nbsp;</div>

		 		<div class="col-4 text-right" style="font-weight: bold; font-size: 20px;">Correo:</div>
				<div class="col-4">
					<input type="email" class="form-control" name="correo" id="correo" required>
				</div>

				<div class="col-12">&nbsp;</div>

				<div class="col-4 text-right" style="font-weight: bold; font-size: 20px;">Clave:</div>
				<div class="col-4">
					<input type="password" class="form-control" name="clave" id="clave" required>
				</div>

				<div class="col-12 text-center mt-3">
					<button type="submit" class="btn btn-success">INGRESAR</button>
				</div>
				<div class="col-12 text-center mt-3">
					<a href="#" data-toggle="modal" data-target="#modal_clave">Restablecer clave</a>
				</div>
				<div class="col-12 text-center mt-3">
					<a href="#" data-toggle="modal" data-target="#modal_crearcuenta">¿No tienes cuenta de ingreso?</a>
				</div>
		 	</div>
	 	</form>
    </div>

    <!-- Modal Clave -->
    <div class="modal fade" id="modal_clave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row">
						<div class="col-12 text-center" style="font-weight: bold; font-size: 20px;">MUY PRONTO</div>
					</div>
			    </div>
				<div class="modal-footer"></div>
			</div>
	  	</div>
	</div>
	<!------------------>

	<!-- Modal Clave -->
    <div class="modal fade" id="modal_crearcuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row">
						<div class="col-12 text-center" style="font-weight: bold; font-size: 20px;">MUY PRONTO</div>
					</div>
			    </div>
				<div class="modal-footer"></div>
			</div>
	  	</div>
	</div>
	<!------------------>

	<form id="formulario2" method="POST">
		<input type="hidden" name="id2" id="id2">
		<input type="hidden" name="correo2" id="correo2">
		<input type="hidden" name="clave2" id="clave2">
	</form>

</body>
</html>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
	$(document).ready(function() {
		/*******************PRUEBAS*********************/
		$('#correo').val("juanmaldonado.co@gmail.com");
		$('#clave').val("2421187");
		/***********************************************/
	});

	$('#myModal').on('shown.bs.modal', function () {
	  	$('#myInput').trigger('focus')
	});

	$("#formulario1").on("submit", function(e){
		e.preventDefault();
		var f = $(this);
		var correo = $('#correo').val();
		var clave = $('#clave').val();
		$.ajax({
	        url: '../script/crud_usuarios.php',
	        type: 'POST',
	        dataType: "JSON",
	        data: {
				"correo": correo,
				"clave": clave,
				"condicion": "login1",
			},

	        beforeSend: function (){},

	        success: function(respuesta){
	        	console.log(respuesta);
	        	if(respuesta["estatus"]=='ok'){
	        		$("#formulario2").attr("action","index2.php");
	        		$('#id2').val(respuesta["id"]);
	        		$('#correo2').val(respuesta["correo"]);
	        		$('#clave2').val(respuesta["clave"]);
	        		$('#formulario2').submit();
	        		return false;
	        	}else if(respuesta["estatus"]=="error"){
	        		Swal.fire({
						title: 'Error',
						text: respuesta["msg"],
						icon: 'error',
						position: 'center',
						showConfirmButton: false,
						timer: 2000
					});
	        	}else if(respuesta["estatus"]=="proceso"){
	        		Swal.fire({
						title: 'Error',
						text: respuesta["msg"],
						icon: 'error',
						position: 'center',
						showConfirmButton: false,
						timer: 2000
					});
	        	}else if(respuesta["estatus"]=="inactivo"){
	        		Swal.fire({
						title: 'Error',
						text: respuesta["msg"],
						icon: 'error',
						position: 'center',
						showConfirmButton: false,
						timer: 2000
					});
	        	}
	        },

	        error: function(respuesta){
	           	console.log(respuesta['responseText']);
	        }
	    });
	});
</script>