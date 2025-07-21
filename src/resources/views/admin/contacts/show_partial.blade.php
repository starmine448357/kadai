<div class="grid grid-cols-2 gap-x-4 gap-y-2 text-base px-12 py-6">
    <div class="col-span-1 text-left font-bold py-2">お名前:</div>
    <div class="col-span-1 text-center py-2">{{ $contact->last_names }} {{ $contact->first_names }}</div>

    <div class="col-span-1 text-left font-bold py-2">性別:</div>
    <div class="col-span-1 text-center py-2">
        @if($contact->genders === 1)
            男性
        @elseif($contact->genders === 2)
            女性
        @else
            その他
        @endif
    </div>

    <div class="col-span-1 text-left font-bold py-2">メールアドレス:</div>
    <div class="col-span-1 text-center py-2">{{ $contact->emails }}</div>

    <div class="col-span-1 text-left font-bold py-2">電話番号:</div>
    <div class="col-span-1 text-center py-2">{{ $contact->tels }}</div>

    <div class="col-span-1 text-left font-bold py-2">住所:</div>
    <div class="col-span-1 text-center py-2">{{ $contact->addresses }}</div>

    <div class="col-span-1 text-left font-bold py-2">建物名:</div>
    <div class="col-span-1 text-center py-2">{{ $contact->buildings ?? 'なし' }}</div>

    <div class="col-span-1 text-left font-bold py-2">お問い合わせ種類:</div>
    <div class="col-span-1 text-center py-2">{{ $contact->category->contents ?? 'カテゴリ不明' }}</div>

    <div class="col-span-1 text-left font-bold py-2">お問い合わせ内容:</div>
    <div class="col-span-1 text-center py-2 whitespace-pre-wrap">{{ $contact->details }}</div>
</div>

<div class="text-center mt-8">
    <button type="button" 
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline delete-btn"
            data-contact-id="{{ $contact->id }}">
        削除
    </button>
</div>