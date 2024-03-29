<?php

namespace App\Helpers;

use App\Mail\OrderEmail;
use App\Models\EmailTemplate;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;

class EmailHelper{
    public $mail;
    public $setting;

    public function __construct()
    {
        $this->setting = Setting::first();
        $this->mail = new PHPMailer(true);

        if ($this->setting->smtp_check == 1) {

            $this->mail->isSMTP();
            $this->mail->Host       = $this->setting->email_host;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->setting->email_user;
            $this->mail->Password   = $this->setting->email_pass;
            $this->mail->SMTPSecure = $this->setting->email_encryption;
            $this->mail->Port       = $this->setting->email_port;

        }
    }

    public function sendTemplateMail(array $emailData)
    {
        $template = EmailTemplate::whereType($emailData['type'])->first();
        try{
            $email_body = preg_replace("/{user_name}/", $emailData['user_name'], $template->body);
            $email_body = preg_replace("/{order_cost}/", $emailData['order_cost'], $email_body);
            $email_body = preg_replace("/{transaction_number}/", $emailData['transaction_number'], $email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title, $email_body);

            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $template->subject;
            $this->mail->Body = $email_body;
            $this->mail->send();

            
        }
        catch (Exception $e){
            // dd($e->getMessage());
        }

        return true;
    }
    public function sendTemplateMailOrder(array $emailData)
    {
        $template = EmailTemplate::whereType($emailData['type'])->first();
        try{
            $email_body = preg_replace("/{user_name}/", $emailData['user_name'], $template->body);
            $email_body = preg_replace("/{order_cost}/", $emailData['order_cost'], $email_body);
            $email_body = preg_replace("/{transaction_number}/", $emailData['transaction_number'], $email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title, $email_body);
            $template->subject = preg_replace("/{transaction_number}/", $emailData['transaction_number'], $template->subject);

            // $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            // $this->mail->addAddress($emailData['to']); order_info
            // $this->mail->isHTML(true);
            // $this->mail->Subject = $template->subject;
            // $this->mail->Body = $email_body;
            // $this->mail->send();

            Mail::to($emailData['to'])->send(new OrderEmail($email_body,$template,$emailData['cart'],$emailData['shipping'],$emailData['grand_total'],$emailData['shipping_info'],$emailData['invoice']));
                                                         // $email_body,$template,$cart,$shipping,$grand_total,$shipping_info,$invoice
        }
        catch (Exception $e){
            dd($e->getMessage());
        }

        return true;
    }

    public function sendCustomMail(array $emailData)
    {
        try {
            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $emailData['subject'];
            $this->mail->Body = $emailData['body'];
            $this->mail->send();
        } catch (Exception $e) {
            // dd($e->getMessage());
        }

        return true;
    }
}
