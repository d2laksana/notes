<?php

namespace Database\Seeders;

use App\Models\Notes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $note = Notes::factory()->count(3)->create();
    }
}
