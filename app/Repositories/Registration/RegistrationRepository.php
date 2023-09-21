<?php

namespace App\Repositories\Registration;

use App\Interfaces\Registration\RegistrationRepositoryInterface;
use App\Models\User;
use App\Models\Media;
use DB;
use App\Http\Traits\FileUploadTrait;
use Hash;

class RegistrationRepository implements RegistrationRepositoryInterface
{
    use FileUploadTrait;
    public function registerUser($userDetails)
    {        
        DB::beginTransaction();
        try{
            $user = new User();
            $user->fullname = $userDetails->fullname;
            $user->email = $userDetails->email;
            $user->phone = $userDetails->phone_no;
            $user->type = 'customer';
            $user->password = Hash::make($userDetails->password);
            $user->status = 'inactive';
            $user->save();
            $user_image = $this->saveFiles($userDetails->file,$user->id,'customer');
            if (!isset($user_image->id)) {
                session()->flash('flash_danger','User image upload fail! please try again later');
            }
            DB::commit(); // Save into database
            return $user;
        }
        catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction if an exception occurs
            return $e->getMessage();
        }
    }

    public function LoginUser($userDetails)
    {
        $user = User::where('email', $userDetails->email)->first();
        if ($user && Hash::check($userDetails->password, $user->password)) {
            return $user;
        }
        return null;
    }
}
