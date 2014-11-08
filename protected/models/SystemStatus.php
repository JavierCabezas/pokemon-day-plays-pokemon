<?php

/**
 * This is the model class for table "system_status".
 *
 * The followings are the available columns in table 'system_status':
 * @property integer $id
 * @property integer $status
 * @property string $time
 */
class SystemStatus extends CActiveRecord
{
	const ANARCHY   = 1;
	const DEMOCRACY = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'system_status';
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Status',
			'time' => 'Time',
		);
	}

	/**
	 *	Returns the current system.
	 */
	public function currentStatus(){
		$criteria=new CDbCriteria;
		$criteria->limit = 1;
        $criteria->order = 'time DESC';
        return SystemStatus::model()->find($criteria)->status;
	}

	/**
	 *	Returns the next system status.
	 */
	public function nextStatus(){
		$currentStatus = SystemStatus::model()->currentStatus();
		return ($currentStatus == SystemStatus::ANARCHY)? SystemStatus::DEMOCRACY : SystemStatus::ANARCHY;
	}

	/**
	 * Updates the current status.
	 */
	public function changeStatus()
	{
		$s = new SystemStatus();
		$s->status = SystemStatus::model()->nextStatus();
		$s->time   = time();
		$s->save();
	}

	/** 
	 *	Returns the current system status in words.
	 */
	public function NextSystemStatus(){
		$status = SystemStatus::model()->nextStatus();
		return ($status == SystemStatus::ANARCHY)? 'Anarquía' : 'Democracia';
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SystemStatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
