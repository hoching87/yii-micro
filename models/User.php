<?php

namespace app\models;

use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string|null $description
 * @property string $created_at
 * @property string|null $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%user}}';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name', 'created_at'], 'required'],
			[['type'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['name'], 'string', 'max' => 64],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'type' => 'Type',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}
	
	/**
	 * Finds an identity by the given token.
	 *
	 * @param string $token the token to be looked for
	 * @return IdentityInterface|null the identity object that matches the given token.
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['auth_key' => $token]);
	}

	/**
	 * @return int|string current user ID
	 */
	public function getId()
	{
		return $this->id;
	}

	public static function findIdentity($id)
	{
	}

	public function getAuthKey()
	{
	}

	public function validateAuthKey($authKey)
	{
	}

	// generate auth key on new user
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->auth_key = \Yii::$app->security->generateRandomString();
			}
			return true;
		}
		return false;
	}
}
