<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Multitenancy\Actions\MakeTenantCurrentAction;
use Tests\TestCase;
use Faker\Factory as Faker;

class UserPostFlowTest extends TestCase
{
    use RefreshDatabase;

    protected $tenant;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');

        // Setup tenant context
        $faker = \Faker\Factory::create();
        \App\Models\Tenant::factory()->create(['name' => 'Tenant One', 'slug' => $faker->slug]);
        $this->tenant = \App\Models\Tenant::factory()->create(['name' => 'Tenant Two', 'slug' => $faker->slug]);

        $this->baseUrl = 'http://' . $this->tenant->slug . '.app.test:8000';
        app(\Spatie\Multitenancy\Actions\MakeTenantCurrentAction::class)->execute($this->tenant);
    }

    public function test_user_can_register_login_create_category_post_and_view_own_posts()
    {
        $faker = Faker::create();
        $password = 'test_password';

        // Create user with full fields
        $user = User::create([
            'first_name'        => $faker->firstName,
            'last_name'         => $faker->lastName,
            'email'             => $faker->unique()->safeEmail,
            'username'          => $faker->unique()->userName,
            'status'            => 'active',
            'country_code'      => '+1',
            'phone'             => $faker->unique()->numerify('123#######'),
            'country'           => $faker->country,
            'state'             => $faker->state,
            'city'              => $faker->city,
            'address'           => $faker->address,
            'zip'               => $faker->postcode,
            'password'          => Hash::make($password),
            'google_id'         => null,
            'facebook_id'       => null,
            'email_verified_at' => now(),
            'tenant_id'         => $this->tenant->id,
        ]);


        $loginUrl = $this->baseUrl . '/login';
        $loginResponse = $this->post($loginUrl, [
            'email' => $user->email,
            'password' => $password,
        ]);

        $loginResponse->assertRedirect('/dashboard');

        // Must re-apply tenant context for next actions
        app(MakeTenantCurrentAction::class)->execute($this->tenant);

        // Create category
        $categoryName = $faker->words(2, true);
        $category = Category::create([
            'name'      => $categoryName,
            'tenant_id' => $this->tenant->id,
        ]);

        $this->assertDatabaseHas('categories', [
            'name'      => $categoryName,
            'tenant_id' => $this->tenant->id,
        ]);

        // Create post
        $title = $faker->sentence(6, true);
        $post = Post::create([
            'title'         => $title,
            'content'       => $faker->paragraphs(3, true),
            'featured_image'=> $faker->imageUrl(),
            'category_id'   => $category->id,
            'created_by'    => $user->id,
            'updated_by'    => $user->id,
            'tenant_id'     => $this->tenant->id,
        ]);

        $this->assertDatabaseHas('posts', [
            'title'     => $title,
            'tenant_id' => $this->tenant->id,
            'created_by'    => $user->id,
        ]);


        $postsUrl = $this->baseUrl . '/my/posts';
        $response = $this
            ->actingAs($user)
            ->get($postsUrl);

        $response->assertStatus(200);
        $response->assertSee($title);
    }
}
