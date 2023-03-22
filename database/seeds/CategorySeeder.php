<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Category::class, 20)->create();
       $category = Category::find('1');
       if (!$category) {
           factory(Category::class)->create([
                'title'       => 'Điện Tử',
                'parent_id'     => null,
                'sort'      => '1',
                'active'         => '1',
           ]);
       }
    }
}
