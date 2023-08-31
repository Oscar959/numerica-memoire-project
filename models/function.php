<?php

function apostrophe($data)
{
    $cut = explode("'", $data);
    $ready = implode('\\\'', $cut);
    return $ready;
}


function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);

    if ($seconds <= 60) {
        return "à peine";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "Une minute";
        } else {
            return "$minutes minutes";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "Une heure";
        } else {
            return "$hours heures";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "Un jour";
        } else {
            return "$days jours";
        }
    } else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "Une semaine";
        } else {
            return "$weeks semaines";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "Un mois";
        } else {
            return "$months mois";
        }
    } else {
        if ($years == 1) {
            return "Une année";
        } else {
            return "$years années";
        }
    }
}