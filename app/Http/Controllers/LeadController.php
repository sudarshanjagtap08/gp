<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otherlead;
use App\Models\Otherleadhistory;
use auth;
class LeadController extends Controller
{
    public function LeadSave(Request $request)
    {
        $client = 'Genuine Plots';
        $cid = "7bc8c8e5-ab82-48c1-a1b0-352396d7691c";
        $product = "Genuine Plots Website";
        //////////////////////////
        $source = $_POST['utm_source'];
        $subsource = $_POST['subsource'];
        $media = "Form";
        //////////////////FORM DATA///////////////////////////////////////////////////////////
        $name = $_POST["nan"];
        $email = $_POST["eoe"];
        $phone = $_POST["mom"];
        $comment = $_POST["mmm"];
        $date = date("Y-m-d");
        ////////////AUX INPUTS///////////////////////////////////////////////////////////////
        
        if (empty($phone)) {
            echo "<script>alert('Please enter a mobile number.');</script>";
            return redirect()->back();
        }
        if (!preg_match('/^\d{10}$/', $phone)) {
            echo "<script>alert('Mobile number must be exactly 10 digits.');</script>";
            return redirect()->back();
        }
        $aux_1 = '';
        $aux_2 = '';
        $aux_3 = '';
        $aux_4 = '';
        $aux_5 = '';
        $aux_6 = '';
        $aux_7 = '';
        $aux_8 = '';
        $aux_9 = '';
        // UTM INCLUDES///////////////////
        $country_code = "";
        $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
        $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
        $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
        $utm_placement = isset($_POST['utm_placement']) ? $_POST['utm_placement'] : '';
        $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
        $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
        $ip = isset($_POST['ip']) ? $_POST['ip'] : '';
        $browser = isset($_POST['browser']) ? $_POST['browser'] : '';
        $os = isset($_POST['os']) ? $_POST['os'] : '';
        $gclid = isset($_POST['gclid']) ? $_POST['gclid'] : '';
        $device = isset($_POST['device']) ? $_POST['device'] : '';
        $url = isset($_POST['url']) ? $_POST['url'] : '';
        // $url = $request->url();
    $formdata = array(
            'cid' => $cid,
            'client'=>$client,
            'product' => $product,
            'source' => $source,
            'subsource' => $subsource,
            'country_code' => $country_code,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'comment' => $comment,
            'media' => $media,
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign,
            'utm_placement' => $utm_placement,
            'utm_term' => $utm_term,
            'utm_content' => $utm_content,
            'url' => $url,
            'gclid' => $gclid,
            'ip' => $ip,
            'os' => $os,
            'device' => $device,
            'browser' => $browser,
            'aux_1' => $aux_1,
            'aux_2' => $aux_2,
            'aux_3' => $aux_3,
            'aux_4' => $aux_4,
            'aux_5' => $aux_5,
            'aux_6' => $aux_6,
            'aux_7' => $aux_7,
            'aux_8' => $aux_8,
            'aux_9' => $aux_9,
            
            );
    
        // PUSH
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://router.volarlabs.com/api/addLead',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $formdata,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // CSV SAVE
        array_push($formdata,$date);
        $handle = fopen("leads.csv", "a");
        fputcsv($handle, $formdata); # $line is an array of strings (array|string[])
        fclose($handle);
        http_response_code(200);
        return redirect()->back()->with('success', 'Form Submitted successfully.');
        // header("Location: $url");
        // }
    }
    public function OtherLead(Request $request)
    {
        $otherleads = Otherlead::orderBy('created_at', 'desc')->get();
        return view('list/lead/lead_enquiry_index',compact('otherleads'));
    }
    public function OtherLeadAdd(Request $request)
    {
        return view('list/lead/lead_enquiry_add');
    }
    public function OtherLeadSave(Request $request)
    {
        Otherlead::Create($request->all());
        return redirect()->route('list.other.lead')->with('success', 'Lead created successfully.');
    }
    public function OtherLeadEdit(Request $request, $id)
    {
        $otherlead = Otherlead::find($id);
        $otherleadhistory = Otherleadhistory::with('users')
                            ->where('otherlead_id', $id)
                            ->get();                   
        return view('list/lead/lead_enquiry_edit',compact('otherlead','otherleadhistory'));
    }
    public function OtherLeadUpdate(Request $request, $id)
    {
        $otherlead = Otherlead::find($id);
        $otherlead->name = $request->input('name');
        $otherlead->mobilenumber = $request->input('mobilenumber');
        $otherlead->email = $request->input('email');
        $otherlead->comment = $request->input('comment'); 
        $otherlead->status = $request->input('status');
        $otherlead->update();
        $otherleadhistory = new Otherleadhistory;
        $otherleadhistory->otherlead_id = $id;
        $otherleadhistory->user_id = Auth::user()->id;
        $otherleadhistory->remark = $request->input('remark');
        $otherleadhistory->status = $request->input('status');
        $otherleadhistory->reason = $request->input('reason');
        $otherleadhistory->save();
        return redirect()->route('list.other.lead')->with('status','Lead Data Updated Successfully');
    }
    public function deleteOtherLeadData(Request $request, $id)
    {
        $otherlead = Otherlead::find($id);
        $otherlead->otherleadhistories()->delete();
        $otherlead->delete();
        return redirect()->back()->with('danger', 'Other Lead deleted successfully.');
    }
}
