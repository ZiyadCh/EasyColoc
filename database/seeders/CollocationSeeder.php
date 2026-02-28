<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Colocation::factory(3)->create()->each(function ($coloc) {

            $owner = $coloc->owner;
            $owner->update(['role' => 'admin', 'isOwner' => true]);

            $coloc->users()->attach($owner);

            $members = \App\Models\User::factory(4)->create([
                'role' => 'member',
                'isOwner' => false,
            ]);

            $coloc->users()->attach($members);
        });
    }
}
