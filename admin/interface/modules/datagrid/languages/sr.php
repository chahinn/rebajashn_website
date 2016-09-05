<?php
//------------------------------------------------------------------------------       
//*** Serbian (sr) 
//------------------------------------------------------------------------------          
function setLanguage(){ 
    $lang['='] = "=";  // "&#1080;&#1089;&#1090;&#1086;"; 
    $lang['>'] = ">";  // "&#1074;&#1077;&#1095;&#1077;"; 
    $lang['<'] = "<";  // "&#1084;&#1072;&#1114;&#1077;"; 
    $lang['add'] = "&#1044;&#1086;&#1076;&#1072;&#1112;";        
    $lang['add_new'] = "+ &#1053;&#1086;&#1074;&#1080; &#1059;&#1085;&#1086;&#1089;";
    $lang['add_new_record'] = "&#1053;&#1086;&#1074;&#1080; &#1091;&#1085;&#1086;&#1089; &#1076;&#1086;&#1076;&#1072;&#1090;"; 
    $lang['add_new_record_blocked'] = "Security check: attempt of adding a new record! Check your settings, the operation is not allowed!";
    $lang['adding_operation_completed'] = "&#1044;&#1086;&#1076;&#1072;&#1090;&#1085;&#1072; &#1086;&#1087;&#1077;&#1088;&#1072;&#1094;&#1080;&#1112;&#1072; &#1112;&#1077; &#1073;&#1080;&#1083;&#1072; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1072;!"; 
    $lang['adding_operation_uncompleted'] = "&#1044;&#1086;&#1076;&#1072;&#1090;&#1085;&#1072; &#1086;&#1087;&#1077;&#1088;&#1072;&#1094;&#1080;&#1112;&#1072; &#1085;&#1080;&#1112;&#1077; &#1073;&#1080;&#1083;&#1072; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1072;!";
    $lang['and'] = "and"; 
    $lang['any'] = "any";  
    $lang['ascending'] = "&#1054;&#1076;&#1086;&#1079;&#1075;&#1086;&#1088;"; 
    $lang['back'] = "&#1053;&#1072;&#1079;&#1072;&#1076;";    
    $lang['cancel'] = "&#1055;&#1088;&#1077;&#1082;&#1080;&#1085;&#1080;"; 
    $lang['cancel_creating_new_record'] = "&#1032;&#1077;&#1088; &#1089;&#1080; &#1089;&#1080;&#1075;&#1091;&#1088;&#1072;&#1085; &#1076;&#1072; &#1078;&#1077;&#1083;&#1080;&#1096; &#1087;&#1088;&#1077;&#1082;&#1080;&#1076; &#1076;&#1086;&#1076;&#1072;&#1074;&#1072;&#1114;&#1077; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;&#1072;?"; 
    $lang['check_all'] = "&#1057;&#1077;&#1083;&#1077;&#1082;&#1090;&#1080;&#1088;&#1072;&#1112; &#1089;&#1074;&#1077;"; 
    $lang['create'] = "&#1057;&#1090;&#1074;&#1086;&#1088;&#1080;";  
    $lang['create_new_record'] = "&#1044;&#1086;&#1076;&#1072;&#1112; &#1085;&#1086;&#1074;&#1080; &#1091;&#1085;&#1086;&#1089;";    
    $lang['current'] = "&#1090;&#1088;&#1077;&#1085;&#1091;&#1090;&#1085;&#1086;";
    $lang['delete'] = "&#1048;&#1079;&#1073;&#1088;&#1080;&#1096;&#1080;"; 
    $lang['delete_record'] = "&#1048;&#1079;&#1073;&#1088;&#1080;&#1096;&#1080; &#1091;&#1085;&#1086;&#1089;"; 
    $lang['delete_record_blocked'] = "Security check: attempt of deleting a record! Check your settings, the operation is not allowed!";
    $lang['delete_selected'] = "&#1048;&#1079;&#1073;&#1088;&#1080;&#1096;&#1080; &#1089;&#1077;&#1083;&#1077;&#1082;&#1094;&#1080;&#1112;&#1091;"; 
    $lang['delete_selected_records'] = "&#1032;&#1077;&#1088; &#1089;&#1080; &#1089;&#1080;&#1075;&#1091;&#1088;&#1072;&#1085; &#1076;&#1072; &#1078;&#1077;&#1083;&#1080;&#1096; &#1080;&#1079;&#1073;&#1088;&#1080;&#1089;&#1072;&#1090;&#1080; &#1086;&#1074;&#1077; &#1089;&#1077;&#1083;&#1077;&#1082;&#1090;&#1080;&#1088;&#1072;&#1085;&#1077; &#1087;&#1086;&#1076;&#1072;&#1090;&#1082;&#1077;?"; 
    $lang['delete_this_record'] = "Are you sure you want to delete this record?";        
    $lang['deleting_operation_completed'] = "&#1054;&#1087;&#1077;&#1088;&#1072;&#1094;&#1080;&#1112;&#1072; &#1080;&#1079;&#1073;&#1088;&#1080;&#1089;&#1072;&#1074;&#1072;&#1114;&#1077; &#1112;&#1077; &#1073;&#1080;&#1083;&#1072; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1072;!"; 
    $lang['deleting_operation_uncompleted'] = "&#1054;&#1087;&#1077;&#1088;&#1072;&#1094;&#1080;&#1112;&#1072; &#1080;&#1079;&#1073;&#1088;&#1080;&#1089;&#1072;&#1074;&#1072;&#1114;&#1072; &#1085;&#1080;&#1112;&#1077; &#1073;&#1080;&#1083;&#1072; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1072;!";
    $lang['descending'] = "&#1054;&#1076;&#1086;&#1079;&#1076;&#1086;&#1083;"; 
    $lang['details'] = "&#1044;&#1077;&#1090;&#1072;&#1113;&#1080;"; 
    $lang['details_selected'] = "&#1055;&#1086;&#1089;&#1084;&#1072;&#1090;&#1088;&#1072;&#1112; &#1089;&#1077;&#1083;&#1077;&#1082;&#1094;&#1080;&#1112;&#1091;";
    $lang['edit'] = "&#1052;&#1077;&#1114;&#1072;&#1112;"; 
    $lang['edit_selected'] = "&#1052;&#1077;&#1114;&#1072;&#1112; &#1089;&#1077;&#1083;&#1077;&#1082;&#1094;&#1080;&#1112;&#1091;"; 
    $lang['edit_record'] = "&#1052;&#1077;&#1113;&#1072;&#1112; &#1091;&#1085;&#1086;&#1089;"; 
    $lang['edit_selected_records'] = "&#1032;&#1077;&#1088; &#1089;&#1080; &#1089;&#1080;&#1075;&#1091;&#1088;&#1072;&#1085; &#1076;&#1072; &#1078;&#1077;&#1083;&#1080;&#1078; &#1084;&#1077;&#1113;&#1072;&#1090;&#1080; &#1089;&#1077;&#1083;&#1077;&#1082;&#1090;&#1080;&#1088;&#1072;&#1085;&#1080; &#1091;&#1085;&#1086;&#1089;?";    
    $lang['errors'] = "&#1043;&#1088;&#1077;&#1096;&#1082;&#1077;";
    $lang['export_to_excel'] = "&#1045;&#1082;&#1089;&#1087;&#1086;&#1088;&#1090;&#1080;&#1088;&#1072;&#1112; &#1091; &#1045;&#1082;&#1089;&#1077;&#1083;"; 
    $lang['export_to_pdf'] = "&#1045;&#1082;&#1089;&#1087;&#1086;&#1088;&#1090;&#1080;&#1088;&#1072;&#1112; &#1091; PDF"; 
    $lang['export_to_xml'] = "&#1045;&#1082;&#1089;&#1087;&#1086;&#1088;&#1090;&#1080;&#1088;&#1072;&#1112; &#1091; XML"; 
    $lang['export_message'] = "<label>&#1045;&#1082;&#1089;&#1087;&#1086;&#1088;&#1090;&#1080;&#1088;&#1072;&#1114;&#1077; &#1086;&#1076; _FILE_ &#1112;&#1077; &#1089;&#1087;&#1088;&#1077;&#1084;&#1085;&#1072;. &#1055;&#1086;&#1089;&#1083;&#1077; &#1079;&#1072;&#1074;&#1088;&#1096;&#1077;&#1090;&#1082;&#1072; &#1089;&#1082;&#1080;&#1076;&#1072;&#1114;&#1077;,</label> <a class='default_class_error_message' href='javascript: window.close();'>&#1047;&#1072;&#1090;&#1074;&#1086;&#1088;&#1080; &#1087;&#1088;&#1086;&#1079;&#1086;&#1088;</a>.";
    $lang['field'] = "&#1055;&#1086;&#1113;&#1077;"; 
    $lang['field_value'] = "&#1042;&#1088;&#1077;&#1076;&#1085;&#1086;&#1089;&#1090; &#1087;&#1086;&#1113;&#1072;"; 
    $lang['file_find_error'] = "&#1053;&#1077;&#1087;&#1086;&#1089;&#1090;&#1086;&#1112;&#1080; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;: <b>_FILE_</b>. <br>&#1055;&#1088;&#1086;&#1074;&#1077;&#1088;&#1072;&#1074;&#1072;&#1112; &#1076;&#1072;&#1083;&#1080; &#1090;&#1072;&#1112; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082; &#1087;&#1086;&#1089;&#1090;&#1086;&#1112;&#1080; &#1080; &#1076;&#1072; &#1082;&#1086;&#1088;&#1080;&#1089;&#1090;&#1080;&#1096; &#1080;&#1089;&#1087;&#1088;&#1072;&#1074;&#1072;&#1085; &#1087;&#1091;&#1090; &#1076;&#1086; &#1085;&#1112;&#1077;&#1075;&#1072;!";
    $lang['file_opening_error'] = "&#1053;&#1077;&#1084;&#1086;&#1078;&#1077; &#1076;&#1072; &#1089;&#1077; &#1086;&#1090;&#1074;&#1086;&#1088;&#1080; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;. &#1055;&#1088;&#1086;&#1074;&#1077;&#1088;&#1072;&#1074;&#1072;&#1112; &#1090;&#1074;&#1086;&#1112;&#1077; &#1087;&#1088;&#1080;&#1074;&#1080;&#1083;&#1077;&#1075;&#1080;&#1112;&#1077;.";
    $lang['file_writing_error'] = "&#1053;&#1077;&#1084;&#1086;&#1078;&#1077; &#1089;&#1077; &#1091;&#1087;&#1080;&#1089;&#1080;&#1074;&#1072;&#1090;&#1080; &#1091; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;. &#1055;&#1088;&#1086;&#1074;&#1077;&#1088;&#1072;&#1074;&#1072;&#1112; &#1087;&#1088;&#1080;&#1074;&#1080;&#1083;&#1077;&#1075;&#1080;&#1112;&#1077; &#1091;&#1087;&#1080;&#1089;&#1080;&#1074;&#1072;&#1114;&#1077;!"; 
    $lang['file_invalid file_size'] = "&#1055;&#1086;&#1075;&#1088;&#1077;&#1096;&#1085;&#1072; &#1074;&#1077;&#1083;&#1080;&#1115;&#1080;&#1085;&#1072; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;&#1072;"; 
    $lang['file_uploading_error'] = "&#1043;&#1088;&#1077;&#1096;&#1082;&#1072; &#1085;&#1072; &#1076;&#1086;&#1076;&#1072;&#1074;&#1072;&#1114;&#1077; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;&#1072;, &#1087;&#1086;&#1082;&#1091;&#1096;&#1072;&#1112; &#1087;&#1086;&#1085;&#1086;&#1074;&#1086;!"; 
    $lang['file_deleting_error'] = "&#1043;&#1088;&#1077;&#1096;&#1082;&#1072; &#1085;&#1072; &#1080;&#1079;&#1073;&#1088;&#1080;&#1089;&#1072;&#1074;&#1072;&#1114;&#1077;!"; 
    $lang['first'] = "&#1055;&#1088;&#1074;&#1072;"; 
    $lang['handle_selected_records'] = "&#1032;&#1077;&#1088; &#1089;&#1080; &#1089;&#1080;&#1075;&#1091;&#1088;&#1072;&#1085; &#1076;&#1072; &#1078;&#1077;&#1083;&#1080;&#1096; &#1088;&#1091;&#1082;&#1086;&#1074;&#1086;&#1076;&#1080;&#1090;&#1080; &#1089;&#1072; &#1089;&#1077;&#1083;&#1077;&#1082;&#1090;&#1080;&#1088;&#1072;&#1085;&#1077; &#1091;&#1085;&#1086;&#1089;&#1077;?"; 
    $lang['hide_search'] = "&#1057;&#1072;&#1082;&#1088;&#1080;&#1112; &#1087;&#1088;&#1077;&#1090;&#1088;&#1072;&#1078;&#1080;&#1074;&#1072;&#1114;&#1077;"; 
    $lang['last'] = "&#1047;&#1072;&#1076;&#1114;&#1072;"; 
    $lang['like'] = "&#1080;&#1089;&#1090;&#1086;"; 
    $lang['like%'] = "&#1080;&#1089;&#1090;&#1086;%";  // "?????? ??"; 
    $lang['%like'] = "%&#1080;&#1089;&#1090;&#1086;";  // "???????? ??";
    $lang['%like%'] = "%&#1080;&#1089;&#1090;&#1086;%";  // 
    $lang['loading_data'] = "&#1091;&#1095;&#1080;&#1090;&#1072;&#1074;&#1072;&#1114;&#1077; &#1087;&#1086;&#1076;&#1072;&#1090;&#1072;&#1082;&#1072;...";
    $lang['max'] = "&#1084;&#1072;&#1082;&#1089;&#1080;&#1084;&#1072;&#1083;&#1085;&#1086;";        
    $lang['next'] = "&#1085;&#1072;&#1088;&#1077;&#1076;&#1085;&#1080;";    
    $lang['no'] = "&#1053;&#1077;";        
    $lang['no_data_found'] = "&#1053;&#1077;&#1084;&#1072; &#1091;&#1085;&#1086;&#1089;&#1072;"; 
    $lang['no_data_found_error'] = "&#1053;&#1077;&#1084;&#1072; &#1087;&#1086;&#1076;&#1072;&#1090;&#1082;&#1077;! &#1052;&#1086;&#1083;&#1080;&#1084;&#1090;&#1077; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1080; &#1090;&#1074;&#1086;&#1112; &#1082;&#1086;&#1076;!&lt;br&gt;&#1052;&#1086;&#1078;&#1076;&#1072; &#1112;&#1077; &#1074;&#1077;&#1083;&#1080;&#1082;&#1080;&#1093; &#1080; &#1084;&#1072;&#1083;&#1080;&#1093; &#1089;&#1083;&#1086;&#1074;&#1072; -case sensitive- &#1080;&#1083;&#1080; &#1080;&#1084;&#1072; &#1087;&#1086;&#1075;&#1088;&#1077;&#1096;&#1085;&#1077; &#1089;&#1080;&#1084;&#1073;&#1086;&#1083;&#1077;.";        
    $lang['no_image'] = "&#1053;&#1077;&#1084;&#1072; &#1089;&#1083;&#1080;&#1082;&#1072;"; 
    $lang['not_like'] = "&#1085;&#1080;&#1112;&#1077; &#1080;&#1089;&#1090;&#1086;"; 
    $lang['of'] = "of";
    $lang['operation_was_already_done'] = "The operation was already completed! You cannot retry it again.";            
    $lang['or'] = "or";        
    $lang['pages'] = "&#1057;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1077;"; 
    $lang['page_size'] = "&#1056;&#1077;&#1079;&#1091;&#1083;&#1090;&#1072;&#1090;&#1080; &#1085;&#1072; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1080;"; 
    $lang['previous'] = "&#1087;&#1088;&#1077;&#1090;&#1093;&#1086;&#1076;&#1085;&#1080;";          
    $lang['printable_view'] = "&#1042;&#1077;&#1088;&#1079;&#1080;&#1112;&#1072; &#1096;&#1090;&#1072;&#1084;&#1087;&#1072;&#1114;&#1077;"; 
    $lang['print_now'] = "&#1048;&#1079;&#1096;&#1090;&#1072;&#1084;&#1087;&#1072;&#1112; &#1089;&#1072;&#1076;";    
    $lang['print_now_title'] = "&#1050;&#1083;&#1080;&#1082;&#1085;&#1080; &#1090;&#1091; &#1076;&#1072; &#1080;&#1079;&#1096;&#1090;&#1072;&#1084;&#1087;&#1072;&#1096; &#1086;&#1074;&#1091; &#1089;&#1090;&#1088;&#1072;&#1085;&#1080;&#1094;&#1091;"; 
    $lang['record_n'] = "&#1059;&#1085;&#1086;&#1089; #";
    $lang['refresh_page'] = "Refresh page";    
    $lang['remove'] = "&#1048;&#1079;&#1073;&#1088;&#1080;&#1096;&#1080;"; 
    $lang['reset'] = "&#1055;&#1086;&#1085;&#1086;&#1074;&#1080;";
    $lang['results'] = "&#1056;&#1077;&#1079;&#1091;&#1083;&#1090;&#1072;&#1090;&#1080;"; 
    $lang['required_fields_msg'] = "<font>*</font> &#1040;&#1088;&#1090;&#1080;&#1082;&#1072;&#1083; &#1082;&#1086;&#1112;&#1077; &#1089;&#1091; &#1079;&#1072;&#1073;&#1077;&#1083;&#1077;&#1078;&#1077;&#1085;&#1077; &#1089;&#1072; &#1079;&#1074;&#1077;&#1079;&#1076;&#1086;&#1084; &#1089;&#1091; &#1085;&#1077;&#1086;&#1087;&#1093;&#1086;&#1076;&#1085;&#1077;";    
    $lang['search'] = "&#1055;&#1088;&#1077;&#1090;&#1088;&#1072;&#1078;&#1080;"; 
    $lang['search_d'] = "&#1055;&#1088;&#1077;&#1090;&#1088;&#1072;&#1078;&#1080;&#1074;&#1072;&#1114;&#1077;"; 
    $lang['search_type'] = "&#1060;&#1080;&#1083;&#1090;&#1077;&#1088;"; 
    $lang['select'] = "&#1089;&#1077;&#1083;&#1077;&#1082;&#1090;&#1086;&#1074;&#1072;&#1090;&#1080;"; 
    $lang['set_date'] = "&#1057;&#1090;&#1072;&#1074;&#1080; &#1076;&#1072;&#1090;&#1091;&#1084;"; 
    $lang['sort'] = "Sort";
    $lang['total'] = "&#1062;&#1077;&#1083;&#1086;&#1082;&#1091;&#1087;&#1085;&#1086;"; 
    $lang['turn_on_debug_mode'] = "&#1047;&#1072; &#1074;&#1080;&#1096;&#1077; &#1080;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1112;&#1077;&#1084; &#1091;&#1079;&#1074;&#1088;&#1072;&#1090;&#1080;&#1090;&#1077; &#1085;&#1072; &#1084;&#1086;&#1076;&#1091;&#1089; &#1087;&#1086;&#1082;&#1072;&#1079;&#1080;&#1074;&#1072;&#1114;&#1077; &#1075;&#1088;&#1077;&#1096;&#1072;&#1082;&#1072; -debug mode- ."; 
    $lang['uncheck_all'] = "&#1044;&#1077;&#1089;&#1077;&#1083;&#1077;&#1082;&#1090;&#1080;&#1088;&#1072;&#1112; &#1089;&#1074;&#1077;"; 
    $lang['unhide_search'] = "&#1055;&#1086;&#1082;&#1072;&#1078;&#1080; &#1087;&#1088;&#1077;&#1090;&#1088;&#1072;&#1078;&#1080;&#1074;&#1072;&#1114;&#1077;"; 
    $lang['unique_field_error'] = "&#1055;&#1086;&#1113;&#1077; _FIELD_ &#1076;&#1086;&#1079;&#1074;&#1086;&#1083;&#1080; &#1089;&#1072;&#1084;&#1086; &#1087;&#1086;&#1112;&#1077;&#1076;&#1080;&#1085;&#1072;&#1095;&#1085;&#1091; &#1074;&#1088;&#1077;&#1076;&#1085;&#1086;&#1089;&#1090; - &#1087;&#1086;&#1082;&#1091;&#1096;&#1072;&#1112; &#1087;&#1086;&#1085;&#1086;&#1074;&#1086;!";
    $lang['update'] = "&#1054;&#1073;&#1085;&#1072;&#1074;&#1113;&#1072;&#1114;&#1077;";
    $lang['update_record'] = "&#1054;&#1073;&#1085;&#1072;&#1074;&#1113;&#1072;&#1114;&#1077;"; 
    $lang['update_record_blocked'] = "Security check: attempt of updating a record! Check your settings, the operation is not allowed!";
    $lang['updating_operation_completed'] = "&#1054;&#1087;&#1077;&#1088;&#1072;&#1094;&#1080;&#1112;&#1072; &#1086;&#1073;&#1085;&#1072;&#1074;&#1113;&#1072;&#1114;&#1077; &#1112;&#1077; &#1073;&#1080;&#1083;&#1072; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1072;!"; 
    $lang['updating_operation_uncompleted'] = "&#1054;&#1087;&#1077;&#1088;&#1072;&#1094;&#1080;&#1112;&#1072; &#1086;&#1073;&#1085;&#1072;&#1074;&#1113;&#1072;&#1114;&#1077; &#1085;&#1080;&#1112;&#1077; &#1073;&#1080;&#1083;&#1072; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1072;!";
    $lang['upload'] = "&#1054;&#1073;&#1085;&#1086;&#1074;&#1080;";    
    $lang['view'] = "&#1048;&#1079;&#1075;&#1083;&#1077;&#1076;";    
    $lang['view_details'] = "&#1087;&#1086;&#1089;&#1084;&#1072;&#1090;&#1088;&#1072;&#1112; deta&#1113;&#1077;"; 
    $lang['warnings'] = "&#1059;&#1087;&#1086;&#1079;&#1086;&#1088;&#1077;&#1114;&#1077;";
    $lang['with_selected'] = "&#1048;&#1079;&#1073;&#1086;&#1088;"; 
    $lang['wrong_field_name'] = "&#1055;&#1086;&#1075;&#1088;&#1077;&#1096;&#1085;&#1086; &#1080;&#1084;&#1077; &#1087;&#1086;&#1113;&#1077;"; 
    $lang['wrong_parameter_error'] = "&#1055;&#1086;&#1075;&#1088;&#1077;&#1096;&#1072;&#1085; &#1087;&#1072;&#1088;&#1072;&#1084;&#1077;&#1090;&#1072;&#1088; &#1091; [<b>_FIELD_</b>]: _VALUE_"; 
    $lang['yes'] = "&#1044;&#1072;";

    // date-time
    $lang['day']    = "day";
    $lang['month']  = "month";
    $lang['year']   = "year";
    $lang['hour']   = "hour";
    $lang['min']    = "min";
    $lang['sec']    = "sec";
    $lang['months'][1] = "January";
    $lang['months'][2] = "February";
    $lang['months'][3] = "March";
    $lang['months'][4] = "April";
    $lang['months'][5] = "May";
    $lang['months'][6] = "June";
    $lang['months'][7] = "July";
    $lang['months'][8] = "August";
    $lang['months'][9] = "September";
    $lang['months'][10] = "October";
    $lang['months'][11] = "November";
    $lang['months'][12] = "December";

    return $lang; 
}
?>