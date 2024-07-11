<?php


namespace app\models;

use PDOException;
use yii\db\mssql\PDO;
use app\repositories\Hydrator;
use app\repositories\PoliceRepositories;


class Db
{
    public function result(){
        $res = '';

        try {
            $conn = new PDO(\Yii::$app->params['dsn'], \Yii::$app->params['username'], \Yii::$app->params['dbPswd']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            var_dump(new PoliceRepositories(new Hydrator()));
            $sql = "SELECT * FROM police";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $res = '<table border="1">';
            $res .= '<tr>';

            // Получение имен столбцов
            $columnNames = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
            foreach ($columnNames as $name) {
                $res .= '<th>' . $name . '</th>';
            }

            $res .= '</tr>';

            // Сброс курсора на начало
            $stmt->execute();

            // Вывод результатов в таблицу
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res .= '<tr>';
                foreach ($row as $value) {
                    $res .= '<td>' . $value . '</td>';
                }
                $res .= '</tr>';
            }

            $res .= '</table>';

            $conn = null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $res;

    }
}
