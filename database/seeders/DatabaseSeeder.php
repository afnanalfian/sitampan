<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // Seeder untuk data master
            BidangSeeder::class,
            UnitOrganisasiSeeder::class,
            SubUnitOrganisasiSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            HakSeeder::class,
            PenggunaanSeeder::class,
            AsalUsulSeeder::class,
            
            // Seeder untuk Role dan User
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            
            // Seeder untuk data tanah (contoh)
            TanahSeeder::class,
        ]);
    }
}
