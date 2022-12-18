<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProducteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_product_list_page_has_no_products()
    {
        $response = $this->get('products');

        $response->assertSee('No products found.');

        $response->assertStatus(200);
    }
}
