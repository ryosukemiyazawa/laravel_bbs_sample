<?php

use Illuminate\Database\Seeder;

use App\EntryItem;

class EntryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = [];
		
		$data[] = [
			"title" => "書き込みタイトル1 from Seeder",
			"body" => "書き込み本文1 from Seeder"
		];

		$data[] = [
			"title" => "書き込みタイトル2 from Seeder",
			"body" => "書き込み本文2 from Seeder"
		];

		foreach ($data as $item) {
			EntryItem::create($item);
		}
    }
}
