<?php

namespace Modules\Content\Models;

use Shared\Database\ORM\MetaField\MetaField;


class CommentMeta extends MetaField
{
    /**
     * @var string
     */
    protected $table = 'comments_meta';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = array('key', 'meta_value', 'comment_id');


    /**
     * @return \Nova\Database\ORM\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo('Modules\Content\Models\Comment', 'comment_id');
    }
}
