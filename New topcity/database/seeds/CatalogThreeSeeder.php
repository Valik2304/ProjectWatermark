<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogThreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            [
                'name' => 'ТЕХНІКА АВТОМАТИЗАЦІЇ',
                'children' => [
                    [
                        'name' => 'Промислові системи автоматизації SIMATIC',
                    ],
                    [
                        'name' => 'Промислові системи візуалізації HMI',
                    ],
                    [
                        'name' => 'Промислові системи комунікації SIMATIC NET',
                    ],
                    [
                        'name' => 'Промислові компютери',
                    ],
                    [
                        'name' => 'Системи управління процесом PCS 7',
                    ],
                    [
                        'name' => 'Блоки живлення SITOP',
                    ],
                ]
            ],
            [
                'name' => 'ПРИВІДНА ТЕХНІКА',
                'children' => [
                    [
                        'name' => 'Перетворювачі частоти',
                    ],
                    [
                        'name' => 'Двигуни змінного стуму',
                    ],
                    [
                        'name' => 'Інструменти програмного забезпечення',
                    ],
                ],
            ],
            [
                'name' => 'КОМУТАЦІЙНА ТЕХНІКА',
                'children' => [
                    [
                        'name' => 'Комутаційні апарати SIRIUS',
                    ],
                    [
                        'name' => 'Прилади захисту',
                    ],
                    [
                        'name' => 'Фідери та пускачі електродвигунів',
                    ],
                    [
                        'name' => 'Функціональні комутаційні реле',
                    ],
                    [
                        'name' => 'Прилади безпеки',
                    ],
                    [
                        'name' => 'Позиційні вимикачі',
                    ],
                    [
                        'name' => 'Прилади керування та індикації',
                    ],
                    [
                        'name' => 'Низковольтне енергорозподілення',
                    ],

                ],
            ],
            [
                'name' => 'КВПіА',
                'children' => [
                    [
                        'name' => 'Датчики тиску',
                    ],
                    [
                        'name' => 'Датчики температури',
                    ],
                    [
                        'name' => 'Витратоміри',
                    ],
                    [
                        'name' => 'Рівнеміри',
                    ],
                    [
                        'name' => 'Прилади',
                    ],
                    [
                        'name' => 'Ваговимірювання',
                    ],
                    [
                        'name' => 'Газоаналізатори',
                    ],
                    [
                        'name' => 'Хроматографи',
                    ],
                    [
                        'name' => 'Газова аналітика',
                    ],
                ],
            ],
            [
                'name' => 'КІБЕР БЕЗПЕКА',

            ],


        ];
        foreach ($shops as $shop) {
            \App\Models\Category::create($shop);
        }
    }
}

/*
@extends('layout')


@section('content')


<div class="container">
        <div class="card">
            <div class="row">
                <div class="card-body">
@foreach($shops as $shop)
                        <div class="col-md-12">
                            <h3>{{ $shop->name }}</h3>
                            <hr/>
                            <div class="row">
@foreach($shop->children as $cats)
                                    <div class="col-md-4">
                                        <h4>-------{{ $cats->name }}</h4>
                                        <hr/>
                                        @foreach($cats->children as $cat)
                                            <div class="col-md-2">
                                                <h5>----------------{{$cat->name}}</h5>
                                                <hr/>
                                                @foreach($cat->children as $ca)
                                                    <h6>----------------------{{$ca->name}}</h6>

@endforeach
                                                <hr/>
                                            </div>
@endforeach
                                    </div>
@endforeach
                            </div>
                        </div>
@endforeach
                </div>
            </div>
        </div>
    </div>
@endsection*/
