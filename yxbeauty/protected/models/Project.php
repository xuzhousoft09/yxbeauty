<?php

/**
 * This is the model class for table "tbl_project".
 *
 * The followings are the available columns in table 'tbl_project':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer deposit
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class Project extends TrackStarActiveRecord
{
	public $deposit;
	public $consumptions;
	public $telephone;
	public $balance;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Project the static model class
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
		return 'tbl_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deposit,telephone,create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('description,telephone,deposit,create_time, update_time', 'safe'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description,deposit,telephone,create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		    array('name', 'required'),
		    
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
		    'issues'=>array(self::HAS_MANY, 'Issue', 'project_id'),
		    'users'=>array(self::MANY_MANY, 'User', 'tbl_project_user_assignment(project_id,user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '姓名',
			'description' => '备注',
			'telephone' => '电话',
			'deposit'=>'充值总额',
			'consumptions'=>'消费总额',
			'balance'=>'余额',
			'create_time' => '创建时间',
			'create_user_id' => '创建用户ID',
			'update_time' => '更新时间',
			'update_user_id' => '更新用户ID',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('deposit',$this->deposit,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getUserOptions()
	{
	     $usersArray=CHtml::listData($this->users,'id','username'); 
	    
	 
	    return $usersArray; 
	}
	public function associateUserToRole($role, $user_id)
	{
	$sql = "INSERT INTO tbl_project_user_role (project_id, user_id,role) VALUES (:project_id, :user_id, :role)";
	$command = Yii::app()->db->createCommand($sql);
	$command->bindValue(":project_id", $this->id, PDO::PARAM_INT);
	$command->bindValue(":user_id", $user_id, PDO::PARAM_INT);
	$command->bindValue(":role", $role, PDO::PARAM_STR);
	return $command->execute();
	}
	public function removeUserFromRole($role, $user_id)
	{
		$sql="DELETE FROM tbl_project_user_role WHERE project_id=:project_id AND user_id=:user_id AND role=:role";
		$command=Yii::app()->db->createCommand($sql);
		$command->blindValue(":project_id",$this->id, PDO::PARAM_INT);
		$command->blindValue(":user_id", $user_id, PDO::RARAM_INT);
		$command->blindValue(":role", $role, PDO::PARAM_STR);
		return $command->execute();
	}
/* 	public function isUserInRole($role)
	{
		$sql="SELECT role FROM tbl_project_user_role WHERE project_id=:project_id AND user_id=:user_id AND role=:role";
		$command=Yii::app()->db->createCommand($sql);
		
		$command->bindValue(":project_id",$this->id, PDO::PARAM_INT);
		$command->bindValue(":user_id", Yii::app()->user->getId(),PDO::PARAM_INT );
		$command->bindValue(":role",$role, PDO::PAPAM_STR);
		return $command->execute()==1?true:false;
		
	} */
		public function isUserInRole($role)
		{
			$sql = "SELECT role FROM tbl_project_user_role WHERE project_id=:projectId AND user_id=:userId AND role=:role";
			$command = Yii::app()->db->createCommand($sql);
			$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
			$command->bindValue(":userId", Yii::app()->user->getId(),PDO::PARAM_INT);
			$command->bindValue(":role", $role, PDO::PARAM_STR);
			return $command->execute()==1 ? true : false;
		}
		
	public static function getUserRoleOptions()
	{
		return CHtml::listData(Yii::app()->authManager->getRoles(),'name','name');
	}
	public function associateUserToProject($user)
	{
		$sql="INSERT INTO tbl_project_user_assignment(project_id,user_id) VALUES (:project_id,:user_id)";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":project_id", $this->id, PDO::PARAM_INT);
		$command->bindValue(":user_id", $user->id, PDO::PARAM_INT);
		return $command->execute();
	}
	/* public function isUserInProject($user)
	{
		$sql="SELECT user_id FROM tbl_project_user_assignment WHERE project_id=:project_id AND user_id=:user_id";
		$command=Yii::app()->db->createCommand($sql);
		var_dump($command);exit;
		$command->blindValue(":project_id",$this->id,PDO::PARAM_INT);
		$command->blindValue(":user_id",$user->id,PDO::PARAM_INT);
		return $command->execute()==1 ? true:false;
	} */
	public function isUserInProject($user)
	{
		$sql ="SELECT user_id FROM tbl_project_user_assignment WHERE project_id=:projectId AND user_id=:userId";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
		$command->bindValue(":userId", $user->id, PDO::PARAM_INT);
		return $command->execute()==1;
	}
	public function caculateTheConsumptions($id)
	{
		$sql = "select sum(consumption) as consumptions from tbl_issue where project_id = :projectId";
		$command = Yii::app()->db->createCommand($sql);
		$command = bindValue(":projectId", $id, PDO::PARAM_INT );
		return $command->execute()==1;
	}
}