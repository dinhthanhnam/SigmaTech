<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('slider')->insert([
            [
                'name' => 'Slide 1',
                'image' => '/assets/img/banner/Slider/Slide1.jpg',
            ],
            [
                'name' => 'Slide 2',
                'image' => '/assets/img/banner/Slider/Slide2.jpg',
            ],
            [
                'name' => 'Slide 3',
                'image' => '/assets/img/banner/Slider/Slide3.jpg',
            ],
            [
                'name' => 'Slide 4',
                'image' => '/assets/img/banner/Slider/Slide4.jpg',
            ],
            [
                'name' => 'Slide 5',
                'image' => '/assets/img/banner/Slider/Slide5.jpg',
            ],
            [
                'name' => 'Slide 6',
                'image' => '/assets/img/banner/Slider/Slide6.jpg',
            ],
            [
                'name' => 'Slide 7',
                'image' => '/assets/img/banner/Slider/Slide7.jpg',
            ],
            [
                'name' => 'Slide 8',
                'image' => '/assets/img/banner/Slider/Slide8.jpg',
            ],
            [
                'name' => 'Slide 9',
                'image' => '/assets/img/banner/Slider/Slide9.jpg',
            ],
            [
                'name' => 'Slide 10',
                'image' => '/assets/img/banner/Slider/Slide10.jpg',
            ],
            [
                'name' => 'Slide 11',
                'image' => '/assets/img/banner/Slider/Slide11.jpg',
            ],
            [
                'name' => 'Slide 12',
                'image' => '/assets/img/banner/Slider/Slide12.jpg',
            ],
            [
                'name' => 'Slide 13',
                'image' => '/assets/img/banner/Slider/Slide13.jpg',
            ],
            [
                'name' => 'Slide 14',
                'image' => '/assets/img/banner/Slider/Slide14.jpg',
            ],
            [
                'name' => 'Slide 15',
                'image' => '/assets/img/banner/Slider/Slide15.jpg',
            ],
            [
                'name' => 'Slide 16',
                'image' => '/assets/img/banner/Slider/Slide16.jpg',
            ],
            [
                'name' => 'Slide 17',
                'image' => '/assets/img/banner/Slider/Slide17.jpg',
            ],
            [
                'name' => 'Slide 18',
                'image' => '/assets/img/banner/Slider/Slide18.jpg',
            ],
            [
                'name' => 'Slide 19',
                'image' => '/assets/img/banner/Slider/Slide19.jpg',
            ],
            [
                'name' => 'Slide 20',
                'image' => '/assets/img/banner/Slider/Slide20.jpg',
            ],
        ]);
    }
}
