<?php

namespace App\Http\Controllers;
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

use App\Mail\WebinarMail;
use App\Models\WebinarDetail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Symfony\Component\HttpFoundation\Response;
use Validator;


class MailController extends Controller
{
    public function contactMail(Request $request)
    {
        try {
            $element_array = array(
                'fname' => 'required',
                'email' => ['required', 'email:rfc,dns'],
                'number' => ['required', 'digits:10'],
                'country' => 'required',
                'referer' => 'required'
            );
            $validator = Validator::make($request->all(), $element_array, [
                'fname.required' => 'Please enter first name ',
                'email.required' => "Please enter unique email address",
                'number.required' => "Please enter valid number",
                'country.required' => "Please enter country",
                'referer.required' => "Please select one option",

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
            $name = $request->input('fname');
            $number = $request->input('number');
            $country = $request->input('country');
            $referer = $request->input('referer');
            if ($referer == "By Referer") {
                $referer_name = $request->input('referer_name');
            } else {
                $referer_name = $request->input('other');
            }
            $mailid = $request->input('email');
            $subject = 'Inquiry';
            $data = array('name' => $name, 'number' => $number, 'country' => $country, 'email' => $mailid, 'subject' => $subject, 'find' => $referer, 'Referer Name' => $referer_name);
//            Mail::send('contact@intelliconsultation.com', $data, function ($message) use ($data) {
            // Mail::send('l.k.aariwala@gmail.com', $data, function ($message) use ($data) {});
            Mail::to(env("MAIL_FROM_ADDRESS"))->send(new ContactMail($data));
            return redirect()->back()->with('Successfully Send Your Mail Id.');
            // return redirect()->back()->with('message','Successfully Send Your Mail Id.');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function saveWebinarDetail(Request $request)
    {
        try {
            $element_array = array(
                'fname' => 'required',
                'lname' => 'required',
                'email' => ['required', 'email:rfc,dns','unique:webinar_details'],
                'referer' => 'required',
                'country' => 'required',
                'city' => 'required',

            );
            $validator = Validator::make($request->all(), $element_array, [
                'fname.required' => 'Please enter first name ',
                'lname.required' => 'Please enter last name ',
                'email.required' => "Please enter email address",
                'email.unique' => "You are already register for this event",
                'referer.required' => "Please select one option",
                'country.required' => "Please enter country",
                'city.required' => "Please enter city",
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
            $data = new WebinarDetail();
            $data->firstName = $request->input("fname");
            $data->lastName = $request->input("lname");
            $data->email = $request->input("email");
            $data->country = $request->input("country");
            $data->city = $request->input("city");
            $data->referer = $request->input("referer");
            $data->refererName = ($data->referer == "Referral" ? ($request->input("referer_name") ?? null) : "");
            $data->description = $request->input("message");
            $data->receiveUpdate	 = $request->input("signup");
            $data->save();

            $subject = '加拿大移民須知線上分享會確認信';
            $email_data = array('name' =>  ($data->firstName." ".$data->lastName), 'email' => $data->email, 'subject' => $subject);
            Mail::to($data->email)->send(new WebinarMail($email_data));
            return redirect()->back()->with('success', '登記成功！有關活動資料已轉發到您登記的電郵。');;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
