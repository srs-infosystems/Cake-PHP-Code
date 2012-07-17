<?php echo $html->docType(); ?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<?php echo $html->meta('description', 'enter any meta description here'   );?>
	<?php echo $html->meta('keywords', 'enter any meta keyword here');?>
	<?php echo $html->meta('favicon.ico', BASE_URL.'img/logo.jpeg',    array('type' => 'icon'));?>
	<?php echo $html->charset('ISO-8859-1'); ?>
	<title><?php echo $title_for_layout;?></title>
	<?php echo $html->css(Array('validationEngine.jquery', 'style')); ?>
	<?php echo $html->script(Array('jquery', 'jquery.validationEngine')); ?>
	<?php echo $javascript->link('languages/jquery.validationEngine-en'); ?> 
</head>
<body>
	
	<div id="wrapper">

		 <table>
			  <tr>
				 <td style="vertical-align:text-top; " valign="top">
					<font style="font-size: 26pt; font-weight: bold; font-family: Verdana;">Best Jokes</font>
				</td>
				
				<td valign="top" style="padding-top:0px; margin-top:0px;">   
					&nbsp;    
			   </td>
			 </tr>
		 
		 </table> 

		<div id="containerHolder">
			
			<div id="container">
				<div id="show_error_msg"></div>
				<?php $msg = $session->flash();?>
				<?php if(!empty($msg)) { ?>
					<!-- Message Error -->
					 <?php echo $msg;?> 
					<!-- End Message Error -->
				<?php } ?>
				
				<?php echo $content_for_layout;?>
				
				<div class="clear"></div>
			
			</div>
		</div>
	</div>
		
</body>
</html>