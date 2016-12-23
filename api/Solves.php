<?php namespace Bedard\Cube\Api;

use Bedard\Cube\Repositories\SolveRepository;
use Exception;
use Illuminate\Routing\Controller;
use Log;

class Solves extends Controller
{
    /**
     * Store a solve.
     *
     * @return \Bedard\Cube\Models\Solve
     */
    public function store(SolveRepository $repository)
    {
        try {
            $solve = $repository->create(input());

            return $solve;
         } catch (Exception $e) {
             Log::error($e->getMessage());

             abort(500, 'Error');
         }
    }
}
