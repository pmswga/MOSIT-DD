<?php

namespace Tests\Feature;

use App\AccountModel;
use App\Models\Main\Staff\EmployeeModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BaseRoutesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate', ['--path' => 'database\\migrations\\**\\*']);
        #Artisan::call('db:seed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testProfile()
    {
        $employee = factory(EmployeeModel::class)->create();
        $user = factory(AccountModel::class)->create();

        $response = $this->actingAs($user)
                ->get('/profile');

        $response->assertOk();
    }

}
