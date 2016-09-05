<?php
//Conexiones a la base de datos
require_once("../inc/config.inc.php");
require("../inc/Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 
error_reporting(0);

?>

<!DOCTYPE html>
<html>
    <head> 
	  <link href="css/style_<?php echo _CSS_STYLE;?>.css" type=text/css rel=stylesheet> 
	</head>

    <body class="white whitealt">
        
               

<!-- horizontal -->	
	<div id="resultado"></div>
			
<?php
		################################################################################   
		## +---------------------------------------------------------------------------+
		## | 1. Creating & Calling:                                                    | 
		## +---------------------------------------------------------------------------+
		##  *** only relative (virtual) path (to the current document)
		  define ("DATAGRID_DIR", "../modules/datagrid/");
		  define ("PEAR_DIR", "../modules/datagrid/pear/");
		  
		  require_once(DATAGRID_DIR.'datagrid.class.php');
		  require_once(PEAR_DIR.'PEAR.php');
		  require_once(PEAR_DIR.'DB.php');
		
		##  *** creating variables that we need for database connection 
		  $DB_USER=DB_USER;            
		  $DB_PASS=DB_PASS;           
		  $DB_SERVER=DB_SERVER;       
		  $DB_DATABASE=DB_DATABASE;   
		
		ob_start();
		  $db_conn = DB::factory('mysql'); 
		  $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_SERVER.'/'.$DB_DATABASE));
		
		 
		
		##  *** put a primary key on the first place 
		  $sql="SELECT * FROM el_empresas";
		   
		##  *** set needed options
		  $debug_mode = false;
		  $messaging = true;
		  $unique_prefix = "f_";  
		  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
		##  *** set data source with needed options
		  $default_order_field = "id_empresa";
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
		 $dgrid->setEncoding($dg_encoding, $dg_collation);
		##  *** set interface language (default - English)
		##  *** (en) - English     (de) - German     (se) Swedish     (hr) - Bosnian/Croatian
		##  *** (hu) - Hungarian   (es) - Espanol    (ca) - Catala    (fr) - Francais
		##  *** (nl) - Netherlands/"Vlaams"(Flemish) (it) - Italiano  (pl) - Polish
		##  *** (ch) - Chinese     (sr) - Serbian
		 $dg_language = "es";  
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
 $dg_caption = "
 <div id='headerhome' >
	  <a href='#' id='logo1'>SAC</a>
	  <ul id='service'>
		<li><a href='el_empresas_crud.php'>Control de Empresas </a></li>
	  </ul>
 </div>
  <br/>
  <div id='breadcrumb'>
       <a class='home' href='el_empresas_crud.php'>Inicio</a>
	 
	
  </div> ";
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
		    "empresa"=>array("header"=>"empresa", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
            "telefono"=>array("header"=>"Telefono", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
		    "correo"=>array("header"=>"correo", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
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
		  $table_name  = "el_empresas";
		  $primary_key = "id_empresa";
		//  $condition   = "table_name.field = ".$_REQUEST['abc_rid'];
		  $dgrid->SetTableEdit($table_name, $primary_key, $condition);
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
		     "empresa"        =>array("header"=>"Empresa", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
			   "clave"        =>array("header"=>"Clave para Empresa", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
                "telefono"        =>array("header"=>"telefono", "type"=>"textbox", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
                "correo"        =>array("header"=>"Correo", "type"=>"textbox", "req_type"=>"re", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),
	         "categoria_id"=>array("header"=>"Categoria", "type"=>"label", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "tooltip"=>"false", "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower|camel", "summarize"=>"false", "sort_type"=>"string|numeric", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
				"descripcion"        =>array("header"=>"Descripcion", "type"=>"textarea", "req_type"=>"rt", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>""),		
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
		// "linea_id"=>array("table"=>"linea", "field_key"=>"id_linea", "field_name"=>"linea", "view_type"=>"dropdownlist", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"id_linea", "order_type"=>"ASC", "on_js_event"=>""),
		 	 "categoria_id"=>array("table"=>"el_categorias", "field_key"=>"id_categoria", "field_name"=>"categoria", "view_type"=>"dropdownlist", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"id_categoria", "order_type"=>"ASC", "on_js_event"=>""),

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

    </div>
</div>
             

        
</div> <!-- FIN CONTENT -->        
</body>
<!-- JAVASCRIPTS ADICIONALES --> 
 <script>
 /*Para el cambio del div del content y cargado de las paginas*/

	/*function loadExternalContent(page) {
		     $.ajaxSetup({ 
			cache: false,
			dataType: "html"
			});

			$('#content').load(page)
	}
*/
  
</script>


</html>