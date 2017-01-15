<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-01-15 20:32
 */
namespace Notadd\Content\Handlers\Fetchers;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\ArticleType;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

/**
 * Class ArticleTypeFetcherHandler.
 */
class ArticleTypeFetcherHandler extends DataHandler
{
    /**
     * @var \Notadd\Content\Models\ArticleType
     */
    protected $articleType;

    /**
     * ArticleTypeFinderHandler constructor.
     *
     * @param \Notadd\Content\Models\ArticleType $articleType
     * @param \Illuminate\Container\Container    $container
     * @param \Illuminate\Http\Request           $request
     * @param \Illuminate\Translation\Translator $translator
     */
    public function __construct(
        ArticleType $articleType,
        Container $container,
        Request $request,
        Translator $translator
    ) {
        parent::__construct($container, $request, $translator);
        $this->articleType = $articleType;
    }
}
