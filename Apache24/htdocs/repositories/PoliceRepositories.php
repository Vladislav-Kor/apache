<?php

namespace app\repositories;

class PoliceRepositories
{
    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $dsn;



    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
        $this->username = \Yii::$app->params['username'];
        $this->password = \Yii::$app->params['dbPswd'];
        $this->dsn = \Yii::$app->params['dsn'];

    }

    public function getPolice(): array
    {
        $setting = new PDO($this->dsn, $this->username, $this->password);
        $setting->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $connect = $setting->prepare("SELECT * FROM police");
        $connect->execute();
        
        $data = [];
        
        // Получение данных в виде ассоциативного массива
        while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        var_dump($data);
        return $data;
    }
}