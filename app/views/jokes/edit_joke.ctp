<div id="main">
	
	<?php echo $form->create(null,  Array('url' => '', 'id' => 'frmEditJoke')); ?>
	
		<div style="float: left; padding-bottom: 11px; width:25%;"><h3>Edit joke</h3></div>
		<div class="clear"></div>

		<div class="search_tbl">
			<table>
				<tr>
					<td>Title:</td>
					<td><?php echo $form->input('Joke.title', array('div' => false, 'label'=>false, 'class'=> "validate[required]", 'value' => $joke_data['Joke']['title'])); ?> </td>
				</tr>
				<tr>
					<td>Author:</td>
					<td><?php echo $form->input('Joke.author', array('div' => false, 'label'=>false, 'class'=> "validate[required]", 'value' => $joke_data['Joke']['author'])); ?> </td>
				</tr>
				<tr>
					<td valign="top">Content:</td>
					<td><?php echo $form->input('Joke.content', array('type' => 'textarea', 'div' => false, 'label'=>false, 'class'=> "validate[required]", 'value' => $joke_data['Joke']['content'])); ?> </td>
				</tr>
				<tr>
					<td colspan="2" align="left">
						<?php echo $form->button('Back', array('type' => 'button', 'title' => 'Back', 'onclick' => "javascript: window.location.href='".BASE_URL."';", 'div' => false, 'label' => false));  ?>
						<?php echo $form->submit('Submit', array('title' => 'Submit', 'div' => false, 'label' => false));  ?>
					</td>
				</tr>
			</table>
		</div>

		<?php echo $form->hidden('Joke.id', array('value' => $joke_data['Joke']['id'])); ?>

	<?php echo $form->end(); ?>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#frmEditJoke').submit(function(){
			$(this).find('input:text,textarea').each(function(){
				$(this).val($.trim($(this).val()));
			});
		});

		$("#frmEditJoke").validationEngine();
});
</script>