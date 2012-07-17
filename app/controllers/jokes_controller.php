<?php
/**
**	@Author: Pankaj
**	@Date: 28/05/2012
**  @Description: Controller to manage the basic functionality to manage the Jokes
**/
class JokesController extends AppController
{
	var $name = 'Jokes';	 
	var $helpers = array('Form', 'Html', 'Javascript', 'Session',  'Js');
	var $components = array('Session', 'RequestHandler');
	var $uses = Array('Joke');
	
	/**
	**	@Author: Pankaj
	**	@Date: 28/05/2012
	**  @Description: Default cake function, that is used to set data for all the controller executions
	**/
	function beforeFilter() {
		$this->layout = 'joke';
	}
	

	/**
	**	@Author: Pankaj
	**	@Date: 28/05/2012
	**  @Description: Main function for the jokes controller, List all the available jokes, with pagination
	**/
	function index() {
		
		$this->set('title_for_layout', 'Best Jokes');
		$paginate_cond = Array();

		$fields = "*";
		$conditions = Array();
		$this->paginate = array(
				'fields'		=> $fields,
				'conditions'	=> $conditions,
				'limit'			=> 10,
				'order'			=> array('id' => 'DESC')
				);
		
		$data = $this->paginate('Joke');
		$this->set(compact('data'));

		$this->set("paginate_cond", $paginate_cond);
	}

	/**
	**	@Author: Pankaj
	**	@Date: 28/05/2012
	**  @Description: Manage add new joke
	**/
	function add_new_joke() {
		
		$this->set('title_for_layout', 'Best Jokes - Adding A Joke');

		if(!empty($this->data))
		{
			$this->Joke->set( $this->data['Joke'] );

			if($this->Joke->validates())
			{
				if($this->Joke->save($this->data['Joke']))
				{
					$this->Session->setFlash('<p><strong>New joke was added successfully !!!</strong></p>', 'default', array('class' => 'msg msg-ok'));
					$this->redirect(BASE_URL);
				}
				else 
				{
					$this->Session->setFlash('<p><strong>New joke could not be added !!!</strong></p>', 'default', array('class' => 'msg msg-error'));
				}
			}
			else
			{
				$this->Session->setFlash('<p><strong>Please correct the validation errors !!!</strong></p>', 'default', array('class' => 'msg msg-error'));
			}
		}
		else
		{
			$this->data['Joke']['author'] = 'Admin';
		}

		$this->set(compact($this->data));

	}
	
	/**
	**	@Author: Pankaj
	**	@Date: 28/05/2012
	**  @Description: Manage editing an already existing joke data
	**/
	function edit_joke($joke_id = null) {
		
		$this->set('title_for_layout', 'Best Jokes - Editing A Joke');

		if(!empty($this->data))
		{
			$this->Joke->set( $this->data['Joke'] );
			if($this->Joke->validates())
			{
				if($this->Joke->save($this->data['Joke']))
				{
					$this->Session->setFlash('<p><strong>Changes saved successfully !!!</strong></p>', 'default', array('class' => 'msg msg-ok'));
					$this->redirect(BASE_URL);
				}
				else 
				{
					$this->Session->setFlash('<p><strong>Changes could not be saved !!!</strong></p>', 'default', array('class' => 'msg msg-error'));
				}
			}
			else
			{
				$this->Session->setFlash('<p><strong>Please correct the validation errors !!!</strong></p>', 'default', array('class' => 'msg msg-error'));
			}
		}

		$joke_data = $this->Joke->find('first', Array('conditions' => Array('id' => $joke_id)));
		$this->set('joke_data', $joke_data);
		
	}
	
	/**
	**	@Author: Pankaj
	**	@Date: 28/05/2012
	**  @Description: Delete the selected joke from database
	**/
	function delete_joke($joke_id = null) {
	
		if($this->Joke->delete($joke_id))
		{
			$this->Session->setFlash('<p><strong>Joke deleted successfully !!!</strong></p>', 'default', array('class' => 'msg msg-ok'));
		}
		else
		{
			$this->Session->setFlash('<p><strong>Joke could not be delete !!!</strong></p>', 'default', array('class' => 'msg msg-error'));
		}
		
		$this->redirect(BASE_URL);
	}
}