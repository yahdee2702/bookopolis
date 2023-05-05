<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'slug' => 'to-kill-a-mockingbird',
                'genre' => 'Fiction',
                'description' => 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it.',
                'price' => 10,
                'stars' => 4,
                'stocks' => 50,
                'image' => 'https://ebooks.gramedia.com/ebook-covers/25313/image_highres/HCO_TKAM2018MTH11.jpeg',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'slug' => '1984',
                'genre' => 'Fiction',
                'description' => 'A dystopian novel set in Airstrip One, a province of the superstate Oceania in a world of perpetual war, omnipresent government surveillance, and public manipulation.',
                'price' => 15,
                'stars' => 4,
                'stocks' => 20,
                'image' => 'https://cdn.gramedia.com/uploads/picture_meta/2023/3/5/zkppnzqigyqalgqftuzbpz.jpg',
            ],
            [
                'title' => 'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'slug' => 'the-lord-of-the-rings',
                'genre' => 'Fantasy',
                'description' => 'A fantasy epic that follows hobbit Frodo Baggins as he journeys to destroy the One Ring and defeat the Dark Lord Sauron.',
                'price' => 15,
                'stars' => 5,
                'stocks' => 30,
                'image' => 'https://cdn.gramedia.com/uploads/items/9786020332260_The-Lord-Of-The-Rings_Sembilan-Pembawa-Cincin-The-Fellowship-Of-The-Ring-_Cover-Baru.jpg',
            ],
            [
                'title' => 'The Hunger Games',
                'author' => 'Suzanne Collins',
                'slug' => 'the-hunger-games',
                'genre' => 'Science Fiction',
                'description' => 'A dystopian series set in the post-apocalyptic nation of Panem, where teenagers are forced to compete in a televised battle to the death.',
                'price' => 12,
                'stars' => 4,
                'stocks' => 20,
                'image' => 'https://ebooks.gramedia.com/ebook-covers/3172/big_covers/ID_GPU2013MTH04THGA_B_1.jpg',
            ],
            [
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
                'slug' => 'the-da-vinci-code',
                'genre' => 'Thriller',
                'description' => 'A thriller that follows symbologist Robert Langdon as he investigates a murder in the Louvre Museum and uncovers a hidden message in the works of Leonardo da Vinci.',
                'price' => 8,
                'stars' => 3,
                'stocks' => 40,
                'image' => 'https://s3-ap-southeast-1.amazonaws.com/ebook-previews/7996/26967/1.jpg',
            ],
            [
                'title' => 'The Girl with the Dragon Tattoo',
                'author' => 'Stieg Larsson',
                'slug' => 'the-girl-with-the-dragon-tattoo',
                'genre' => 'Mystery',
                'description' => 'A mystery novel that follows journalist Mikael Blomkvist and computer hacker Lisbeth Salander as they investigate a wealthy family with a dark past.',
                'price' => 10,
                'stars' => 4,
                'stocks' => 25,
                'image' => 'https://cdn.gramedia.com/uploads/images/1/1029/big_covers/ID_MIZ2012MTH12TGWT_B.jpg',
            ],
        ];

        foreach ($books as $book) {
            Book::create([
                'title' => $book['title'],
                'author' => $book['author'],
                'slug' => $book['slug'],
                'genre' => $book['genre'],
                'description' => $book['description'],
                'price' => $book['price'],
                'stars' => $book['stars'],
                'stocks' => $book['stocks'],
                'image' => $book['image'],
                'seller_id' => 1,
                'published_date' => now(),
            ]);
        }
    }
}
