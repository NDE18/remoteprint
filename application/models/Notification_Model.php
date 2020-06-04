<?php

class Notification_Model extends MY_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function getAll() {
        $query = $this->db->get('notification');
        return $query->result();
    }

    public function getByUserID($id, $last_notification_id=0, $limit=true) {
        // urutkan dari yang paling baru
        $this->db->order_by('date', 'DESC');
        if ($limit) {
            $this->db->from('notification');
            $this->db->where('sender_id', $id);
            $this->db->where('id >', $last_notification_id);
            $this->db->limit(8);
            $query = $this->db->get();
        } else {
            $query = $this->db->get_where('notification', ['sender_id' => $id]);
        }
        return $query->result_array();
    }

    public function getByUsername($username) {
    	$this->db->order_by('date', 'DESC');
        $query = $this->db->get_where('notification', ['nom' => $username], 10);
        return $query->result();
    }

    public function create($data) {
        $this->db->insert($this->notification, $data);
    }
    public function countNotif(){
        return $this->db->select('*')->from($this->notification)->where('receiver_id',session_data('id'))->where('vu',0)->get()->result();
    }
    public function getNotif(){
        return $this->db->select('*')->from($this->notification)->where('receiver_id',session_data('id'))
            ->order_by('dateReception','DESC')
            ->get()->result();
    }
    public function update(){
        return $this->db->set('vu',1)->where('receiver_id',session_data('id'))->update($this->notification);
    }

}
