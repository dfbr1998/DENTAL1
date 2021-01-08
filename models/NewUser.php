<?php

namespace app\models;
use yii\data\ActiveDataProvider;

use Yii;

/**
 * This is the model class for table "new_user".
 *
 * @property int $idnew_user
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string|null $accessToken
 * @property int $accesspower
 */
class NewUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accesspower'], 'integer'],
            [['username', 'email', ], 'string', 'max' => 80],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'accesspower' => 'Accesspower',
        ];
    }
	public static function findIdentity($id){
		return self::findOne($id);	
	}
	public static function findIdentityByAccessToken($token, $type=null){
		return self::findOne(['accessToken'=>$token]);	
	}
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);	
	}
	public function getId(){
		return $this->id;
	}
	public function getAuthKey(){
		return $this->authKey;
	}
	public function validateAuthKey($authKey){
	return $this->authKey == $authKey;
	}
	public function validatePassword($password){
	return password_verify($password, $this->password);
	}
    public function search($params)
    {
        $query = NewUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'accesspower' => $this->accesspower,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken]);

        return $dataProvider;
    }
}
