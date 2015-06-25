<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model{

    var $table = "hdrpages";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($table = NULL, $data = NULL, $single = FALSE, $count = FALSE, $limit = NULL, $start = NULL, $order = NULL, $desc = FALSE)
    {
        $ttable = $this->table;
        if($table != NULL){
            $ttable = $table;
        }
        if($count) $this->db->select('count(id) as cnt');
        $this->db->from($ttable);

        if($data != NULL)
        {
            foreach($data as $key=>$val)
            {
                $this->db->where($key, $val);
            }
        }

        if($order)
        {
            $descending = $desc ? "desc" : "asc";
            $this->db->order_by($order, $descending);
        }
        else
            $this->db->order_by('DCREA');
        if($limit)
        {
            $this->db->limit($limit, $start);
        }

        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {
                if($single)return $query->row();
                else return $query->result();
            }
        }
        return FALSE;
    }  

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $id;
    }

}