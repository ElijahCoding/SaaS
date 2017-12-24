<?php

namespace App\TwoFactor;

use Exception;
use App\Models\User;
use App\TwoFactor\TwoFactor;
use GuzzleHttp\Client;

class Authy implements TwoFactor
{
  protected $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function register(User $user)
    {
        try {
            $response = $this->client->request(
                'POST', 'https://api.authy.com/protected/json/users/new?api_key=' . config('services.authy.secret'), [
                    'form_params' => [
                        'user' => $this->getTwoFactorRegistrationDetails($user)
                    ]
                ]
            );
        } catch (Exception $e) {
            return false;
        }

        return json_decode($response->getBody(), false);
    }


  public function validateToken(User $user, $token)
  {
    dd('validate');
  }

  public function delete(User $user)
  {
    dd('delete');
  }

  protected function getTwoFactorRegistrationDetails(User $user)
    {
        return [
            'email' => $user->email,
            'cellphone' => $user->twoFactor->phone,
            'country_code' => $user->twoFactor->dial_code,
        ];
    }
}
