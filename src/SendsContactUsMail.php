<?php

namespace Stephendevs\Lad;

use  Schoollarize\Schlr\Models\Student\StudentLeader;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use Stephendevs\Lad\Mail\Mailer;

use Stephendevs\Lad\Http\Requests\ContactUsRequest;


trait SendsContactUsMail {

     /**
      * Show Contact Form Page
     */
    public function index()
    {
        return view('lad::mailer.contact.index');
    }


    public function send(ContactUsRequest $request) {
        $data = $request->validated();

        $subject = $request->subject;
        $message = $request->message;

        $this->mail(['address' => $request->email, 'name' => 'hello'], $subject, $message);

        return back()->withInput();
    }


    private function mail($sender, $subject, $message)
    {
        Mail::to($this->to())->send(
            new Mailer($sender, $subject, $message, $this->markdown())
        );
    }
    

    protected function markdown()
    {
        return 'lad::mail.contact';
    }


    /**
      * The email address to send email to
     */
    protected function to()
    {
        return 'okellostephenomoding@gmail.com';
    }
    
    public function render()
    {
        return new Mailer('hello', 'hello','The contact us message from the website audience', $this->markdown());
    }
    
}