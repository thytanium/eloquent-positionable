<?php

namespace Thytanium\EloquentPositionable;

use Illuminate\Database\Eloquent\Model;

trait Positionable
{
    use Concerns\Moves, Concerns\Queries;

    /**
     * Boot the trait.
     *
     * @return void
     */
    protected static function bootPositionable(): void
    {
        static::saving(function (Model $model) {
            if ($model->getPosition() === null) {
                $model->setPosition(static::maxPosition() + 1);
            }
        });
    }

    /**
     * Get the name of the column used for positioning.
     * Default = 'position'.
     *
     * @return string
     */
    public function getPositionColumn(): string
    {
        return $this->positionColumn ?? 'position';
    }

    /**
     * Get the start number for positioning models.
     * Default = 1.
     *
     * @return int
     */
    public function getPositionStart(): int
    {
        return $this->positionStart ?? 1;
    }
}
