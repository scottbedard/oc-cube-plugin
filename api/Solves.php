<?php namespace Bedard\Cube\Api;

use Bedard\Cube\Repositories\SolveRepository;
use Exception;
use Illuminate\Routing\Controller;
use Log;

class Solves extends Controller
{
    /**
     * List solves.
     *
     * @param  SolveRepository                      $repository
     * @return \October\Rain\Database\Collection
     */
    public function index(SolveRepository $repository)
    {
        try {
            $solves = $repository->get(input());

            return $solves;
         } catch (Exception $e) {
             Log::error($e->getMessage());

             abort(500, 'Error');
         }
    }

    /**
     * Store a solve.
     *
     * @param  SolveRepository              $repository
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
