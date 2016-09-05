<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
// session_start();
 header('Content-Type: text/html; charset=ISO-8859-1');
  
//Conexion a la base de datos
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect(); 
	include_once 'elevation19_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
    $opcion_menu=1;
//buscar la ciudad
function buscar_ciudad($ciudad,$db)
	{
		$sql = "SELECT * FROM el_area WHERE id_area=$ciudad";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		   return $record['ciudad'];
		}
	
	
	};

//buscar titulo del cupon
function buscar_titulo($id,$db)
	{
		$sql = "SELECT * FROM el_cupones WHERE id=$id";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		   return $record['titulo'];
		}
	
	
	};	
//buscar los datos del cliente
 $sql = "SELECT * FROM el_usuarios WHERE id_usuario=$_SESSION[SESS_USUARIO_ID]";
		//echo $sql;
		$row = $db->query($sql); 
		
		if($db->affected_rows > 0){
				 $member = mysql_fetch_assoc($row);
				  $usuario		=$member['usuario'];
				  $nombres		=$member['nombres'];
			 	  $apellidos	=$member['apellidos'];
				  $telefono		=$member['telefono'];
				  $sexo			=$member['genero'];
				  $dia			=$member['dia'];
				  $mes			=$member['mes'];
				  $anio			=$member['anio'];
				  $ciudad		=$member['ciudad'];
				  $img		    =$member['img'];
		};	
	
  
?>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
     <link href="../assets/css/elevation19m.css" rel="stylesheet">
    
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	 <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     
	<!-- CSS validation -->	   
	    <link rel="stylesheet" href="../assets/validate/validationEngine.jquery.css" type="text/css"/>
	<!-- CSS countdown -->	
		<link rel="stylesheet" href="../assets/css/jquery.countdown.css" type="text/css"/>  
	<!-- CSS comments -->		
		<link href="../assets/comments/screen.css" media="screen" rel="stylesheet" type="text/css" />	
		
		
 <style>
	    .navbar-inner {
min-height: 50px;
}
    .navbar .brand {
float: left;
display: block;
padding: 8px 75px 12px;
margin-left: -20px;
font-size: 20px;
font-weight: 200;
line-height: 1;
color: #999;
margin-top:10px;
}
.navbar .nav {
position: relative;
left: 0;
display: block;
float: left;
margin: 18px 10px 0 0;

}
/*footer*/
#footer_space {
    background-color:#CC080B;
    border-bottom: 1px dashed #FFF;
    clear: both;
    float: left;
    height: 5px;
    min-width: 1040px;
    width: 100%;
}


	 </style>
	<style>
				div.dataTables_length label {
				position:absolute;
				left:170px;
					float: left;
					text-align: left;
				}

				div.dataTables_length select {
				position:absolute;
				left:130px;
					width: 75px;
					
				}

				div.dataTables_filter label {
					float: right;
				}

				div.dataTables_info {
				position:absolute;
				left:170px;
					padding-top: 8px;
				}

				div.dataTables_paginate {
					float: right;
					margin: 0;
				}

				table.table {
					clear: both;
					margin-bottom: 6px !important;
				}

				table.table thead .sorting,
				table.table thead .sorting_asc,
				table.table thead .sorting_desc,
				table.table thead .sorting_asc_disabled,
				table.table thead .sorting_desc_disabled {
					cursor: pointer;
					*cursor: hand;
				}

				table.table thead .sorting { background: url('../assets/img/sort_both.png') no-repeat center right; }
				table.table thead .sorting_asc { background: url('../assets/img/sort_asc.png') no-repeat center right; }
				table.table thead .sorting_desc { background: url('../assets/img/sort_desc.png') no-repeat center right; }

				table.table thead .sorting_asc_disabled { background: url('images/sort_asc_disabled.png') no-repeat center right; }
				table.table thead .sorting_desc_disabled { background: url('images/sort_desc_disabled.png') no-repeat center right; }

				table.dataTable th:active {
					outline: none;
				}
				</style> 
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
  
  
 <!-- header  ================================================== -->
 <?php include('elevation19_header.php');?>
<!-- ================================================== header -->
<br/><br/>
<div class="container-fluid">

<!-- ===================Ventana modal de impresion del cupon=============================== -->
<style>

.modal {  width: 810px;
    margin-left: -390px; /* - width/2 */ }
</style>
<div class="modal hide" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">�</button>
    <h3>Impresi�n del cup�n</h3>
  </div>
    <div class="modal-body">
 		 <iframe name="bookId" id="bookId" src="" width="100%" height="410px" scrolling="no" marginheight="0" marginwidth="0" frameborder="0" ></iframe>
		 
    </div>
	<div class="modal-footer">
        <a href="#" class="btn btn-success" id="imprimecupon"  onClick="document.getElementById('bookId').contentWindow.print();">Imprimir</a>
        <a href="#" class="btn" data-dismiss="modal">Close</a>

    </div>
</div>
<!-- ===================FIN Ventana modal de impresion del cupon=============================== -->


  <div class="span12">

     <h2><?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?></h2>
          <p>Control de Cupones.</p>
    <div class="row-fluid">

	<div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#lA"><i class="icon-ok"></i> Disponibles</a></li>
          <li class=""><a data-toggle="tab" href="#lB"><i class="icon-remove"></i> Canjeados</a></li>
          <li class=""><a data-toggle="tab" href="#lC"><i class="icon-ban-circle"></i> Vencidos</a></li>
        </ul>
        <div class="tab-content">
          <div id="lA" class="tab-pane active">
            <fieldset>
			<legend>Listado de Cupones Adquiridos (Disponibles)</legend>
	
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Cupon</th>
							<th>Adquirido</th>
							<th>Valido hasta</th>
							<th>Codigo</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
					<?php
					  $user=$_SESSION['SESS_USUARIO_ID']; 
					  $sql = "SELECT * FROM el_cupones_usuarios LEFT JOIN el_empresas ON el_cupones_usuarios.empresa_id=el_empresas.id_empresa   
					  WHERE  el_cupones_usuarios.usuario=$user and canje=0 and hasta >= NOW() and esevento='no' ";
					  //echo $sql;
					  $rows = $db->query($sql);
						while ($record = $db->fetch($rows)) {
						    $titulo=buscar_titulo($record['cupon_id'],$db);
							echo "<tr>
								  <td>$record[empresa]</td>
								  <td>$titulo</td>
								  <td>$record[fecha_registro]</td>
								  <td>$record[hasta]</td>";
								  
								if ($record['habilitado']<>0){								
								   echo "<td>$record[codigo]</td>";
								   echo "<td><a data-toggle='modal' data-id='elevation19_print_cupon.php?id=$record[cupon_id]' title='Imprimir el cup�n' class='open-AddBookDialog btn btn-mini' href='#addBookDialog'><i class='icon-print'></i></a></td>
								  </tr>";
								  }else{
								    echo " <td align='left'>En Espera</td>";
									 echo " <td align='left'>En Espera</td>";
								   };
								  
						}	?>	
		
						</tbody>
					</table>
			</fieldset>		
          </div>
          <div id="lB" class="tab-pane">
			<fieldset>
			<legend>Listado de Cupones Canjeados </legend>
	
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Cupon</th>
							<th>Adquirido</th>
							<th>Canjeado</th>
							<th>Codigo</th>
						</tr>
					</thead>
					<tbody>
					<?php
					  $user=$_SESSION['SESS_USUARIO_ID']; 
					  $sql = "SELECT * FROM el_cupones_usuarios LEFT JOIN el_empresas ON el_cupones_usuarios.empresa_id=el_empresas.id_empresa   
					  WHERE  el_cupones_usuarios.usuario=$user and canje=1 and esevento='no' ";
					  //echo $sql;
					  $rows = $db->query($sql);
						while ($record = $db->fetch($rows)) {
						    $titulo=buscar_titulo($record['cupon_id'],$db);
							echo "<tr>
								  <td>$record[empresa]</td>
								  <td>$titulo</td>
								  <td>$record[fecha_registro]</td>
								  <td>$record[fecha_canje]</td>
								  <td>$record[codigo]</td>
								  </tr>";  
								  
						}	?>	
		
						</tbody>
					</table>
			</fieldset>	
          </div>
          <div id="lC" class="tab-pane">
   <fieldset>
			<legend>Listado de Cupones Vencidos </legend>
	
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example3">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Cupon</th>
							<th>Adquirido</th>
							<th>Valido hasta</th>
							<th>Codigo</th>
						</tr>
					</thead>
					<tbody>
					<?php
					  $user=$_SESSION['SESS_USUARIO_ID']; 
					  $sql = "SELECT * FROM el_cupones_usuarios LEFT JOIN el_empresas ON el_cupones_usuarios.empresa_id=el_empresas.id_empresa   
					  WHERE  el_cupones_usuarios.usuario=$user and hasta < NOW() and canje=0 and esevento='no' ";
					  //echo $sql;
					  $rows = $db->query($sql);
						while ($record = $db->fetch($rows)) {
						    $titulo=buscar_titulo($record['cupon_id'],$db);
							echo "<tr>
								  <td>$record[empresa]</td>
								  <td>$titulo</td>
								  <td>$record[fecha_registro]</td>
								  <td>$record[hasta]</td>
								  <td>$record[codigo]</td>
								  </tr>";  
								  
						}	?>	
		
						</tbody>
					</table>
			</fieldset>	          </div>
        </div>
      </div>
	
	
	
	</div>			


</div>

</div>

<br/><br/><br/><br/>
<!--FOOTER-->
<?php include 'elevation19_footer.php';?>
<!--FOOTER-->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
  
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

	  <script src="../assets/js/bootstrap-tooltip.js"></script>

 <script src="../assets/js/jquery.dataTables.js"></script>
    <script>
	/* Default class modification */
$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
} );

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}

/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
} );

/* Table initialisation */
$(document).ready(function() {
	$('#example').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ Cupones por pagina",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Por favor espere - Cargando...",
			"sZeroRecords": "No hay registros disponibles",
			"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ Cupones",
			"sZeroRecords": "No se encotraron registros",
			 "sInfoEmpty": "0 Registros",
		}
	} );
	$('#example2').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ Cupones por pagina",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Por favor espere - Cargando...",
			"sZeroRecords": "No hay registros disponibles",
			"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ Cupones",
			"sZeroRecords": "No se encotraron registros",
			 "sInfoEmpty": "0 Registros",
		}
	} );
	$('#example3').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ Cupones por pagina",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Por favor espere - Cargando...",
			"sZeroRecords": "No hay registros disponibles",
			"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ Cupones",
			"sZeroRecords": "No se encotraron registros",
			 "sInfoEmpty": "0 Registros",
		}
	} );
} );


$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     //$(".modal-body #bookId").val( myBookId );
	 $(".modal-body #bookId").attr("src",myBookId)
    $('#addBookDialog').modal('show');
});

</script>

	  
	  
	  
	
  </body>
</html>
