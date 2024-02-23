<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Form;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     * @return void
     */
    public function test_required_fields()
    {

        $phone = [
            'phoneCode' => '375',
            'phone' => '297345676',
        ];

        Livewire::test(Form::class)
            ->call('save')
            ->assertHasErrors([
                    'name',
                    'last_name',
                    'dob',
                    'email',
                    'phoneCode',
                    'phone',
                    'status'
                ]
            );

        Livewire::test(Form::class)
            ->set('email', 'tom@gmail.com')
            ->call('save')
            ->assertHasErrors([
                    'name',
                    'last_name',
                    'dob',
                    'status'
                ]
            );

        Livewire::test(Form::class)
            ->set($phone)
            ->call('save')
            ->assertHasErrors([
                    'name',
                    'last_name',
                    'dob',
                    'status'
                ]
            );
    }
}
