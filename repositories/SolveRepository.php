<?php namespace Bedard\Cube\Repositories;

use Bedard\Cube\Models\Solve;

class SolveRepository
{
    /**
     * Create a solve.
     *
     * @param  array                        $data
     * @return \Bedard\Cube\Models\Solve
     */
    public function create(array $data)
    {
        $solve = Solve::create($data);

        return $solve;
    }
}
