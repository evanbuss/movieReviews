<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {
     function get_all()
     {
         return $this->db->query("SELECT * FROM products")->result_array();
     }
     function get_single($id)
     {
         return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
     }
     function add($product)
     {
         $query = "INSERT INTO products (name, description, price, updated_at) VALUES (?,?,?,NOW())";
         $values = array($product['name'], $product['description'], $product['price']); 
         $this->db->query($query, $values);
         return $this->db->insert_id();
     }
     function update($id,$product) 
     {
        $query = "UPDATE products SET name=?,description=?,price=?,updated_at=NOW() WHERE id=?";
        $values = array(
            $product['name'],
            $product['description'],
            $product['price'],
            $id
        );
        return $this->db->query($query,$values);
     }
     function destroy($id) 
     {
        $query = "DELETE FROM products WHERE id=?";
        return $this->db->query($query,array($id));
     }
}