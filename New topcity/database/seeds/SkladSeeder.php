<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkladSeeder extends Seeder
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
                'name' => 'Склад',
                'slug' => Str::slug('Cклад'), 'hide' => 1,
                'children' => [
                    [
                        'name' => 'ТЕХНІКА АВТОМАТИЗАЦІЇ',
                        'slug' => Str::slug('Cклад ТЕХНІКА АВТОМАТИЗАЦІЇ'), 'hide' => 1,
                        'children' => [
                            [
                                'name' => 'Промислові системи автоматизації SIMATIC',
                                'slug' => Str::slug('Cклад Промислові системи автоматизації SIMATIC'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Програмовані контролери',
                                        'slug' => Str::slug('Cклад Програмовані контролери'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SIMATIC LOGO!',
                                                'slug' => Str::slug('Cклад SIMATIC LOGO!'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC S7-1200',
                                                'slug' => Str::slug('Cклад SIMATIC S7-1200'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC S7-1500',
                                                'slug' => Str::slug('Cклад SIMATIC S7-1500'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC S7-300',
                                                'slug' => Str::slug('Cклад SIMATIC S7-300'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC S7-400',
                                                'slug' => Str::slug('Cклад SIMATIC S7-400'), 'hide' => 1,
                                            ],
                                        ]
                                    ],
                                    [
                                        'name' => 'Розподілені станції входів/виходів',
                                        'slug' => Str::slug('Cклад Розподілені станції входів/виходів'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SIMATIC ET 200SP',
                                                'slug' => Str::slug('Cклад SIMATIC ET 200SP'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC ET 200S',
                                                'slug' => Str::slug('Cклад SIMATIC ET 200S'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC ET 200MP',
                                                'slug' => Str::slug('Cклад SIMATIC ET 200MP'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC ET 200M',
                                                'slug' => Str::slug('Cклад SIMATIC ET 200M'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC ET',
                                                'slug' => Str::slug('Cклад SIMATIC ET'), 'hide' => 1,
                                            ],
                                        ]
                                    ],
                                    [
                                        'name' => 'Контролери осьового руху Motion Control',
                                        'slug' => Str::slug('Cклад Контролери осьового руху Motion Control'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Контролери СЧПУ SINUMERIK',
                                        'slug' => Str::slug('Cклад Контролери СЧПУ SINUMERIK'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Програмне забезпечення Step 7',
                                        'slug' => Str::slug('Cклад Програмне забезпечення Step 7'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Промислові системи візуалізації HMI',
                                'slug' => Str::slug('Cклад Промислові системи візуалізації HMI'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Сенсорні панелі операторів',
                                        'slug' => Str::slug('Cклад Сенсорні панелі операторів'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SIMATIC HMI KYE Panel',
                                                'slug' => Str::slug('Cклад SIMATIC HMI KYE Panel'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC HMI Basic Panel',
                                                'slug' => Str::slug('Cклад SIMATIC HMI Basic Panel'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC HMI Comfort Panel',
                                                'slug' => Str::slug('Cклад SIMATIC HMI Comfort Panel'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMATIC HMI Mobile Panel',
                                                'slug' => Str::slug('Cклад SIMATIC HMI Mobile Panel'), 'hide' => 1,
                                            ],
                                        ]
                                    ],
                                    [
                                        'name' => 'Системи візуалізації на базі ПК',
                                        'slug' => Str::slug('Cклад Системи візуалізації на базі ПК'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SIMATIC WinCC',
                                                'slug' => Str::slug('Cклад SIMATIC WinCC'), 'hide' => 1,
                                            ],
                                        ]
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Промислові системи комунікації SIMATIC NET',
                                'slug' => Str::slug('Cклад Промислові системи комунікації SIMATIC NET'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Industrial Ethernet',
                                        'slug' => Str::slug('Cклад Industrial Ethernet')
                                    ],
                                    [
                                        'name' => 'PROFINET',
                                        'slug' => Str::slug('Cклад PROFINET'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'PROFIBUS',
                                        'slug' => Str::slug('Cклад PROFIBUS'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'AS-інтерфейс',
                                        'slug' => Str::slug('Cклад AS-інтерфейс'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'IO-Link',
                                        'slug' => Str::slug('Cклад IO-Link'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Безпровідні мережі',
                                        'slug' => Str::slug('Cклад Безпровідні мережі'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Промислові компютери',
                                'slug' => Str::slug('Cклад Промислові компютери'), 'hide' => 1,
                            ],
                            [
                                'name' => 'Системи управління процесом PCS 7',
                                'slug' => Str::slug('Cклад Системи управління процесом PCS 7'), 'hide' => 1,
                            ],
                            [
                                'name' => 'Блоки живлення SITOP',
                                'slug' => Str::slug('Cклад Блоки живлення SITOP'), 'hide' => 1,
                            ],
                        ]
                    ],
                    [
                        'name' => 'ПРИВІДНА ТЕХНІКА',
                        'slug' => Str::slug('Cклад ПРИВІДНА ТЕХНІКА'), 'hide' => 1,
                        'children' => [
                            [
                                'name' => 'Перетворювачі частоти',
                                'slug' => Str::slug('Cклад Перетворювачі частоти'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Стандартні перетворювачі частоти',
                                        'slug' => Str::slug('Cклад Стандартні перетворювачі частоти'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SINAMICS V20',
                                                'slug' => Str::slug('Cклад SINAMICS V20'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS G110',
                                                'slug' => Str::slug('Cклад SINAMICS G110'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS G120C',
                                                'slug' => Str::slug('Cклад SINAMICS G120C'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS G120',
                                                'slug' => Str::slug('Cклад SINAMICS G120'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS G130',
                                                'slug' => Str::slug('Cклад SINAMICS G130'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS G150',
                                                'slug' => Str::slug('Cклад SINAMICS G150'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Високопродуктивні перетворювачі',
                                        'slug' => Str::slug('Cклад Високопродуктивні перетворювачі'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SINAMICS V90',
                                                'slug' => Str::slug('Cклад SINAMICS V90'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS S110',
                                                'slug' => Str::slug('Cклад SINAMICS S110'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS S120',
                                                'slug' => Str::slug('Cклад SINAMICS S120'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SINAMICS S210',
                                                'slug' => Str::slug('Cклад SINAMICS S210'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Перетворювачі постійного струму',
                                        'slug' => Str::slug('Cклад Перетворювачі постійного струму'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SINAMICS DCM',
                                                'slug' => Str::slug('Cклад SINAMICS DCM'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Двигуни змінного стуму',
                                'slug' => Str::slug('Cклад Двигуни змінного стуму'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Низьковольтні електродвигуни',
                                        'slug' => Str::slug('Cклад Низьковольтні електродвигуни'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SIMOTICS GP',
                                                'slug' => Str::slug('Cклад SIMOTICS GP'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMOTICS SD',
                                                'slug' => Str::slug('Cклад SIMOTICS SD'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Нестандартні електродвигуни',
                                                'slug' => Str::slug('Cклад Нестандартні електродвигуни'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Високовольтні електродвигуни',
                                        'slug' => Str::slug('Cклад Високовольтні електродвигуни'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Серво електродвигуни',
                                        'slug' => Str::slug('Cклад Серво електродвигуни'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'SIMOTICS 1FT7',
                                                'slug' => Str::slug('Cклад SIMOTICS 1FT7'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMOTICS 1FK7',
                                                'slug' => Str::slug('Cклад SIMOTICS 1FK7'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMOTICS 1SL6',
                                                'slug' => Str::slug('Cклад SIMOTICS 1SL6'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'SIMOTICS 1PH8',
                                                'slug' => Str::slug('Cклад SIMOTICS 1PH8'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Серво мотор редуктори SIMOTICS S-1FG1',
                                                'slug' => Str::slug('Cклад Серво мотор редуктори SIMOTICS S-1FG1'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Інструменти програмного забезпечення',
                                'slug' => Str::slug('Cклад Інструменти програмного забезпечення'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'SIEMENS SIZER',
                                        'slug' => Str::slug('Cклад SIEMENS SIZER'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'SIEMENS STARTER',
                                        'slug' => Str::slug('Cклад SIEMENS STARTER'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'SIEMENS Startdrive',
                                        'slug' => Str::slug('Cклад SIEMENS Startdrive'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'SIEMENS Drive ES',
                                        'slug' => Str::slug('Cклад SIEMENS Drive ES'), 'hide' => 1,
                                    ],

                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'КОМУТАЦІЙНА ТЕХНІКА',
                        'slug' => Str::slug('Cклад КОМУТАЦІЙНА ТЕХНІКА'), 'hide' => 1,
                        'children' => [
                            [
                                'name' => 'Комутаційні апарати SIRIUS',
                                'slug' => Str::slug('Cклад Комутаційні апарати SIRIUS'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Контактори 3RT',
                                        'slug' => Str::slug('Cклад Контактори 3RT'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Плавні пуски 3RW',
                                        'slug' => Str::slug('Cклад Плавні пуски 3RW'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Прилади захисту',
                                'slug' => Str::slug('Cклад Прилади захисту'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Автомати захисту двигуна',
                                        'slug' => Str::slug('Cклад Автомати захисту двигуна'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Реле перевантаження',
                                        'slug' => Str::slug('Cклад Реле перевантаження'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Фідери та пускачі електродвигунів',
                                'slug' => Str::slug('Cклад Фідери та пускачі електродвигунів'), 'hide' => 1,
                            ],
                            [
                                'name' => 'Функціональні комутаційні реле',
                                'slug' => Str::slug('Cклад Функціональні комутаційні реле'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'SIMOCODE',
                                        'slug' => Str::slug('Cклад SIMOCODE'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Прилади безпеки',
                                'slug' => Str::slug('Cклад Прилади безпеки'), 'hide' => 1,
                            ],
                            [
                                'name' => 'Позиційні вимикачі',
                                'slug' => Str::slug('Cклад Позиційні вимикачі'), 'hide' => 1,
                            ],
                            [
                                'name' => 'Прилади керування та індикації',
                                'slug' => Str::slug('Cклад Прилади керування та індикації'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'SIRIUS ACT 3SU',
                                        'slug' => Str::slug('Cклад SIRIUS ACT 3SU'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Низковольтне енергорозподілення',
                                'slug' => Str::slug('Cклад Низковольтне енергорозподілення'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Апаратура захисту',
                                        'slug' => Str::slug('Cклад Апаратура захисту'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'Автоматичні вимикачі відкритого типу',
                                                'slug' => Str::slug('Cклад Автоматичні вимикачі відкритого типу'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Автоматичні вимикачі у литому корпусі',
                                                'slug' => Str::slug('Cклад Автоматичні вимикачі у литому корпусі'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Модульні автоматичні вимикачі',
                                                'slug' => Str::slug('Cклад Модульні автоматичні вимикачі'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Системи запобіжників',
                                                'slug' => Str::slug('Cклад Системи запобіжників'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Апаратура захисту перенапруг',
                                                'slug' => Str::slug('Cклад Апаратура захисту перенапруг'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Вимикачі та розєднувачі нагрузки',
                                        'slug' => Str::slug('Cклад Вимикачі та розєднувачі нагрузки'), 'hide' => 1,
                                        'children' => [
                                            [
                                                'name' => 'Вимикачі та розєднувачі нагрузкии',
                                                'slug' => Str::slug('Cклад Вимикачі та розєднувачі нагрузкии'), 'hide' => 1,
                                            ],
                                            [
                                                'name' => 'Вимикачі нагрузки з запобіжниками',
                                                'slug' => Str::slug('Cклад Вимикачі нагрузки з запобіжниками'), 'hide' => 1,
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Апаратура контролю',
                                        'slug' => Str::slug('Cклад Апаратура контролю'), 'hide' => 1,
                                    ],
                                ],
                            ],

                        ],
                    ],
                    [
                        'name' => 'КВПіА',
                        'slug' => Str::slug('Cклад КВПіА'), 'hide' => 1,
                        'children' => [
                            [
                                'name' => 'Датчики тиску',
                                'slug' => Str::slug('Cклад Датчики тиску'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Sitrans DS 3',
                                        'slug' => Str::slug('Cклад Sitrans DS 3'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans P300',
                                        'slug' => Str::slug('Cклад Sitrans P300'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans P500',
                                        'slug' => Str::slug('Cклад Sitrans P500'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans P200/P210/P220',
                                        'slug' => Str::slug('Cклад Sitrans P200/P210/P220'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans P Compact',
                                        'slug' => Str::slug('Cклад Sitrans P Compact'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LH100',
                                        'slug' => Str::slug('Cклад Sitrans LH100'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LH300',
                                        'slug' => Str::slug('Cклад Sitrans LH300'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Датчики температури',
                                'slug' => Str::slug('Cклад Датчики температури'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Sitrans TH100/TH200/TH300/TH400/TR200/TR300',
                                        'slug' => Str::slug('Cклад Sitrans TH100/TH200/TH300/TH400/TR200/TR300'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans TS300',
                                        'slug' => Str::slug('Cклад Sitrans TS300'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans TS500',
                                        'slug' => Str::slug('Cклад Sitrans TS500'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Витратоміри',
                                'slug' => Str::slug('Cклад Витратоміри'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Sitrans FM MAG 5000 / 6000',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 5000 / 6000'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 6000 I /6000 I Ex',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 6000 I /6000 I Ex'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 1100',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 1100'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 1100F',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 1100F'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 3100',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 3100'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 5100W',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 5100W'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 5100W + 6000 CT',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 5100W + 6000 CT'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 8000',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 8000'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FM MAG 8000 CT',
                                        'slug' => Str::slug('Cклад Sitrans FM MAG 8000 CT'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FC330/FC310',
                                        'slug' => Str::slug('Cклад Sitrans FC330/FC310'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FUS380',
                                        'slug' => Str::slug('Cклад Sitrans FUS380'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FUE950',
                                        'slug' => Str::slug('Cклад Sitrans FUE950'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans F US SONOKIT',
                                        'slug' => Str::slug('Cклад Sitrans F US SONOKIT'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FS230',
                                        'slug' => Str::slug('Cклад Sitrans FS230'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FS220',
                                        'slug' => Str::slug('Cклад Sitrans FS220'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FX330',
                                        'slug' => Str::slug('Cклад Sitrans FX330'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans FVA250',
                                        'slug' => Str::slug('Cклад Sitrans FVA250'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Рівнеміри',
                                'slug' => Str::slug('Cклад Рівнеміри'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Sitrans LVL100/LVL200',
                                        'slug' => Str::slug('Cклад Sitrans LVL100/LVL200'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LVS100/LVS200',
                                        'slug' => Str::slug('Cклад Sitrans LVS100/LVS200'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LPS200',
                                        'slug' => Str::slug('Cклад Sitrans LPS200'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LU150/LU180',
                                        'slug' => Str::slug('Cклад Sitrans LU150/LU180'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans Probe LU240',
                                        'slug' => Str::slug('Cклад Sitrans Probe LU240'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LUT400',
                                        'slug' => Str::slug('Cклад Sitrans LUT400'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'EchoMax',
                                        'slug' => Str::slug('Cклад EchoMax'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LR250',
                                        'slug' => Str::slug('Cклад Sitrans LR250'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LR250 FEA',
                                        'slug' => Str::slug('Cклад Sitrans LR250 FEA'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LR460',
                                        'slug' => Str::slug('Cклад Sitrans LR460'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LR560',
                                        'slug' => Str::slug('Cклад Sitrans LR560'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans LG240/LG250/LG260/LG270',
                                        'slug' => Str::slug('Cклад Sitrans LG240/LG250/LG260/LG270'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Прилади',
                                'slug' => Str::slug('Cклад Прилади'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'SPART PS2',
                                        'slug' => Str::slug('Cклад SPART PS2'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sirec D200/D300/D400',
                                        'slug' => Str::slug('Cклад Sirec D200/D300/D400'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans RD100/RD200/RD300',
                                        'slug' => Str::slug('Cклад Sitrans RD100/RD200/RD300'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans AS100',
                                        'slug' => Str::slug('Cклад Sitrans AS100'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans CU02',
                                        'slug' => Str::slug('Cклад Sitrans CU02'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Ваговимірювання',
                                'slug' => Str::slug('Cклад Ваговимірювання'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Siwarex WP321/WP521-522/WP251/CS/U/FTA',
                                        'slug' => Str::slug('Cклад Siwarex WP321/WP521-522/WP251/CS/U/FTA'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Siwarex WP241/FTC, Miltronics BW500/BW500L/SF500',
                                        'slug' => Str::slug('Cклад Siwarex WP241/FTC, Miltronics BW500/BW500L/SF500'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Siwarex WT231/241',
                                        'slug' => Str::slug('Cклад Siwarex WT231/241'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Miltronics MSI/MCS',
                                        'slug' => Str::slug('Cклад Miltronics MSI/MCS'), 'hide' => 1,
                                    ],

                                ],
                            ],
                            [
                                'name' => 'Газоаналізатори',
                                'slug' => Str::slug('Cклад Газоаналізатори'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Ultramat 23',
                                        'slug' => Str::slug('Cклад Ultramat 23'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Ultramat 6',
                                        'slug' => Str::slug('Cклад Ultramat 6'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Oxymat 6',
                                        'slug' => Str::slug('Cклад Oxymat 6'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Oxymat 61',
                                        'slug' => Str::slug('Cклад Oxymat 61'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Calomat 6',
                                        'slug' => Str::slug('Cклад Calomat 6'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Fidamat 6',
                                        'slug' => Str::slug('Cклад Fidamat 6'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'LDS6',
                                        'slug' => Str::slug('Cклад LDS6'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans SL',
                                        'slug' => Str::slug('Cклад Sitrans SL'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Хроматографи',
                                'slug' => Str::slug('Cклад Хроматографи'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'MicroSAM',
                                        'slug' => Str::slug('Cклад MicroSAM'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Sitrans CV',
                                        'slug' => Str::slug('Cклад Sitrans CV'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'Maxum edition 2',
                                        'slug' => Str::slug('Cклад Maxum edition 2'), 'hide' => 1,
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Газова аналітика',
                                'slug' => Str::slug('Cклад Газова аналітика'), 'hide' => 1,
                                'children' => [
                                    [
                                        'name' => 'Set BGA',
                                        'slug' => Str::slug('Cклад Set BGA'), 'hide' => 1,
                                    ],
                                    [
                                        'name' => 'KHZ',
                                        'slug' => Str::slug('Cклад KHZ'), 'hide' => 1,
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'КІБЕР БЕЗПЕКА',
                        'slug' => Str::slug('Cклад КІБЕР БЕЗПЕКА'), 'hide' => 1,
                    ],

                ]
            ]
        ];
        foreach ($shops as $shop) {
            \App\Models\Category::create($shop);
        }
    }
}
