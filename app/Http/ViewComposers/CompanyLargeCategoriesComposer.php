<?php

namespace App\Http\ViewComposers;

use App\Models\CompanyLargeCategory;
use Illuminate\Contracts\View\View;

class CompanyLargeCategoriesComposer
{
    /**
     * @var string
     */
    protected $company_large_categories;

    public function __construct()
    {
        $this->company_large_categories = CompanyLargeCategory::select(['id', 'name'])->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('company_large_categories', $this->company_large_categories);
    }
}
