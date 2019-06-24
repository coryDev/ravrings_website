<?php

use Illuminate\Database\Seeder;
use App\Models\Cate;

class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;

        $file_lines = file('https://www.google.com/basepages/producttype/taxonomy.en-US.txt');
        
        foreach ($file_lines as $line) {
            
            if ($count > 0) {
                Cate::create(array('name' => trim($line)));
            }
            $count++;
        }
    }
}
