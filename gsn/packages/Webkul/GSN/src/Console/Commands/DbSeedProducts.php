<?php

namespace Webkul\GSN\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Webkul\Product\Repositories\ProductRepository;

class DbSeedProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public function __construct(private ProductRepository $productRepository)
    {
        parent::__construct();
    }
    protected $signature = 'seed-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        for ($i = 0; $i < 1200; $i++) {
            $data_product = array_merge([
                //  'type',
                'attribute_family_id' => 6,
                // 'sku',
                'super_attributes',
                'family',
            ], [
                'sku' => Str::random(20),
                "admin_id" => 1,
                "type" => "virtual",
            ]);
            $this->info("time is :" . $i);
            $this->productRepository->create($data_product);
        }
    }
}
