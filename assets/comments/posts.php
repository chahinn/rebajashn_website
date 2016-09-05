	<?php
	include('dbcon.php');
	$value = isset($_GET['value']) ? $_GET['value'] : "";
	$oferta_id = isset($_GET['oferta_id']) ? $_GET['oferta_id'] : "";
	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : "";
	$img = isset($_GET['img']) ? $_GET['img'] : "";
	$show_more_post = isset($_GET['show_more_post']) ? $_GET['show_more_post'] : "";
	
	function checkValues($value)
	{
		 $value = trim($value);
		 
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		 $value = strip_tags($value);
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
	}	
	
	function clickable_link($text = '')
	{
		$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
		return $ret;
	}

	$next_records = 10;
	$show_more_button = 0;
	if(checkValues($value))
	{
		$userip = $_SERVER['REMOTE_ADDR'];
		echo "INSERT INTO el_comments (post,f_name,userip,date_created,oferta_id,img) VALUES('".checkValues($_REQUEST['value'])."','$nombre','".$userip."','".strtotime(date("Y-m-d H:i:s"))."','$oferta_id',$img)";
		
		mysql_query("INSERT INTO el_comments (post,f_name,userip,date_created,oferta_id,img) VALUES('".checkValues($_REQUEST['value'])."','$nombre','".$userip."','".strtotime(date("Y-m-d H:i:s"))."','$oferta_id','$img')");
	
		$result = mysql_query("SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM el_comments order by p_id desc limit 1");
	
	}
	elseif($show_more_post) // more posting paging
	{
		$next_records = $_REQUEST['show_more_post'] + 10;
		
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS TimeSpent FROM el_comments order by p_id desc limit ".$_REQUEST['show_more_post'].", 10");
		
		$check_res = mysql_query("SELECT * FROM el_comments order by p_id desc limit ".$next_records.", 10");
		
		$show_more_button = 0; // button in the end
		
		$check_result = mysql_num_rows(@$check_res);
		if($check_result > 0)
		{
			$show_more_button = 1;
		}
	}
	else
	{	
		$show_more_button = 1;
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS TimeSpent FROM el_comments where oferta_id=$oferta_id order by p_id desc limit 0,10");
		
	}
	
	while ($row = mysql_fetch_array($result))
	{
		$comments = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM el_comments_post where post_id = ".$row['p_id']." order by c_id asc");		?>
	   <div class="friends_area" id="record-<?php  echo $row['p_id']?>">

	     <?php 
					      if($row['img']==""){
						  	echo "<img src='../assets/img/avatar.png' width='40' class='CommentImg' style='float:left;' alt='' />";
							}else{
							 echo "<img src='img_users/$row[img]' width='40' class='CommentImg' style='float:left;' alt='' />";
							};
						?>

		   <label style="float:left" class="name">

		   <b><?php echo $row['f_name'];?></b>

		   <em><?php  echo clickable_link($row['post']);?></em>
		   <br clear="all" />

		   <span>
		   <?php  
		   
		    // echo strtotime($row['date_created'],"Y-m-d H:i:s");
   		    
		    $days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
			
			if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo 'hace '.$minutes.' minutos';
			else
			echo "hace unos segundos";	
			
		   ?>
		   
		   </span>
		   <a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="showCommentBox">Comments</a>

		   </label>
		   <?php
			$userip = $_SERVER['REMOTE_ADDR'];
			if($row['userip'] == $userip){?>
		  	<a href="#" class="delete"> Remove</a>
		   <?php
			}?>
		    <br clear="all" />
			<div id="CommentPosted<?php  echo $row['p_id']?>">
				<?php
				$comment_num_row = mysql_num_rows(@$comments);
				if($comment_num_row > 0)
				{
					while ($rows = mysql_fetch_array($comments))
					{
						$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
						$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;						
						?>
					<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">
					   <?php 
					      if($row['img']==""){
						  	echo "<img src='../assets/img/avatar.png' width='40' class='CommentImg' style='float:left;' alt='' />";
							}else{
							 echo "<img src='img_users/$row[img]' width='40' class='CommentImg' style='float:left;' alt='' />";
							};
						?>	
						<label class="postedComments">
							<?php  echo clickable_link($rows['comments']);?>
						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						<?php
						
						if($days2 > 0)
						echo date('F d Y', $rows['date_created']);
						elseif($days2 == 0 && $hours == 0 && $minutes == 0)
						echo "hace unos segundos";		
						elseif($days2 == 0 && $hours == 0)
						echo 'hace '.$minutes.' minutos';
						else
			echo "hace unos segundos";	
						?>
						</span>
						<?php
						$userip = $_SERVER['REMOTE_ADDR'];
						if($rows['userip'] == $userip){?>
						&nbsp;&nbsp;<a href="#" id="CID-<?php  echo $rows['c_id'];?>" class="c_delete">Delete</a>
						<?php
						}?>
					</div>
					<?php
					}?>				
					<?php
				}?>
			</div>
			<div class="commentBox" align="right" id="commentBox-<?php  echo $row['p_id'];?>" <?php echo (($comment_num_row) ? '' :'style="display:none"')?>>
				   <?php 
					      if($row['img']==""){
						  	echo "<img src='../assets/img/avatar.png' width='40' class='CommentImg' style='float:left;' alt='' />";
							}else{
							 echo "<img src='img_users/$row[img]' width='40' class='CommentImg' style='float:left;' alt='' />";
							};
						?>
				<label id="record-<?php  echo $row['p_id'];?>">
					<textarea class="commentMark" id="commentMark-<?php  echo $row['p_id'];?>" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comentar</a>
			</div>
	   </div>
	<?php
	}
	if($show_more_button == 1){?>
	<div id="bottomMoreButton">
	<a id="more_<?php echo @$next_records?>" class="more_records" href="javascript: void(0)">Mas comentarios</a>
	</div>
	<?php
	}?>
	