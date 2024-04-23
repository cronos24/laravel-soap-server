<?php
// app/Services/SoapService.php
namespace App\Services;

class SoapService
{
    public function getExampleData($id)
    {
        \Log::info("Received ID: {$id}");
        return "Data for ID: " . $id;
    }

    public function addNumbers($a, $b)
    {
        $suma = $a+$b;
        \Log::info("Suma: {$suma}");
        return $a + $b;
    }
}
