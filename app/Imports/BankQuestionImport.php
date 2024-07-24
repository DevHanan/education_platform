<?php

namespace App\Imports;

use App\Models\BankQuestion;
use App\Models\BankGroup;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BankQuestionmport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.title' => 'required',
            '*.bank' => 'required',
            '*.mark' => 'required|integer',
            '*.active' => 'required|integer',
            '*.answer_notes' => 'required',
            '*.answer_video_link' => 'required',
            '*.question_notes' => 'required',
            '*.answer1' => 'required',
            '*.answer2' => 'required',
            '*.answer3' => 'required',
            '*.answer4' => 'required',
            '*.correct_answer' => 'required'
        ])->validate();


        foreach ($rows as $row) {
            $bank = BankGroup::where('name', $row['bank'])->first();
            if (!$bank) {
                // Handle the case where the bank is not found
                // You can throw an exception, log an error, or skip the row
                continue;
            }
            BankQuestion::updateOrCreate(
                [
                'title'     => $row['title'],
                'bank_group_id' => $bank->id,
                'mark'    => $row['mark'],
                ],[
                'active'     => $row['active'],
                'answer_notes'    => $row['answer_notes'],
                'answer_video_link'    => $row['answer_video_link'],
                'question_notes'    => $row['question_notes'],
                'answer1'    => $row['answer1'],
                'answer2'    => $row['answer2'],
                'answer3'    => $row['answer3'],
                'answer4'    => $row['answer4'],
                'correct_answer'    => $row['correct_answer']
            ]);
        }
    }
}
