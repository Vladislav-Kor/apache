<?php

namespace app\repositories;

use PDOException;
use yii\db\mssql\PDO;
use app\dto\PoliceRepositoriesDto;

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

    private $setting;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
        $this->username = \Yii::$app->params['username'];
        $this->password = \Yii::$app->params['dbPswd'];
        $this->dsn = \Yii::$app->params['dsn'];
        $this->setting = new PDO($this->dsn, $this->username, $this->password);
        $this->setting->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPolice(): array
    {
        $res = [];
        $array = [];
        try {
            
            $connect = $this->setting->prepare("SELECT * FROM police");
            $connect->execute();
            while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {
                $array[] = $row;
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
        foreach ($array as $obj) {
            $dto = new PoliceRepositoriesDto($obj);
            
            $res[] = $dto->status;/*$this->hydrator->hydrate(Accordion::class, [
                'id' => new AccordionId($dto->id),
                'text1' => ($dto->text1 === null) ? null : new AccordionText($dto->text1),
                'text2' => ($dto->text2 === null) ? null : new AccordionText($dto->text2),
                'active' => new AccordionActive($dto->active === 1),
                'solutionId' => new SolutionId($dto->solutionId),
                'sort' => new AccordionSort($dto->sort)
            ]);*/
        }

        return $res;
    }
}
