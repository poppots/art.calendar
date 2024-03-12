<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use App\Models\Post;
use Illuminate\Http\Request;
use DateTime;

class ApiTestController extends Controller
{
    public function calendar(Post $post)
    {
        $dateStart = new \DateTime($post->start, new \DateTimeZone('Asia/Tokyo'));
        $iso8601Start = $dateStart->format('Y-m-d\TH:i:s') . '+09:00';
        
        $dateEnd = new \DateTime($post->end, new \DateTimeZone('Asia/Tokyo'));
        $iso8601End = $dateEnd->format('Y-m-d\TH:i:s') . '+09:00';
        
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = env('GOOGLE_CALENDAR_ID');

        $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => $post->title,
            'start' => array(
                // 開始日時
                'dateTime' => $iso8601Start,
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                // 終了日時
                'dateTime' => $iso8601End,
                'timeZone' => 'Asia/Tokyo',
            ),
        ));

        $event = $service->events->insert($calendarId, $event);
        return view('posts.store_alert');
    }

    private function getClient()
    {
        $client = new Google_Client();

        $client->setApplicationName('art-calendar');

        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);

        $client->setAuthConfig(storage_path('app/api-key/art-calendar-416503-de8aae310317.json'));

        return $client;
    }
}