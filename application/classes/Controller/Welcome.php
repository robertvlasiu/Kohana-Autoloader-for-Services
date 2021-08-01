<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{

	    $robert = new Robert(10);
	    $robert->execute(5);

	    $robert2 = new RobertClass(250);
	    $robert2->execute(10);


		$this->response->body('hello, world!');
	}

} // End Welcome
