<?php
class CategoryDB {
    public function getCategories() {
        $db = Database::getDB();
        $query = 'SELECT * FROM categories
                  ORDER BY categoryID';
        $statement = $db->query($query);
        $categories = array();
        foreach ($statement as $row) {
            $category = new Category();
            $category->setID($row['categoryID']);
            $category->setName($row['categoryName']);
            $categories[] = $category;
        }
        return $categories;
    }

    public function getCategory($category_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM categories
                  WHERE categoryID = '$category_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $category = new Category();
        $category->setID($row['categoryID']);
        $category->setName($row['categoryName']);
        return $category;
    }
}
?>