<div id="main">
	
	<?php echo $form->create(null,  Array('url' => '', 'id' => 'frmAddNewJoke')); ?>
	
		<div style="float: left; padding-bottom: 11px; width:25%;"><h3>Add new joke</h3></div>
		<div class="clear"></div>

		<div class="search_tbl">
			<table>
				<tr>
					<td>Title:</td>
					<td><?php echo $form->input('Joke.title', array('div' => false, 'label'=>false, 'class'=> "validate[required]")); ?> </td>
				</tr>
				<tr>
					<td>Author:</td>
					<td><?php echo $form->input('Joke.author', array('div' => false, 'label'=>false, 'class'=> "validate[required]")); ?> </td>
				</tr>
				<tr>
					<td valign="top">Content:</td>
					<td><?php echo $form->input('Joke.content', array('type' => 'textarea', 'div' => false, 'label'=>false, 'class'=> "validate[required]")); ?> </td>
				</tr>
				<tr>
					<td colspan="2" align="left">
						<?php echo $form->button('Back', array('type' => 'button', 'title' => 'Back', 'onclick' => "javascript: window.location.href='".BASE_URL."';", 'div' => false, 'label' => false));  ?>
						<?php echo $form->submit('Submit', array('title' => 'Submit', 'div' => false, 'label' => false));  ?>
					</td>
				</tr>
			</table>
		</div>

	<?php echo $form->end(); ?>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#frmAddNewJoke').submit(function(){
			$(this).find('input:text,textarea').each(function(){
				$(this).val($.trim($(this).val()));
			});
		});

		$("#frmAddNewJoke").validationEngine();
});
</script>