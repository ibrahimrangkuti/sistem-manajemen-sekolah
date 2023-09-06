<?php

function dayName($date)
{
    $dayName = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');

    $timestamp = strtotime($date);
    if (!$timestamp) {
        return 'Tanggal tidak valid!';
    } else {
        $day = date('w', $timestamp);
        return $dayName[$day];
    }
}

function formattedDate($date)
{
    return dayName($date) . ', ' . $date->format('d/m/Y');
}
