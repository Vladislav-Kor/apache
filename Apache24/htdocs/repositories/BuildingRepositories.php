<?php
/**
 * @author Vladislav-Kor
 * @email corchagin.vlad2005@yandex.ru
 * @create date 2024-07-12
 * @modify date 2024-07-12
 * @desc [description]
 */

namespace app\repositories;

use PDOException;
use yii\db\mssql\PDO;
use app\entities\Building\Building;
use app\dto\BuildingRepositoriesDto;
use app\entities\Building\BuildingName;

class BuildingRepositories
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

    /**
     * @var PDO
     */
    private $setting;

    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
        $this->username = \Yii::$app->params['username'];
        $this->password = \Yii::$app->params['dbPswd'];
        $this->dsn = \Yii::$app->params['dsn'];
        try {
            $this->setting = new PDO($this->dsn, $this->username, $this->password);
            $this->setting->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException("Ошибка подключения, возможно вы указали не действительный путь до (*.mdb) файла
            <br>Подробности ошибки: " . mb_convert_encoding($e->getMessage(), "utf-8", "windows-1251"));
        }
        
    }

    public function getBuilding(): array
    {
        $res = [];
        $array = [];
        try {
            $connect = $this->setting->prepare("SELECT * FROM building");
            $connect->execute();
            while ($row = $connect->fetch(PDO::FETCH_ASSOC)) {
                $array[] = $row;
            }
        } catch (PDOException $e) {
            throw new PDOException("Ошибка: " . mb_convert_encoding($e->getMessage(), "utf-8", "windows-1251"));
        }
        
        foreach ($array as $obj) {
            $dto = new BuildingRepositoriesDto($obj);
            $res[] = $this->hydrator->hydrate(Building::class, [
                'name' => new BuildingName($dto->name)
            ]);
        }

        return $res;
    }
}
