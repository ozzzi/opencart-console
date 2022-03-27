<?php

namespace Ozzzi\Console\Services;

use Carbon\Carbon;
use Ozzzi\Console\Models\Category;
use Ozzzi\Console\Models\Manufacturer;
use Ozzzi\Console\Models\Product;
use Illuminate\Database\Capsule\Manager as DB;

class ProductFakeService extends BaseFakerService
{
    protected const CHUNK_SIZE = 50;

    public function process(int $numProducts)
    {
        $maxCategoryId = $this->getMaxCategoryId();
        $manufacturerId = $this->getLastManufCategoryId();
        $chunkIterations = $this->chunkIterations($numProducts);

        $index = 0;

        for ($i = 0; $i < $chunkIterations; $i++) {
            try {
                DB::beginTransaction();

                for ($j = 0; $j < self::CHUNK_SIZE && $index < $numProducts; $j++) {
                    $product = Product::create([
                                                   'model' => $this->faker->word() . $index,
                                                   'sku' => $this->faker->word() . $index,
                                                   'quantity' => 1,
                                                   'stock_status_id' => 7,
                                                   'manufacturer_id' => $manufacturerId,
                                                   'shipping' => 1,
                                                   'price' => $this->faker->randomNumber(5, false),
                                                   'points' => 0,
                                                   'tax_class_id' => 9,
                                                   'date_available' => Carbon::now(),
                                                   'status' => 1,
                                                   'date_added' => Carbon::now(),
                                                   'date_modified' => Carbon::now()
                                               ]);

                    $title = $this->faker->words(2, true);

                    $product->description()->create([
                                                        'language_id' => 1,
                                                        'name' => $title,
                                                        'description' => $this->faker->text(),
                                                        'tag' => $this->faker->word(),
                                                        'meta_title' => $title,
                                                        'meta_description' => $title,
                                                        'meta_keyword' => $this->faker->word(),
                                                    ]);


                    $product->category()->create([
                                                     'category_id' => $this->faker->numberBetween(1, $maxCategoryId)
                                                 ]);

                    $product->layout()->create([
                                                   'store_id' => 0,
                                                   'layout_id' => 0,
                                               ]);

                    $product->store()->create(['store_id' => 0]);

                    $index++;
                }

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollBack();
            }
        }
    }

    protected function getMaxCategoryId()
    {
        return Category::orderBY('category_id', 'desc')
            ->value('category_id');
    }

    protected function getLastManufCategoryId()
    {
        return Manufacturer::orderBY('manufacturer_id', 'desc')
            ->value('manufacturer_id');
    }

    protected function chunkIterations(int $total)
    {
        return ceil($total / self::CHUNK_SIZE);
    }
}