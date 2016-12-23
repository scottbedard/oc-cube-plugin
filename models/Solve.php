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
        'end' => 0,
        'scramble' => '[]',
        'start' => 0,
        'turns' => '[]',
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
        'end',
        'name',
        'scramble',
        'start',
        'turns',
    ];

    /**
     * @var array Jsonable fields
     */
    protected $jsonable = [
        'scramble',
        'turns',
    ];

    /**
     * Before create.
     *
     * @return void
     */
    public function beforeCreate() {
        $this->turn_count = $this->getTurnCount();
        $this->milliseconds = $this->getMilliseconds();
    }

    /**
     * Return the solve duration in milliseconds.
     *
     * @return int
     */
    public function getMilliseconds()
    {
        return $this->end - $this->start;
    }

    /**
     * Count the number of relevant turns.
     *
     * @return int
     */
    protected function getTurnCount()
    {
        $turns = 0;

        foreach ($this->turns as $turn) {
            $slice = strtolower(substr($turn['turn'], 0, 1));
            if (! array_search($slice, ['x', 'y', 'x'])) $turns++;
        }

        return $turns;
    }

    /**
     * Set name attribute.
     *
     * @param string    $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = trim($name);
    }
}
