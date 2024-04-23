<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function calculateCircleCircumference($radius)
    {
        return 2 * 3.14 * $radius;
    }

    /**
     * Calculate the area of a circle with given radius
     *
     * @param float $radius
     * @return float
     */
    public function calculateCircleArea($radius)
    {
        return 3.14 * $radius * $radius;
    }
}
