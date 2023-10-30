<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    function addCustomer($name, $surname, $email, $phone, $allergies) {

        $customer = Customer::create([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'phoneNum' => $phone,
            'allergies' => $allergies,
        ]);

        return $customer->id;
    }
}
