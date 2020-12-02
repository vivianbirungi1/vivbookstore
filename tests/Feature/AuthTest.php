<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class AuthTest extends TestCase
{
  //feature test for login
  public function testUserNeedsToBeLoggedInToSeeDashboard()
  {
    $response = $this->get('/home')->assertRedirect('/login');
  }

  public function testUserWithUserRoleCanAccessUserDashboard()
  {
    $user = User::factory()->create(); //make() wont store in db, create() will
    $user -> roles()->attach(Role::where('name', 'user')->first());

    //$user = User::where('id', 2)->first();

    $this->actingAs($user);
    $response = $this->get('/user/home')->assertOk();
  }

  public function testUserWithAdminRoleCanAccessAdminDashboard()
  {
    $user = User::factory()->create(); //make() wont store in db, create() will
    $user -> roles()->attach(Role::where('name', 'admin')->first());

    $this->actingAs($user);
    $response = $this->get('/admin/home')->assertOk();
  }

  public function testOrdinaryUserCannotAccessAdminDashboard()
  {
    $user = User::factory()->create(); //make() wont store in db, create() will
    $user -> roles()->attach(Role::where('name', 'user')->first());

    $this->actingAs($user);
    $response = $this->get('/admin/home')->assertRedirect('/home');
  }

  public function testAdminCanAccessUserDashboard()
  {
    $user = User::factory()->create(); //make() wont store in db, create() will
    $user -> roles()->attach(Role::where('name', 'admin')->first());

    $this->actingAs($user);
    $response = $this->get('/user/home')->assertRedirect('/home');
  }

}
