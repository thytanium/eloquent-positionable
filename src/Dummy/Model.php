<?php

namespace Thytanium\EloquentPositionable\Dummy;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Thytanium\EloquentPositionable\Positionable;

class Model extends BaseModel
{
    use Positionable;

    protected $table = 'positionables';
    public $fillable = ['index'];

    protected $positionable = [
        'column' => 'index',
        'start' => 0,
    ];
}
