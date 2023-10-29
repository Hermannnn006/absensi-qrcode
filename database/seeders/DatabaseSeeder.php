<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $mhs1 = User::factory()->create([
            'name' => 'hermansyah',
            'email' => 'herman@gmail.com',
        ]);

        $mhs2 = User::factory()->create([
            'name' => 'alucard',
            'email' => 'alucard@gmail.com',
        ]);

        $mhs3 = User::factory()->create([
            'name' => 'selena',
            'email' => 'selena@gmail.com',
        ]);

        $mhs4 = User::factory()->create([
            'name' => 'thamuz',
            'email' => 'thamuz@gmail.com',
        ]);

        $mhs5 = User::factory()->create([
            'name' => 'diggie',
            'email' => 'diggie@gmail.com',
        ]);

        $mhs6 = User::factory()->create([
            'name' => 'terizla',
            'email' => 'terizla@gmail.com',
        ]);

        $mhs7 = User::factory()->create([
            'name' => 'naruto',
            'email' => 'naruto@gmail.com',
        ]);

        $mhs8 = User::factory()->create([
            'name' => 'shikamaru',
            'email' => 'shikamaru@gmail.com',
        ]);

        $mhs9 = User::factory()->create([
            'name' => 'sasuke',
            'email' => 'sasuke@gmail.com',
        ]);

        $mhs10 = User::factory()->create([
            'name' => 'upin',
            'email' => 'upin@gmail.com',
        ]);

        $mhs11 = User::factory()->create([
            'name' => 'ipin',
            'email' => 'ipin@gmail.com',
        ]);

        $adminUser = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        Classroom::create([
            'name' => 'TIF A Siang',
            'slug' => 'tif-a-siang'
        ]);

        Classroom::create([
            'name' => 'TIF B Siang',
            'slug' => 'tif-b-siang'
        ]);

        Classroom::create([
            'name' => 'TIF A Malam',
            'slug' => 'tif-a-malam'
        ]);

        Classroom::create([
            'name' => 'TIF B Pagi',
            'slug' => 'tif-b-pagi'
        ]);

        Classroom::create([
            'name' => 'TIF A Pagi',
            'slug' => 'tif-a-pagi'
        ]);

        Mahasiswa::create([
            'user_id' => 1,
            'classroom_id' => 1,
            'nim' => '1812000415'
        ]);
        Mahasiswa::create([
            'user_id' => 2,
            'classroom_id' => 2,
            'nim' => '1812000416'
        ]);
        Mahasiswa::create([
            'user_id' => 3,
            'classroom_id' => 3,
            'nim' => '1812000417'
        ]);
        Mahasiswa::create([
            'user_id' => 4,
            'classroom_id' => 4,
            'nim' => '1812000418'
        ]);
        Mahasiswa::create([
            'user_id' => 5,
            'classroom_id' => 5,
            'nim' => '1812000419'
        ]);
        Mahasiswa::create([
            'user_id' => 6,
            'classroom_id' => 1,
            'nim' => '1812000420'
        ]);

        Mahasiswa::create([
            'user_id' => 7,
            'classroom_id' => 1,
            'nim' => '1812000100'
        ]);
        Mahasiswa::create([
            'user_id' => 8,
            'classroom_id' => 1,
            'nim' => '1812000101'
        ]);
        Mahasiswa::create([
            'user_id' => 9,
            'classroom_id' => 1,
            'nim' => '1812000102'
        ]);
        Mahasiswa::create([
            'user_id' => 10,
            'classroom_id' => 1,
            'nim' => '1812000103'
        ]);
        Mahasiswa::create([
            'user_id' => 11,
            'classroom_id' => 1,
            'nim' => '1812000104'
        ]);

        $admin = Role::create(['name' => 'admin']);
        Role::create(['name' => 'mahasiswa']);

        $permission = Permission::create(['name' => 'read dashboard']);
        $admin->givePermissionTo($permission);

        $adminUser->assignRole('admin');

        $mhs1->assignRole('mahasiswa');
        $mhs2->assignRole('mahasiswa');
        $mhs3->assignRole('mahasiswa');
        $mhs4->assignRole('mahasiswa');
        $mhs5->assignRole('mahasiswa');
        $mhs6->assignRole('mahasiswa');
        $mhs7->assignRole('mahasiswa');
        $mhs8->assignRole('mahasiswa');
        $mhs9->assignRole('mahasiswa');
        $mhs10->assignRole('mahasiswa');
        $mhs11->assignRole('mahasiswa');
    }
}