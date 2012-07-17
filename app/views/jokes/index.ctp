<div id="main">

	<?php  
	$sortDir = $paginator->sortDir();
	$sortKey = $paginator->sortKey();
	$paginator->options(array('url'=> $this->data['Joke'])); 
	?>

	<?php echo $form->create(null,  Array('url' => BASE_URL.'add_new_joke/', 'id' => 'showJokes')); ?>
	
		<div style="clear: both;">
			<div style="float: left; padding-bottom: 11px; width:25%;">
				<h3>Manage Jokes</h3>
			</div>
			<div style="float: right; margin-top: 10px; width:67%;" class="search_tbl" >
				<table style="width:100%;">
					<tr>
						<td align="right"><?php echo $form->button('Add Joke', Array("alt" => 'Add New User', "title" => 'Add New Joke', 'url' => BASE_URL.'jokes/add_new_joke/')); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="clear"></div>
		
			
		<table cellpadding="0" cellspacing="0" width="100%" border="0">
			<tr>
				<th align="left" width="30%">
					<?php echo $paginator->sort('Title', 'title', Array('class' => 'tbl_heading')); ?>
					<?php if($sortKey == 'Joke.title' && $sortDir == 'asc') {?>
						<?php echo $html->image('0pdown.gif', array('alt' => 'ASC', "border" => '0'));?>
					<?php } else if($sortKey == 'Joke.title' && $sortDir == 'desc') { ?>
						<?php echo $html->image('0ptop.gif', array('alt' => 'DESC', "border" => '0'));?>
					<?php }?>	 
				</th>
				<th align="left" width="20%">
					<?php echo $paginator->sort('Author', 'author', Array('class' => 'tbl_heading')); ?>
					<?php if($sortKey == 'Joke.author' && $sortDir == 'asc') {?>
						<?php echo $html->image('0pdown.gif', array('alt' => 'ASC', "border" => '0'));?>
					<?php } else if($sortKey == 'Joke.author' && $sortDir == 'desc') { ?>
						<?php echo $html->image('0ptop.gif', array('alt' => 'DESC', "border" => '0'));?>
					<?php }?>	 
				</th>
				<th align="left">
					<?php echo $paginator->sort('Content', 'content', Array('class' => 'tbl_heading')); ?>
					<?php if($sortKey == 'Joke.content' && $sortDir == 'asc') {?>
						<?php echo $html->image('0pdown.gif', array('alt' => 'ASC', "border" => '0'));?>
					<?php } else if($sortKey == 'Joke.content' && $sortDir == 'desc') { ?>
						<?php echo $html->image('0ptop.gif', array('alt' => 'DESC', "border" => '0'));?>
					<?php }?>	 
				</th>
				<th width="20%" align="right"><a class="tbl_heading">Action</a></th>
			</tr>
			
			<?php if(count($data) > 0) { 
				$counter = 1; 
				foreach($data as $joke) { ?>
				
				<tr <?php if($counter % 2 == 0) echo 'class="odd"'; ?> id="tr_<?php echo $joke['Joke']['id']; ?>" >
					<td valign="top"><?php echo $joke['Joke']['title']; ?></td>
					<td valign="top"><?php echo $joke['Joke']['author'] ?></td>
					<td valign="top"><?php echo $joke['Joke']['content'] ?></td>
					
					<td class="action" align="center" width="20%" valign="top">
						
						<a href="<?php echo BASE_URL.'edit_joke/'.$joke['Joke']['id'];?>">
							<?php echo $html->image('edit.gif',Array('title' => 'Edit', 'alt' => 'Edit'));?>
						</a> 
						<a href="javascript:void(0);" onclick="confirm_delete_joke(<?php echo $joke['Joke']['id']; ?>);">
							<?php echo $html->image('del.gif',Array('title' => 'Delete', 'alt' => 'Delete'));?>
						</a> 

					</td>
				</tr>
				
			<?php $counter++; } 
				} else { ?>
			
					<tr><td colspan="7" align="center"><strong style="color:red;">No records available!</strong></td></tr>
				
			<?php } ?>
			
		</table>
		
		
		<!-- Pagging -->
		<?php $paginator->options(array('url' => $paginate_cond,
				'update' => '#container_inner',
				'evalScripts' => true,
				'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
				'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
				'class' => 'tirgger_me'	
				)); ?>
		<div class="pagging">
			<div class="left">
				<?php echo $paginator->counter(array('format' => 'Showing %start%-%end% of %count%')); ?>
			</div>
			
			<?php $pg = $paginator->numbers( Array('separator'=>'')); ?> 
			<div class="right">
				<?php if(!empty($pg)) {?>
				<?php echo $paginator->prev(__('Previous', true), array(), null, array('class'=>'disabled'));?>
				<?php echo $pg;?>
				<?php echo $paginator->next(__('Next', true), array(), null, array('class'=>'disabled'));?>
				<?php } ?>
			</div>
		</div>
		<!-- End Pagging -->

	<?php echo $form->end(); ?>

	  <div style="float:left; margin-top:10px; width:100%" class="search_tbl" >
	   <fieldset>
		<legend>Icon Information </legend>
		  <table>
		   <tr>
			  <td><?php echo $html->image('edit.gif')?>&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			   <span style="margin-left:15px;">  <?php echo $html->image('del.gif')?>&nbsp;&nbsp;Delete</span>
			  </td>
			</tr>
		  </table> 
		</fieldset>       
	  </div>
	  <div class="clear"></div><br/>

</div>

<script type="text/javascript">
function confirm_delete_joke(id)
{
	if(confirm('Do you really want to delete the selected joke ?')) {
		window.location.href = "<?php echo BASE_URL.'delete_joke/'; ?>"+id;
	}
}
</script>