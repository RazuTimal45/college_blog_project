<?
// app/Models/Rating.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Post;


class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "ratings";

    protected $fillable = ['user_id', 'post_id', 'category_id', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
