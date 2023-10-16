<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Tags\Tag;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        Tag::create(['name' => 'Coding']);
        Tag::create(['name' => 'Ideas']);
        Tag::create(['name' => 'Other']);
        $bookmarks = [
            [
                'name' => 'Bookmark 1',
                'slug' => 'bookmark-1',
                'url' => 'https://example.com/bookmark-1',
                'description' => 'Description for Bookmark 1',
                'thumbnail' => 'thumbnail.jpg',
                'user_id' => 1,
            ],
            [
                'name' => 'Bookmark 2',
                'slug' => 'bookmark-2',
                'url' => 'https://example.com/bookmark-2',
                'description' => 'Description for Bookmark 2',
                'thumbnail' => 'thumbnail.jpg',
                'user_id' => 1,
            ],
            // Add more bookmarks as needed
        ];

        DB::table('bookmarks')->insert($bookmarks);

        $users = [
            [
                'name' => 'Jane Smith',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
