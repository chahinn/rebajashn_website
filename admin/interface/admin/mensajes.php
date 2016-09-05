<?php
################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 #
## --------------------------------------------------------------------------- #
##  PHP AdminPanel Free                                                        #
##  Developed by:  ApPhp <info@apphp.com>                                      # 
##  License:       GNU GPL v.2                                                 #
##  Site:          http://www.apphp.com/php-adminpanel/                        #
##  Copyright:     PHP AdminPanel (c) 2006-2009. All rights reserved.          #
##                                                                             #
##  Additional modules (embedded):                                             #
##  -- PHP DataGrid 4.2.8                   http://www.apphp.com/php-datagrid/ #
##  -- JS AFV 1.0.5                         http://www.apphp.com/php-datagrid/ #
##  -- jQuery 1.1.2                                         http://jquery.com/ #
##                                                                             #
################################################################################

    // Initialize the session.


    require_once("../inc/config.inc.php");
    require_once("../inc/database.inc.php");
    require_once("../inc/settings.inc.php");

    $db=new Database();	
    $db->open();


    $mode = isset($_GET['meno_mode']) ? $_GET['meno_mode'] : "";
    $rid = isset($_GET['meno_rid']) ? $_GET['meno_rid'] : "";
    $msg = isset($_GET['msg']) ? $_GET['msg'] : "";
    $mgid = isset($_GET['mgid']) ? $_GET['mgid'] : "";
    $moid = isset($_GET['moid']) ? $_GET['moid'] : "";
    $act = isset($_GET['act']) ? $_GET['act'] : "";
    

   
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
    <title><?php echo _SITE_NAME; ?> :: Admin Panel :: Home</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <link href="css/style_<?php echo _CSS_STYLE;?>.css" type=text/css rel=stylesheet>
</head>
<?php

if($msg == "1"){
    echo "<center><font color='#009a00'>This menu option can not be removed, only hidden!</font></center><br>";
}

################################################################################
## +---------------------------------------------------------------------------+
## | 1. Creating & Calling:                                                    | 
## +---------------------------------------------------------------------------+
##  *** define a relative (virtual) path to datagrid.class.php file and "pear" 
##  *** directory (relatively to the current file)
##  *** RELATIVE PATH ONLY ***
//
  define ("DATAGRID_DIR", "../modules/datagrid/");                     /* Ex.: "datagrid/" */
  define ("PEAR_DIR", "../modules/datagrid/pear/");                    /* Ex.: "datagrid/pear/" */

  require_once(DATAGRID_DIR.'datagrid.class.php');
  require_once(PEAR_DIR.'PEAR.php');
  require_once(PEAR_DIR.'DB.php');
##
##  *** creating variables that we need for database connection

  ob_start();
##  *** (example of ODBC connection string)
##  *** $result_conn = $db_conn->connect(DB::parseDSN('odbc://root:12345@test_db'));
##  *** (example of Oracle connection string)
##  *** $result_conn = $db_conn->connect(DB::parseDSN('oci8://root:12345@localhost:1521/mydatabase)); 
##  *** (example of PostgreSQL connection string)
##  *** $result_conn = $db_conn->connect(DB::parseDSN('pgsql://root:12345@localhost/mydatabase)); 
##  === (Examples of connections to other db types see in "docs/pear/" folder)
  $db_conn = DB::factory('mysql');  /* don't forget to change on appropriate db type */
  
  $config = new Config();
  $DB_USER = $config->user;
  $DB_PASS = $config->password;
  $DB_HOST = $config->host;
  $DB_NAME = $config->database;
  
  $result_conn = $db_conn->connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
  if(DB::isError($result_conn)){ die($result_conn->getDebugInfo()); }  
##  *** put a primary key on the first place 
  $sql ="SELECT * from members_mensajes where user_id=".intval($mgid); ;
  
  
 
 
    
##  *** set needed options and create a new class instance 
  $debug_mode = false;        /* display SQL statements while processing */    
  $messaging = true;          /* display system messages on a screen */ 
  $unique_prefix = "meno_";    /* prevent overlays - must be started with a letter */
  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
  
##  *** set data source with needed options
  $default_order_field = "id";
  $default_order_type = "ASC";
  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);
  //$dgrid->mode_after_update = "edit";
##
##
## +---------------------------------------------------------------------------+
## | 2. General Settings:                                                      | 
## +---------------------------------------------------------------------------+
##  *** set encoding and collation (default: utf8/utf8_unicode_ci)
/// $dg_encoding = "utf8";
/// $dg_collation = "utf8_unicode_ci";
/// $dgrid->setEncoding($dg_encoding, $dg_collation);
##  *** set interface language (default - English)
##  *** (en) - English     (de) - German     (se) - Swedish   (hr) - Bosnian/Croatian
##  *** (hu) - Hungarian   (es) - Espanol    (ca) - Catala    (fr) - Francais
##  *** (nl) - Netherlands/"Vlaams"(Flemish) (it) - Italiano  (pl) - Polish
##  *** (ch) - Chinese     (sr) - Serbian    (bg) - Bulgarian (pb) - Brazilian Portuguese
##  *** (ar) - Arabic      (tr) - Turkish    (cz) - Czech
 $dg_language = $SETTINGS['site_language'];  
 $dgrid->setInterfaceLang($dg_language);
##  *** set direction: "ltr" or "rtr" (default - "ltr")
/// $direction = "ltr";
/// $dgrid->setDirection($direction);
##  *** set layouts: "0" - tabular(horizontal) - default, "1" - columnar(vertical), "2" - customized 
/// $layouts = array("view"=>"0", "edit"=>"1", "details"=>"1", "filter"=>"1"); 
/// $dgrid->setLayouts($layouts);
/// $details_template = "<table><tr><td>{field_name_1}</td><td>{field_name_2}</td></tr>...</table>";
/// $dgrid->setTemplates("","",$details_template);
##  *** set modes for operations ("type" => "link|button|image") 
##  *** "byFieldValue"=>"fieldName" - make the field to be a link to edit mode page
 $modes = array(
     "add"	=>array("view"=>true, "edit"=>false, "type"=>"link"),
     "edit"	=>array("view"=>true, "edit"=>true,  "type"=>"link", "byFieldValue"=>""),
     "cancel"   =>array("view"=>true, "edit"=>true,  "type"=>"link"),
     "details"  =>array("view"=>false, "edit"=>false, "type"=>"link"),
     "delete"   =>array("view"=>true, "edit"=>false,  "type"=>"image")
 );
 $dgrid->setModes($modes);
##  *** allow scrolling on datagrid
 $scrolling_option = false;
 $dgrid->allowScrollingSettings($scrolling_option);  
##  *** set scrolling settings (optional)
 $scrolling_width = "90%";
 $scrolling_height = "100%";
 $dgrid->setScrollingSettings($scrolling_width, $scrolling_height);
##  *** allow mulirow operations
 $multirow_option = true;
  $dgrid->allowMultirowOperations($multirow_option);
 $multirow_operations = array(
     "delete"  => array("view"=>true),
     "details" => array("view"=>true),
///     "my_operation_name" => array("view"=>true, "flag_name"=>"my_flag_name", "flag_value"=>"my_flag_value", "tooltip"=>"Do something with selected", "image"=>"image.gif")
 );
 $dgrid->setMultirowOperations($multirow_operations);  
##  *** set CSS class for datagrid
##  *** "default" or "blue" or "gray" or "green" or "pink" or your own css file 
 $css_class = $SETTINGS['datagrid_css_style'];
 $dgrid->setCssClass($css_class);
##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
 $http_get_vars = array("mgid");
 $dgrid->setHttpGetVars($http_get_vars);
##  *** set other datagrid/s unique prefixes (if you use few datagrids on one page)
##  *** format (in which mode to allow processing of another datagrids)
##  *** array("unique_prefix"=>array("view"=>true|false, "edit"=>true|false, "details"=>true|false));
/// $anotherDatagrids = array("abcd_"=>array("view"=>true, "edit"=>true, "details"=>true));
/// $dgrid->setAnotherDatagrids($anotherDatagrids);  
##  *** set DataGrid caption
 $dg_caption = "
 <div id='headerhome' >
	  <a href='#' id='logo1'>SAC</a>
	  <ul id='service'>
		<li><a href='#'>Control de Mensajes</a></li>
	
	  </ul>
 </div>
  <br/>
 
   <div id='breadcrumb'>
       <a class='home' href='usuarios.php'>Inicio</a>
	   <a href='usuarios.php'>Control de Usuarios</a>
	   <a href='#'>Control de Mensajes</a>
  </div> ";

 $dgrid->setCaption($dg_caption);
##
##
## +---------------------------------------------------------------------------+
## | 3. Printing & Exporting Settings:                                         | 
## +---------------------------------------------------------------------------+
##  *** set printing option: true(default) or false 
 $printing_option = false;
 $dgrid->allowPrinting($printing_option);
##  *** set exporting option: true(default) or false and relative (virtual) path
##  *** to export directory (relatively to datagrid.class.php file).
##  *** Ex.: "" - if we use current datagrid folder
 $exporting_option = false;
 $exporting_directory = "export/";               
 $dgrid->allowExporting($exporting_option, $exporting_directory);
##
##
## +---------------------------------------------------------------------------+
## | 4. Sorting & Paging Settings:                                             | 
## +---------------------------------------------------------------------------+
##  *** set sorting option: true(default) or false 
/// $sorting_option = true;
/// $dgrid->allowSorting($sorting_option);               
##  *** set paging option: true(default) or false 
/// $paging_option = true;
/// $rows_numeration = false;
/// $numeration_sign = "N #";
/// $dgrid->allowPaging($paging_option, $rows_numeration, $numeration_sign);
##  *** set paging settings
 #$bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
 #$top_paging = array();
 #$pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000");
 #$default_page_size = 10;
 #$paging_arrows = array("first"=>"|&lt;&lt;", "previous"=>"&lt;&lt;", "next"=>"&gt;&gt;", "last"=>"&gt;&gt;|");
 #$dgrid->setPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size, $paging_arrows);
##
##
## +---------------------------------------------------------------------------+
## | 5. Filter Settings:                                                       | 
## +---------------------------------------------------------------------------+
##  *** set filtering option: true or false(default)
# $filtering_option = true;
# $show_search_type = true;
# $dgrid->allowFiltering($filtering_option, $show_search_type);
###  *** set aditional filtering settings
# //$fill_from_array = array("0"=>"No", "1"=>"Yes");  /* as "value"=>"option" */
# $filtering_fields = array(
#     "Last Name"=>array("table"=>"a", "field"=>"last_name", "source"=>"self", "show_operator"=>false, "default_operator"=>"like%", "order"=>"ASC", "type"=>"textbox", "case_sensitive"=>false, "comparison_type"=>"string"),
#///     "Caption_2"=>array("table"=>"tableName_2", "field"=>"fieldName_2", "source"=>"self"|$fill_from_array, "show_operator"=>false|true, "default_operator"=>"=|<|>|like|%like|like%|not like", "order"=>"ASC|DESC (optional)", "type"=>"textbox|dropdownlist", "case_sensitive"=>false|true, "comparison_type"=>"string|numeric|binary"),
#///     "Caption_3"=>array("table"=>"tableName_3", "field"=>"fieldName_3", "source"=>"self"|$fill_from_array, "show_operator"=>false|true, "default_operator"=>"=|<|>|like|%like|like%|not like", "order"=>"ASC|DESC (optional)", "type"=>"textbox|dropdownlist", "case_sensitive"=>false|true, "comparison_type"=>"string|numeric|binary")
# );
# $dgrid->setFieldsFiltering($filtering_fields);
##
## 
## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    | 
## +---------------------------------------------------------------------------+
##  *** set view mode table properties
 $vm_table_properties = array("width"=>"60%");
 $dgrid->setViewModeTableProperties($vm_table_properties);  
##  *** set columns in view mode
##  *** Ex.: "on_js_event"=>"onclick='alert(\"Yes!!!\");'"
##  ***      "barchart" : number format in SELECT SQL must be equal with number format in max_value
 $vm_colimns = array(
    "mensaje" =>array("header"=>"Mensaje", "type"=>"label",      "align"=>"left", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>false,  "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower", "summarize"=>"true|false", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
	
	 "fecha" =>array("header"=>"fecha", "type"=>"label",      "align"=>"left", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "tooltip"=>false,  "tooltip_type"=>"floating|simple", "case"=>"normal|upper|lower", "summarize"=>"true|false", "sort_by"=>"", "visible"=>"true", "on_js_event"=>""),
 );
 $dgrid->setColumnsInViewMode($vm_colimns);
##  *** set auto-genereted columns in view mode
//  $auto_column_in_view_mode = false;
//  $dgrid->setAutoColumnsInViewMode($auto_column_in_view_mode);
##
##
## +---------------------------------------------------------------------------+
## | 7. Add/Edit/Details Mode Settings:                                        | 
## +---------------------------------------------------------------------------+
##  *** set add/edit mode table properties
 $em_table_properties = array("width"=>"50%");
 $dgrid->setEditModeTableProperties($em_table_properties);
##  *** set details mode table properties
/// $dm_table_properties = array("width"=>"70%");
/// $dgrid->setDetailsModeTableProperties($dm_table_properties);
##  ***  set settings for add/edit/details modes
  $table_name  ="members_mensajes";
  $primary_key = "id";
  $condition   = "";//"table_name.field = ".$_REQUEST['abc_rid'];
  $dgrid->setTableEdit($table_name, $primary_key, $condition);
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
 

 $em_columns = array(
 
 "mensaje"=>array("header"=>"Mensaje","type"=>"textarea", "width"=>"210px", "req_type"=>"st", "title"=>"Contenido", 
					"edit_type"=>"wysiwyg", "rows"=>"7", "cols"=>"50"),
   "user_id" =>array("header"=>"", "type"=>"hidden",   "req_type"=>"st", "default"=>intval($mgid), "unique"=>false),
  
  

/* "derechos"  =>array("header"=>"Subscribe for news?", "type"=>"checkbox",   "req_type"=>"st", "width"=>"210px", "title"=>"", "readonly"=>"false", "maxlength"=>"-1", "default"=>"", "unique"=>"false", "unique_condition"=>"", "visible"=>"true", "on_js_event"=>"", "true_value"=>1, "false_value"=>0), */



 );
 $dgrid->setColumnsInEditMode($em_columns);
 

##  *** set auto-genereted columns in edit mode
//  $auto_column_in_edit_mode = false;
//  $dgrid->setAutoColumnsInEditMode($auto_column_in_edit_mode);
##  *** set foreign keys for add/edit/details modes (if there are linked tables)
##  *** Ex.: "condition"=>"TableName_1.FieldName > 'a' AND TableName_1.FieldName < 'c'"
##  *** Ex.: "on_js_event"=>"onclick='alert(\"Yes!!!\");'"
/// $foreign_keys = array(
///     "ForeignKey_1"=>array("table"=>"TableName_1", "field_key"=>"FieldKey_1", "field_name"=>"FieldName_1", "view_type"=>"dropdownlist(default)|radiobutton|textbox", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"My_Field_Name", "order_type"=>"ASC|DESC", "on_js_event"=>""),
///     "ForeignKey_2"=>array("table"=>"TableName_2", "field_key"=>"FieldKey_2", "field_name"=>"FieldName_2", "view_type"=>"dropdownlist(default)|radiobutton|textbox", "radiobuttons_alignment"=>"horizontal|vertical", "condition"=>"", "order_by_field"=>"My_Field_Name", "order_type"=>"ASC|DESC", "on_js_event"=>"")
/// ); 
/// $dgrid->setForeignKeysEdit($foreign_keys);
##
##
## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     | 
## +---------------------------------------------------------------------------+
##  *** bind the DataGrid and draw it on the screen
  $add_msg = "La operación de Agregado finalizó correctamente! <br>Para asegurarse de que los cambios se harán efectivos ,<a href='javascript: top.location.href=top.location.href'> Refrescar</a>.";
  $update_msg = "La operación de Actualizado finalizó correctamente! <br>Para asegurarse de que los cambios se harán efectivos, <a href='javascript: top.location.href=top.location.href'> Refrescar</a>.";
  $delete_msg = "La operación de Borrado finalizó correctamente! <br>Para asegurarse de que los cambios se harán efectivos, <a href='javascript: top.location.href=top.location.href'> Refrescar</a>.";

 // $dgrid->SetDgMessages($add_msg, $update_msg, $delete_msg); 
  $dgrid->bind();
//$dgrid->ExecuteSQL("ALTER table "._DB_PREFIX."menu ADD column is_dashboard_icon tinyint(1) default 1");
  
  ob_end_flush();
 /* 
  if($mode == "update"){
    echo "<script>
        setTimeout('top[1].location.href=top[1].location.href', 1000);
    </script>";  
  }
  
  if($act != ""){
    echo "<script>
        setTimeout('top[1].location.href=top[1].location.href', 1000);
    </script>";  
  }
  
*/

##
################################################################################   


?>
<br />

</body>
</html>
