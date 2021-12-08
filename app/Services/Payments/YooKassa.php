<?php

namespace App\Services\Payments;

use YooKassa\Client;

class YooKassa
{
    private function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('shop.yookassa.shopId'), config('shop.yookassa.secretKey'));
        return $client;
    }

    /**
     * @param object $order
     * @return string
     * Отправка клиента на урл платежа
     */
    public function createPayment(object $order)
    {
        $client = $this->getClient();
        $payment = $client->createPayment(
            array(
                'amount' => array(
                    'value' => (string)$order->total,
                    'currency' => 'RUB',
                ),
                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => route('basket.success'),
                ),
                'capture' => true,
                'description' => 'Заказ №' . $order->id,
                'metadata' => array(
                    'order_id' => $order->id,
                ),
                "receipt" => $this->generateReceipt($order)
            ),
            uniqid('', true)
        );

        //получаем confirmationUrl для дальнейшего редиректа
        $confirmationUrl = $payment->getConfirmation()->getConfirmationUrl();
        return $confirmationUrl;
    }

    /**
     * @param object $order
     * @return array
     * Генерация чека платежа
     */
    private function generateReceipt(object $order): array
    {
        $receipt = [
            "customer" => [
                "full_name" => $order->name,
                "phone" => str_replace(array('+', '(', ')',), '', $order->phone),
            ],
            "items" => $this->getProducts($order),
        ];

        return $receipt;

    }

    /**
     * @param object $order
     * @return array
     * Формируем для чека список продуктов
     */
    private function getProducts(object $order)
    {
        $discount = $order->cupon->discount ?? 0;
        $products = [];

        foreach ($order->products as $key => $product) {

            //Если есть скидка - то считаем скидку для каждого товара
            $product_price = 0;
            if (isset($discount)) {
                $product_price = $product->price - round(($product->price * $discount) / 100, 2);
            } else {
                $product_price = $product->price;
            }

            $products[] = [
                "description" => $product->name,
                "quantity" => (string)$product->pivot->count,
                "amount" => [
                    "value" => (string)$product_price,
                    "currency" => "RUB"
                ],
                "vat_code" => "2",
                "payment_mode" => "full_prepayment",
                "payment_subject" => "commodity"
            ];
        }

        return $products;
    }

    public function callback()
    {

    }

}