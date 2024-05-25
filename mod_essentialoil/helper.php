<?php
// No direct access
defined('_JEXEC') or die;

class ModEssentialoilHelper
{
    public static function getProducts()
    {
        // Replace category_id with your actual category ID for Essential oil
        $category_id = 7;
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
                    ->select($db->quoteName(['a.id', 'b.product_name', 'a.product_price']))
                    ->from($db->quoteName('#__eshop_products', 'a'))
                    ->join('INNER', $db->quoteName('#__eshop_productcategories', 'c') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('c.product_id') . ')')
                    ->join('INNER', $db->quoteName('#__eshop_productdetails', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.product_id') . ')')
                    ->where($db->quoteName('c.category_id') . ' = ' . $db->quote($category_id))
                    ->where($db->quoteName('a.published') . ' = 1');

        $db->setQuery($query);
        return $db->loadObjectList();
    }
}
?>