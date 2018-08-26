<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CoreSettings extends Model
{
    /**
     * @var string
     */
    protected $table = 'core_settings';

    /**
     * @var array
     */
    protected $fillable = [
        'key', 'value'
    ];

    /**
     * @return array
     */
    public function getAllSettings()
    {
        $settings_all = $this->get();
        $settings = [];
        if(!$settings_all->isEmpty()) {
            foreach($settings_all as $items) {
                if(!in_array($items, $settings)) {
                    $items['key'] = $this->trimSettingTitle($items['key']);
                    array_push($settings, $items);
                }
            }
        }
        return $settings;
    }

    /**
     * @param $string
     * @return string
     */
    public function trimSettingTitle($string)
    {
        $string = explode('_', $string);
        $newStr = implode(' ', $string);
        return $newStr;
    }

    /**
     * @return array
     */
    public function getCoreSettingsMainStacks()
    {
        $stacks_all = $this->where('key', '=', 'main_stacks')->first();
        if(!is_null($stacks_all)) {
            $stacks = explode(',', str_replace('</p>', '', str_replace('<p>', '', $stacks_all->value)));
            return $stacks;
        }
    }

    public function getCoreSettingsMainStacksByField()
    {
        return $this->where('key', 'main_stacks')->pluck('value')->first();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function updateSetting(Request $request)
    {
        foreach($request->except('_method', '_token') as $key => $value) {
            $this->where('key', $key)->update(['value' => $value]);
        }
        return true;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getSettingByKey($key)
    {
        return $this->where('key', (string)$key)->pluck('value')->first();
    }
}
