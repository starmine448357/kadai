<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();

        // category_id でカテゴリを取得
        $category = Category::find($contact['category_id']); // category_ids から category_id に変更

        if ($category) {
            $contact['category_name'] = $category->contents;
        } else {
            $contact['category_name'] = '不明';
        }

        // category_id の値を $contact 配列にセット
        $contact['category_id'] = $request->category_id; // category_ids から category_id に変更

        // gendarの値を変換
        if ($contact['genders'] == 1) {
            $contact['genders_text'] = '男性';
        } elseif ($contact['genders'] == 2) {
            $contact['genders_text'] = '女性';
        } else {
            $contact['genders_text'] = 'その他';
        }

        return view('contact.confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $dataToStore = $request->only([
            'last_names',
            'first_names',
            'genders',
            'emails',
            'tels',
            'addresses',
            'buildings',
            'category_id', // category_ids から category_id に変更
            'details',
        ]);

        // データベースのカラム名が category_ids の場合は、ここで category_id を category_ids にマッピング
        // もしDBのカラムが 'category_id' ならこの行は不要
        $dataToStore['category_ids'] = $dataToStore['category_id'];
        unset($dataToStore['category_id']); // 元の category_id キーを削除

        Contact::create($dataToStore);

        return view('contact.thanks');
    }

    public function adminIndex(Request $request)
    {
        $searchNames = $request->input('search_names');
        $searchGenders = $request->input('search_genders');
        $searchCategoryIds = $request->input('search_category_ids');
        $searchCreatedAts = $request->input('search_created_ats');

        $query = Contact::query();

        if ($searchNames) {
            $query->where(function($q) use ($searchNames) {
                $q->where('last_names', 'like', '%' . $searchNames . '%')
                  ->orWhere('first_names', 'like', '%' . $searchNames . '%')
                  ->orWhere('emails', 'like', '%' . $searchNames . '%');
            });
        }
        if ($searchGenders && $searchGenders !== '0') {
            $query->where('genders', $searchGenders);
        }
        if ($searchCategoryIds && $searchCategoryIds !== '0') {
            $query->where('category_ids', $searchCategoryIds);
        }
        if ($searchCreatedAts) {
            $query->whereDate('created_at', $searchCreatedAts);
        }

        $contacts = $query->with('category')->paginate(10);

        $genderOptions = [
            '0' => '全て',
            '1' => '男性',
            '2' => '女性',
            '3' => 'その他',
        ];

        $categories = Category::all();

        return view('admin.index', compact(
            'contacts',
            'searchNames',
            'searchGenders',
            'searchCategoryIds',
            'searchCreatedAts',
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
        $contact->delete();
        return response()->json(['message' => 'お問い合わせが削除されました。']);
    }
}