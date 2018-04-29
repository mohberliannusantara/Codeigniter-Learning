<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  //fungsi mengambil semua data
  public function get_all()
  {
    // Memakai Query Builder
    $query = $this->db->get('blogs');

    // Return dalam bentuk object
    return $query->result();
  }

  //fungsi mengambil data berdasarkan id
  public function get_by_id($id)
  {
    $query = $this->db->get_where('blogs', array('blogs.post_id' => $id));
    return $query->row();
  }

  //fungsi mengambil data berdasarkan slug/judul
  public function get_by_slug($slug)
  {

    // Inner Join dengan table Categories
    $this->db->select ( '
    blogs.*,
    categories.cat_id as category_id,
    categories.cat_name,
    categories.cat_description,
    ' );
    $this->db->join('categories', 'categories.cat_id = blogs.fk_cat_id');

    $query = $this->db->get_where('blogs', array('post_slug' => $slug));

    // Karena datanya cuma 1, kita return cukup via row() saja
    return $query->row();
  }

  //fungsi insert data
  public function create($data)
  {
      return $this->db->insert('blogs', $data);
  }

}


 ?>
