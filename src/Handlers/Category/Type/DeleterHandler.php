<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-11-25 15:20
 */
namespace Notadd\Content\Handlers\Category\Type;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\CategoryType;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class CategoryTypeDeleteHandler.
 */
class DeleterHandler extends SetHandler
{
    /**
     * CategoryTypeDeleterHandler constructor.
     *
     * @param \Notadd\Content\Models\CategoryType $categoryType
     * @param \Illuminate\Container\Container     $container
     * @param \Illuminate\Http\Request            $request
     * @param \Illuminate\Translation\Translator  $translator
     */
    public function __construct(
        CategoryType $categoryType,
        Container $container,
        Request $request,
        Translator $translator
    ) {
        parent::__construct($container, $request, $translator);
        $this->model = $categoryType;
    }

    /**
     * Http code.
     *
     * @return int
     */
    public function code()
    {
        return 200;
    }

    /**
     * Errors for handler.
     *
     * @return array
     */
    public function errors()
    {
        return [
            $this->translator->trans('content::category_type.delete.fail'),
        ];
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $categoryType = $this->model->newQuery()->find($this->request->input('id'));
        if ($categoryType === null) {
            return false;
        }
        $categoryType->delete();

        return true;
    }

    /**
     * Messages for handler.
     *
     * @return array
     */
    public function messages()
    {
        return [
            $this->translator->trans('content::category_type.delete.success'),
        ];
    }
}