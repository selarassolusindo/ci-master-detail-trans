<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

	protected $table = 'customer';
	protected $table_detail = 'address';

	public $avatar;
	public $name;
	public $address = [];

	public function __construct()
	{
		parent::__construct();

		$this->flush();
	}

	private function flush()
	{
		$this->avatar = '';
		$this->name = '';
		$this->address = [];
	}

	private function validate()
	{
		if (
			empty($this->avatar) ||
			empty($this->name) ||
			empty($this->address)
		) {
			return FALSE;
		}

		return TRUE;
	}

	public function all()
	{
		$this->db->order_by('id', 'desc');

		$q = $this->db->get($this->table);

		$r = $q->result();

		foreach ($r as $key => $value) $r[$key]->address = $this->get_address($value->id);

		return $r;
	}

	public function get_address($customer_id)
	{
		$this->db->select('address.id, address_title.title, address.address');
		$this->db->join('address_title', 'address_title.id = address.title_id');
		$this->db->order_by('address.id', 'asc');

		$q = $this->db->get_where($this->table_detail, ['customer_id' => $customer_id]);

		return $q->result();
	}

	public function get_title($term = '')
	{
		$this->db->order_by('id', 'asc');

		if (! empty($term)) $this->db->like('LOWER(title)', strtolower($term), 'both');

		$q = $this->db->get('address_title');

		return $q->result();
	}

	public function get($id)
	{
		$q = $this->db->get_where($this->table, ['id' => $id]);

		return $q->num_rows() > 0 ? $q->row() : FALSE;
	}

	public function destroy($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}

	public function store()
	{
		if (! $this->validate()) return FALSE;

		$this->db->trans_begin();

		try {
			$this->db->insert($this->table, $this);

			$id = $this->db->insert_id();

			foreach ($this->address as $key => $value) $this->address[$key]['customer_id'] = $id;

			$this->db->insert_batch($this->table_detail, $this->address);
		} catch (Exception $e) {
			return FALSE;
		}

		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return FALSE;
		} else {
	        $this->db->trans_commit();
	        return TRUE;
		}
	}

}

/* End of file Customer.php */
/* Location: ./application/models/Customer.php */