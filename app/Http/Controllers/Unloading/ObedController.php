<?php

namespace App\Http\Controllers\Unloading;

use App\Models\Product;

class ObedController
{
    public function index()
    {
        $products_new = [];
        $products_all = Product::whereNotIn('category_id', config('obed_ru.exclude_categories'))
            ->whereNotIn('id', config('obed_ru.exclude_products'))
            ->get();
        foreach ($products_all as $product) {
            $products_new[] = [
                'id' => (int)$product->id,
                'category_id' => $this->setCategory($product),
                'name' => (string)$this->setName($product),
                'description' => $this->setDescription($product),
                'portion' => $this->setPortion($product),
                'unit' => $this->setUnit($product->category_id),
                'price' => (float)$product->price,
                'calorie100' => $this->setCalorie($product),
                'picture' => $this->setImage($product),
            ];
        }


        $products_new = $this->getCustomCategory($products_new);

        // return response()->view('unloading.obed', ['products' => $products_new])->header('Content-Type', 'text/xml');
    }


    /**
     * @param $product
     * @return \Illuminate\Config\Repository|mixed|null
     * Соответствие категорий
     */
    private function setCategory($product)
    {
        if (!array_key_exists($product->category_id, config('obed_ru.category'))) {
            die('Укажите категорию соотвествия обед ру товару с id. ' . $product->id);
        }
        return config('obed_ru.category.' . $product->category_id);
    }


    /**
     * @param $product
     * @return string
     * Формируем правильное имя
     */
    private function setName($product): string
    {
        if (empty($product->name)) {
            dd('Укажите имя товару с id. ' . $product->id);
        } else {
            return str_replace('"', '', $product->name);
        }
    }


    /**
     * @param $product
     * @return mixed|null
     * Формируем описание
     */
    private function setDescription($product)
    {
        if (!isset($product->getAttributeProduct)) {
            echo 'Укажите описание товару с id. ' . $product->id . '</br>';
            return null;
        } else {
            return str_replace('"', '', $product->getAttributeProduct->composition);
        }
    }

    /**
     * @param $product
     * @return string
     * Формируем Размер порции
     */
    private function setPortion($product)
    {
        if (!isset($product->getAttributeProduct)) {
            dd('Укажите вес товару с id. ' . $product->id);
        } else {
            $text = $product->getAttributeProduct->weight;
        }

        $pos = strpos($text, ' ');

        if ($pos !== false) {
            $portion = explode(" ", $text);
            return trim($portion[0]);
        } else {
            dd('Укажите вес товару с id. ' . $product->id);
        }
    }

    /**
     * @param int $category_id
     * @return bool|int|mixed|string
     * Формируем измерения блюда, указываем для категории
     */
    private function setUnit(int $category_id)
    {
        $units = config('obed_ru.units');
        $id = false;

        foreach ($units as $key => $unit) {
            $search = array_search($category_id, $unit);
            if ($search !== false) {
                $id = $key;
                break;
            }
        }

        if (!$id) {
            dd('Укажите units для категории - ' . $category_id);
        }
        return $id;
    }


    /**
     * @param $product
     * @return null|string
     * Формируем калории
     */
    private function setCalorie($product)
    {
        if (!isset($product->getAttributeProduct)) {
            echo 'Укажите энергетическую ценность товару с id. ' . $product->id;
            return null;
        } else {
            $text = $product->getAttributeProduct->energy;
        }

        $pos = strpos($text, 'ккал');

        if ($pos !== false) {
            $calorie = explode("ккал", $text);
            return trim($calorie[0]);
        } else {
            echo 'Укажите ккал товару с id. ' . $product->id . '</br>';
            return null;
        }
    }

    /**
     * @param $product
     * @return string
     * Формируем изображение
     */
    private function setImage($product)
    {
        if (is_null($product->image)) {
            echo 'Укажите изображение товару с id. ' . $product->id . '</br>';
            return '';
        } else {
            $image = str_replace('\\', '/', $product->image);
            return 'https://salatoff.ru' . $image;
        }
    }

    /**
     * Формируем кастомные категории
     */
    private function getCustomCategory(array $products_new)
    {
        $last_id = $products_new[count($products_new) - 1]['id'];

        $categories = config('obed_ru.custom_category');
        if (count($categories) > 0) {

            foreach ($categories as $key => $category) {
                $products = Product::whereIn('id', $category)->get();
                foreach ($products as $product) {
                    $last_id++;
                    $custom_product = [
                        'id' => $last_id,
                        'category_id' => $key,
                        'name' => (string)$this->setName($product),
                        'description' => $this->setDescription($product),
                        'portion' => $this->setPortion($product),
                        'unit' => $this->setUnit($product->category_id),
                        'price' => (float)$product->price,
                        'calorie100' => $this->setCalorie($product),
                        'picture' => $this->setImage($product),
                    ];
                    array_push($products_new, $custom_product);
                }
            }

        }

        return $products_new;
    }


}