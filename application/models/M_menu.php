<?php
class M_menu extends CI_Model
{
    public function getmenu()
    {
        return $this->db->get_where('user_sub_menu', array('is_activated' => 1));
    }
    public function getbagian()
    {
        return $this->db->get('user_menu');
    }
    public function inputmenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
        return $this->db->insert_id();
    }
    public function getmenubyid($id)
    {
        $this->db->get_where('user_sub_menu', ['id_user_submenu' => $id])->row_array();
    }
    public function editmenu($data)
    {
        $this->db->where('id_user_submenu', $this->input->post('menuid'));
        $this->db->update('user_sub_menu', $data);
    }
    public function deletemenu($id)
    {
        $data = array(
            'is_activated' => '0'
        );
        $this->db->where('id_user_submenu', $id);
        $this->db->update('user_sub_menu', $data);
    }
    // =============================================SubMenu=============================================================
    public function getsubmenu()
    {
        // return $this->db->get_where('user_sub_menu2', array('is_activated' => 1));
        $this->db->select('*');
        $this->db->from('user_sub_menu2');
        $this->db->join('user_sub_menu', 'user_sub_menu.id_user_submenu=user_sub_menu2.id_user_submenu');
        return $this->db->get();
    }
    public function getsubmenuchs()
    {
        // return $this->db->get_where('user_sub_menu2', array('is_activated' => 1));
        $this->db->select('*');
        $this->db->from('user_sub_menu2');
        $this->db->join('user_sub_menu', 'user_sub_menu.id_user_submenu=user_sub_menu2.id_user_submenu');
        $this->db->group_by('user_sub_menu2.id_user_submenu', 'DESC');
        return $this->db->get();
    }
    public function inputsubmenu($data)
    {
        $this->db->insert('user_sub_menu2', $data); 
        return $this->db->insert_id();
    }
}
