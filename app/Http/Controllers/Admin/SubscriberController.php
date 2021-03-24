<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Contract;
use Carbon\Carbon;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Mail\ReplyMailToVisitor;
use App\Mail\SendMailToSubscriber;
use App\Http\Controllers\Controller;
use App\MailDraft;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function mailSendSection()
    {
        $messages =  Contract::with(['contract_images'])->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'desc')->paginate(10);
        return view('admin.ecommerce.send_mail.mail_section', compact('messages'));
    }

    public function mailComposeSection()
    {
        $subscriber_emails = Subscriber::where('is_deleted', 0)->where('status', 1)->get();
        $user_emails = User::select('email')->get();
        return view('admin.ecommerce.send_mail.compose_mail', compact('subscriber_emails', 'user_emails'));
    }

    public function mailSend(Request $request)
    {

        $this->validate($request, [
            'mail_subject' => 'required',
            'mail_content' => 'required'
        ]);
        $subscriber_emails = $request->subscriber_email;
        if ($subscriber_emails == null) {
            $notification = array(
                'messege' => 'You did not select any subscriber or user email address',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $emails = explode(',', $subscriber_emails);
        $subject = $request->mail_subject;
        $mail_text = $request->mail_content;


        foreach ($emails as  $email) {
            Mail::to(trim($email))->queue(new SendMailToSubscriber($subject, $mail_text));
        }

        $notification = array(
            'messege' => 'Successfully Started To Sent The Mails',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function mailDetails($mailId)
    {
        $mail = Contract::where('id', $mailId)->first();
        Contract::where('id', $mailId)->update([
            'is_seen' => 1
        ]);
        $unseen_mail = Contract::where('is_seen', 0)->count();
        return view('admin.ecommerce.send_mail.mail_details', compact('mail', 'unseen_mail'));
    }

    public function replyMail($mailId)
    {
        $mail = Contract::where('id', $mailId)->first();
        return view('admin.ecommerce.send_mail.reply_mail', compact('mail'));
    }

    public function mailReplyOrDraft(Request $request, $mailId)
    {
        $this->validate($request, [
            'reply_email' => 'required',
            'reply_subject' => 'required',
            'reply_content' => 'required',
            'reply_name' => 'required',
        ]);

        //dd($reply_subject, $reply_content, $reply_name);
        if ($request->submit === "send_mail") {
            $reply_subject = $request->reply_subject;
            $reply_content = $request->reply_content;
            $reply_name = $request->reply_name;
            Mail::to($request->reply_email)->queue(new ReplyMailToVisitor($reply_subject, $reply_content, $reply_name));
            Contract::where('id', $mailId)->update([
                'is_replied' => 1
            ]);
            $notification = array(
                'messege' => 'Successfully Mail has been replied',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } elseif ($request->submit === "draft_mail") {

            MailDraft::insert([
                'contract_id' => $mailId,
                'reply_subject' => $request->reply_subject,
                'reply_content' => $request->reply_content,
                'reply_email' => $request->reply_email,
                'reply_name' => $request->reply_name,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            $notification = array(
                'messege' => 'Successfully Mail has been stored to draft storage',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.mail.all.draft')->with($notification);

        }
    }

    public function allDraftMails()
    {
        $drafts = MailDraft::paginate(10);
        return view('admin.ecommerce.send_mail.all_draft_mails', compact('drafts'));
    }

    public function deleteDraft(Request $request)
    {
        if ($request->draftDeleteId == null) {
            $notification = array(
                'messege' => 'You did not select any thing!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        MailDraft::whereIn('id', $request->draftDeleteId)->delete();
        $notification = array(
            'messege' => 'Successfully drafted mail deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->contract_delete_id == null) {
            $notification = array(
                'messege' => 'You did not select any thing!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        Contract::whereIn('id', $request->contract_delete_id)->update([
            'is_deleted' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        $notification = array(
            'messege' => 'Successfully mail deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function trashMails()
    {
        $trash_mails = Contract::where('is_deleted', 1)->paginate();
        return view('admin.ecommerce.send_mail.mail_trash', compact('trash_mails'));
    }

    public function forceDeleteOrRestore(Request $request)
    {
        if ($request->mailId == null) {
            $notification = array(
                'messege' => 'You did not select any thing!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        if ($request->submit === "delete") {
            foreach ($request->mailId as $id) {
                $getContract = Contract::where('id', $id)->first();
                if ($getContract->contract_images) {
                    foreach ($getContract->contract_images as  $image) {
                        unlink('public/uploads/visitor_attach_files/' . $image->image);
                    }
                }
                $getContract->delete();
            }
            $notification = array(
                'messege' => 'Mail deleted successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            Contract::whereIn('id', $request->mailId)->update([
                'is_deleted' => 0
            ]);
            $notification = array(
                'messege' => 'Mail Restored successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function sendDraftMailSection($draftId)
    {
        $draft = MailDraft::where('id', $draftId)->firstOrFail();
        return view('admin.ecommerce.send_mail.send_draft_mail', compact('draft'));
    }

    public function replyOrDraft(Request $request, $draftId)
    {
        $this->validate($request, [
            'reply_subject' => 'required',
            'reply_content' => 'required',
        ]);
        $draft = MailDraft::where('id', $draftId)->first();
        if ($request->submit === 'send_mail') {
            Mail::to($request->reply_email)->queue(new ReplyMailToVisitor($request->reply_subject, $request->reply_content, $request->reply_name));
            $notification = array(
                'messege' => 'Successfully Mail has been send',
                'alert-type' => 'success'
            );
            Contract::where('id', $draft->contract_id)->update([
                'is_replied' => 1
            ]);
            MailDraft::where('id', $draftId)->delete();

            return redirect()->route('admin.mail.all.draft')->with($notification);
        } elseif ($request->submit === 'update_draft_mail') {

            $draft->update([
                'reply_subject' => $request->reply_subject,
                'reply_content' => $request->reply_content,
            ]);

            $notification = array(
                'messege' => 'Successfully this draft is updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.mail.all.draft')->with($notification);
        }
    }
}
