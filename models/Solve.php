<?php namespace Bedard\Cube\Models;

use Model;

/**
 * Solve Model
 */
class Solve extends Model
{

    /**
     * @var string Default attributes.
     */
    public $attributes = [
        'start' => 0,
        'end' => 0,
        'moves' => '[]',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bedard_cube_solves';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'moves',
        'start',
        'end',
    ];

    /**
     * @var array Jsonable fields
     */
    protected $jsonable = ['moves'];

    public function beforeCreate() {
        $this->move_count = count($this->moves);
        $this->solve_milliseconds = $this->end - $this->start;
    }
}
