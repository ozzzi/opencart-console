<?php

namespace Ozzzi\Console\Services;

use Ozzzi\Console\Models\Category;
use Illuminate\Database\Capsule\Manager as DB;

class CategoryFakeService extends BaseFakerService
{
    public function process(int $amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            DB::transaction(function () {
                $category = Category::create([
                                                 'parent_id' => 0,
                                                 'top' => 0,
                                                 'column' => 1,
                                                 'sort_order' => 0,
                                                 'status' => 1,
                                                 'date_added' => date('Y-m-d H:i:s'),
                                                 'date_modified' => date('Y-m-d H:i:s')
                                             ]);

                $title = $this->faker->words(2, true);

                $category->description()->create([
                                                         'language_id' => 1,
                                                         'name' => $title,
                                                         'description' => $this->faker->text(),
                                                         'meta_title' => $title,
                                                         'meta_description' => $title,
                                                         'meta_keyword' => $this->faker->word()
                                                     ]);

                $category->path()->create([
                                                  'path_id' => $category->category_id,
                                                  'level' => 0
                                              ]);

                $category->layout()->create([
                                                'store_id' => 0,
                                                'layout_id' => 0,
                                            ]);

                $category->store()->create(['store_id' => 0]);
            });
        }
    }
}