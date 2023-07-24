<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string|null $language
 * @property string|null $reduction
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language', 'reduction'], 'string', 'max' => 255],
        ];
    }

    public function createRecord(){
        $language = Language::find()->asArray()->all();

        if(count($language)==0){
            $language = Yii::$app->db->createCommand(
            "insert into language (language, reduction)
                    values ('Абхазский','ab'),
                            ('Азербайджанский','az'),
                            ('Албанский','sq'),
                            ('Английский','en'),
                            ('Арабский','ar'),
                            ('Армянский','hy'),
                            ('Башкирский','ba'),
                            ('Белорусский','be'),
                            ('Болгарский','bg'),
                            ('Бретонский','br'),
                            ('Валлийский','cy'),
                            ('Венгерский','hu'),
                            ('Вьетнамский','vi'),
                            ('Галисийский','gl'),
                            ('Гренландский','kl'),
                            ('Греческий','el'),
                            ('Грузинский','ka'),
                            ('Индонезийский','id'),
                            ('Интерлингва','ia'),
                            ('Интерлингве','ie'),
                            ('Инуктитут','iu'),
                            ('Инупиак','ik'),
                            ('Ирландский','ga'),
                            ('Исландский','is'),
                            ('Испанский','es'),
                            ('Итальянский','it'),
                            ('Йоруба','yo'),
                            ('Казахский','kk'),
                            ('Каннада','kn'),
                            ('Киргизский','ky'),
                            ('Китайский','zh'),
                            ('Коми','kv'),
                            ('Конго','kg'),
                            ('Корейский','ko'),
                            ('Латинский','la'),
                            ('Латышский','lv'),
                            ('Люксембургский','lb'),
                            ('Молдавский','mo'),
                            ('Монгольский','mn'),
                            ('Немецкий','de'),
                            ('Непальский','ne'),
                            ('Нидерландский','nl'),
                            ('Норвежский','no'),
                            ('Осетинский','os'),
                            ('Персидский','fa'),
                            ('Польский','pl'),
                            ('Португальский','pt'),
                            ('Румынский','ro'),
                            ('Русский','ru'),
                            ('Сербский','sr'),
                            ('Словацкий','sk'),
                            ('Словенский','sl'),
                            ('Сомали','so'),
                            ('Таджикский','tg'),
                            ('Тайский',	'th'),
                            ('Таитянский','ty'),
                            ('Тамильский','ta'),
                            ('Татарский','tt'),
                            ('Тибетский','bo'),
                            ('Турецкий','tr'),
                            ('Туркменский','tk'),
                            ('Узбекский','uz'),
                            ('Украинский','uk'),
                            ('Филппинский','fl'),
                            ('Финский','fi'),
                            ('Французский','fr'),
                            ('Хорватский','hr'),
                            ('Чеченский','ce'),
                            ('Чешский','cs'),
                            ('Чувашский','cv'),
                            ('Шведский','sv'),
                            ('Эстонский','et'),
                            ('Японский','ja')
                            "
        )->query();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'reduction' => 'Reduction',
        ];
    }
}
