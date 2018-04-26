<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuestionOption
 *
 * @property int $id
 * @property int|null $question_id
 * @property string|null $question_option_name
 * @property string|null $question_option_content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereQuestionOptionContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereQuestionOptionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuestionOption extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question_id', 'question_option_name', 'question_option_content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
