<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('admin',compact('contacts','categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->DateSearch($request->date)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->get();

        $categories = Category::all();

        return view('admin',compact('contacts','categories'));
    }

    public function downloadCsv()
    {
            $contacts = Contact::all();
    
    $csvHeader = [
        'id','category_id','first_name','last_name','gender','email','tel','address','building','detail'
    ];
    $temps = [];
    array_push($temps, $csvHeader);

    foreach ($contacts as $contact) {
        $temp = [
            $contact->id,
            $contact->category_id,
            $contact->first_name,
            $contact->last_name,
            $contact->gender,
            $contact->email,
            $contact->tel,
            $contact->address,
            $contact->building,
            $contact->detail,
            ];
            array_push($temps, $temp);
        }
        $stream = fopen('php://temp', 'r+b');
        foreach ($temps as $temp) {
            fputcsv($stream, $temp);
        }
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $now = new Carbon();
        $filename = "ユーザー一覧（全件：" . $now->format('Y年m月d日'). "）.csv";
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$filename,
        );
        return Response::make($csv, 200, $headers);
    }
}
