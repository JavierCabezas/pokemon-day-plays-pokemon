<?php

/**
 * This is the model class for table "command".
 *
 * The followings are the available columns in table 'command':
 * @property integer $id
 * @property string $nick
 * @property string $time
 * @property string $game
 * @property string $button
 * @property string $ip
 */
class Command extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'command';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nick, time, game, button, ip', 'required'),
            array('nick', 'length', 'max' => 25),
            array('time', 'length', 'max' => 10),
            array('game, button', 'length', 'max' => 20),
            array('ip', 'length', 'max' => 16),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nick, time, game, button, ip', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'nick' => 'Nick',
            'time' => 'Time',
            'game' => 'Game',
            'button' => 'Button',
            'ip' => 'Ip',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nick', $this->nick, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('game', $this->game, true);
        $criteria->compare('button', $this->button, true);
        $criteria->compare('ip', $this->ip, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Command the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     *    Returns the complete command given by the user
     *    The format of the "complete" command its: Nickname (in bold) : command time
     */
    public function getComplete()
    {
        return '<b>' . $this->nick . '</b> ' . $this->button . ' (' . $this->time . ')';
    }

    /**
     * Presses a key given by params
     * @param $key the key to press
     */
    public function press($key)
    {
        switch ($key) {
            case 'z':
                $args = 'z.sh';
                break;
            case 'a':
                $args = 'a.sh';
                break;
            case 'b':
                $args = 'b.sh';
                break;
            case 'd':
                $args = 'd.sh';
                break;
            case 'l':
                $args = 'l.sh';
                break;
            case 'm':
                $args = 'm.sh';
                break;
            case 'n':
                $args = 'n.sh';
                break;
            case 'r':
                $args = 'r.sh';
                break;
            case 's':
                $args = 's.sh';
                break;
            case 'w':
                $args = 'w.sh';
                break;
            case 'x':
                $args = 'x.sh';
                break;
            case 'z':
                $args = 'z.sh';
                break;
            case 'speed':
                $args = 'speed.sh';
                break;
        }

        $exec = Yii::getPathOfAlias('webroot').'/keypress/script/'.$args;
        $output = shell_exec('sh '.$exec.' 2>&1'); //2>&1
        echo $output." ";
    }

    /*
     * Records the key pressed by the user to show them in the history of the commands view
     * @param string key_in_words the pressed key
     */
    public function recordKeystroke($key_in_words){
        $c = new Command();
        $c->nick = Yii::app()->user->name;
        $c->time = currentTime();
        $c->game = Yii::app()->params['active_game'];
        $c->button = $key_in_words;
        $c->ip = $_SERVER['REMOTE_ADDR'];
        $c->save();
    }
}
