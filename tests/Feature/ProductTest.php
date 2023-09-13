<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;


class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }


    use RefreshDatabase, WithFaker;

    /** @test */
    public function createProductTest()
    {
        $data = [
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->paragraph,
            'product_price' => $this->faker->randomFloat(2, 1, 1000),
        ];

        $response = $this->json('POST', '/api/product', $data);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'Product created',
            ]);

        $this->assertDatabaseHas('products', $data);
    }

    /** @test */
    public function requiredCreateProductTest(){
        $response = $this->json('POST', '/api/product', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['product_name', 'product_description', 'product_price']);
    }

    /** @test */
    public function createProductPriceTest(){
        $data = [
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->paragraph,
            'product_price' => 'invalid_price_format',
        ];

        $response = $this->json('POST', '/api/product', $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['product_price']);
    }

}
