<?php
/**
**	@Author: Pankaj
**	@Date: 28/05/2012
**  @Description: Define the model, to make use of the jokes table, also, define some validation rules.
**/
 class Joke  extends AppModel {
	var $name = 'Joke';
	 
	var $validate = array(	 
			'title'	=> Array(
				'not_empty' => array(
								'rule' 		 => 'notEmpty',
								'message' 	 => 'Title is required'
								),
				'is_unique' => array(
								'rule'		 => 'isUnique',
								'message'	 => 'Joke title already exists',
								)
					),
			'author'	=> array(
					'rule' 		 => 'notEmpty',
					'message' 	 => 'Author is required'
					),
			'content'	=> array(
					'rule' 		 => 'notEmpty',
					'message' 	 => 'Content is required'
					),
		);


	
}