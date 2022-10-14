<?php

namespace Dniccum\LaravelRequestLogs\Database\Factories;

use Dniccum\LaravelRequestLogs\Models\RequestLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestLogFactory extends Factory
{
    protected $model = RequestLog::class;

    public function definition()
    {
        $startDate = $this->faker->dateTimeThisMonth;

        return [
            'id' => $this->faker->uuid,
            'request_start' => $startDate,
            'request_end' => $startDate,
            'method' => $this->faker->randomElement([
                'GET',
                'POST',
                'PUT',
                'DELETE',
            ]),
            'url' => $this->faker->url,
            'request_body' => null,
            'request_header' => '{"accept":["*\/*"],"user-agent":["laravel\/2022.6.0"],"host":["application.test"],"content-length":[""],"content-type":[""]}',
            'ip' => $this->faker->ipv4,
            'status_code' => 200,
            'response_body' => $this->sampleJson(),
        ];
    }

    /**
     * @return string
     */
    protected function sampleJson(): string
    {
        return '{
            "_id": "6349d4113e71d47199593800",
            "index": 0,
            "guid": "6a6d83a2-aa48-4bb6-a10b-ef16033557b1",
            "isActive": true,
            "balance": "$1,957.23",
            "picture": "http://placehold.it/32x32",
            "age": 23,
            "eyeColor": "brown",
            "name": "Clay Monroe",
            "gender": "male",
            "company": "GEOFARM",
            "email": "claymonroe@geofarm.com",
            "phone": "+1 (906) 406-2503",
            "address": "663 Ridgecrest Terrace, Titanic, Massachusetts, 7280",
            "about": "Ut quis laboris eiusmod aliquip nulla consequat incididunt et consectetur. Dolore elit duis laborum veniam ad. Nulla sunt nisi laboris est consectetur dolore pariatur aliqua laborum laboris ad velit tempor. Consequat eu duis excepteur dolore ex enim. Amet ut dolor deserunt excepteur reprehenderit sunt.\r\n",
            "registered": "2017-09-17T04:14:43 +05:00",
            "latitude": 49.267358,
            "longitude": 136.816405,
            "tags": [
              "dolor",
              "veniam",
              "dolore",
              "dolor",
              "pariatur",
              "eiusmod",
              "esse"
            ],
            "friends": [
              {
                "id": 0,
                "name": "Villarreal Forbes"
              },
              {
                "id": 1,
                "name": "Cleveland Waters"
              },
              {
                "id": 2,
                "name": "Marjorie Faulkner"
              }
            ],
            "greeting": "Hello, Clay Monroe! You have 2 unread messages.",
            "favoriteFruit": "banana"
          },
          {
            "_id": "6349d4111fcf7170819a3d0c",
            "index": 1,
            "guid": "f938913b-51b9-4acd-b495-c927c2b28033",
            "isActive": false,
            "balance": "$1,797.58",
            "picture": "http://placehold.it/32x32",
            "age": 24,
            "eyeColor": "blue",
            "name": "Morris Mayo",
            "gender": "male",
            "company": "SLAMBDA",
            "email": "morrismayo@slambda.com",
            "phone": "+1 (894) 405-3361",
            "address": "792 Schenectady Avenue, Hiwasse, Hawaii, 3545",
            "about": "Ipsum consequat cupidatat velit non in incididunt fugiat officia consequat. Exercitation proident nulla proident non. Eiusmod laborum eu laboris laboris nulla do sunt eu do aliqua laboris non commodo ipsum. Aliquip magna laborum velit anim in qui et in incididunt elit ad minim deserunt voluptate.\r\n",
            "registered": "2021-01-04T12:03:38 +06:00",
            "latitude": -87.98171,
            "longitude": -107.202918,
            "tags": [
              "laborum",
              "veniam",
              "duis",
              "laborum",
              "duis",
              "excepteur",
              "ipsum"
            ],
            "friends": [
              {
                "id": 0,
                "name": "Lindsay Jarvis"
              },
              {
                "id": 1,
                "name": "Berger Dominguez"
              },
              {
                "id": 2,
                "name": "Robbins Guerrero"
              }
            ],
            "greeting": "Hello, Morris Mayo! You have 3 unread messages.",
            "favoriteFruit": "strawberry"
          },
          {
            "_id": "6349d411897884cefe5c8645",
            "index": 2,
            "guid": "54326fc3-fc53-42b8-ab51-3b6973899ec7",
            "isActive": false,
            "balance": "$2,686.90",
            "picture": "http://placehold.it/32x32",
            "age": 40,
            "eyeColor": "brown",
            "name": "Marisa Delaney",
            "gender": "female",
            "company": "GEEKOLA",
            "email": "marisadelaney@geekola.com",
            "phone": "+1 (990) 440-3451",
            "address": "152 Haring Street, Rote, Tennessee, 296",
            "about": "Culpa aliqua et ea ad incididunt adipisicing Lorem voluptate aliqua aute laborum non et sunt. Ullamco ipsum deserunt irure irure. Nulla quis elit esse anim id voluptate aute labore mollit fugiat culpa. Velit tempor commodo et exercitation veniam. Cillum sint est ut do aute exercitation veniam nulla nostrud in. Quis sint est aute esse laboris ea cillum proident excepteur dolore cupidatat dolor.\r\n",
            "registered": "2014-05-31T04:52:29 +05:00",
            "latitude": 66.325212,
            "longitude": -20.744306,
            "tags": [
              "veniam",
              "nisi",
              "excepteur",
              "id",
              "et",
              "commodo",
              "consectetur"
            ],
            "friends": [
              {
                "id": 0,
                "name": "Larsen Valentine"
              },
              {
                "id": 1,
                "name": "Golden Hahn"
              },
              {
                "id": 2,
                "name": "Jones Boyd"
              }
            ],
            "greeting": "Hello, Marisa Delaney! You have 8 unread messages.",
            "favoriteFruit": "strawberry"
          },
          {
            "_id": "6349d41182f10daa71c8550e",
            "index": 3,
            "guid": "7402c0b4-145b-473b-917c-375c89dfd782",
            "isActive": false,
            "balance": "$3,253.13",
            "picture": "http://placehold.it/32x32",
            "age": 20,
            "eyeColor": "brown",
            "name": "Priscilla Ortega",
            "gender": "female",
            "company": "CODACT",
            "email": "priscillaortega@codact.com",
            "phone": "+1 (977) 446-3698",
            "address": "354 Ovington Court, Calverton, Pennsylvania, 4898",
            "about": "Anim Lorem ea voluptate non consequat. Deserunt nulla cillum nulla commodo adipisicing esse officia laboris voluptate non. Ut proident esse deserunt ea laboris Lorem nulla cupidatat eu pariatur magna elit eiusmod reprehenderit. Sit nulla occaecat sit eu exercitation et nisi ea esse do. Magna consectetur eiusmod est cupidatat in voluptate ut consectetur duis reprehenderit eu.\r\n",
            "registered": "2019-08-24T07:42:19 +05:00",
            "latitude": -41.703404,
            "longitude": -108.92456,
            "tags": [
              "aute",
              "ipsum",
              "eu",
              "enim",
              "anim",
              "amet",
              "fugiat"
            ],
            "friends": [
              {
                "id": 0,
                "name": "Audra Snider"
              },
              {
                "id": 1,
                "name": "Alston Gill"
              },
              {
                "id": 2,
                "name": "Hendricks Frye"
              }
            ],
            "greeting": "Hello, Priscilla Ortega! You have 6 unread messages.",
            "favoriteFruit": "strawberry"
          },
          {
            "_id": "6349d41193f22701ec49bb81",
            "index": 4,
            "guid": "78c4fe77-8fd5-4934-b4e0-768deda48ba6",
            "isActive": true,
            "balance": "$3,953.88",
            "picture": "http://placehold.it/32x32",
            "age": 23,
            "eyeColor": "brown",
            "name": "Danielle Phillips",
            "gender": "female",
            "company": "SPEEDBOLT",
            "email": "daniellephillips@speedbolt.com",
            "phone": "+1 (803) 473-2412",
            "address": "608 Oriental Boulevard, Tyro, Colorado, 2514",
            "about": "Occaecat laborum in culpa ipsum eu ea non ad aute est nisi. Qui occaecat commodo reprehenderit labore sit dolore reprehenderit aliqua ut sit incididunt eu commodo. Nostrud irure eu elit dolore cillum occaecat nisi exercitation deserunt commodo mollit. Adipisicing occaecat cupidatat quis pariatur in magna laborum eiusmod. Incididunt culpa anim do est sit cillum elit. In velit tempor anim sint eu.\r\n",
            "registered": "2018-09-25T06:14:09 +05:00",
            "latitude": -17.650105,
            "longitude": 159.352275,
            "tags": [
              "eiusmod",
              "sit",
              "magna",
              "elit",
              "ea",
              "Lorem",
              "culpa"
            ],
            "friends": [
              {
                "id": 0,
                "name": "Kane Alford"
              },
              {
                "id": 1,
                "name": "Foreman Ortiz"
              },
              {
                "id": 2,
                "name": "Eva Molina"
              }
            ],
            "greeting": "Hello, Danielle Phillips! You have 8 unread messages.",
            "favoriteFruit": "banana"
          }';
    }
}
