<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    protected static ?string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'role_name' => 'superadmin'
        ]);
        Role::create([
            'role_name' => 'user'
        ]);


        User::create([
            'role_id'   => 1,
            'name'      => 'Admin Putra',
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => static::$password ??= Hash::make('password')
        ]);
        User::create([
            'role_id'   => 2,
            'name'      => 'User Baru',
            'username'  => 'user',
            'email'     => 'user@gmail.com',
            'password'  => static::$password ??= Hash::make('password')
        ]);


        Author::create([
            'author_name'   => 'Pramodya Ananta Toer',
            'date_of_birth' => '1936-9-11',
            'sex'           => 'Male',
            'country'       => 'Indonesia'
        ]);
        Author::create([
            'author_name'   => 'Malcolm C. Gladwell',
            'date_of_birth' => '1947-9-11',
            'sex'           => 'Male',
            'country'       => 'USA'
        ]);
        Author::create([
            'author_name'   => 'J.K Rowling',
            'date_of_birth' => '1986-9-11',
            'sex'           => 'Female',
            'country'       => 'United Kingdom'
        ]);
        Author::create([
            'author_name'   => 'Henry Manampiring',
            'date_of_birth' => '1994-9-11',
            'sex'           => 'Male',
            'country'       => 'Indonesia'
        ]);
        Author::create([
            'author_name'   => 'Victor Frankl',
            'date_of_birth' => '1925-9-11',
            'sex'           => 'Male',
            'country'       => 'Austria'
        ]);


        Publisher::create([
            'publisher_name'    => 'Gramedia Pustaka Utama',
            'address'           => 'Jl. Palmerah Barat 29-37 10270, RT.1/RW.2, Gelora, Tanah Abang, Central Jakarta City, Jakarta'
        ]);
        Publisher::create([
            'publisher_name'    => 'Elex Media Komputindo',
            'address'           => 'Kompas Gramedia, Gedung Kompas-Gramedia Lantai 2, Jl. Palmerah Barat No. 29 - 32, Gelora, Tanah Abang, Jl. Palmerah Barat No.29 - 32, RT.1/RW.2, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
        ]);
        Publisher::create([
            'publisher_name'    => 'Mizan Pustaka',
            'address'           => 'Jl. Cinambo No.135, Cisaranten Wetan, Kec. Cinambo, Kota Bandung, Jawa Barat'
        ]);
        Publisher::create([
            'publisher_name'    => 'Grasindo',
            'address'           => 'Kompas Gramedia, Jl. Palmerah Barat, RT.1/RW.2, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
        ]);

        Category::create([
            'category_name' => 'Biografi'
        ]);
        Category::create([
            'category_name' => 'Fiksi'
        ]);
        Category::create([
            'category_name' => 'Filsafat'
        ]);
        Category::create([
            'category_name' => 'Finance'
        ]);
        Category::create([
            'category_name' => 'Psikologi'
        ]);
        Category::create([
            'category_name' => 'Politik'
        ]);
        Category::create([
            'category_name' => 'Self-Development'
        ]);
        Category::create([
            'category_name' => 'Sejarah'
        ]);


        Book::create([
            // 'user_id'       => 1,
            'book_title'    => 'Filosofi Teras',
            'author_id'     => 4,
            'publisher_id'  => 1,
            'release_date'  => '2019-1-1',
            'page'          => 300,
            'category_id'   => 3
        ]);
        Book::create([
            // 'user_id'       => 1,
            'book_title'    => "The Man's Search For Meaning",
            'author_id'     => 5,
            'publisher_id'  => 4,
            'release_date'  => '1975-1-1',
            'page'          => 400,
            'category_id'   => 5
        ]);
    }
}
