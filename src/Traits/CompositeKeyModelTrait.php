<?php

namespace Flooris\Prestashop\Traits;

trait CompositeKeyModelTrait
{
    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }


    /**
     * Qualify the given column name by the model's table.
     *
     * @param  array|string $columns
     * @return array
     */
    public function qualifyColumn($columns)
    {
        $columnArray = [];

        if(is_string($columns)){
            $columns = [$columns];
        }

        foreach ($columns as $column){
            if (str_contains($column, '.')) {
                $columnArray[] = $column;
            }
            else{
                $columnArray[] = $this->getTable().'.' . $column;
            }
        }

        return $columnArray[0];
    }
}
