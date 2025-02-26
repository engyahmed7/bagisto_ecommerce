<?php

namespace Vendor\PackageName\Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Category\Repositories\CategoryRepository;

class ProductSeeder extends Seeder
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function run()
    {
        // Fetch the desired category by ID
        $category = $this->categoryRepository->find(1); // Replace with your category ID

        if (!$category) {
            $this->command->warn('Category not found. Please ensure categories exist in the database.');
            return;
        }

        // Create a new product
        $productData = [
            'sku'                 => 'PROD001',
            'type'                => 'simple',
            'attribute_family_id' => 1, // Ensure this matches your attribute family ID
            'name'                => 'Sample Product',
            'description'         => 'This is a sample product description.',
            'short_description'   => 'Short description here.',
            'price'               => 100.00,
            'weight'              => 1.00,
            'status'              => 1,
            'visible_individually' => 1,
            'categories'          => [$category->id],
            'inventories'         => [
                1 => 100, // Inventory source ID => quantity
            ],
        ];

        $this->productRepository->create($productData);
    }
}
