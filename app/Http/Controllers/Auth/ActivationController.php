<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfirmationToken;

class ActivationController extends Controller
{
    protected $redirectTo = '/dashboard';
    
    public function activate(ConfirmationToken $token, Request $request)
    {
      // dd($token);
      $token->user->update([
        'activated' => true
      ]);

      $token->delete();

      Auth::loginUsingId($token->user->id);

      return redirect()->intended($this->redirectPath())->withSuccess('You are now signed in.');
    }

    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
