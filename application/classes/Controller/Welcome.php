<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{

//	    $robert = new Robert2(10);
//	    $robert->execute(5);
//
//	    $robert = new Services_RobertTest(10);
//	    $robert->execute(5);

//	    $robert2 = new RobertClass(250);
//	    $robert2->execute(10);

//	    $model = new Model_Test();
//	    $model->do_stuff();

//	    $model2 = new Model_User_Registration_Registration();
//	    $model2->do_stuff();

//	    $model2 = new Model_Registration();
//	    $model2->do_stuff();

        $socialMedias = [new FacebookConcreteCreator(), new InstagramConcreteCreator()];

        foreach ($socialMedias as $media) {
            $postOnMedia = new PostOnMediaService($media);
            $postOnMedia->execute();
        }


		$this->response->body('hello, world!');
	}

} // End Welcome
