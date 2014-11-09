<?php

/**
 * This is the model class for table "democracy".
 *
 * The followings are the available columns in table 'democracy':
 * @property integer $id
 * @property integer $id_system_status
 * @property string $keypress
 *
 * The followings are the available model relations:
 * @property SystemStatus $idSystemStatus
 */
class Democracy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'democracy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_system_status, keypress', 'required'),
			array('id_system_status', 'numerical', 'integerOnly'=>true),
			array('keypress', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_system_status, keypress', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idSystemStatus' => array(self::BELONGS_TO, 'SystemStatus', 'id_system_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_system_status' => 'Id System Status',
			'keypress' => 'Keypress',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_system_status',$this->id_system_status);
		$criteria->compare('keypress',$this->keypress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Democracy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 *	Returns the current democracy iteration (since we are having more than 1 democracy round on the same timer).
	 */	
	public function getCurrentIteration(){
		return (count(Democracy::model()->findAllByAttributes(array('id_system_status' => SystemStatus::model()->currentStatus())))+1);
	}

	/**
	 *	Saves the vote (creates a new Democracy model on the database)
	 *	@param $key the key voted by the user.
	 */
	public function saveVote($key){
		$d 					 = new Democracy();
		$d->id_system_status = SystemStatus::model()->currentStatus();
		$d->iteration 		 = Democracy::model()->getCurrentIteration();
		$d->keypress 		 = $key; 
		$d->save();
	}

	/** 
	 *	Finishes a democracy round and calculates the winner 
	 */
	public function finishRun(){
		$votes = array();
		$keys = getKeys(Yii::app()->params['active_game']);
		foreach($keys as $key){
			$votes[$key] = count(Democracy::model()->findAllByAttributes(array(
				'id_system_status' => SystemStatus::model()->currentStatus(),
				'iteration' 	   => Democracy::model()->getCurrentIteration(),
				'keypress'		   => $key)));
		}
		$index_max = array_search(max($votes), $votes);
		Command::model()->press($votes[$index_max]);
	}
}
