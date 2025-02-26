<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Category\Repositories\CategoryRepository;

class ProductSeeder extends Seeder
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function run()
    {
        // Find an existing category (Make sure to replace '1' with a valid category ID)
        $category = $this->categoryRepository->findOneByField('id', 1);

        if (!$category) {
            $this->command->warn('Category not found. Please seed categories first.');
            return;
        }

        // Create a new product
        $productData = [
            'sku'                 => 'PROD001',
            'type'                => 'simple',
            'attribute_family_id' => 1,  // Ensure this matches your attribute_family table
            'name'                => 'Sample Product',
            'description'         => 'A sample product description.',
            'short_description'   => 'Short description here.',
            'price'               => 99.99,
            'weight'              => 1.00,
            'status'              => 1,
            'visible_individually' => 1,
            'categories'          => [$category->id], // Assign category ID
            'inventories'         => [
                1 => 100, // Inventory Source ID => Stock Quantity
            ],
        ];

        $this->productRepository->create($productData);
    }
}
