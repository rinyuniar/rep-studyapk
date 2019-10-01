<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    var $tableName, $tableId;
    //function untuk memanggil semua fungsi yang dipakai
    function __construct(){
        parent::__construct();
        $this->tableName = "user";
        $this->tableId = "id_user";
    }

    function create($data){
        //menambahkan data
        if($data){
            $query = $this->db->insert($this->tableName, $data); //query build
            //terlebih dahulu atur autoload dalam libraries.... mendukung enngine db 
            return $query;
        }
    }

    function get($id="",$field=""){ 
        if($id) {
            if(!$field){
                $field = $this->tableId;
            }

            if(is_array($id)){
                $this->db->where_in($field,$id);
            }else{
                $this->db->where($field,$id);
            }

        }

        //menampilkan data
        $query = $this->db->get($this->tableName); 
        return $query->result_array();
    }

    function update($data,$id){
        //mengubah data

    }

}