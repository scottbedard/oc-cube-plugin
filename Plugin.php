<?php namespace Bedard\Cube;

use Backend;
use System\Classes\PluginBase;

/**
 * Cube Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Cube',
            'description' => 'No description provided yet...',
            'author'      => 'Bedard',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'cube' => [
                'label'       => 'Cube',
                'url'         => Backend::url('bedard/cube/solves'),
                'icon'        => 'icon-cube',
                'permissions' => ['bedard.cube.*'],
                'order'       => 500,
            ],
        ];
    }

}
