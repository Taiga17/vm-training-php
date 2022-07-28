function del(id, title){
    if(window.confirm('Title：'+ title +'\nこの記事を削除してもいいですか？')){
        window.location.href = '/delete/'+ id;
    }
    return false;
}