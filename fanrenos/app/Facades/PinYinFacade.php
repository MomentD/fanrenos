<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
/**
 * @see \App\Services\BaseProductService
 */
class PinYinFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pinyin';
    }
}