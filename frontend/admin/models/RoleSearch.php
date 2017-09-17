<?php

namespace app\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\admin\models\Role;

/**
 * RoleSearch represents the model behind the search form about `app\admin\models\Role`.
 */
class RoleSearch extends Role
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid', 'createdby', 'updatedby'], 'integer'],
            [['rolename', 'rolestatus', 'createdon', 'updatedon'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Role::find();

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
            'roleid' => $this->roleid,
            'createdby' => $this->createdby,
            'createdon' => $this->createdon,
            'updatedby' => $this->updatedby,
            'updatedon' => $this->updatedon,
        ]);

        $query->andFilterWhere(['like', 'rolename', $this->rolename])
            ->andFilterWhere(['like', 'rolestatus', $this->rolestatus]);

        return $dataProvider;
    }
}
