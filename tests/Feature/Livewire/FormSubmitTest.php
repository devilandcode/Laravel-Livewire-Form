<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Form;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class FormSubmitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function test_form_submit()
    {

        $file = UploadedFile::fake()->image('avatar.png');

        $fields = [
            'name' => 'Tom',
            'last_name' => 'Taylor',
            'mid_name' => 'John',
            'dob' => '20-12-2000',
            'email' => 'tom@gmail.com',
            'status' => 'холос/разведен',
            'about' => 'Good man',
        ];

        Livewire::test(Form::class)
            ->set($fields)
            ->set('docs', [$file])
            ->call('save')
            ->assertSee('Ваша Заявка Успешно Отправлена!');

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseCount('files', 1);
    }
}
