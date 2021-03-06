<?php

/*admin*/


add_action('admin_menu', 'kush_micro_news_admin_menu');

function kush_micro_news_admin_menu() {
	if(get_option('kush_mn_editor_access','false') == 'true'){
	//editor	
		add_menu_page('Micro News Board', __('Micro News', 'kush-micro-news'), 'publish_pages' , 'micro-news', 'micro_news_html_page','','6.1995');
		add_submenu_page('micro-news','Micro News Add New', __('Add New', 'kush-micro-news'), 'publish_pages','micro-news-new', 'micro_news_html_page_add_new');
		add_submenu_page('micro-news','Micro News Settings', __('Settings', 'kush-micro-news'), 'publish_pages','micro-news-config', 'micro_news_config_page');
	}
	else
	{//administrator
		add_menu_page('Micro News Board', __('Micro News', 'kush-micro-news'), 'install_plugins' , 'micro-news', 'micro_news_html_page','','6.1995');
		add_submenu_page('micro-news','Micro News Add New', __('Add New', 'kush-micro-news'), 'install_plugins','micro-news-new', 'micro_news_html_page_add_new');
		add_submenu_page('micro-news','Micro News Settings', __('Settings', 'kush-micro-news'), 'install_plugins','micro-news-config', 'micro_news_config_page');
	}
}

function micro_news_config_page(){
$what='';

//$_POST = array_map('stripslashes_deep', $_POST['myRename']);

//notify user if there is db update required
kush_micronews_check_dbupdate();

if(isset($_POST['valSub']))
{
	if(isset($_POST['numPost']))
	{
		if($_POST['numPost']!='')
			{$num=sanitize($_POST['numPost']);
			 update_option( "kush_mn_num_news",$num);
			 
			 $what= __('Changes saved!', 'kush-micro-news');
			}
		else
		{
			update_option( "kush_mn_num_news",'5');
			echo '<h4>'.__('Number of post cannot left blank, reverted to default.', 'kush-micro-news').'</h4>';	
		}
	}

	if(isset($_POST['chkLoadNav']))
	{	if($_POST['chkLoadNav']==true)
			update_option( "kush_mn_load_nav",'true');		
		
		$what=__('Changes saved!', 'kush-micro-news');
	}
	else
		update_option( "kush_mn_load_nav",'false');

	if(isset($_POST['chkLoadNewTab']))
	{
		if($_POST['chkLoadNewTab'] == true)
			update_option( "kush_mn_load_newtab",'true');		
		
		$what=__('Changes saved!', 'kush-micro-news');
	}
	else
		update_option( "kush_mn_load_newtab",'false');		


	if(isset($_POST['chkLoadNavSwap']))
		{if($_POST['chkLoadNavSwap']==true)
			update_option( "kush_mn_load_nav_swap",'true');		
			
			 $what=__('Changes saved!', 'kush-micro-news');
		}
	else
		update_option( "kush_mn_load_nav_swap",'false');

	if(isset($_POST['myRename']))
	{
		$_POST['myRename'] = stripslashes($_POST['myRename']);

		if($_POST['myRename']!='')
		{ update_option("kush_mn_widget_name", htmlspecialchars($_POST['myRename']));		 
			 $what=__('Changes saved!', 'kush-micro-news');
		}
		else
		{
			update_option("kush_mn_widget_name", 'Micro News');
		}
		
	}

	if(isset($_POST['fullStoryText']))
	{

		$_POST['fullStoryText'] = stripslashes($_POST['fullStoryText']);

		if($_POST['fullStoryText']!='')
		{update_option("kush_mn_read_story_text", htmlspecialchars($_POST['fullStoryText']));		 
			 $what=__('Changes saved!', 'kush-micro-news');
		}
		else
		{
			update_option("kush_mn_read_story_text",'Read Full story &raquo;');
		}
		
		
	}
	if(isset($_POST['chkBorder']))
		{if($_POST['chkBorder']==true)
			update_option( "kush_mn_show_lborder",'true');		
			
			 $what=__('Changes saved!', 'kush-micro-news');
		}
	else
		update_option( "kush_mn_show_lborder",'false');
		
	if(isset($_POST['chkHover']))
		{if($_POST['chkHover']==true)
			update_option( "kush_mn_show_linkclean",'true');		
		
			 $what=__('Changes saved!', 'kush-micro-news');
		}
	else	
		update_option('kush_mn_show_linkclean','false');
		
	if(isset($_POST['chkHtmlParse']))
	{	if($_POST['chkHtmlParse']==true)
			update_option( "kush_mn_parse_html",'true');		
		
			 $what=__('Changes saved!', 'kush-micro-news');
	}
	else	
		update_option('kush_mn_parse_html','false');
	
	
	if(isset($_POST['textColor']) && $_POST['textColor']!="")
	{
		update_option( "kush_mn_color_text",$_POST['textColor']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}
	
	if(isset($_POST['titleColor']) && $_POST['titleColor']!="")
	{
		update_option( "kush_mn_color_title",$_POST['titleColor']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}
	
	if(isset($_POST['linkColorField']) && $_POST['linkColorField']!="")
	{
		update_option( "kush_mn_color_link",$_POST['linkColorField']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}

	if(isset($_POST['headTextColor']) && $_POST['headTextColor']!="")
	{
		update_option( "kush_mn_head_textColor",$_POST['headTextColor']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}
	
	if(isset($_POST['headHighlightColor']) && $_POST['headHighlightColor']!="")
	{
		update_option( "kush_mn_head_highlightColor",$_POST['headHighlightColor']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}

	if(isset($_POST['dateFormat']) && $_POST['dateFormat']!="")
	{
		update_option( "kush_mn_date_format",$_POST['dateFormat']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}

	if(isset($_POST['headBack']) && $_POST['headBack']!="")
	{
		update_option( "kush_mn_head_back",$_POST['headBack']);
			 $what=__('Changes saved!', 'kush-micro-news');
	}


	if(isset($_POST['editorAccess']))
	{	if($_POST['editorAccess'] == true)
			update_option( "kush_mn_editor_access",'true');		
		
			$what=__('Changes saved!', 'kush-micro-news');
	}
	else	
		update_option('kush_mn_editor_access','false');
	
}
?>
<div class="wrap">
	<div class="icon32" id="icon-options-general"> <br /> </div>
	<h2><?php _e('Micro News Settings', 'kush-micro-news');?></h2>
	<?php echo ($what!='')?'<div class="updated"><p><strong>'.$what.'</strong></p></div>':''; ?>
	<br/>
	<form action="" method="post" id="mirco-news-config">
		<h3><?php _e('Functional', 'kush-micro-news');?></h3>
		<div class="options">
			<label for="numPost"><?php _e('Number of news to display', 'kush-micro-news');?>:</label>
			<input type="text" name="numPost" value="<?php echo get_option( "kush_mn_num_news");?>"/>
			<h5 style="display:inline-block;margin:0;">(via kush_micro_news_output() function)</h5>
		</div>
		<div class="options">
			<label for="chkLoadNav"><?php _e('Load More navigation', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="chkLoadNav" <?php $lnav=get_option('kush_mn_load_nav');if($lnav=='true'){echo 'checked';}?>/>
		</div>
		<div class="options">
			<label for="chkLoadNewTab"><?php _e('Open link in new tab', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="chkLoadNewTab" <?php if( get_option('kush_mn_load_newtab', 'true') == 'true'){echo 'checked';}?>/>
		</div>
		<div class="options">
			<label for="chkLoadNavSwap"><?php _e('Swap news when navigating', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="chkLoadNavSwap" <?php $lnavSwap=get_option('kush_mn_load_nav_swap');if($lnavSwap=='true'){echo 'checked';}?>/>
			<h5 style="display:inline-block;margin:0;"><?php _e('Disabling this will append news when Load More is clicked.', 'kush-micro-news');?></h5>
		</div>

		<h3><?php _e('Header', 'kush-micro-news');?></h3>
		<div class="options">
			<label for="myRename"><?php _e('Title over news', 'kush-micro-news');?>:</label>
			<input type="text" name="myRename" value="<?php echo get_option("kush_mn_widget_name", "Micro News");?>"/>
			<h5 style="display:inline-block;margin:0;">(Default: Micro News)</h5>
		</div>
		<div class="options">			
			<label for="headTextColor"><?php _e('Head text color', 'kush-micro-news');?>:</label>
			<input type="text" name="headTextColor" value="<?php echo get_option('kush_mn_head_textColor','#FFFFFF');?>" />
			<select name="titleColorList" onclick="check_custom_color(this,'title')">
				<option value="#FFFFFF">White [Default]</option>
				<option value="#0066CC">Light Blue</option>
				<option value="#000000">Black</option>
				<option value="#666666">Grey</option>
				<option value="#8bbf36">Green</option>
				<option value="#fff2a8">Golden</option>
				<option value="#F25555">Red</option>
				<option value="#FFD700">Yellow</option>
				<option value="#FFB6C1">Pink</option>
				<option value="#191970">Midnight Blue</option>				
			</select>
			<h5 style="display:inline-block;margin:0;">(Hexadecimal color values, like: #0066CC)</h5>
		</div>
		<div class="options">			
			<label for="headHighlightColor"><?php _e('Head gighlight color', 'kush-micro-news');?>:</label>
			<input type="text" name="headHighlightColor" value="<?php echo get_option('kush_mn_head_highlightColor','#808080');?>" />
			<select name="titleColorList" onclick="check_custom_color(this,'title')">
				<option value="#808080">Light Grey [Default]</option>
				<option value="#0066CC">Light Blue</option>
				<option value="#000000">Black</option>
				<option value="#666666">Grey</option>
				<option value="#8bbf36">Green</option>
				<option value="#fff2a8">Golden</option>
				<option value="#F25555">Red</option>
				<option value="#FFD700">Yellow</option>
				<option value="#FFB6C1">Pink</option>
				<option value="#191970">Midnight Blue</option>				
			</select>
		</div>
		<div class="options">			
			<label for="headBack"><?php _e('Head background color', 'kush-micro-news');?>:</label>
			<input type="text" name="headBack" value="<?php echo get_option('kush_mn_head_back','default');?>" />
			<select name="titleColorList" onclick="check_custom_color(this,'title')">
				<option value="default">Grey Bars [Default]</option>
				<option value="#000000">Black</option>
				<option value="#666666">Grey</option>
				<option value="#8bbf36">Green</option>
				<option value="#fff2a8">Golden</option>
				<option value="#F25555">Red</option>
				<option value="#FFD700">Yellow</option>
				<option value="#FFB6C1">Pink</option>
				<option value="#191970">Midnight Blue</option>				
			</select>
		</div>

		<h3><?php _e('Display', 'kush-micro-news');?></h3>
		<div class="options">
			<label for="myRename"><?php _e('Full story text', 'kush-micro-news');?>:</label>
			<input type="text" name="fullStoryText" value="<?php echo get_option("kush_mn_read_story_text");?>"/>
			<h5 style="display:inline-block;margin:0;">(Default: Read Full story &raquo;)</h5>
		</div>			
		<div class="options">			
			<label for="titleColor"><?php _e('Title color', 'kush-micro-news');?>:</label>
			<input type="text" name="titleColor" value="<?php echo get_option('kush_mn_color_title','#0066CC');?>" />
			<select name="titleColorList" onclick="check_custom_color(this,'title')">
				<option value="#0066CC">Light Blue [Default]</option>
				<option value="#000000">Black</option>
				<option value="#666666">Grey</option>
				<option value="#8bbf36">Green</option>
				<option value="#fff2a8">Golden</option>
				<option value="#F25555">Red</option>
				<option value="#FFD700">Yellow</option>
				<option value="#FFB6C1">Pink</option>
				<option value="#191970">Midnight Blue</option>				
			</select>
			<h5 style="display:inline-block;margin:0;">(Hexadecimal color values, like: #0066CC)</h5>
		</div>
		<div class="options">
			<label for="textColor"><?php _e('Text color', 'kush-micro-news');?>:</label>
			<input type="text" name="textColor" value="<?php echo get_option('kush_mn_color_text', '#666666');?>" />
			<select name="textColorList" onclick="check_custom_color(this,'text')">
				<option value="#666666">Grey [Default]</option>
				<option value="#0066CC">Light Blue</option>
				<option value="#000000">Black</option>
				<option value="#8bbf36">Green</option>
				<option value="#fff2a8">Golden</option>
				<option value="#F25555">Red</option>
				<option value="#FFD700">Yellow</option>
				<option value="#FFB6C1">Pink</option>
				<option value="#191970">Midnight Blue</option>				
			</select>
		</div>
		<div class="options">
			<label for="linkColorField"><?php _e('Link color', 'kush-micro-news');?>:</label>
			<input type="text" name="linkColorField" value="<?php echo get_option('kush_mn_color_link', '#000000');?>" />
			<select name="linkColorList" onclick="check_custom_color(this,'link')">
				<option value="#000000">Black [Default]</option>
				<option value="#8bbf36">Green</option>
				<option value="#666666">Grey</option>
				<option value="#0066CC">Light Blue</option>
				<option value="#fff2a8">Golden</option>
				<option value="#F25555">Red</option>
				<option value="#FFD700">Yellow</option>
				<option value="#FFB6C1">Pink</option>
				<option value="#191970">Midnight Blue</option>				
			</select>
		</div>
		<div class="options">			
			<?php 
				function check_selected_date($value){
					$date_format=get_option('kush_mn_date_format','d M Y');
					if($date_format == $value)
						echo 'selected = "selected"';
				}
			?>
			<label for="dateFormat"><?php _e('Date format', 'kush-micro-news');?>:</label>
 			<select name="dateFormat">
				<option <?php check_selected_date("d M Y");?> value="d M Y">20 Jan 1991</option>
				<option <?php check_selected_date("d/m/Y");?> value="d/m/Y">20/01/1991</option>
				<option <?php check_selected_date("d-m-Y");?> value="d-m-Y">20-01-1991</option>
				<option <?php check_selected_date("M d Y");?> value="M d Y">Jan 20 1991</option>
				<option <?php check_selected_date("m/d/Y");?> value="m/d/Y">01/20/1991</option>
				<option <?php check_selected_date("m-d-Y");?> value="m-d-Y">01-20-1991</option>
				<option <?php check_selected_date("Y M d");?> value="Y M d">1991 Jan 20</option>
				<option <?php check_selected_date("Y/m/d");?> value="Y/m/d">1991/01/20</option>
				<option <?php check_selected_date("Y-m-d");?> value="Y-m-d">1991-01-20</option>
				<option <?php check_selected_date("Y d M");?> value="Y d M">1991 20 Jan</option>
				<option <?php check_selected_date("Y/d/m");?> value="Y/d/m">1991/20/01</option>
				<option <?php check_selected_date("Y-d-m");?> value="Y-d-m">1991-20-01</option>
				<option <?php check_selected_date("hide");?> value="hide">Hide date</option>
			</select>
			<h5 style="display:inline-block;margin:0;">(Default: 20 Jan 1991)</h5>
		</div>
		<div class="options">
			<label for="chkBorder"><?php _e('Enable colorful borders', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="chkBorder" <?php $sBor=get_option('kush_mn_show_lborder');if($sBor=='true'){echo 'checked';}?>/>
		</div>
		<div class="options">
			<label for="chkHover"><?php _e('Enable link hover effect', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="chkHover" <?php $lHov=get_option('kush_mn_show_linkclean');if($lHov=='true'){echo 'checked';}?>/>
		</div>	

		<h3><?php _e('Input', 'kush-micro-news');?></h3>
		<div class="options">
			<label for="chkHtmlParse"><?php _e('HTML parsing while adding news', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="chkHtmlParse" <?php $lHov=get_option('kush_mn_parse_html');if($lHov=='true'){echo 'checked';}?>/>
			<h5 style="display:inline-block;margin:0;">(<?php _e('Try not to use improper markup if HTML parsing is enabled otherwise it could break up your whole site.', 'kush-micro-news');?>)</h5>
		</div>

		<h3><?php _e('Access', 'kush-micro-news');?></h3>
		<div class="options">
			<label for="editorAccess"><?php _e('Enable access to editors', 'kush-micro-news');?>:</label>
			<input type="checkbox" name="editorAccess" <?php $lHov=get_option('kush_mn_editor_access');if($lHov=='true'){echo 'checked';}?>/>
			<h5 style="display:inline-block;margin:0;">(<?php _e('Users with access level of editor.', 'kush-micro-news');?>)</h5>
		</div>
		
		<br/><br/>
		<input type="hidden" name="valSub" value="submitted"/>
		<input type="submit" value="Save Changes" class="button-primary"/>
		<br><hr>
		<?php _e('Download Backup of your Micro News data', 'kush-micro-news');?>: <a href="?backup=true" target="_blank" class="button-primary"><?php _e('Download', 'kush-micro-news');?></a>


		<br><hr>
		<?php _e('Update table storage', 'kush-micro-news');?>: <a href="?updatedb=true" target="_blank" class="button-primary"><?php _e('Update', 'kush-micro-news');?></a>
		<h5 style="display:inline-block;margin:0;"><?php _e('Create a backup first.', 'kush-micro-news');?></h5>
	</form>	
	<br><br>
	Note : Give <a href="http://plugins.svn.wordpress.org/kush-micro-news/trunk/readme.txt" target="_blank">readme.txt</a> a try before experimenting stuff if you have no idea what you are doing.
	
</div>
<script type="text/javascript">
	function check_custom_color(obj,elem){		
		jQuery(document).ready(function() {
			//changing values of sibling input field corresponding
			jQuery(obj).parent().find("input[type = text]").attr("value", obj.value);
		});
	}	
</script>
<?php
}

if(isset($_GET['updatedb']) && $_GET['updatedb']=='true')
	update_table();
function update_table(){
	$ver = get_option('kush_mn_db_version','0');
	$text = "";

	global $wpdb;
	$table_name = $wpdb->prefix . "kushmicronews";
	
	$rows_affected = 0;

	$rows_affected = $wpdb->query("ALTER TABLE `$table_name` CONVERT TO CHARACTER SET utf8");
	
	if($ver == "1.0")
	{	
		$rows_affected += $wpdb->query("ALTER TABLE `$table_name` ADD `category` varchar(20) DEFAULT 'default'");			
	}

	if($rows_affected > 0)
	{
		$text .= __('Updated Successfully!', 'kush-micro-news'); 
		update_option('kush_mn_db_version','1.1');
	}

	$text .= "Update Code:"+$rows_affected;
	$text .= " DB VERSION:"+get_option('kush_mn_db_version','0');

	echo $text;
}

function kush_micronews_check_dbupdate()
{
	$ver = get_option('kush_mn_db_version','0');

	if($ver != "0")
	{
		if($ver == "1.0")
		{
			echo "<div class='update-nag'>".__('URGENT: DATABASE UPDATE REQUIRED! Use button at the end of Settings page.', 'kush-micro-news')."</div>";
		}
	}
}

function micro_news_html_page(){
//Output of prestored news	
		
	kush_micro_news_output_admin();
	
}

function micro_news_html_page_add_new(){	
//notify user if there is db update required
kush_micronews_check_dbupdate();
$dbver = get_option('kush_mn_db_version','0');

$what='';	
	if(isset($_POST['k_mn_hidden']) && $_POST['k_mn_hidden']=='Y')
		{
		if(get_option('kush_mn_parse_html')=='false')
		{
			$title=sanitize($_POST['k_mn_title']);
			$content=nl2br(sanitize($_POST['k_mn_content'])); //nl2br will convert any new line character to br tag respectively
			$link=sanitize($_POST['k_mn_link']);
			
		}
		else
		{
			$title=$_POST['k_mn_title'];
			$content=($_POST['k_mn_content']); 
			$link=$_POST['k_mn_link'];

		}

		if(empty($_POST['k_mn_cat']) == false)
			$cat = $_POST['k_mn_cat'];
		else
			$cat = "default";

		global $wpdb;			
		$table_name = $wpdb->prefix . "kushmicronews";
		
		$query = "INSERT INTO `$table_name` (`time`,`name`,`text`,`url`,`category`) VALUES ('".date('Y-m-d H:i:s')."','$title','$content','$link','$cat');";
		if($dbver == '0' || $dbver == '1.0' || $dbver == '')
		{//database without category column, to overwrite query string
			$query = "INSERT INTO `$table_name` (`time`,`name`,`text`,`url`) VALUES ('".date('Y-m-d H:i:s')."','$title','$content','$link');";
		}		
			
		if($title!='')
			{				
			
			$rows_affected = $wpdb->query($query);
				
			if($rows_affected==true)
				{?><div class="updated"><p><strong><?php _e('New Post Added.','kush-micro-news'); ?></strong></p></div>'<?php }
			}
		else
			{$what=__('Don\'t you think atleast title is necessary.','kush-micro-news');}
		}

?>
<div class="wrap">
<div class="icon32" id="icon-tools"> <br /> </div>
<h2><?php _e('Micro News Add New Post','kush-micro-news');?></h2>

<?php if($what!=''){echo '<h3>'.$what.'</h3>';}?>

	<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" id="add-micro-news">
		<div>
			<div class="row">
				<label for="k_mn_title"><?php _e('Title','kush-micro-news');?>:</label>
				<input type="text" name="k_mn_title" placeholder="Title of News"/>
			</div>
			<div class="row">
				<label for="k_mn_content"><?php _e('Content','kush-micro-news');?>:</label>
				<textarea name="k_mn_content" placeholder="Excerpt">.</textarea>
			</div>
			<div class="row">
				<label for="k_mn_link"><?php _e('Link','kush-micro-news');?>:</label>
				<input type="text" name="k_mn_link" placeholder="Link Reference"/>
			</div>
			<?php if($dbver != '0' && $dbver != '1.0' && $dbver != '') :?>
				<div class="row">
					<label for="k_mn_cat"><?php _e('Category Key','kush-micro-news');?>:</label>
					<!-- <input type="text" name="k_mn_cat" placeholder="Category Key:" value="default"/> -->
					<select name="k_mn_cat">
					  <option value="default" selected>Default</option>
					  <option value="cata">CatA</option>
					  <option value="catb">CatB</option>
					  <option value="catc">CatC</option>
					  <option value="catd">CatD</option>
					</select>
				</div>
			<?php endif; ?>
			<input type="hidden" name="k_mn_hidden" value="Y">
			
			<div class="row">
				<input type="submit" value="<?php _e('Add New','kush-micro-news');?>" class="button-primary"/>
			</div>
		</div>
	</form>

	<div id="kush-micro-news-buyaredbull">
			If you found this plugin useful and want to support its development then please consider <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4BFA297YJX5QN" target="_blank">buying</a> it or you can make my <a href="http://www.amazon.in/gp/registry/wishlist/CDMUYYAWCCDF/ref=cm_wl_huc_view" target="_blank">amazon wishes</a> come true. 
			Decide price yourself by how useful it is for you and don't forget to <a href="http://wordpress.org/support/view/plugin-reviews/kush-micro-news" target="_blank">rate</a>. Thanks.
	</div>
	
</div>


<?php	
}

?>