<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_shows_the_products_list(): void
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertSee('Products');
    }

    public function test_creates_a_product_with_valid_data(): void
    {
        $data = [
            'name' => 'Test Product',
            'details' => 'Test Product Details',
            'price' => 100.00,
            'is_published' => true,
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', $data);
    }

    public function test_creates_a_product_with_invalid_data(): void
    {
        $data = [
            'name' => '',
            'price' => '',
            'is_published' => '',
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertSessionHasErrors(['name', 'price', 'is_published']);
        $this->assertDatabaseMissing('products', $data);
    }

    public function test_updates_a_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->put(route('products.update', $product), [
            'name' => 'Updated Product',
            'details' => 'Updated Product Details',
            'price' => 100.00,
            'is_published' => true,
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Updated Product',
            'details' => 'Updated Product Details',
            'price' => 100.00,
            'is_published' => true,
        ]);
    }

    public function test_deletes_a_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', $product->toArray());
    }

    public function test_search_products_by_name(): void
    {
        Product::factory()->create(['name' => 'Samsung Galaxy S25']);
        Product::factory()->create(['name' => 'Apple iPhone 15']);

        $response = $this->get(route('products.index', ['search' => 'Samsung']));

        $response->assertSee('Samsung Galaxy S25');
        $response->assertDontSee('Apple iPhone 15');
    }
}
