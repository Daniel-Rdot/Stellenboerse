<?php

namespace Tests\Feature;

use App\Http\Controllers\TagController;
use App\Models\Tag;
use Database\Seeders\TagSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_that_tags_are_stored(): void
    {
        $request = Request::create('/tags', 'POST', [
                'tag' => 'PHP'
            ]
        );

        $controller = new TagController();
        $controller->store($request);

        $this->assertDatabaseHas('tags', ['tag' => 'PHP']);
    }

    public function test_that_tags_are_updated(): void
    {
        $this->seed(TagSeeder::class);


        $request = Request::create('/tags/1', 'PUT', [
                'tag' => 'Testestest'
            ]
        );

        $tag = Tag::find(1);

        $controller = new TagController();
        $controller->update($request, $tag);

        $this->assertDatabaseHas('tags', [
            'id' => 1,
            'tag' => 'Testestest',
        ]);
    }

    public function test_that_tags_are_deleted(): void
    {
        $this->seed(TagSeeder::class);

        $tag = Tag::find(1);
        $controller = new TagController();
        $controller->destroy($tag);

        $this->assertDatabaseMissing('tags', [
            'id' => 1,
        ]);
        $this->assertDatabaseCount('tags', 4);
    }
}
