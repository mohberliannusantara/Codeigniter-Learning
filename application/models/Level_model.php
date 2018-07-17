<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model{

  public function get_all()
  {
    $query = $this->db->get('levels');
    return $query->result();
  }

  public function create($data){
    return $this->db->insert('levels', $data);
  }

  public function get_level_by_id($id)
  {
    $query = $this->db->get_where('levels', array('level_id' => $id));
    return $query->row();
  }

  //fungsi update data
  public function update($data, $id)
  {
    if ( !empty($data) && !empty($id) ){
      $update = $this->db->update( 'levels', $data, array('level_id'=>$id) );
      return $update ? true : false;
    } else {
      return false;
    }
  }

  //fungsi delete
  public function delete($id)
  {
    return $delete = $this->db->delete('levels', array('level_id'=>$id) );
  }
}
?>
