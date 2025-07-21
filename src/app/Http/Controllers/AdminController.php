<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 7;

        $query = Contact::query();

        $searchName = $request->input('search_name');
        $searchEmail = $request->input('search_email');
        $searchGender = $request->input('search_gender');
        $searchCategory = $request->input('search_category');
        $searchDateFrom = $request->input('search_date_from');
        $searchDateTo = $request->input('search_date_to');

        if ($searchName) {
            $query->where(function ($q) use ($searchName) {
                $q->where('first_names', 'like', '%' . $searchName . '%')
                  ->orWhere('last_names', 'like', '%' . $searchName . '%')
                  ->orWhereRaw("CONCAT(last_names, ' ', first_names) LIKE ?", ['%' . $searchName . '%']);
            });
        }

        if ($searchEmail) {
            $query->where('emails', 'like', '%' . $searchEmail . '%');
        }

        if ($searchGender !== null && $searchGender !== '0') {
            if ($searchGender === '3') {
                $query->whereNotIn('genders', [1, 2]);
            } else {
                $query->where('genders', (int)$searchGender);
            }
        }

        if ($searchCategory !== null && $searchCategory !== '0') {
            $query->where('category_id', (int)$searchCategory);
        }

        if ($searchDateFrom) {
            $query->whereDate('created_at', '>=', $searchDateFrom);
        }
        if ($searchDateTo) {
            $query->whereDate('created_at', '<=', $searchDateTo);
        }

        $contacts = $query->with('category')->paginate($perPage)->appends($request->query());

        $genderOptions = [
            '0' => '全て',
            '1' => '男性',
            '2' => '女性',
            '3' => 'その他',
        ];

        $categories = Category::all();

        return view('admin.index', compact(
            'contacts',
            'searchName',
            'searchEmail',
            'searchGender',
            'searchCategory',
            'searchDateFrom',
            'searchDateTo',
            'genderOptions',
            'categories'
        ));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show_partial', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return response()->json(['message' => 'お問い合わせを削除しました。'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => '削除中にエラーが発生しました。', 'error' => $e->getMessage()], 500);
        }
    }

    public function export(Request $request)
    {
        $query = Contact::query();

        $searchName = $request->input('search_name');
        $searchEmail = $request->input('search_email');
        $searchGender = $request->input('search_gender');
        $searchCategory = $request->input('search_category');
        $searchDateFrom = $request->input('search_date_from');
        $searchDateTo = $request->input('search_date_to');

        if ($searchName) {
            $query->where(function ($q) use ($searchName) {
                $q->where('first_names', 'like', '%' . $searchName . '%')
                  ->orWhere('last_names', 'like', '%' . $searchName . '%')
                  ->orWhereRaw("CONCAT(last_names, ' ', first_names) LIKE ?", ['%' . $searchName . '%']);
            });
        }

        if ($searchEmail) {
            $query->where('emails', 'like', '%' . $searchEmail . '%');
        }

        if ($searchGender !== null && $searchGender !== '0') {
            if ($searchGender === '3') {
                $query->whereNotIn('genders', [1, 2]);
            } else {
                $query->where('genders', (int)$searchGender);
            }
        }

        if ($searchCategory !== null && $searchCategory !== '0') {
            $query->where('category_id', (int)$searchCategory);
        }

        if ($searchDateFrom) {
            $query->whereDate('created_at', '>=', $searchDateFrom);
        }
        if ($searchDateTo) {
            $query->whereDate('created_at', '<=', $searchDateTo);
        }

        $contactsToExport = $query->with('category')->get();

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="contacts_' . date('Ymd_His') . '.csv"',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function() use ($contactsToExport) {
            $file = fopen('php://output', 'w');

            fwrite($file, "\xEF\xBB\xBF");

            fputcsv($file, [
                'ID',
                '姓',
                '名',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
                '登録日時'
            ]);

            foreach ($contactsToExport as $contact) {
                $genderText = '';
                if ($contact->genders === 1) {
                    $genderText = '男性';
                } elseif ($contact->genders === 2) {
                    $genderText = '女性';
                } elseif ($contact->genders === 3) {
                    $genderText = 'その他';
                }

                fputcsv($file, [
                    $contact->id,
                    $contact->last_names,
                    $contact->first_names,
                    $genderText,
                    $contact->emails,
                    $contact->tels, // tel から tels に修正
                    $contact->addresses, // address から addresses に修正
                    $contact->buildings, // building_names から buildings に修正
                    $contact->category->contents ?? '不明',
                    $contact->details,
                    $contact->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}