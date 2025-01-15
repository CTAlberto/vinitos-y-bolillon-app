<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'name' => 'Juan Pérez',
            'tel' => '123456789',
            'email' => 'juan.perez@example.com',
            'event_id' => 1,
            'validation' => 'accept',
            'reason' => null,
        ]);
    }
}
