<?php

namespace App\Http\ViewComposers;

use App\Models\CompanyMiddleCategory;
use Illuminate\Contracts\View\View;

class CompanyMiddleCategoriesComposer
{
    /**
     * @var string
     */
    protected $company_middle_categories;

    public function __construct()
    {
        $this->company_middle_categories = CompanyMiddleCategory::select(['id', 'name'])->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('company_middle_categories', $this->company_middle_categories);
    }
}
