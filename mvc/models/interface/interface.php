<?php
interface interface_tb{
    public function select_tb();
    public function select_id($id);
    public function insert_tb($values);
    public function update_us($values, $id);
    public function delete($id);
}
?>