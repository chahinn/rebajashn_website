<?php
/*
 @! SAC_ADMIN v3.0
 @@ Sistema de apoyo y control administrativo
 -----------------------------------------------------------------------------
 ** author: Eduardo Garcia
 ** website: http://www.grupoletiz.com
 ** email: egarciazd@gmail.com
 -----------------------------------------------------------------------------
 @@package: DashBoard 1.0
 */

header('Content-Type: text/html; charset=ISO-8859-1');
date_default_timezone_set('America/El_Salvador');
setlocale(LC_TIME, 'spanish');
session_start();

/*Incluir la base de datos*/

require_once('../../inc/database.php');
error_reporting(0);
include "../../inc/secure.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Bootstrap, from Twitter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		
		<link rel='stylesheet' type='text/css' href='../../assets/css/bootstrap.css'>


		<style type="text/css">
			  body {
        		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		      }
		</style>
		<link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="../assets/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
		
		
	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#">Project name</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li>
								<a href="#" onClick="window.location.reload()"><i class="icon-home icon-white"></i> Inicio</a>
							</li>

						</ul>

					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>


<div class="container">

      <h3>Control de Eventos</h3>
     

			<!-- codigo del CRUD-->
				
				<?php

		################################################################################   
		## +---------------------------------------------------------------------------+
		## | 1. Creating & Calling:                                                    | 
		## +---------------------------------------------------------------------------+
		##  *** only relative (virtual) path (to the current document)
		  
		 
		  define ("DATAGRID_DIR", "../../assets/datagrid/");
		  define ("PEAR_DIR", "../../assets/datagrid/pear/");
		  
		  require_once(DATAGRID_DIR.'datagrid.class.php');
		  require_once(PEAR_DIR.'PEAR.php');
		  require_once(PEAR_DIR.'DB.php');
		
		##  *** creating variables that we need for database connection 
		  $DB_USER=$db_user ;            
		  $DB_PASS=$db_password;           
		  $DB_SERVER=$db_server;       
		  $DB_DATABASE=$db_name;    
		
		ob_start();
		  $db_conn = DB::factory('mysql'); 
		  $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_SERVER.'/'.$DB_DATABASE));
		
		 
		
		##  *** put a primary key on the first place 
		  $sql="SELECT *, el_empresas.empresa as empre, el_categorias.categoria as catego FROM el_cupones,el_empresas,el_categorias where el_cupones.empresa=el_empresas.id_empresa and el_cupones.categoria=el_categorias.id_categoria";
		   
		##  *** set needed options
		  $debug_mode = false;
		  $messaging = true;
		  $unique_prefix = "f_";  
		  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
		##  *** set data source with needed options
		  $default_order_field = "id";
		  $default_order_type = "ASC";
		  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
		##
		##
		## +---------------------------------------------------------------------------+
		## | 2. General Settings:                                                      | 
		## +---------------------------------------------------------------------------+
		
		 
		##  *** set encoding and collation (default: utf8/utf8_unicode_ci)
		$dg_encoding = "utf8";
		$dg_collation = "utf8_unicode_ci"; 
		$dgrid->SetEncoding($dg_encoding, $dg_collation);
		##  *** set interface language (default - English)
		##  *** (en) - English     (de) - German     (se) Swedish     (hr) - Bosnian/Croatian
		##  *** (hu) - Hungarian   (es) - Espanol    (ca) - Catala    (fr) - Francais
		##  *** (nl) - Netherlands/"Vlaams"(Flemish) (it) - Italiano  (pl) - Polish
		##  *** (ch) - Chinese     (sr) - Serbian
		 $dg_language = "en";  
		 $dgrid->setInterfaceLang($dg_language);
		##  *** set direction: "ltr" or "rtr" (default - "ltr")
		 //$direction = "ltr";
		 //$dgrid->setDirection($direction);
		##  *** set layouts: 0 - tabular(horizontal) - default, 1 - columnar(vertical) 
		 //$layouts = array("view"=>0, "edit"=>1, "filter"=>1); 
		 //$dgrid->setLayouts($layouts);
		##  *** set modes for operations ("type" => "link|button|image") 
		##  *** "byFieldValue"=>"fieldName" - make the field to be a link to edit mode page
		 $modes = array(
			"add"	 =>array("view"=>true, "edit"=>false, "type"=>"link"),
			"edit"	 =>array("view"=>true, "edit"=>true,  "type"=>"link", "byFieldValue"=>""),
			"cancel"  =>array("view"=>true, "edit"=>true,  "type"=>"link"),
			"details" =>array("view"=>true, "edit"=>false, "type"=>"link"),
			"delete"  =>array("view"=>true, "edit"=>true,  "type"=>"image")
		 );
		 $dgrid->setModes($modes);
		##  *** allow scrolling on datagrid
		/// $scrolling_option = false;
		/// $dgrid->allowScrollingSettings($scrolling_option);  
		##  *** set scrolling settings (optional)
		/// $scrolling_width = "90%";
		/// $scrolling_height = "100%";
		/// $dgrid->setScrollingSettings($scrolling_width, $scrolling_height);
		##  *** allow mulirow operations
/*		 $multirow_option = false;
		 $dgrid->allowMultirowOperations($multirow_option);
		 $multirow_operations = array(
			"delete"  => array("view"=>true),
			"details" => array("view"=>true)
		 );
		 $dgrid->setMultirowOperations($multirow_operations);  
*/		##  *** set CSS class for datagrid
		##  *** "default" or "blue" or "gray" or "green" or your css file relative path with name
		 $css_class = "gray";
		## "embedded" - use embedded classes, "file" - link external css file
		 $css_type = "embedded"; 
		 $dgrid->setCssClass($css_class, $css_type);
		##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
		/// $http_get_vars = array("act", "id");
		/// $dgrid->setHttpGetVars($http_get_vars);
		##  *** set other datagrid/s unique prefixes (if you use few datagrids on one page)
		##  *** format (in wich mode to allow processing of another datagrids)
		##  *** array("unique_prefix"=>array("view"=>true|false, "edit"=>true|false, "details"=>true|false));
		 /*$anotherDatagrids = array("fp_"=>array("view"=>false, "edit"=>true, "details"=>true));
		 $dgrid->setAnotherDatagrids($anotherDatagrids);  */
			##  *** set DataGrid caption
 $dg_caption = " ";
 $dgrid->setCaption($dg_caption);
		 ##
		## +---------------------------------------------------------------------------+
		## | 3. Printing & Exporting Settings:                                         | 
		## +---------------------------------------------------------------------------+
		##  *** set printing option: true(default) or false 
		 $printing_option = true;
		 $dgrid->allowPrinting($printing_option);
		##  *** set exporting option: true(default) or false 
		 $exporting_option = true;
		 $dgrid->allowExporting($exporting_option);
		##
		## +---------------------------------------------------------------------------+
		## | 4. Sorting & Paging Settings:                                             | 
		## +---------------------------------------------------------------------------+
		##  *** set sorting option: true(default) or false 
		 $sorting_option = true;
		 $dgrid->allowSorting($sorting_option);               
		##  *** set paging option: true(default) or false 
		 $paging_option = true;
		 $rows_numeration = false;
		 $numeration_sign = "N #";       
		 $dgrid->allowPaging($paging_option, $rows_numeration, $numeration_sign);
		##  *** set paging settings
		 $bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
		 $top_paging = array();
		 $pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000");
		 $default_page_size = 10;
		 $dgrid->setPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);
		##
		##
		## +---------------------------------------------------------------------------+
		## | 5. Filter Settings:                                                       | 
		## +---------------------------------------------------------------------------+
		##  *** set filtering option: true or false(default)
		 $filtering_option = false;
		 $dgrid->allowFiltering($filtering_option);
		##  *** set aditional filtering settings
		  $fill_from_array = array("10000"=>"10000", "250000"=>"250000", "5000000"=>"5000000", "25000000"=>"25000000", "100000000"=>"100000000");
		  $filtering_fields = array(
			"Country"     =>array("table"=>"countries", "field"=>"name", "source"=>"self", "operator"=>true, "default_operator"=>"like", "type"=>"textbox", "case_sensitive"=>true,  "comparison_type"=>"string"),
			"Region"      =>array("table"=>"regions",   "field"=>"name", "source"=>"self", "order"=>"DESC", "operator"=>true, "type"=>"dropdownlist", "case_sensitive"=>false,  "comparison_type"=>"binary"),
			"Date"        =>array("table"=>"countries", "field"=>"independent_date", "source"=>"self", "operator"=>true, "type"=>"textbox", "case_sensitive"=>false,  "comparison_type"=>"string"),      
			"Population"  =>array("table"=>"countries", "field"=>"population", "source"=>$fill_from_array, "order"=>"DESC", "operator"=>true, "type"=>"dropdownlist", "case_sensitive"=>false, "comparison_type"=>"numeric")
		  );
		  $dgrid->setFieldsFiltering($filtering_fields);
		##
		## 
		## +---------------------------------------------------------------------------+
		## | 6. View Mode Settings:                                                    | 
		## +---------------------------------------------------------------------------+
		##  *** set view mode table properties
		 $vm_table_properties = array("width"=>"90%");
		 $dgrid->SetViewModeTableProperties($vm_table_properties);  
		##  *** set columns in view mode
		##  *** Ex.: "on_js_event"=>"onclick='alert(\"Yes!!!\");'"
		##  ***      "barchart" : number format in SELECT SQL must be equal with number format in max_value
		/// $fill_from_array = array("0"=>"Banned", "1"=>"Active", "2"=>"Closed", "3"=>"Removed"); /* as "value"=>"option" */
		  $vm_colimns = array(
		    "titulo"=>array("header"=>"Titulo", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
            "catego"=>array("header"=>"Categoria", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
            "empre"=>array("header"=>"Empresa", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
            "desde"=>array("header"=>"Desde", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
            "hasta"=>array("header"=>"Hasta", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
            "activo"     =>array("header"=>"Activo", "type"=>"label", "align"=>"center",  "header_tooltip"=>"", "wrap"=>"nowrap", "text_length"=>"30", "case"=>"normal"),                         

    "adquiridos" =>array("header"=>"Adquiridos", "type"=>"label", "align"=>"center",  "header_tooltip"=>"", "wrap"=>"nowrap", "text_length"=>"30", "case"=>"normal"),                         
    "impresos"     =>array("header"=>"Impresos", "type"=>"label", "align"=>"center",  "header_tooltip"=>"", "wrap"=>"nowrap", "text_length"=>"30", "case"=>"normal"),                         

		 );
		 $dgrid->SetColumnsInViewMode($vm_colimns);
		##  *** set auto-genereted columns in view mode
		//  $auto_column_in_view_mode = false;
		//  $dgrid->SetAutoColumnsInViewMode($auto_column_in_view_mode);
		##
		##
		## +---------------------------------------------------------------------------+
		## | 7. Add/Edit/Details Mode Settings:                                        | 
		## +---------------------------------------------------------------------------+
		##  *** set add/edit mode table properties
		 $em_table_properties = array("width"=>"70%");
		 $dgrid->SetEditModeTableProperties($em_table_properties);
		##  *** set details mode table properties
		 $dm_table_properties = array("width"=>"70%");
		  $dgrid->SetDetailsModeTableProperties($dm_table_properties);
		##  ***  set settings for add/edit/details modes
		  $table_name  = "el_cupones";
		  $primary_key = "id";
		//  $condition   = "table_name.field = ".$_REQUEST['abc_rid'];
		  $dgrid->SetTableEdit($table_name, $primary_key);
		##  *** set columns in edit mode   
		##  *** first letter:  r - required, s - simple (not required)
		##  *** second letter: t - text(including datetime), n - numeric, a - alphanumeric,
		##                     e - email, f - float, y - any, l - login name, z - zipcode,
		##                     p - password, i - integer, v - verified, c - checkbox, u - URL
		##  *** third letter (optional): 
		##          for numbers: s - signed, u - unsigned, p - positive, n - negative
		##          for strings: u - upper,  l - lower,    n - normal,   y - any
		##  *** Ex.: "on_js_event"=>"onclick='alert(\"Yes!!!\");'"
		##  *** Ex.: type = textbox|textarea|label|date(yyyy-mm-dd)|datedmy(dd-mm-yyyy)|datetime(yyyy-mm-dd hh:mm:ss)|datetimedmy(dd-mm-yyyy hh:mm:ss)|time(hh:mm:ss)|image|password|enum|print|checkbox
		##  *** make sure your WYSIWYG dir has 777 permissions
		/// $fill_from_array = array("0"=>"No", "1"=>"Yes", "2"=>"Don't know", "3"=>"My be"); /* as "value"=>"option" */
		$em_columns = array(
		 "delimiter_0"   =>array("inner_html"=>"<div style='padding:5px;'>Textbox and dropdown list fields: They are basic fields for each DataGrid. Supplier is an example of Foreign Key with possibility to select value from dropdown list.</div>"),
		    "titulo"  =>array("header"=>"Titulo", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
	        "categoria"=>array("header"=>"Categoria", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
			"empresa"=>array("header"=>"empresa", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
			"ciudad"=>array("header"=>"Ciudad", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),

			"valor"        =>array("header"=>"Valor oferta", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
			"anterior"        =>array("header"=>"Valor anterior", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
			"descuento"        =>array("header"=>"Valor descuento", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
			"ahorro"        =>array("header"=>"Valor ahorro", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),

			"brevedescripcion"  =>array("header"=>"Breve Descripcion", "type"=>"textarea",   "req_type"=>"sy", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"1024", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"wysiwyg", "resizable"=>"false", "rows"=>"10", "cols"=>"50"),
			"descripcion"  =>array("header"=>"Descripcion", "type"=>"textarea",   "req_type"=>"sy", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"1024", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"wysiwyg", "resizable"=>"false", "rows"=>"10", "cols"=>"50"),
            "terminos"  =>array("header"=>"Terminos", "type"=>"textarea",   "req_type"=>"sy", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"3024", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"wysiwyg", "resizable"=>"false", "rows"=>"10", "cols"=>"50"),
            "direccion"  =>array("header"=>"Ubicacion", "type"=>"textarea",   "req_type"=>"sy", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"1024", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"wysiwyg", "resizable"=>"false", "rows"=>"10", "cols"=>"50"),

         	"desde"  =>array("header"=>"Disponible desde", "type"=>"datetime",   "req_type"=>"st", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),
            "hasta"  =>array("header"=>"Disponible hasta", "type"=>"datetime",   "req_type"=>"st", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),
            // "bk_cupon" =>array("header"=>"Color del cupon", "type"=>"enum","req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", 	"default"=>"no", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist"),
            "img"=>array("header"=>"Imagen del cupon","type"=>"image","req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>false, 
			"maxlength"=>"-1", "default"=>"", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "target_path"=>"../../../members/img_cupones/", 
				 "max_file_size"=>"2500K", "image_width"=>"250px", "image_height"=>"250px", "file_name"=>"", "host"=>"local"),	
		   "ofertadeldia" =>array("header"=>"Oferta del Dia", "type"=>"enum","req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", 	"default"=>"no", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist"),				 
		   "ofertadiadesde"  =>array("header"=>"Oferta dia desde", "type"=>"datetime",   "req_type"=>"st", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),
           "ofertadiahasta"  =>array("header"=>"Oferta dia hasta", "type"=>"datetime",   "req_type"=>"st", "width"=>"187px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "calendar_type"=>"floating"),
       
// "recientes" =>array("header"=>"Mostar en recientes", "type"=>"enum","req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", 	"default"=>"no", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist"),				 
// "slider" =>array("header"=>"Mostar en Slider", "type"=>"enum","req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", 	"default"=>"no", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist"),
// "slider_color" =>array("header"=>"Color del Slider", "type"=>"enum","req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", 	"default"=>"no", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist"),
 	
//	 "titulo_publicitario"  =>array("header"=>"Titulo publicitario", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
//	  "descri_publicitaria"  =>array("header"=>"Descripcion publicitaria", "type"=>"textarea",   "req_type"=>"sy", "width"=>"500px", "title"=>"", "readonly"=>"false", "maxlength"=>"255", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "edit_type"=>"wysiwyg", "resizable"=>"false", "rows"=>"10", "cols"=>"50"),
	  
//	    "img_publicitaria"=>array("header"=>"Imagen publicitaria","type"=>"image","req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>false, 
//				 "maxlength"=>"-1", "default"=>"", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "target_path"=>"../img_publicitaria/", 
//				 "max_file_size"=>"2500K", "image_width"=>"250px", "image_height"=>"250px", "file_name"=>"", "host"=>"local"),			
//		  "enlace_publicitario"=>array("header"=>"Sitio web", "type"=>"text", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),					 

  			"limiteadquirir" =>array("header"=>"Limite adquirir", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
            "esevento" =>array("header"=>"Es evento", "type"=>"enum","req_type"=>"rt", "width"=>"20px", "title"=>"", "readonly"=>false, "maxlength"=>"-1", 	"default"=>"no", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist"),
             "activo" =>array("header"=>"activo", "type"=>"checkbox",   "req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"1", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "true_value"=>1, "false_value"=>0),
	 
	   );
		 $dgrid->SetColumnsInEditMode($em_columns);
		##  *** set auto-genereted columns in edit mode
		//  $auto_column_in_edit_mode = false;
		//  $dgrid->SetAutoColumnsInEditMode($auto_column_in_edit_mode);
		##  *** set foreign keys for add/edit/details modes (if there are linked tables)
		##  *** Ex.: "field_name"=>"CONCAT(field1,','field2) as field3" 
		##  *** Ex.: "condition"=>"TableName_1.FieldName > 'a' AND TableName_1.FieldName < 'c'"
		##  *** Ex.: "on_js_event"=>"onclick='alert(\"Yes!!!\");'"
		  $foreign_keys = array(
		///     "ForeignKey_1"=>array("table"=>"TableName_1", "field_key"=>"FieldKey_1", "field_name"=>"FieldName_1", "view_type"=>"dropdownlist(default)|radiobutton|textbox", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"", "order_type"=>"ASC|DESC", "on_js_event"=>""),
		///     "ForeignKey_2"=>array("table"=>"TableName_2", "field_key"=>"FieldKey_2", "field_name"=>"FieldName_2", "view_type"=>"dropdownlist(default)|radiobutton|textbox", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"", "order_type"=>"ASC|DESC", "on_js_event"=>"")
		 "categoria"=>array("table"=>"el_categorias", "field_key"=>"id_categoria", "field_name"=>"categoria", "view_type"=>"dropdownlist", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"id_categoria", "order_type"=>"ASC", "on_js_event"=>""),
 		 "empresa"=>array("table"=>"el_empresas", "field_key"=>"id_empresa", "field_name"=>"empresa", "view_type"=>"dropdownlist", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"id_empresa", "order_type"=>"ASC", "on_js_event"=>""),
 		 "ciudad"=>array("table"=>"el_area", "field_key"=>"id_area", "field_name"=>"ciudad", "view_type"=>"dropdownlist", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"habilitada='si'", "order_by_field"=>"id_area", "order_type"=>"ASC", "on_js_event"=>""),
         
 

		 ); 
		 $dgrid->SetForeignKeysEdit($foreign_keys);
		##
		##
		################################################################################   

		  
		## +---------------------------------------------------------------------------+
		## | 8. Bind the DataGrid:                                                     | 
		## +---------------------------------------------------------------------------+
		##  *** set debug mode & messaging options
			$dgrid->bind();        
			ob_end_flush();
		################################################################################   

?>	

			
			
			
			<!-- fin del codigo del crud-->
			<hr>

			<footer>
				<p>
					&copy; Company 2012
				</p>
			</footer>

		</div><!--/.fluid-container-->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../../assets/js/jquery.js"></script>
		<script src="../../assets/js/bootstrap-transition.js"></script>
		<script src="../../assets/js/bootstrap-alert.js"></script>
		<script src="../../assets/js/bootstrap-modal.js"></script>
		<script src="../../assets/js/bootstrap-dropdown.js"></script>
		<script src="../../assets/js/bootstrap-scrollspy.js"></script>
		<script src="../../assets/js/bootstrap-tab.js"></script>
		<script src="../../assets/js/bootstrap-tooltip.js"></script>
		<script src="../../assets/js/bootstrap-popover.js"></script>
		<script src="../../assets/js/bootstrap-button.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {

			});

			//Funciones Adicionales

		</script>

	</body>
</html>
