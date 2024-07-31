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

class BankQuestionImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.question_title' => 'required',
            '*.bank_name' => 'required',
            '*.mark' => 'required|integer',
            '*.active' => 'required|integer',
            '*.answer1' => 'required',
            '*.answer2' => 'required',
            '*.answer3' => 'required',
            '*.answer4' => 'required',
            '*.correct_answer' => 'required'
        ])->validate();


        foreach ($rows as $row) {
            $bank = BankGroup::where('name', 'LIKE', '%'.$row['bank_name'].'%')->first();
           
            BankQuestion::updateOrCreate(
                [
                'title'     => $row['question_title'],
                'bank_group_id' => $bank? $bank->id : '',
                'mark'    => $row['mark'],
                ],[
                'active'     => $row['active'],
                'answer_notes'    => $row['answer_description_text'] ?? '' ,
                'answer_video_link'    => $row['answer_video_link'] ?? '',
                'question_notes'    => $row['question_description_text'] ?? '',
                'question_video_link'  => $row['question_desc_video_link'] ?? '',
                'answer1'    => $row['answer1'],
                'answer2'    => $row['answer2'],
                'answer3'    => $row['answer3'],
                'answer4'    => $row['answer4'],
                'correct_answer'    => $row['correct_answer']
            ]);
        }
    }
}
