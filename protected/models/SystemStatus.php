<?php
class SystemStatus extends CApplicationComponent {
	const ANARCHY   = 1;
	const DEMOCRACY = 0;

	public $mode;

	/**
	 *	Returns the current system status in words.
	 */
	public function status_words(){
		return (Yii::app()->systemStatus->mode == SystemStatus::ANARCHY)?'Anarquía':'Democracia';
	}

	/**
	 * Updates the current status.
	 */
	public function change_status()
	{
		if($this->mode == SystemStatus::ANARCHY)
			$this->mode = SystemStatus::DEMOCRACY;
		else
			$this->mode = SystemStatus::ANARCHY;
	}
}