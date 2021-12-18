<?php
class Car extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->kategori = '';
    }

    public function get_car_category()
    {
        return $this->db->get('kategori')->result();
    }

    public function get_car_models()
    {
        $res = $this->db->get('jenis')->result();
        foreach ($res as $v) {
            $v->harga = $this->get_car_price($v->id_jenis);
            $v->img = $this->get_car_color($v->id_jenis);
        }
        return $res;
    }

    public function get_car_type($id)
    {
        $this->db->select('*');
        $this->db->from('jenis');
        $this->db->join('tipe', 'tipe.jenis=jenis.id_jenis');
        $this->db->where(['jenis.id_jenis' => $id]);
        $res = $this->db->get()->result();
        $this->kategori = $res[0]->kategori;
        return $res;
    }

    public function get_car_colors($id)
    {
        $res = $this->db->get_where('warna', ['id_jenis' => $id])->result();
        return $res;
    }

    public function get_car_color($id)
    {
        $this->db->limit(1);
        $res = $this->db->get_where('warna', ['id_jenis' => $id])->row();
        return $res;
    }

    public function get_car_price($id)
    {
        $this->db->select('MIN(manual) as min_manual, MIN(automatic) as min_automatic');
        $res = $this->db->get_where('tipe', ['jenis' => $id])->result();
        return $res;
    }

    public function get_car_recom($id)
    {
        $this->db->select('*');
        $this->db->from('jenis');
        $this->db->join('kategori', 'kategori.id_kategori=jenis.kategori');
        $this->db->where(['jenis.kategori' => $this->kategori]);
        $this->db->where_not_in('jenis.id_jenis', $id);
        $nores = $this->db->get()->result();
        foreach ($nores as $v) {
            $v->harga = $this->get_car_price($v->id_jenis);
            $v->img = $this->get_car_color($v->id_jenis);
        }
        return $nores;
    }
}
