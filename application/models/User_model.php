<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    var $table = "users";
    
    function __construct()
    {
        parent::__construct();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);        
        return $data['username'];
    }

    function get($data = NULL, $multiple_result = TRUE, $like = NULL, $or = FALSE)
    {
        $this->db->from($this->table);
        if($data != NULL)
        {
            if($or)
            {
                $cnt = 0;
                foreach($data as $key=>$val)
                {
                    if($cnt == 0)$this->db->where($key, $val);
                    else $this->db->or_where($key, $val);
                    $cnt++;
                }
            }
            else
                $this->db->where($data);
        }
        if($like != NULL)
        {
            if(count($like) > 1)
            {
                $i = 0;
                foreach($like as $key=>$val)
                {
                    if($i == 0)$this->db->like($key, $val);
                    else $this->db->or_like($key, $val);
                    $i++;
                }
            }
            else if(count($like) == 1)
                $this->db->like($like);
        }
        $this->db->order_by('username');
        if($query = $this->db->get())
        {
            //echo $this->db->last_query();exit;
            if($query->num_rows() > 0)
                if($multiple_result)return $query->result();
                else return $query->row();
        }
        return FALSE;
    }

    function login($data)
    {
        //$this->db->select('username, level, alamat, no_telp, email, nama');
        $this->db->from($this->table);
        $this->db->where($data);
        if($result = $this->db->get())
        {
            if($result->num_rows() > 0)
            {
                return $result->row();
            }
        }
        return FALSE;
    }

    function update($id, $data, $where = NULL)
    {
        $this->db->where('username', $id);
        if($where != NULL)$this->db->where($where);
        $this->db->update($this->table, $data);
        return $id;
    }

    function del($id)
    {
        $this->db->where('username', $id);
        $this->db->delete($this->table);
        return 1;
    }
}