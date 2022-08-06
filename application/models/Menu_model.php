<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	private $_table = "user_sub_menu";

    public $id;
    public $menu_id;
    public $title;
    public $url;
    public $icon;
    public $is_active;

    public function rules() {
        return [
            ['field' => 'menu_id',
            'label' => 'Menu',
            'rules' => 'required'],

            ['field' => 'title',
            'label' => 'Title',
            'rules' => 'required'],

            ['field' => 'url',
            'label' => 'URL',
            'rules' => 'required'],

            ['field' => 'icon',
            'label' => 'Icon',
            'rules' => 'required'],
        ];
    }

    public function getSubMenu()
    {
      $query = "SELECT `user_sub_menu`. *, `user_menu`. `menu`
      FROM `user_sub_menu` join `user_menu`
      on `user_sub_menu`. `menu_id` = `user_menu`.`id`";
      return $this->db->query($query)->result_array();
  }

  public function getById($id_user) {
    return $this->db->get_where($this->_table, ["id" => $id_user])->row();
}


public function update() {
    $post = $this->input->post();

    $this->id = $post["id"];
    $this->title = $post["title"];
    $this->menu_id = $post["menu_id"];
    $this->url = $post["url"];
    $this->icon = $post["icon"];
    if(isset($_POST['is_active']) )
    {
        $this->is_active = $post["is_active"];
    }
    else
    {
        $this->is_active = 0;
    }

    $this->db->update($this->_table, $this, array('id' => $post['id']));

}


public function update_menu() {
    $post = $this->input->post();

    $this->id = $post["id"];
    $this->menu = $post["menu"];

    $this->db->update($this->db->update('user_menu'), $this, array('id' => $post['id']));

}


}
