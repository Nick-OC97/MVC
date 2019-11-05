<?php
	class Model
	{
		protected $_db, $_table, $_modelName, $_softDelete = false, $_columnNames = [];
		public $id;

		public function __construct($table)
		{
			$this->_db = DB::getInstance();
			$this->_table = $table;
			$this->_setTableColumns();
			$this->_modelName = str_replace(' ', '', ucwords(str_repalce('_', ' ', $this->_table)));
		}

		protected function _setTableColumns()
		{
			$columns = $this->get_Columns();
			foreach($columns as $column)
				$this->_columnNames[] = $column->Field;
				$this->{$columnName} = NULL;
		}

		public function get_columns()
		{
			return $this->_db->get_columns($this->_table);
		}

		public function find($params = [])
		{
			$results = [];
			$resultsQuery = $this->_db->find($this->_table, $params);
			foreach($resultsQuery as $result)
			{
				$obj = new $this->_modelName($this->_table);
				$obj->populateObjData($result);
				$results[] = $obj;
			}
			return ($results);
		}

		public function findFirst($params = [])
		{
			$resultQuery = $this->_db->findFirst($this->_table, $params);
			$result = new $this->_modelName($this->_table);
			$result->populateObjData($resultQuery);
			return $result;
		}

		public function findById($id)
		{
			return $this->findFirst(['conditions' => "id = ?", 'bind' => [$id]]);
		}

		public function insert($id)
		{
			if (empty($fields))
			{
				return false;
			}
			else
			{
				return $this->_db->insert($this->_table, $fields);
			}
		}

		public function update($id, $fields)
		{
			if (empty($fields) || $id == '')
			{
				return false;
			}
			else
			{
				return $this->_db->update($this->_table, $id, $fields);
			}
		}

		protected function populateObjData($result)
		{
			foreach($result as $key => $val)
			{
				$this->$key = $val;
			}
		}
	}