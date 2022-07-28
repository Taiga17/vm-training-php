<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs';

    /**
     * ブログ一覧取得
     * @param none
     * @return array $blogs
     */
    public function getBlogList(){
        $blogs = DB::table($this->table)->paginate(5);
        return $blogs;
    }

    /**
     * 記事情報取得
     * @param intager $id
     * @return array $blog
     */
    public function getBlogData(int $id) {
        $blog = DB::table($this->table)
            ->where('id', $id)
            ->get();
        return $blog;
    }

    /**
     * 記事情報更新
     * @param array $update_data
     * @return void
     */
    public function updateBlogData($update_data) {
        $blog = DB::table($this->table)
            ->where('id', $update_data['id'])
            ->update([
                'title' => $update_data['title'],
                'content' => $update_data['content'],
                'photo' => 'storage/photo/'.$update_data['photo'],
                'updated_at' => date('Y-m-d H:i:s', strtotime('now'))
            ]);
    }

    /**
     * 記事情報削除
     * @param array $update_data
     * @return void
     */
    public function deleteBlogData(int $id) {
        $blog = DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }
}
