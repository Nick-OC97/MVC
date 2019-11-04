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

		
	}