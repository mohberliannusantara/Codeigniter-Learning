<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //fungsi untuk mengambil seluruh data category
    public function get_all()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    // fungsi insert category
    public function create()
    {
        $data = array(
            'cat_name'          => $this->input->post('cat_name'),
            'cat_description'   => $this->input->post('cat_description')
        );

        return $this->db->insert('categories', $data);
    }

    // Mendapatkan kategori berdasar ID
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('categories', array('cat_id' => $id));
        return $query->row();
    }

    //fungsi update data
    public function update($data, $id)
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'categories', $data, array('cat_id'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    //fungsi delete
    public function delete($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('categories', array('cat_id'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

    public function generate_cat_dropdown()
    {
        $this->db->select ('
            categories.cat_id,
            categories.cat_name
        ');

        $this->db->order_by('cat_name');

        $result = $this->db->get('categories');

        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {

            foreach ($result->result_array() as $row) {
                $dropdown[$row['cat_id']] = $row['cat_name'];
            }
        }

        return $dropdown;
    }
}
