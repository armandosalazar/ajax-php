<?php
interface ICrud {
  public function create($data);
  public function read();
  public function update($data);
  public function delete($id);
}