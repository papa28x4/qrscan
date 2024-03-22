<?php

namespace App\Traits;
use illuminate\Support\Facades\Auth;

trait CustomRedirect {

    public function redirectToOld(){
        if(Auth::user()->hasRole('Super Admin')){
            $this->redirectTo = route('admin.dashboard');
        }else if(Auth::user()->hasRole('Admin')){
            $this->redirectTo = route('admin.dashboard');
        }else if(Auth::user()->hasRole('User')){
            $this->redirectTo = route('print-jobs.index');
        }
        
        return $this->redirectTo;
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('User')){
            $this->redirectTo = route('print-jobs.index');
        }else{
            $this->redirectTo = route('dashboard.index');
        }

        return $this->redirectTo;
    }
}