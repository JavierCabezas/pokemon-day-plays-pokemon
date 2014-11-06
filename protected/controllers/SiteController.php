<?php

class SiteController extends Controller
{
	/**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'index',
                    'login',
                    'logout',
                    'error',
                    'thanks',
					'commands',
                ),
                'users' => array(
                    '*'
                )
            ),
           	array(
                'allow',
                'actions' => array(
                    'play',
                    'ajaxSendCommand',
                    'ajaxExcecuteCommand',
                    'ajaxUpdateCommands',
                ),
                'users' => array(
                    '@'
                )
            ),
            array('deny')
        );
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->redirect(array('/site/play'));
	}

	/** 
	 *	Renders the main view for the player to play (the gameboy control pad)
	 */
	public function actionPlay()
	{
		if(Yii::app()->params['active_game'] == 'gba')
			$this->render('gba');
	}

	/** 
	 *	Renders a pretty simple view thanking the player for playing.
	 */
	public function actionThanks()
	{
		$this->render('thanks');
	}

	/**
	 * This is the main commmunication function from the client side.
	 * Recieves a POST request with the key to press from the play view. 
	 * It opens a socket to send this key to the python application so python can actually emulate the keypress.
	 */
	public function actionAjaxSendCommand()
	{
		if(isset($_POST['key'])){
			$host = "127.0.0.1";
			$port = 2000;
			$socket1 = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create socket\n");
			socket_connect($socket1, $host, $port);
			socket_write($socket1, $_POST['key'], strlen ($_POST['key'])) or die("Could not write output\n");
			socket_close($socket1);
		}
	}

	/**
	 *	This function calls the script to exeggcute (hehe) the keypress command.
	 *	It also saves a database entry with the given move. 
	 */
	public function actionAjaxExcecuteCommand()
	{
		$game 	= Yii::app()->params['active_game'];
		
		if(isset($_POST['key'])){
			$k = $_POST['key'];

			$key_in_words 	= translateKey($k, $game);
			if($key_in_words == -1) break; //Just to be sure

			$c 				= new Command();
			$c->nick 		= Yii::app()->user->name;
			$c->time 		= currentTime();
			$c->game 		= $game;
			$c->button 		= $key_in_words;
			$c->ip 			= $_SERVER['REMOTE_ADDR'];
			$c->save();


			switch ($k) {
			  case 'z':
			  		$args = 'z.sh'; break;
			  case 'a':
			  		$args = 'a.sh'; break;
			  case 'b':
			  		$args = 'b.sh'; break;
			  case 'd':
			  		$args = 'd.sh'; break;
			  case 'l':
			  		$args = 'l.sh'; break;
			  case 'm':
			  		$args = 'm.sh'; break;
			  case 'n':
			  		$args = 'n.sh'; break;
			  case 'r':
			  		$args = 'r.sh'; break;
			  case 's':
			  		$args = 's.sh'; break;
			  case 'w':
			  		$args = 'w.sh'; break;
			  case 'x':
			  		$args = 'x.sh'; break;
			  case 'z':
			  		$args = 'z.sh'; break;
			  case 'speed':
			  		$args = 'speed.sh'; break;
			}

			//$exec = Yii::getPathOfAlias('webroot').'/keypress/script/'.$args;
			//$output = shell_exec('sh '.$exec.' 2>&1'); //2>&1
			//echo $output." ";
		
		
		}
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionCommands()
	{
		$commands = Command::model()->findAll(array("order" => "id DESC", "limit" => 50));
		$this->render('commands', array(
			'commands' => $commands
		));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('/site/thanks'));
	}

	public function actionAjaxUpdateCommands()
	{
		if(isset($_POST['key'], $_POST['nickname'], $_POST['time'])){

		}
	}
}