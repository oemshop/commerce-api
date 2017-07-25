<?php

namespace App\Http\Controllers\Auth;

use App\Models\Base\User;
use App\Models\Base\Person;
use App\Models\Base\Account;
use App\Models\Base\PersonAddress;
use App\Models\Base\PersonContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Create a new account.
     *
     * @param  RegisterRequest $request
     *
     * @return json
     */
    public function register(RegisterRequest $request)
    {
        // create new account.
        $account = new Account();
        $account->save();
        $account->secret_key = bcrypt($account->id);
        $account->public_key = \Hashids::encode($account->id);
        $account->save();

        // create new person and address.
        $person = $account->persons()->save(new Person($request->all()));
        $person->addresses()->save(new PersonAddress($request->input('address')));

        // create the contacs / phones.
        foreach ($request->input('contacts') as $contact) {
            $person->contacts()->save(new PersonContact($contact));
        }

        // create the user
        $userData = $request->input('user');
        $userData['password'] = bcrypt($userData['password']);
        $user = $person->user()->save(new User($userData));

        return $this->responseSuccess(['token' => $account->public_key]);
    }
}
