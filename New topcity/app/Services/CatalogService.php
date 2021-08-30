<?php

namespace App\Services;


use App\Models\Category;

class CatalogService
{
    public function getCatalog()
    {

        $language = app()->getLocale();
//        \Cache::tags('catalog_menu')->flush();
//        \Cache::forget('catalog_html_' . $language);
        $catalog = \Cache::tags('catalog_menu')->rememberForever('catalog_html_' . $language, function () use ($language) {
            return $this->buildCatalog($language);
        });

        return $catalog;
    }


    public function buildCatalog($language)
    {

        $catalog_html = '';

        $traverse = function ($categories) use (&$traverse, &$catalog_html, $language) {
            $catalog_html .= '<ul class="list-nasted">';
            foreach ($categories as $category) {
                if ($category->hide) continue;
                if (count($category->children) > 0) {
                    $catalog_html .= '<li class="list__item" data-id="' . $category->id . '"><i class="far fa-minus-square far-small fa-plus-square js-tree-item"></i><a class="list__title js-tree-item left-line" href="' . route('shop.show', ['category' => $category->slug]) . '"  title="' . $category->getTranslatedAttribute('name', $language, 'uk') . '">' . $category->getTranslatedAttribute('name', $language, 'uk') . '</a>';
                    $traverse($category->children);
                } else {
                    if ($category === $categories->last()) {
                        $catalog_html .= '<li class="list__item" data-id="' . $category->id . '"> <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"viewBox="0 0 12 11"><defs><linearGradient id="tew8a" x1="0" x2="12" y1="5" y2="6"gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00a3d4"/><stop offset=".86" stop-color="#3dd2ff"/><stop offset="1" stop-color="#3dd2ff"/></linearGradient></defs><g><g><path d="M9.072 5.499c0 1.715-1.378 3.111-3.073 3.111-1.694 0-3.072-1.396-3.072-3.111 0-1.715 1.378-3.11 3.072-3.11 1.695 0 3.073 1.395 3.073 3.11zm-1.01 0C8.063 4.345 7.14 3.41 6 3.41c-1.139 0-2.063.935-2.063 2.089S4.86 7.588 6 7.588c1.14 0 2.064-.935 2.064-2.089zm3.703.889L9.642 10.11a1.756 1.756 0 0 1-1.52.89H3.877c-.625 0-1.208-.341-1.52-.89L.234 6.388a1.802 1.802 0 0 1 0-1.777L2.357.888a1.756 1.756 0 0 1 1.52-.889h4.245c.625 0 1.208.34 1.52.889l2.123 3.723c.312.547.312 1.229 0 1.777zm-1.99-.889c0-2.108-1.694-3.822-3.776-3.822-2.08 0-3.774 1.714-3.774 3.822s1.693 3.822 3.774 3.822c2.082 0 3.775-1.714 3.775-3.822z"/><path fill="#00a3d4"d="M9.072 5.499c0 1.715-1.378 3.111-3.073 3.111-1.694 0-3.072-1.396-3.072-3.111 0-1.715 1.378-3.11 3.072-3.11 1.695 0 3.073 1.395 3.073 3.11zm-1.01 0C8.063 4.345 7.14 3.41 6 3.41c-1.139 0-2.063.935-2.063 2.089S4.86 7.588 6 7.588c1.14 0 2.064-.935 2.064-2.089zm3.703.889L9.642 10.11a1.756 1.756 0 0 1-1.52.89H3.877c-.625 0-1.208-.341-1.52-.89L.234 6.388a1.802 1.802 0 0 1 0-1.777L2.357.888a1.756 1.756 0 0 1 1.52-.889h4.245c.625 0 1.208.34 1.52.889l2.123 3.723c.312.547.312 1.229 0 1.777zm-1.99-.889c0-2.108-1.694-3.822-3.776-3.822-2.08 0-3.774 1.714-3.774 3.822s1.693 3.822 3.774 3.822c2.082 0 3.775-1.714 3.775-3.822z"/></g></g></svg><a class="list__title js-tree-item left-line" href="' . route('shop.show', ['category' => $category->slug]) . '" title="' . $category->getTranslatedAttribute('name', $language, 'uk') . '">' . $category->getTranslatedAttribute('name', $language, 'uk') . '</a>';
                    } else {
                        $catalog_html .= '<li class="list__item" data-id="' . $category->id . '"> <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"viewBox="0 0 12 11"><defs><linearGradient id="tew8a" x1="0" x2="12" y1="5" y2="6"gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00a3d4"/><stop offset=".86" stop-color="#3dd2ff"/><stop offset="1" stop-color="#3dd2ff"/></linearGradient></defs><g><g><path d="M9.072 5.499c0 1.715-1.378 3.111-3.073 3.111-1.694 0-3.072-1.396-3.072-3.111 0-1.715 1.378-3.11 3.072-3.11 1.695 0 3.073 1.395 3.073 3.11zm-1.01 0C8.063 4.345 7.14 3.41 6 3.41c-1.139 0-2.063.935-2.063 2.089S4.86 7.588 6 7.588c1.14 0 2.064-.935 2.064-2.089zm3.703.889L9.642 10.11a1.756 1.756 0 0 1-1.52.89H3.877c-.625 0-1.208-.341-1.52-.89L.234 6.388a1.802 1.802 0 0 1 0-1.777L2.357.888a1.756 1.756 0 0 1 1.52-.889h4.245c.625 0 1.208.34 1.52.889l2.123 3.723c.312.547.312 1.229 0 1.777zm-1.99-.889c0-2.108-1.694-3.822-3.776-3.822-2.08 0-3.774 1.714-3.774 3.822s1.693 3.822 3.774 3.822c2.082 0 3.775-1.714 3.775-3.822z"/><path fill="#00a3d4"d="M9.072 5.499c0 1.715-1.378 3.111-3.073 3.111-1.694 0-3.072-1.396-3.072-3.111 0-1.715 1.378-3.11 3.072-3.11 1.695 0 3.073 1.395 3.073 3.11zm-1.01 0C8.063 4.345 7.14 3.41 6 3.41c-1.139 0-2.063.935-2.063 2.089S4.86 7.588 6 7.588c1.14 0 2.064-.935 2.064-2.089zm3.703.889L9.642 10.11a1.756 1.756 0 0 1-1.52.89H3.877c-.625 0-1.208-.341-1.52-.89L.234 6.388a1.802 1.802 0 0 1 0-1.777L2.357.888a1.756 1.756 0 0 1 1.52-.889h4.245c.625 0 1.208.34 1.52.889l2.123 3.723c.312.547.312 1.229 0 1.777zm-1.99-.889c0-2.108-1.694-3.822-3.776-3.822-2.08 0-3.774 1.714-3.774 3.822s1.693 3.822 3.774 3.822c2.082 0 3.775-1.714 3.775-3.822z"/></g></g></svg><a class="list__title js-tree-item left-line left-vertical-line" href="' . route('shop.show', ['category' => $category->slug]) . '" title="' . $category->getTranslatedAttribute('name', $language, 'uk') . '">' . $category->getTranslatedAttribute('name', $language, 'uk') . '</a>';
                    }

                }
                $catalog_html .= '</li>';
            }
            $catalog_html .= '</ul>';
        };


        $items = Category::withTranslation($language)->get()->toTree();

        $catalog_html .= '<div class="treeview-wrap">
                <ul id="treeview" class="treeview">';
        foreach ($items as $category) {
            if ($category->hide) continue;
            $catalog_html .= '<li class="main-list" data-id="' . $category->id . '"><i class="far fa-minus-square far-big position-icon  js-tree-item"></i><a class="main-list__title js-tree-item" href="' . route('shop.show', ['category' => $category->slug]) . '"title="' . $category->getTranslatedAttribute('name', $language, 'uk') . '">' . $category->getTranslatedAttribute('name', $language, 'uk') . '</a>';
            if ($category->children) {
                $catalog_html .= '<ul class="main-list-nasted js-tree-close">';
                foreach ($category->children as $item) {
                    if ($item->hide) continue;
                    if (count($item->children) > 0) {
                        $catalog_html .= '<li class="list__item" data-id="' . $item->id . '"><i class="far fa-minus-square far-small fa-plus-square js-tree-item"></i><a class="list__title js-tree-item" href="' . route('shop.show', ['category' => $item->slug]) . '"title="' . $item->getTranslatedAttribute('name', $language, 'uk') . '">' . $item->getTranslatedAttribute('name', $language, 'uk') . '</a>';

                        $traverse($item->children);
                    } else {
                        $catalog_html .= '<li class="list__item" data-id="' . $item->id . '"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"viewBox="0 0 12 11"><defs><linearGradient id="tew8a" x1="0" x2="12" y1="5" y2="6"gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00a3d4"/><stop offset=".86" stop-color="#3dd2ff"/><stop offset="1" stop-color="#3dd2ff"/></linearGradient></defs><g><g><path d="M9.072 5.499c0 1.715-1.378 3.111-3.073 3.111-1.694 0-3.072-1.396-3.072-3.111 0-1.715 1.378-3.11 3.072-3.11 1.695 0 3.073 1.395 3.073 3.11zm-1.01 0C8.063 4.345 7.14 3.41 6 3.41c-1.139 0-2.063.935-2.063 2.089S4.86 7.588 6 7.588c1.14 0 2.064-.935 2.064-2.089zm3.703.889L9.642 10.11a1.756 1.756 0 0 1-1.52.89H3.877c-.625 0-1.208-.341-1.52-.89L.234 6.388a1.802 1.802 0 0 1 0-1.777L2.357.888a1.756 1.756 0 0 1 1.52-.889h4.245c.625 0 1.208.34 1.52.889l2.123 3.723c.312.547.312 1.229 0 1.777zm-1.99-.889c0-2.108-1.694-3.822-3.776-3.822-2.08 0-3.774 1.714-3.774 3.822s1.693 3.822 3.774 3.822c2.082 0 3.775-1.714 3.775-3.822z"/><path fill="#00a3d4"d="M9.072 5.499c0 1.715-1.378 3.111-3.073 3.111-1.694 0-3.072-1.396-3.072-3.111 0-1.715 1.378-3.11 3.072-3.11 1.695 0 3.073 1.395 3.073 3.11zm-1.01 0C8.063 4.345 7.14 3.41 6 3.41c-1.139 0-2.063.935-2.063 2.089S4.86 7.588 6 7.588c1.14 0 2.064-.935 2.064-2.089zm3.703.889L9.642 10.11a1.756 1.756 0 0 1-1.52.89H3.877c-.625 0-1.208-.341-1.52-.89L.234 6.388a1.802 1.802 0 0 1 0-1.777L2.357.888a1.756 1.756 0 0 1 1.52-.889h4.245c.625 0 1.208.34 1.52.889l2.123 3.723c.312.547.312 1.229 0 1.777zm-1.99-.889c0-2.108-1.694-3.822-3.776-3.822-2.08 0-3.774 1.714-3.774 3.822s1.693 3.822 3.774 3.822c2.082 0 3.775-1.714 3.775-3.822z"/></g></g></svg><a class="list__title js-tree-item" href="' . route('shop.show', ['category' => $item->slug]) . '" title="' . $item->getTranslatedAttribute('name', $language, 'uk') . '"> ' . $item->getTranslatedAttribute('name', $language, 'uk') . '</a>';
                    }
                    $catalog_html .= '</li>';
                }
                $catalog_html .= '</ul>';
            }
            $catalog_html .= '</li>';

        }
        $catalog_html .= '</ul></div>';
        return $catalog_html;
    }

}
