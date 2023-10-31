<?php
// app/Helpers/CustomHelpers.php

use Illuminate\Support\Collection;

    if (!function_exists('getRandomBackgroundColors')) {

        function getRandomBackgroundColors($count)
        {
        // Define an array of background colors
        $bgColors = ['bg-blue', 'bg-red', 'bg-green', 'bg-yellow', 'bg-purple'];

        // Shuffle the array to get random colors
        $shuffledColors = Collection::make($bgColors)->shuffle();

        // Slice the shuffled array to get the desired number of colors
        return $shuffledColors->slice(0, $count)->toArray();
        }
    }

