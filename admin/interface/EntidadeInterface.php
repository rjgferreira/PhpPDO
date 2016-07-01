<?php

interface EntidadeInterface
{
    public function getValueId();
    public function setValueId($valueId);

    public function getFieldId();
    public function setFieldId($fieldId);

    public function getTable();
}