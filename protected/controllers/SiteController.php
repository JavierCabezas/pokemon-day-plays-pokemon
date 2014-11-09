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
                    'ajaxExeggcuteCommand',
                    'ajaxUpdateCommands',
                    'ajaxChangeStatus',
                ),
                'users' => array(
                    '@'
                )
            ),
            array(
                'allow',
                'actions' => array(
                    'ajaxUpdateCommands',
                    'ajaxChangeStatus',
                    'commands',
                ),
                'users' => array(
                    'Javier'
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
	public function actionAjaxExeggcuteCommand()
	{
		$game 	= Yii::app()->params['active_game'];
        if(isset($_POST['key'])) {
            $k = $_POST['key'];

            $key_in_words = translateKey($k, $game);
            if ($key_in_words == -1) return null; //Just to be sure
            Command::model()->recordKeystroke($key_in_words);

            if(SystemStatus::model()->currentStatus == SystemStatus::ANARCHY) {
                Command::model()->press($k);
            }else{ //DEMOCRACY.
            	
            }
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


	/** 
	 *	Renders the "commands" view. This view shows an scrollable list of the last commands and shows the countdown 
	 *	between the anarchy and democracy modes.
	 */
	public function actionCommands()
	{
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/countdown.js');
		$this->render('commands');
	}

	/** 
	 *	Shows the view of the last commands
	 */
	public function actionAjaxUpdateCommands(){
		echo $this->renderPartial('_commands', array('commands' => Command::model()->findAll(array("order" => "id DESC", "limit" => 50)), true));
	}

	public function actionAjaxChangeStatus(){
        echo SystemStatus::model()->NextSystemStatus();
		SystemStatus::model()->changeStatus();
    }
}