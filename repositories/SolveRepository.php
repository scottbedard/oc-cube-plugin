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

    /**
     * List solves.
     *
     * @param  array                                $options
     * @return \October\Rain\Database\Collection
     */
    public function get($options)
    {
        $results = array_key_exists('results', $options)
            ? (int) $options['results']
            : 10;

        $total = Solve::count();

        $speed = Solve::orderBy('milliseconds')
            ->orderBy('created_at')
            ->take($results)
            ->get();

        $efficiency = Solve::orderBy('turn_count')
            ->orderBy('milliseconds')
            ->orderBy('created_at')
            ->take($results)
            ->get();

        return [
            'total' => $total,
            'speed' => $speed,
            'efficiency' => $efficiency,
        ];
    }
}
