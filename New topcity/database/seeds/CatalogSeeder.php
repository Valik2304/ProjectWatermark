<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $shops = [
            [
                'name' => 'ТЕХНІКА АВТОМАТИЗАЦІЇ',
                'slug' => Str::slug('ТЕХНІКА АВТОМАТИЗАЦІЇ'),
                'children' => [
                    [
                        'name' => 'Промислові системи автоматизації SIMATIC',
                        'slug' => Str::slug('Промислові системи автоматизації SIMATIC'),
                        'children' => [
                            [
                                'name' => 'Програмовані контролери',
                                'slug' => Str::slug('Програмовані контролери'),
                                'children' => [
                                    [
                                        'name' => 'SIMATIC LOGO!',
                                        'slug' => Str::slug('SIMATIC LOGO!'),
                                    ],
                                    [
                                        'name' => 'SIMATIC S7-1200',
                                        'slug' => Str::slug('SIMATIC S7-1200'),
                                    ],
                                    [
                                        'name' => 'SIMATIC S7-1500',
                                        'slug' => Str::slug('SIMATIC S7-1500'),
                                    ],
                                    [
                                        'name' => 'SIMATIC S7-300',
                                        'slug' => Str::slug('SIMATIC S7-300'),
                                    ],
                                    [
                                        'name' => 'SIMATIC S7-400',
                                        'slug' => Str::slug('SIMATIC S7-400'),
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Розподілені станції входів/виходів',
                                'slug' => Str::slug('Розподілені станції входів/виходів'),
                                'children' => [
                                    [
                                        'name' => 'SIMATIC ET 200SP',
                                        'slug' => Str::slug('SIMATIC ET 200SP'),
                                    ],
                                    [
                                        'name' => 'SIMATIC ET 200S',
                                        'slug' => Str::slug('SIMATIC ET 200S'),
                                    ],
                                    [
                                        'name' => 'SIMATIC ET 200MP',
                                        'slug' => Str::slug('SIMATIC ET 200MP'),
                                    ],
                                    [
                                        'name' => 'SIMATIC ET 200M',
                                        'slug' => Str::slug('SIMATIC ET 200M'),
                                    ],
                                    [
                                        'name' => 'SIMATIC ET',
                                        'slug' => Str::slug('SIMATIC ET'),
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Контролери осьового руху Motion Control',
                                'slug' => Str::slug('Контролери осьового руху Motion Control'),
                            ],
                            [
                                'name' => 'Контролери СЧПУ SINUMERIK',
                                'slug' => Str::slug('Контролери СЧПУ SINUMERIK'),
                            ],
                            [
                                'name' => 'Програмне забезпечення Step 7',
                                'slug' => Str::slug('Програмне забезпечення Step 7'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Промислові системи візуалізації HMI',
                        'slug' => Str::slug('Промислові системи візуалізації HMI'),
                        'children' => [
                            [
                                'name' => 'Сенсорні панелі операторів',
                                'slug' => Str::slug('Сенсорні панелі операторів'),
                                'children' => [
                                    [
                                        'name' => 'SIMATIC HMI KYE Panel',
                                        'slug' => Str::slug('SIMATIC HMI KYE Panel'),
                                    ],
                                    [
                                        'name' => 'SIMATIC HMI Basic Panel',
                                        'slug' => Str::slug('SIMATIC HMI Basic Panel'),
                                    ],
                                    [
                                        'name' => 'SIMATIC HMI Comfort Panel',
                                        'slug' => Str::slug('SIMATIC HMI Comfort Panel'),
                                    ],
                                    [
                                        'name' => 'SIMATIC HMI Mobile Panel',
                                        'slug' => Str::slug('SIMATIC HMI Mobile Panel'),
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Системи візуалізації на базі ПК',
                                'slug' => Str::slug('Системи візуалізації на базі ПК'),
                                'children' => [
                                    [
                                        'name' => 'SIMATIC WinCC',
                                        'slug' => Str::slug('SIMATIC WinCC'),
                                    ],
                                ]
                            ],
                        ],
                    ],
                    [
                        'name' => 'Промислові системи комунікації SIMATIC NET',
                        'slug' => Str::slug('Промислові системи комунікації SIMATIC NET'),
                        'children' => [
                            [
                                'name' => 'Industrial Ethernet',
                                'slug' => Str::slug('Industrial Ethernet')
                            ],
                            [
                                'name' => 'PROFINET',
                                'slug' => Str::slug('PROFINET'),
                            ],
                            [
                                'name' => 'PROFIBUS',
                                'slug' => Str::slug('PROFIBUS'),
                            ],
                            [
                                'name' => 'AS-інтерфейс',
                                'slug' => Str::slug('AS-інтерфейс'),
                            ],
                            [
                                'name' => 'IO-Link',
                                'slug' => Str::slug('IO-Link'),
                            ],
                            [
                                'name' => 'Безпровідні мережі',
                                'slug' => Str::slug('Безпровідні мережі'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Промислові компютери',
                        'slug' => Str::slug('Промислові компютери'),
                    ],
                    [
                        'name' => 'Системи управління процесом PCS 7',
                        'slug' => Str::slug('Системи управління процесом PCS 7'),
                    ],
                    [
                        'name' => 'Блоки живлення SITOP',
                        'slug' => Str::slug('Блоки живлення SITOP'),
                    ],
                ]
            ],
            [
                'name' => 'ПРИВІДНА ТЕХНІКА',
                'slug' => Str::slug('ПРИВІДНА ТЕХНІКА'),
                'children' => [
                    [
                        'name' => 'Перетворювачі частоти',
                        'slug' => Str::slug('Перетворювачі частоти'),
                        'children' => [
                            [
                                'name' => 'Стандартні перетворювачі частоти',
                                'slug' => Str::slug('Стандартні перетворювачі частоти'),
                                'children' => [
                                    [
                                        'name' => 'SINAMICS V20',
                                        'slug' => Str::slug('SINAMICS V20'),
                                    ],
                                    [
                                        'name' => 'SINAMICS G110',
                                        'slug' => Str::slug('SINAMICS G110'),
                                    ],
                                    [
                                        'name' => 'SINAMICS G120C',
                                        'slug' => Str::slug('SINAMICS G120C'),
                                    ],
                                    [
                                        'name' => 'SINAMICS G120',
                                        'slug' => Str::slug('SINAMICS G120'),
                                    ],
                                    [
                                        'name' => 'SINAMICS G130',
                                        'slug' => Str::slug('SINAMICS G130'),
                                    ],
                                    [
                                        'name' => 'SINAMICS G150',
                                        'slug' => Str::slug('SINAMICS G150'),
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Високопродуктивні перетворювачі',
                                'slug' => Str::slug('Високопродуктивні перетворювачі'),
                                'children' => [
                                    [
                                        'name' => 'SINAMICS V90',
                                        'slug' => Str::slug('SINAMICS V90'),
                                    ],
                                    [
                                        'name' => 'SINAMICS S110',
                                        'slug' => Str::slug('SINAMICS S110'),
                                    ],
                                    [
                                        'name' => 'SINAMICS S120',
                                        'slug' => Str::slug('SINAMICS S120'),
                                    ],
                                    [
                                        'name' => 'SINAMICS S210',
                                        'slug' => Str::slug('SINAMICS S210'),
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Перетворювачі постійного струму',
                                'slug' => Str::slug('Перетворювачі постійного струму'),
                                'children' => [
                                    [
                                        'name' => 'SINAMICS DCM',
                                        'slug' => Str::slug('SINAMICS DCM'),
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Двигуни змінного стуму',
                        'slug' => Str::slug('Двигуни змінного стуму'),
                        'children' => [
                            [
                                'name' => 'Низьковольтні електродвигуни',
                                'slug' => Str::slug('Низьковольтні електродвигуни'),
                                'children' => [
                                    [
                                        'name' => 'SIMOTICS GP',
                                        'slug' => Str::slug('SIMOTICS GP'),
                                    ],
                                    [
                                        'name' => 'SIMOTICS SD',
                                        'slug' => Str::slug('SIMOTICS SD'),
                                    ],
                                    [
                                        'name' => 'Нестандартні електродвигуни',
                                        'slug' => Str::slug('Нестандартні електродвигуни'),
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Високовольтні електродвигуни',
                                'slug' => Str::slug('Високовольтні електродвигуни'),
                            ],
                            [
                                'name' => 'Серво електродвигуни',
                                'slug' => Str::slug('Серво електродвигуни'),
                                'children' => [
                                    [
                                        'name' => 'SIMOTICS 1FT7',
                                        'slug' => Str::slug('SIMOTICS 1FT7'),
                                    ],
                                    [
                                        'name' => 'SIMOTICS 1FK7',
                                        'slug' => Str::slug('SIMOTICS 1FK7'),
                                    ],
                                    [
                                        'name' => 'SIMOTICS 1SL6',
                                        'slug' => Str::slug('SIMOTICS 1SL6'),
                                    ],
                                    [
                                        'name' => 'SIMOTICS 1PH8',
                                        'slug' => Str::slug('SIMOTICS 1PH8'),
                                    ],
                                    [
                                        'name' => 'Серво мотор редуктори SIMOTICS S-1FG1',
                                        'slug' => Str::slug('Серво мотор редуктори SIMOTICS S-1FG1'),
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Інструменти програмного забезпечення',
                        'slug' => Str::slug('Інструменти програмного забезпечення'),
                        'children' => [
                            [
                                'name' => 'SIEMENS SIZER',
                                'slug' => Str::slug('SIEMENS SIZER'),
                            ],
                            [
                                'name' => 'SIEMENS STARTER',
                                'slug' => Str::slug('SIEMENS STARTER'),
                            ],
                            [
                                'name' => 'SIEMENS Startdrive',
                                'slug' => Str::slug('SIEMENS Startdrive'),
                            ],
                            [
                                'name' => 'SIEMENS Drive ES',
                                'slug' => Str::slug('SIEMENS Drive ES'),
                            ],

                        ],
                    ],
                ],
            ],
            [
                'name' => 'КОМУТАЦІЙНА ТЕХНІКА',
                'slug' => Str::slug('КОМУТАЦІЙНА ТЕХНІКА'),
                'children' => [
                    [
                        'name' => 'Комутаційні апарати SIRIUS',
                        'slug' => Str::slug('Комутаційні апарати SIRIUS'),
                        'children' => [
                            [
                                'name' => 'Контактори 3RT',
                                'slug' => Str::slug('Контактори 3RT'),
                            ],
                            [
                                'name' => 'Плавні пуски 3RW',
                                'slug' => Str::slug('Плавні пуски 3RW'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Прилади захисту',
                        'slug' => Str::slug('Прилади захисту'),
                        'children' => [
                            [
                                'name' => 'Автомати захисту двигуна',
                                'slug' => Str::slug('Автомати захисту двигуна'),
                            ],
                            [
                                'name' => 'Реле перевантаження',
                                'slug' => Str::slug('Реле перевантаження'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Фідери та пускачі електродвигунів',
                        'slug' => Str::slug('Фідери та пускачі електродвигунів'),
                    ],
                    [
                        'name' => 'Функціональні комутаційні реле',
                        'slug' => Str::slug('Функціональні комутаційні реле'),
                        'children' => [
                            [
                                'name' => 'SIMOCODE',
                                'slug' => Str::slug('SIMOCODE'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Прилади безпеки',
                        'slug' => Str::slug('Прилади безпеки'),
                    ],
                    [
                        'name' => 'Позиційні вимикачі',
                        'slug' => Str::slug('Позиційні вимикачі'),
                    ],
                    [
                        'name' => 'Прилади керування та індикації',
                        'slug' => Str::slug('Прилади керування та індикації'),
                        'children' => [
                            [
                                'name' => 'SIRIUS ACT 3SU',
                                'slug' => Str::slug('SIRIUS ACT 3SU'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Низковольтне енергорозподілення',
                        'slug' => Str::slug('Низковольтне енергорозподілення'),
                        'children' => [
                            [
                                'name' => 'Апаратура захисту',
                                'slug' => Str::slug('Апаратура захисту'),
                                'children' => [
                                    [
                                        'name' => 'Автоматичні вимикачі відкритого типу',
                                        'slug' => Str::slug('Автоматичні вимикачі відкритого типу'),
                                    ],
                                    [
                                        'name' => 'Автоматичні вимикачі у литому корпусі',
                                        'slug' => Str::slug('Автоматичні вимикачі у литому корпусі'),
                                    ],
                                    [
                                        'name' => 'Модульні автоматичні вимикачі',
                                        'slug' => Str::slug('Модульні автоматичні вимикачі'),
                                    ],
                                    [
                                        'name' => 'Системи запобіжників',
                                        'slug' => Str::slug('Системи запобіжників'),
                                    ],
                                    [
                                        'name' => 'Апаратура захисту перенапруг',
                                        'slug' => Str::slug('Апаратура захисту перенапруг'),
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Вимикачі та розєднувачі нагрузки',
                                'slug' => Str::slug('Вимикачі та розєднувачі нагрузки'),
                                'children' => [
                                    [
                                        'name' => 'Вимикачі та розєднувачі нагрузкии',
                                        'slug' => Str::slug('Вимикачі та розєднувачі нагрузкии'),
                                    ],
                                    [
                                        'name' => 'Вимикачі нагрузки з запобіжниками',
                                        'slug' => Str::slug('Вимикачі нагрузки з запобіжниками'),
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Апаратура контролю',
                                'slug' => Str::slug('Апаратура контролю'),
                            ],
                        ],
                    ],

                ],
            ],
            [
                'name' => 'КВПіА',
                'slug' => Str::slug('КВПіА'),
                'children' => [
                    [
                        'name' => 'Датчики тиску',
                        'slug' => Str::slug('Датчики тиску'),
                        'children' => [
                            [
                                'name' => 'Sitrans DS 3',
                                'slug' => Str::slug('Sitrans DS 3'),
                            ],
                            [
                                'name' => 'Sitrans P300',
                                'slug' => Str::slug('Sitrans P300'),
                            ],
                            [
                                'name' => 'Sitrans P500',
                                'slug' => Str::slug('Sitrans P500'),
                            ],
                            [
                                'name' => 'Sitrans P200/P210/P220',
                                'slug' => Str::slug('Sitrans P200/P210/P220'),
                            ],
                            [
                                'name' => 'Sitrans P Compact',
                                'slug' => Str::slug('Sitrans P Compact'),
                            ],
                            [
                                'name' => 'Sitrans LH100',
                                'slug' => Str::slug('Sitrans LH100'),
                            ],
                            [
                                'name' => 'Sitrans LH300',
                                'slug' => Str::slug('Sitrans LH300'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Датчики температури',
                        'slug' => Str::slug('Датчики температури'),
                        'children' => [
                            [
                                'name' => 'Sitrans TH100/TH200/TH300/TH400/TR200/TR300',
                                'slug' => Str::slug('Sitrans TH100/TH200/TH300/TH400/TR200/TR300'),
                            ],
                            [
                                'name' => 'Sitrans TS300',
                                'slug' => Str::slug('Sitrans TS300'),
                            ],
                            [
                                'name' => 'Sitrans TS500',
                                'slug' => Str::slug('Sitrans TS500'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Витратоміри',
                        'slug' => Str::slug('Витратоміри'),
                        'children' => [
                            [
                                'name' => 'Sitrans FM MAG 5000 / 6000',
                                'slug' => Str::slug('Sitrans FM MAG 5000 / 6000'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 6000 I /6000 I Ex',
                                'slug' => Str::slug('Sitrans FM MAG 6000 I /6000 I Ex'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 1100',
                                'slug' => Str::slug('Sitrans FM MAG 1100'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 1100F',
                                'slug' => Str::slug('Sitrans FM MAG 1100F'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 3100',
                                'slug' => Str::slug('Sitrans FM MAG 3100'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 5100W',
                                'slug' => Str::slug('Sitrans FM MAG 5100W'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 5100W + 6000 CT',
                                'slug' => Str::slug('Sitrans FM MAG 5100W + 6000 CT'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 8000',
                                'slug' => Str::slug('Sitrans FM MAG 8000'),
                            ],
                            [
                                'name' => 'Sitrans FM MAG 8000 CT',
                                'slug' => Str::slug('Sitrans FM MAG 8000 CT'),
                            ],
                            [
                                'name' => 'Sitrans FC330/FC310',
                                'slug' => Str::slug('Sitrans FC330/FC310'),
                            ],
                            [
                                'name' => 'Sitrans FUS380',
                                'slug' => Str::slug('Sitrans FUS380'),
                            ],
                            [
                                'name' => 'Sitrans FUE950',
                                'slug' => Str::slug('Sitrans FUE950'),
                            ],
                            [
                                'name' => 'Sitrans F US SONOKIT',
                                'slug' => Str::slug('Sitrans F US SONOKIT'),
                            ],
                            [
                                'name' => 'Sitrans FS230',
                                'slug' => Str::slug('Sitrans FS230'),
                            ],
                            [
                                'name' => 'Sitrans FS220',
                                'slug' => Str::slug('Sitrans FS220'),
                            ],
                            [
                                'name' => 'Sitrans FX330',
                                'slug' => Str::slug('Sitrans FX330'),
                            ],
                            [
                                'name' => 'Sitrans FVA250',
                                'slug' => Str::slug('Sitrans FVA250'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Рівнеміри',
                        'slug' => Str::slug('Рівнеміри'),
                        'children' => [
                            [
                                'name' => 'Sitrans LVL100/LVL200',
                                'slug' => Str::slug('Sitrans LVL100/LVL200'),
                            ],
                            [
                                'name' => 'Sitrans LVS100/LVS200',
                                'slug' => Str::slug('Sitrans LVS100/LVS200'),
                            ],
                            [
                                'name' => 'Sitrans LPS200',
                                'slug' => Str::slug('Sitrans LPS200'),
                            ],
                            [
                                'name' => 'Sitrans LU150/LU180',
                                'slug' => Str::slug('Sitrans LU150/LU180'),
                            ],
                            [
                                'name' => 'Sitrans Probe LU240',
                                'slug' => Str::slug('Sitrans Probe LU240'),
                            ],
                            [
                                'name' => 'Sitrans LUT400',
                                'slug' => Str::slug('Sitrans LUT400'),
                            ],
                            [
                                'name' => 'EchoMax',
                                'slug' => Str::slug('EchoMax'),
                            ],
                            [
                                'name' => 'Sitrans LR250',
                                'slug' => Str::slug('Sitrans LR250'),
                            ],
                            [
                                'name' => 'Sitrans LR250 FEA',
                                'slug' => Str::slug('Sitrans LR250 FEA'),
                            ],
                            [
                                'name' => 'Sitrans LR460',
                                'slug' => Str::slug('Sitrans LR460'),
                            ],
                            [
                                'name' => 'Sitrans LR560',
                                'slug' => Str::slug('Sitrans LR560'),
                            ],
                            [
                                'name' => 'Sitrans LG240/LG250/LG260/LG270',
                                'slug' => Str::slug('Sitrans LG240/LG250/LG260/LG270'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Прилади',
                        'slug' => Str::slug('Прилади'),
                        'children' => [
                            [
                                'name' => 'SPART PS2',
                                'slug' => Str::slug('SPART PS2'),
                            ],
                            [
                                'name' => 'Sirec D200/D300/D400',
                                'slug' => Str::slug('Sirec D200/D300/D400'),
                            ],
                            [
                                'name' => 'Sitrans RD100/RD200/RD300',
                                'slug' => Str::slug('Sitrans RD100/RD200/RD300'),
                            ],
                            [
                                'name' => 'Sitrans AS100',
                                'slug' => Str::slug('Sitrans AS100'),
                            ],
                            [
                                'name' => 'Sitrans CU02',
                                'slug' => Str::slug('Sitrans CU02'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ваговимірювання',
                        'slug' => Str::slug('Ваговимірювання'),
                        'children' => [
                            [
                                'name' => 'Siwarex WP321/WP521-522/WP251/CS/U/FTA',
                                'slug' => Str::slug('Siwarex WP321/WP521-522/WP251/CS/U/FTA'),
                            ],
                            [
                                'name' => 'Siwarex WP241/FTC, Miltronics BW500/BW500L/SF500',
                                'slug' => Str::slug('Siwarex WP241/FTC, Miltronics BW500/BW500L/SF500'),
                            ],
                            [
                                'name' => 'Siwarex WT231/241',
                                'slug' => Str::slug('Siwarex WT231/241'),
                            ],
                            [
                                'name' => 'Miltronics MSI/MCS',
                                'slug' => Str::slug('Miltronics MSI/MCS'),
                            ],

                        ],
                    ],
                    [
                        'name' => 'Газоаналізатори',
                        'slug' => Str::slug('Газоаналізатори'),
                        'children' => [
                            [
                                'name' => 'Ultramat 23',
                                'slug' => Str::slug('Ultramat 23'),
                            ],
                            [
                                'name' => 'Ultramat 6',
                                'slug' => Str::slug('Ultramat 6'),
                            ],
                            [
                                'name' => 'Oxymat 6',
                                'slug' => Str::slug('Oxymat 6'),
                            ],
                            [
                                'name' => 'Oxymat 61',
                                'slug' => Str::slug('Oxymat 61'),
                            ],
                            [
                                'name' => 'Calomat 6',
                                'slug' => Str::slug('Calomat 6'),
                            ],
                            [
                                'name' => 'Fidamat 6',
                                'slug' => Str::slug('Fidamat 6'),
                            ],
                            [
                                'name' => 'LDS6',
                                'slug' => Str::slug('LDS6'),
                            ],
                            [
                                'name' => 'Sitrans SL',
                                'slug' => Str::slug('Sitrans SL'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Хроматографи',
                        'slug' => Str::slug('Хроматографи'),
                        'children' => [
                            [
                                'name' => 'MicroSAM',
                                'slug' => Str::slug('MicroSAM'),
                            ],
                            [
                                'name' => 'Sitrans CV',
                                'slug' => Str::slug('Sitrans CV'),
                            ],
                            [
                                'name' => 'Maxum edition 2',
                                'slug' => Str::slug('Maxum edition 2'),
                            ],
                        ],
                    ],
                    [
                        'name' => 'Газова аналітика',
                        'slug' => Str::slug('Газова аналітика'),
                        'children' => [
                            [
                                'name' => 'Set BGA',
                                'slug' => Str::slug('Set BGA'),
                            ],
                            [
                                'name' => 'KHZ',
                                'slug' => Str::slug('KHZ'),
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'КІБЕР БЕЗПЕКА',
                'slug' => Str::slug('КІБЕР БЕЗПЕКА'),
            ],
            [
                'name' => 'Склад',
                'slug' => Str::slug('Склад'),
                'children' => [
                    [
                        'name' => 'Електродвигуни',
                        'slug' => Str::slug('Електродвигуни'),
                    ],
                    [
                        'name' => 'Низьковольтна комутаційна ап',
                        'slug' => Str::slug('Низьковольтна комутаційна ап'),
                    ],
                    [
                        'name' => 'LV',
                        'slug' => Str::slug('LV'),
                    ],
                    [
                        'name' => 'Частотні перетворювачі',
                        'slug' => Str::slug('Частотні перетворювачі'),
                    ],
                    [
                        'name' => 'Панелі оператора',
                        'slug' => Str::slug('Панелі оператора'),
                    ],
                    [
                        'name' => 'Контролерна техніка',
                        'slug' => Str::slug('Контролерна техніка'),
                    ],
                    [
                        'name' => 'Блоки живлення',
                        'slug' => Str::slug('Блоки живлення'),
                    ],
                    [
                        'name' => 'КВП',
                        'slug' => Str::slug('КВП'),
                    ],
                ],
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
