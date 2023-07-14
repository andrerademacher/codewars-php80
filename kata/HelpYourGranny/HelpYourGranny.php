<?php

declare(strict_types=1);

namespace Kata\HelpYourGranny;

final class HelpYourGranny
{
    public function tour(array $friends, array $towns, array $distances): int
    {
        $distance = 0.0;

        // reformat $town array for easier access
        $towns = array_combine(array_column($towns, 0), array_column($towns, 1));

        // visit first friend from home

        // visit each friend
        $lastGrannysHomeToFriendsTownDistance = 0;
        foreach ($friends as $friend) {

            // the friend's town or it's distance is unknown, so visit next friend
            if (!isset($towns[$friend], $distances[$towns[$friend]])) {
                continue;
            }

            $townOfFriend = $towns[$friend];
            $grannysHomeToFriendsTownDistance = $distances[$townOfFriend];

            // use direct distance to first friend
            // otherwise calculate via pythagoras
            $distanceToFriend = empty($lastGrannysHomeToFriendsTownDistance)
                ? $grannysHomeToFriendsTownDistance
                : sqrt(($grannysHomeToFriendsTownDistance ** 2) - ($lastGrannysHomeToFriendsTownDistance ** 2));
            $distance += $distanceToFriend;

            $lastGrannysHomeToFriendsTownDistance = $grannysHomeToFriendsTownDistance;
        }

        // travel back home from last visited friend
        if (!empty($lastGrannysHomeToFriendsTownDistance)) {
            $distance += $lastGrannysHomeToFriendsTownDistance;
        }

        return intval($distance);
    }
}