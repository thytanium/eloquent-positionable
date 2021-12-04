<?php

namespace Tests\Moves;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MoveStepTest extends TestCase
{
    use DatabaseMigrations, MapsModels;

    /**
     * It moves a model up.
     *
     * @return void
     */
    public function test_it_moves_up(): void
    {
        $models = static::createModel(3);

        $this->assertEquals(
            [0, 1, 2],
            $this->mapPosition($models)->toArray(),
        );

        // move last item 2 places up
        $models[2]->moveStep(-2);

        $this->assertEquals(
            [1, 2, 0],
            $this->mapPosition($models, true)->toArray(),
        );
    }

    /**
     * It moves a model down.
     *
     * @return void
     */
    public function test_it_moves_down(): void
    {
        $models = static::createModel(3);

        $this->assertEquals(
            [0, 1, 2],
            $this->mapPosition($models)->toArray(),
        );

        // move first item to last position
        $models[0]->moveStep(2);

        $this->assertEquals(
            [2, 0, 1],
            $this->mapPosition($models, true)->toArray(),
        );
    }
}
