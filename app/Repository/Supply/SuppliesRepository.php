<?php

namespace App\Repository\Supply;

use App\Models\Supply;

class SuppliesRepository
{
    protected $supply;

    public function __construct (Supply $supply)
    {
        $this->supply = $supply;

    }

    private function save(Supply $supply, Array $inputs)
    {
        $supply->quantity = $inputs['quantity'];
        $supply->price = $inputs['price'];
        $supply->confirmed_at = $inputs['confirmed_at'];

        $supply->save();
    }

    public function getPaginate($nbre)
    {
        return $this->$supply->paginate($nbre);
    }

    public function store(Array $inputs)
    {
        $supply = new $this->supply;

        $this->save($supply, $inputs);

        return $supply;
    }

    public function getById($id)
    {
        return $this->supply->FindOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    
}