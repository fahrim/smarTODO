<?php

namespace App\Providers;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Search macro
         *
         * Searches an item by a query value, this search is executed when some filter or
         * the search value is changed
         *
         * @param array|null $attributes Array of fields to search for
         * @param String|null $searchTerm Value typed on the input search
         *
         * @return Builder Updated Eloquent query builder
         */
        Builder::macro('search', function (?array $attributes, ?string $searchTerm) {
            // if the search term is empty, then we can just return the query builder
            if (empty($searchTerm)) {
                return $this;
            }
            // if relation search contains a dot (.) then it is a relational search, and we need to apply a whereHas clause to the query builder
            $relationalFields = array_filter($attributes, static function ($item) {
                return str_contains($item, '.');
            });

            // remove relational fields from the attributes array
            $attributes = array_diff($attributes, $relationalFields);

            // if there are no relational fields, then we can just apply a where clause to the query builder
            return $this->where(function ($query) use ($attributes, $searchTerm, $relationalFields) {
                // Regular fields
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'LIKE', '%' . $searchTerm . '%');
                }
                // Relational fields
                foreach ($relationalFields as $relationalValue) {
                    [$relationship, $field] = explode('.', $relationalValue);
                    $query->orWhereHas($relationship, static function ($query) use ($searchTerm, $field) {
                        $query->where($field, 'like', "%{$searchTerm}%");
                    });
                }
            });
        });

        // Basic search macro
        //  Builder::macro('search', function($attributes, string $searchTerm) {
        //      return $searchTerm ? $this->where($attributes, 'LIKE', '%'.$searchTerm.'%') : $this;
        //  });
    }
}
