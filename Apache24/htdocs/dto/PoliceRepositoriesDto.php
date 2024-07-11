<?php

namespace app\dto;

class PoliceRepositoriesDto
{
    public $id;
    public $building;
    public $floor;
    public $room;
    public $date;
    public $status;
    /**
     * __construct.
     *
     * @param array $data
     */
    public function __construct($data = null)
    {
        if (\is_array($data)) {
            if (isset($data['ID'])) {
                $this->id = (int) $data['ID'];
            }
            if (isset($data['building_name'])) {
                $this->building = $data['building_name'];
            }
            if (isset($data['floor_name'])) {
                $this->floor = $data['floor_name'];
            }
            if (isset($data['Tm'])) {
                $this->date = $data['Tm'];
            }
            if (isset($data['fs'])) {
                $this->status = $data['fs'];
            }
        }
    }
}