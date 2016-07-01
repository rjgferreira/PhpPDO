<?php
    class ServiceDB{
        private $db;
        private $table;
        private $fieldId;
        private $valueId;
        private $fields;
        private $values;
        private $bindValues;

        public function __construct(\PDO $db, EntidadeInterface $entity){
            $this->db = $db;
            $this->fields = array();
            $this->values = array();
            $this->bindValues = array();
            $this->table = $entity->getTable();
            $this->valueId = $entity->getValueId();
            $this->fieldId = $entity->getFieldId();
        }

        public function addToInsert($field, $value){
            $this->fields[] = $field;
            $this->values[] = $value;
            return $this;
        }

        public function addToUpdate($field, $value){
            $this->bindValues[] = $field.'=:'.$field;
            $this->fields[] = $field;
            $this->values[] = $value;
            return $this;
        }

        public function find(){
            $query = "SELECT * FROM {$this->table} WHERE {$this->fieldId} = :{$this->fieldId}";
            $sttm = $this->db->prepare($query);
            $sttm->bindValue(":{$this->fieldId}", $this->valueId);
            if($sttm->execute())
                return $sttm->fetch(\PDO::FETCH_ASSOC);
        }

        public function alunosTop3(){
            $query = "SELECT * FROM {$this->table} ORDER BY nota DESC LIMIT 3";
            $sttm = $this->db->query($query);
            return $sttm->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function listar($order = null){
            $query = "SELECT * FROM {$this->table} $order";
            $sttm = $this->db->query($query);
            return $sttm->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function search(){
            $query = "SELECT * FROM {$this->table} WHERE {$this->fieldId} LIKE :{$this->fieldId}";
            $sttm = $this->db->prepare($query);
            $sttm->bindValue(":".$this->fieldId, "%".$this->valueId."%");
            if($sttm->execute()) return $sttm->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function inserir(){
            $query = "INSERT INTO {$this->table} (".implode(", ",$this->fields).") VALUES (:".implode(", :",$this->fields).")";
            $sttm = $this->db->prepare($query);
            $bindValues = array_combine($this->fields,$this->values);
            if($sttm->execute($bindValues)) return true;
        }

        public function alterar(){
            $query = "UPDATE {$this->table} SET ".implode(', ',$this->bindValues)." WHERE {$this->fieldId} = :{$this->fieldId}";
            $sttm = $this->db->prepare($query);
            $bindValues = array_combine($this->fields,$this->values);
            if($sttm->execute($bindValues)) return true;
        }

        public function excluir(){
            $query = "DELETE FROM {$this->table} WHERE {$this->fieldId} = :{$this->fieldId}";
            $sttm = $this->db->prepare($query);
            $sttm->bindValue(":{$this->fieldId}", $this->valueId);
            if($sttm->execute()) return true;
        }


    }