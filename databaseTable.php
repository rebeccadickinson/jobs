<?PHP 
class databaseTable {
private $table;
private $pdo;
private $primaryKey;
//sets pdo and table
	public function __construct($pdo, $table){
		 $this->pdo = $pdo;
		 $this->table = $table;
	 }
	function find($field, $value) {
	 $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
	 $criteria = [
	 'value' => $value
	 ];
	 $stmt->execute($criteria);
	 return $stmt->fetch();
	 }
	 
	function findAll(){
	$stmt = $this->pdo->query('SELECT * FROM '.$this->table.'');
	return $stmt->fetchAll();
	}
	 
	function delete($record) {
	 $keys = array_keys($record);
	 $values = implode(', ', $keys);
	 $valuesWithColon = implode(', :', $keys);
	 $query = $this->pdo->prepare('DELETE FROM '.$this->table.' WHERE '.$values.' = :'.$valuesWithColon.'');
	 $query->execute($record);
	 //return $query->rowCount();
	 }
	 
	 
	public function insert($record){
	 $keys = array_keys($record);
	 $values = implode(', ', $keys);
	 $valuesWithColon = implode(', :', $keys);
	 $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
	 $stmt = $this->pdo->prepare($query);
	 $stmt->execute($record);
	}

	public function update($record,$primaryKey){
	 $query = 'UPDATE ' . $this->table . ' SET ';
	 $parameters = [];
	 foreach ($record as $key => $value) {
	 $parameters[] = $key . ' = :' .$key;
	 }
	 $query .= implode(', ', $parameters);
	 $query .= ' WHERE ' . $primaryKey . ' = :primaryKey';
	 $record['primaryKey'] = $record[$primaryKey];
	 $stmt = $this->pdo->prepare($query);
	 $stmt->execute($record);

	} 
	
	public function save($record,$primaryKey){
	$success = $this->insert($record);
		if (!$success) {	
			$this->update($record,$primaryKey);
		}
	}
}


?> 