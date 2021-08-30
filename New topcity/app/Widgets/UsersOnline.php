<?php

namespace App\Widgets;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class UsersOnline extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $users_online = $this->usersOnline();
        $string = trans_choice('voyager::dimmer.user', $users_online);
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$users_online} {$string}",
            'text'   => ' Онлайн  ' . $users_online . ' ' .$string,
            'button' => [
                'text' => __('voyager::dimmer.user_link_text'),
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    public function usersOnline(){
        $users = DB::table('users')->select('id')->get();
        $count = 0;

        foreach ($users as $user)
        {
            if (\Cache::has('user-is-online-'.$user->id)){
                $count++;
            }
        }
        return $count;
    }
    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
