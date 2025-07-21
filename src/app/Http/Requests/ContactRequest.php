<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // tel1, tel2, tel3 が全て存在する場合のみ結合
        if ($this->has('tel1') && $this->has('tel2') && $this->has('tel3')) {
            $this->merge([
                'tels' => $this->tel1 . '-' . $this->tel2 . '-' . $this->tel3,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'first_names' => ['required', 'string', 'max:255'],
            'last_names' => ['required', 'string', 'max:255'],
            'genders' => ['required', 'integer', 'in:1,2,3'],
            'emails' => ['required', 'string', 'email', 'max:255'],
            // 電話番号の各部分に対するバリデーションを tel_parts1, tel_parts2, tel_parts3 から tel1, tel2, tel3 に変更
            'tel1' => ['required', 'numeric', 'digits_between:2,5'],
            'tel2' => ['required', 'numeric', 'digits_between:1,4'],
            'tel3' => ['required', 'numeric', 'digits:4'],
            'tels' => ['required', 'string'], // regexは一時的に削除したまま
            'addresses' => ['required', 'string', 'max:255'],
            'buildings' => ['nullable', 'string', 'max:255'],
            'category_ids' => ['required', 'integer'], // category_id から category_ids に変更
            'details' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_names.required' => '名を入力してください',
            'last_names.required' => '姓を入力してください',
            'genders.required' => '性別を選択してください',
            'emails.required' => 'メールアドレスを入力してください',
            'emails.email' => 'メールアドレスは有効な形式で入力してください',
            // 電話番号の各部分に対するエラーメッセージを tel_parts1, tel_parts2, tel_parts3 から tel1, tel2, tel3 に変更
            'tel1.required' => '電話番号の最初の部分を入力してください',
            'tel1.numeric' => '電話番号の最初の部分は数値で入力してください',
            'tel1.digits_between' => '電話番号の最初の部分は2〜5桁で入力してください',
            'tel2.required' => '電話番号の真ん中の部分を入力してください',
            'tel2.numeric' => '電話番号の真ん中の部分は数値で入力してください',
            'tel2.digits_between' => '電話番号の真ん中の部分は1〜4桁で入力してください',
            'tel3.required' => '電話番号の最後の部分を入力してください',
            'tel3.numeric' => '電話番号の最後の部分は数値で入力してください',
            'tel3.digits' => '電話番号の最後の部分は4桁で入力してください',
            'tels.required' => '電話番号を入力してください',
            'addresses.required' => '住所を入力してください',
            'category_ids.required' => 'お問い合わせの種類を選択してください',
            'details.required' => 'お問い合わせ内容を入力してください',
            'details.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}