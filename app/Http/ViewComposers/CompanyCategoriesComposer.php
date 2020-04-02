<?php

namespace App\Http\ViewComposers;

use App\Models\CompanyCategory;
use Illuminate\Contracts\View\View;

class CompanyCategoriesComposer
{
    /**
     * @var string
     */
    protected $company_categories;

    public function __construct()
    {
        $this->company_categories = CompanyCategory::select(['id', 'name'])->get();
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('company_categories', $this->company_categories);
    }
}
