<?php

use App\Models\User;

it('provides users in a random paginated order', function () {

    $users = User::factory()->count(4)->create();

    $users = collect($this->get('/')->viewData('users')->items())
    ->merge($this->get('/?page=2')->viewData('users')->items());

    expect($users->count())->toBe($users->unique('id')->count());

});
