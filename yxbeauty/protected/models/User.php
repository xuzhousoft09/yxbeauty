<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $last_login_time
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Issue[] $issues
 * @property Project[] $tblProjects
 */
class User extends TrackStarActiveRecord
{
	public $addtime;
	public $url;
	public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/* array('email', 'required'), */
	        array('email, username, password', 'length', 'max'=>256),
	        array('email,username,password','required'),
			array('email, username', 'unique'),
				array('password_repeat','safe'),
				array('password','compare'),
				
			/* array('create_user_id, update_user_id', 'numerical', 'integerOnly'=>true), */
			
			/* array('last_login_time, create_time, update_time', 'safe'), */
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			/* array('id, email, username, password, create_user_id, update_user_id', 'safe', 'on'=>'search'), */
                array('id, email, username, password, last_login_time,create_time, create_user_id, update_time, update_user_id', 'safe',
						'on'=>'search'),
				
				array('url',
						'file',    //定义为file类型
						'allowEmpty'=>true,
						'types'=>'jpg,png,gif,doc,docx,pdf,xls,xlsx,zip,rar,ppt,pptx,txt',   //上传文件的类型
						'maxSize'=>1024*1024*10,    //上传大小限制，注意不是php.ini中的上传文件大小
						'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'
				),
				array('addtime', 'length', 'max'=>10),
				
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
			'issues' => array(self::HAS_MANY, 'Issue', 'owner_id'),
			'tblProjects' => array(self::MANY_MANY, 'Project', 'tbl_project_user_assignment(user_id, project_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'last_login_time' => 'Last Login Time',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	protected function afterValidate()
	{
		parent::afterValidate();
		$this->password=$this->encrypt($this->password);
	}
	public function encrypt($value)
	{
		return md5($value);
	}
	public function saveFilePath($file_path)
	{
		$sql="INSERT INTO tbl_user (file_path) VALUES ($file_path)";
		$command = Yii::app()->db->createCommand($sql);
		$username = $command->queryAll();
	}
	
}