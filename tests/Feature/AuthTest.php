<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Admin;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        //カートの中身
        $response = $this->get('/cart/index');
        $response->assertStatus(302);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/cart/index');
        $response->assertStatus(200);

        //管理画面
        $response = $this->get('/product');
        $response->assertStatus(302);

        $admin = factory(Admin::class)->create();
        $response = $this->actingAs($admin)->get('/category');
        $response->assertStatus(200);        
    }
}
