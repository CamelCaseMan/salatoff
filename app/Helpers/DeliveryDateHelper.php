<?php

namespace App\Helpers;

use Carbon\Carbon;

class DeliveryDateHelper
{
    const SUNDAY = 7;
    const TIME_NO = '16:00:00';

    /**
     * @return string
     * Получаем акуальную дату доставки
     * При заказе до 16:00 доставка осуществляется на следующий день
     * При заказе после 16:00 доставка осуществляется через день
     * В воскресенье доставка не осуществляется
     */
    public static function setDateDelivery()
    {
        $delivery = Carbon::now();
        $info = $delivery->toArray();
        $dayOfWeek = $info['dayOfWeek'];

        if ($dayOfWeek == DeliveryDateHelper::SUNDAY) {
            return Carbon::tomorrow()->format('d-m-Y');
        }

        $time_no = Carbon::createFromTimeString(DeliveryDateHelper::TIME_NO);
        if ($delivery > $time_no) {
            $date = $delivery->addDays(2);
        } else {
            $date = Carbon::tomorrow();

        }

        return $date->format('d.m.Y');
    }
}