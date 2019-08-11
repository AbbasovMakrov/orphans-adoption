<?php


namespace App\AdditionalHelpers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

trait ControllerHelpers
{
    public function idValidate($id)
    {
        return Validator::make(["id" => $id],[
            "id" => ['required','integer','min:1']
        ]);
    }

    public function redirection(
       bool $redirectBack = false,
       bool $statusIncluded = false,
       string $status = "",
       string $message = "",
       string $to = "",
       bool $errorsIncluded = false,
       MessageBag $errors = null
    )
    {
        if ($statusIncluded)
        {
            return $redirectBack ? redirect()->back()->with($status,$message) : redirect()->to($to)->with($status,$message);
        }
        if ($errorsIncluded && $errors != null)
        {
            return $redirectBack ? redirect()->back()->withErrors($errors)->withInput() : redirect()->to($to)->withErrors($errors)->withInput();
        }
        return $redirectBack ? redirect()->back() : redirect()->to($to);
    }

    public static function Action(string $Controller , string $Method = "index") : string
    {
        return "{$Controller}Controller@{$Method}";
    }
}
