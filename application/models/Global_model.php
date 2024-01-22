<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{
    public function select($table_name, $where_conditions = [], $join_conditions = [], $select = '*', $order_bys = [])
    {
        $this->db->select($select);
        
        foreach ($where_conditions as $where_condition) {
            $this->db->where($where_condition);
        }

        foreach ($join_conditions as $join_condition) {
            if (empty($join_condition['option_join'])) {
                $join_condition['option_join'] = 'inner';
            }
            $this->db->join($join_condition['table'], $join_condition['condition'], $join_condition['option_join']);
        }

        foreach ($order_bys as $order_by) {
            $this->db->order_by($order_by);
        }

        return $this->db->get($table_name);
    }

    public function insert($table_name, $data)
    {
        return $this->db->insert($table_name, $data);
    }

    public function update($table_name, $data, $where_conditions = [])
    {
        foreach ($where_conditions as $where_condition) {
            $this->db->where($where_condition);
        }
        $this->db->set($data);
        return $this->db->update($table_name);
    }
}

/* End of file Global_model.php */
