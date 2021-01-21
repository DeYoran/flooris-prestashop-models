<?php

namespace Flooris\Prestashop\Models\Attribute;

use Flooris\Prestashop\Models\PrestashopModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AttributeGroup
 *
 * @package Flooris\Prestashop\Models\Attribute
 */
class AttributeGroup extends PrestashopModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_attribute_group';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
