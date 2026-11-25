<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class InventoryAccessTest extends TestCase
{
    use RefreshDatabase;
    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/equipment')->assertRedirect('/login');
    }
    public function test_authenticated_user_can_open_equipment_list(): void
    {
        $user = User::create(['name' => 'Test Admin', 'username' => 'testadmin', 'email' => 'test@example.com', 'password' => 'password']);
        $this->actingAs($user)->get('/equipment')->assertOk()->assertSee('Equipment Inventory');
    }
}
